<?php
/*
 * This file is part of the ManageWP Worker plugin.
 *
 * (c) ManageWP LLC <contact@managewp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class MWP_EventListener_PublicRequest_AutomaticLogin implements Symfony_EventDispatcher_EventSubscriberInterface
{

    private $context;

    private $signer;

    private $nonceManager;

    private $configuration;

    private $sessionStore;

    public function __construct(MWP_WordPress_Context $context, MWP_Security_NonceManager $nonceManager, MWP_Signer_Interface $signer, MWP_Worker_Configuration $configuration, MWP_WordPress_SessionStore $sessionStore)
    {
        $this->context       = $context;
        $this->nonceManager  = $nonceManager;
        $this->signer        = $signer;
        $this->configuration = $configuration;
        $this->sessionStore  = $sessionStore;
    }

    public static function getSubscribedEvents()
    {
        return array(
            MWP_Event_Events::PUBLIC_REQUEST => array(
                array('checkLoginToken', 2),
                array('setXframeHeader', 3),
            ),
        );
    }

    public function checkLoginToken(MWP_Event_PublicRequest $event)
    {
        $request = $event->getRequest();

        if ($request->getMethod() !== 'GET') {
            return;
        }

        if (!$this->configuration->getPublicKey()) {
            // Site is not connected to a master instance.
            return;
        }

        if (empty($request->query['auto_login']) || empty($request->query['signature']) || empty($request->query['message_id']) || !array_key_exists('mwp_goto', $request->query)) {
            return;
        }

        // Some sites will redirect from HTTP to HTTPS or from non-www to www URL too late; so handle that case here.
        $siteUrl           = $this->context->getSiteUrl();
        $isWww             = substr($request->server['HTTP_HOST'], 0, 4) === 'www.';
        $isHttps           = $this->context->isSsl();
        $shouldWww         = (bool) preg_match('{^https?://www\.}', $siteUrl);
        $shouldHttps       = $this->context->isSslAdmin();
        $alreadyRedirected = !empty($request->query['auto_login_fixed']);
        if (
            (
                (!$isHttps !== $shouldHttps)
                || (!$isWww !== $shouldWww)
            )
            && !$alreadyRedirected
        ) {
            $prefix = sprintf('%s://%s', $shouldHttps ? 'https' : 'http', $shouldWww ? 'www.' : '');
            // Replace the scheme and the www. prefix and remove the request URI.
            $redirectUri = $prefix.preg_replace('{^https?://(?:www\.)?([^/]+).*$}', '$1', $siteUrl);
            // Attach the current request URI to a fixed site URL.
            $redirectUri = $redirectUri.$request->server['REQUEST_URI'];
            // Prevent infinite loop with the added parameter.
            $redirectUri = $this->modifyUriParameters($redirectUri, array('auto_login_fixed' => 'yes'));
            $event->setResponse(new MWP_Http_RedirectResponse($redirectUri, 302, array(
                'P3P' => 'CP="CAO PSA OUR"',
            )));

            return;
        }

        $username = empty($request->query['username']) ? null : $request->query['username'];

        if ($username === null) {
            $users = $this->context->getUsers(array('role' => 'administrator', 'number' => 1, 'orderby' => 'ID'));
            if (empty($users[0]->user_login)) {
                throw new MWP_Worker_Exception(MWP_Worker_Exception::AUTO_LOGIN_USERNAME_REQUIRED, "We could not find an administrator user to use. Please contact support.");
            }
            $username = $users[0]->user_login;
        }

        $where = isset($request->query['mwp_goto']) ? $request->query['mwp_goto'] : '';

        $signature = base64_decode($request->query['signature']);
        $messageId = $request->query['message_id'];

        try {
            $this->nonceManager->useNonce($messageId);
        } catch (MWP_Security_Exception_NonceFormatInvalid $e) {
            $this->context->wpDie(__("The automatic login token is invalid. Please try again, or, if this keeps happening, contact support.", 'worker'), '', 200);
        } catch (MWP_Security_Exception_NonceExpired $e) {
            $this->context->wpDie(__("The automatic login token has expired. Please try again, or, if this keeps happening, contact support.", 'worker'), '', 200);
        } catch (MWP_Security_Exception_NonceAlreadyUsed $e) {
            $this->context->wpDie(__("The automatic login token was already used. Please try again, or, if this keeps happening, contact support.", 'worker'), '', 200);
        }

        if ($secureKey = $this->configuration->getSecureKey()) {
            // Legacy support, to be removed.
            $verify = (md5($where.$messageId.$secureKey) === $signature);
        } else {
            $verify = $this->signer->verify($where.$messageId, $signature, $this->configuration->getPublicKey());
        }

        if (!$verify) {
            $this->context->wpDie(__("The automatic login token is invalid. Please check if this website is properly connected with your dashboard, or, if this keeps happening, contact support.", 'worker'), '', 200);
        }

        $user = $this->context->getUserByUsername($username);

        if ($user === null) {
            $this->context->wpDie(sprintf(__("User <strong>%s</strong> could not be found.", 'worker'), htmlspecialchars($username)), '', 200);
        }

        $this->context->setCurrentUser($user);
        $this->attachSessionTokenListener();
        $this->context->setAuthCookie($user);

        $adminUri    = rtrim($this->context->getAdminUrl(''), '/').'/'.$where;
        $redirectUri = $this->modifyUriParameters($adminUri, $request->query, array('signature', 'username', 'auto_login', 'message_id', 'mwp_goto', 'mwpredirect', 'auto_login_fixed'));

        $this->context->setCookie($this->getCookieName(), '1');

        $event->setResponse(new MWP_Http_RedirectResponse($redirectUri, 302, array(
            'P3P' => 'CP="CAO PSA OUR"',
        )));
    }

    private function getCookieName()
    {
        return 'wordpress_'.md5($this->context->getSiteUrl()).'_xframe';
    }

    public function setXframeHeader(MWP_Event_PublicRequest $event)
    {
        if (!isset($_COOKIE[$this->getCookieName()])) {
            return;
        }

        $this->context->removeAction('admin_init', 'send_frame_options_header');
        $this->context->removeAction('login_init', 'send_frame_options_header');

        if (!headers_sent()) {
            header('P3P: CP="CAO PSA OUR"');
        }
    }

    private function modifyUriParameters($uri, array $addParameters, array $omitParameters = array())
    {
        $currentUrl = parse_url($uri) + array('port' => '', 'path' => '', 'query' => '');
        parse_str($currentUrl['query'], $query);

        $query = array_merge($query, $addParameters);

        foreach ($omitParameters as $key) {
            if (array_key_exists($key, $query)) {
                unset($query[$key]);
            }
        }

        $currentUrl['query'] = http_build_query($query);

        return sprintf(
            '%s://%s%s%s%s',
            $currentUrl['scheme'],
            $currentUrl['host'],
            $currentUrl['port'] ? ':'.$currentUrl['port'] : '',
            $currentUrl['path'] ? '/'.ltrim($currentUrl['path'], '/') : '/',
            $currentUrl['query'] ? '?'.$currentUrl['query'] : ''
        );
    }

    private function attachSessionTokenListener()
    {
        if (!$this->context->getSessionTokens($this->context->getCurrentUser()->ID)) {
            return;
        }

        $this->context->addAction('set_auth_cookie', array($this, 'storeSessionToken'), 10, 1);
    }

    /**
     * @param string $cookieValue
     *
     * @internal
     */
    public function storeSessionToken($cookieValue)
    {
        $cookieElements = explode('|', $cookieValue);

        if (empty($cookieElements[2])) {
            return;
        }

        $token = $cookieElements[2];

        $this->sessionStore->add($this->context->getCurrentUser()->ID, $token);
    }
}
