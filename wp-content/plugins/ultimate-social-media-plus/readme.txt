=== Social Media ===
Contributors: socialdude
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=seb.richter%40gmx%2enet&lc=LI
Tags: social media, facebook, instagram, youtube, twitter, share, social share, buttons, counter, pop-up, subscription, icons
Requires at least: 3.0
Tested up to: 4.4.2
Stable tag: 2.3.4
License: GPLv2 
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Super-easy to use and 100% FREE social media plugin which adds social media icons to your website with tons of customization features! 

== Description ==

***The plugin is now ready for translation. If you speak a different language than English, please help us translate it! It's easy. Please email us at support at ultimatelysocial dot com and let us know to which language you want to translate it to. Thank you!***

This plugin is based on https://wordpress.org/plugins/ultimate-social-media-icons/, giving it even more functions and making it even easier to use at the same time.  

It's still 100% FREE and allows you to display social media icons on your website and tailor them to your needs. 

You can add icons for RSS, Email, Facebook, Twitter, LinkedIn, Google+, Pinterest, Instagram, Youtube, "Share" (covering 200+ other social media platforms) and upload custom icons of your choice. 

Additional features in this plugin: 

- You can place icons also before posts 
- You can place the icons next to your posts also on your homepage
- You can also choose to display the icons you picked before/after posts (not just a standard set)
- Placing the icons is easier than before (new third question) 
- Several bugs fixed

As with its predecessor, you can: 

- Pick from 16 different designs for your icons
- Give several actions to one icon (e.g. your facebook icon can lead visitors to your Facebook page, and also give visitors the opportunity to like your page)
- Decide to give your icons an animation (e.g. automatic shuffling, mouse-over effects) to make your visitors aware of them, increasing the chance that they follow/share your blog
- Allow visitors to subscribe to your blog by Email 
- Add "counts" to your icons
- Decide to display a pop-up (on all or only on selected pages) asking people to follow/share you
- Select from many other customization features

The plugin is very easy to use as it takes you through the process step by step. Check out the screenshots. 


== Installation ==
Extract the zip file and drop the contents into the wp-content/plugins/ directory of your WordPress installation. Then activate the plugin from the plugins page.

Then go to plugin settings page and answer the first 3 questions. That's it. 

Note: This plugin requires CURL to be activated/installed on your server (which should be the standard case). If you don't have it, please contact your hosting provider.

== Frequently Asked Questions ==

= Please also check the more comprehensive FAQ on http://ultimatelysocial.com/faq =

.

= I face fundamental issues (the plugin doesn't load etc.) =

Please ensure that: 

- You're using the latest version of the plugin(s)
- Your site is running on PHP 5.4 or above 
- You have CURL activated (should be activated by default)

If you're not familiar with those please contact your hosting company or server admin.

Please check if you have browser extensions activated which may conflict with the plugin. Known culprits include:

- Open SEO Stats (Formerly: PageRank Status) in Chrome
- Adblock Plus in Chrome
- Vine in Chrome

Either de-activate those extensions or try it in a different browser.

If the plugin setting's area looks 'funny' after an upgrade then please clear your cache with String+F5 (PC) or Command+R (Mac).

Please also try if the other plugin works: https://wordpress.org/plugins/ultimate-social-media-icons/

= I get error messages 'Error : 7', 'Error : 56', 'Error : 6' etc. =

Those point to a CURL-issue on your site. Please contact your server admin or your hosting company to resolve it.

= Icons don't show = 

Please ensure you actually placed them (under question 3).

If only some icons show, but not all, then please clear your cache, and check if you may have conflicting browser extensions (e.g. 'Disconnect'-app in Chrome). Also Ad-Blockers are known culprits, please switch them off temporarily to see if that is the reason.

If the icons still don't show then there's an issue with your template. Please contact the creator of your template for that. 

= Twitter share-counts are not displaying (anymore) =

Unfortunately, Twitter stopped providing that information.

= Changes don't get saved / Deleted plugin but icons still show = 

Most likely you have the WP Cache plugin installed. Please de-activate and then re-activate it.

= Links don't work = 

Please ensure you've entered the 'http://' at the beginning of the url. If the icons are not clickable at all there is most likely an issue with your template. 

= I cannot upload custom icons = 

Most likely that's because you've set 'allow_url_fopen' to 'off'. Please turn it to 'on' (or ask your server admin to do so, he'll know what to do).

= My Youtube icon (direct follow) doesn't work = 

Please ensure that you've selected the radio button 'Username' when you enter a youtube username, or 'Channel ID' when you entered a channel ID.

= Aligning the icons (centered, left- or right-aligned) doesn't work = 

The alignment options under question 5 align the icons with respect to each other, not where they appear on the page. Everything else is template work. 

= Clicking on the RSS icon returns funny codes = 

That's normal. RSS users will know what to do with it (i.e. copy & paste the url into their RSS readers).

= Facebook 'like'-count isn't correct = 

When you 'like' something on your blog via facebook it likes the site you're currently on (e.g. your blog) and not your Facebook page.

Therefore it also doesn't show the number of your facebook followers however that's something we're thinking about offering as well.

= Sharing doesn't take the right text or picture = 

We use the codes from Facebook, Google+ etc. and therefore don't have any influence over which text & pic gets shared.

Note that you can define an image as 'Featured Image' which tells Facebook / Google etc. to take that one. You'll find this 'Featured Image' section in your blog's admin area where you can edit your blog post.

You can crosscheck which image Facebook will take by entering your url on https://developers.facebook.com/tools/debug/og/object/.

= The pop-up shows although I only gave my icon one function = 

The pop-up only disappears if you've given your icons only a 'visit us'-function, otherwise (e.g. if you gave it 'Like' (on facebook) or 'Tweet' functions) a pop-up is still needed because the buttons for those are coming directly from the social media sites (e.g. Facebook, Twitter) and we don't have any influence over their design.

= I selected to display icons after every post but they don't show = 

Please ensure you selected to display them also on your blog homepage (under question 3).

= Plugin decreases my site's loading speed = 

The USM and USM+ plugins are one of the most optimized social media plugins in terms of impact on a site's loading speed (optimized code, compressed pictures etc.).

If you still experience loading speed issues, please note that:

- The more sharing- and invite- features you place on your site, the more external codes you load (i.e. from the social media sites; we just use their code), therefore impacting loading speed. So to prevent this, give your icons only 'Visit us'-functionality rather than sharing-functionalities.

- We've programmed it so that the code for the social media icons is the one which loads lasts on your site, i.e. after all the other content has already been loaded. This means: even if there is a decrease in loading speed, it does not impact a user's experience because he sees your site as quickly as before, only the social media icons take a bit longer to load.

There might be also other issues on your site which cause a high loading speed (e.g. conflicts with our plugins or template issues). Please ask your template creator about that.

= After moving from demo-server to live-server the follow/subscribe-link doesn't work anymore = 

Please delete and install the plugin again.

If you already placed the code for a subscription form on your site, remove it again and take the new one from the new plugin installation.

= When I try to like/share via Facebook, I get error message 'App Not Setup: This app is still...' = 

If you get the error message...

'App Not Setup: This app is still in development mode, and you don't have access to it. Switch to a registered test user or ask an app admin for permissions.'

...then most likely you're currently logged in with a business account on Facebook. Please logout, or switch to your personal account.

= There are other issues when I activate the plugin or place the icons = 

Please check the following:

Please try the other plugin, i.e. if you use our USM plugin, please also try it with the USM+ plugin and vice versa.

The plugins require that CURL is installed & activated on your server (which should be the standard case). If you don't have it, please contact your hosting provider.

Please ensure that you don't have any browser extension activated which may conflict with the plugin, esp. those which block certain content. Known culprits include the 'Disconnect' extension in Chrome or the 'Privacy Badger' extension in Firefox.

If issues persist most likely your theme has issues which makes it incompatible with our plugin. Please contact your template creator for that. 

= How can I see how many people shared or liked my post? = 

You can see this by activating the 'counts' on the front end (under question 4 in the USM plugin, question 5 in the USM+ plugin).

We cannot provide you this data in other ways as it's coming directly from the social media sites. One exception: if you like to know when people start to follow you by email, then you can get email alerts. For that, please claim your feed (see question above).

= How can I change the 'Please follow & like us :)'? = 

You can change it in the Widget-area where you dropped the widget on the sidebar. Please click on it (on the sidebar), it will open the menu where you can change the text.

If you don't want to show any text, just enter a space (' ').

= How can I remove the credit-link ('Powered by Ultimatelysocial')? = 

Please note that we didn't place the credit link without your consent (you agreed to it when de-selecting the email-icon).

Open the first question in the plugin ('1. Which icons do you want to show on your site?'), on the level of the email-icon you see a link on the right hand side. Please click it to remove the credit link.

= Can I use a shortcode to place the button ? = 

Yes, it's [DISPLAY_ULTIMATE_PLUS]. You can place it into any editor.

Alternatively, you can place the following into your codes: <?php echo do_shortcode('[DISPLAY_ULTIMATE_PLUS]'); ?> 

= Can I also give the email-icon a 'mailto:' functionality? = 

Yes, you can! For that please upload an email icon as custom icon, and then enter the mailto:-link (and email) under question 2.

To get the email-icon in the same design style you picked, activate it, then on the front-end, rightclick on the icon, and save it as picture. Upload that picture as custom icon.

= Can I also display the socialmedia icons vertically? = 

Yes. For that please go to question 5 and select to display only 1 icon per row.

= How can I change the text on the 'visit us'-buttons? = 

You have several options for this under question 6. 

= Can I deactivate the icons on mobile? = 

Yes, there's an option for that under question 6.

= How can I use two instances of the plugin on my site? = 

You cannot use the same plugin twice, however you can install both the USM as well as the USM+ plugin (https://wordpress.org/plugins/ultimate-social-media-icons/). We've developed the code so that there are no conflicts and they can be used in parallel.

= Can I show a count or counter for my icons (e.g. how many people clicked on them) = 

Yes, we offer this for the most popular icons. See question 5. 

= I want to show the socialmedia buttons according to my preferred design style. Can I do this with this plugin? = 

Yes, you have 16 possible design styles to pick from. Those are: 
- Default icons
- Flat icons
- Thin icons
- Cute icons
- Cube or Cubes icons
- Chrome blue or grey icons
- Splash icons
- Orange icons
- Crystal icons
- Glossy icons
- Black icons
- Silver icons
- Shaded dark or light icons
- Transparent icons

You can also add custom bookmarks to your site. Pleae ensure that the size of the bookmark icon is not too large. 

= I want to have my icons float on the page. Can I do this? =

Under question 3 you can choose how your buttons should display. There you can also decide to show them floating. Floating icons can look very cool! 

Other options to place the icons are: 

- Via shortcode
- Via widget / sidebar
- Before or after posts

= Which social media buttons do you support? = 

You can upload any custom symbol or icon. Out of the box we offer the following: 

- RSS
- Email
- Facebook / FB / Like / Share
- Google+ / Google Plus / Google + / Upvote / Share
- Instagram / Follow
- Twitter / Tweet / Share / Follow
- Pinterest / Follow / Pin-it
- LinkedIn
- Youtube
- Houzz
- Share (which includes many more social media sites)

= How does it work with the email subscription? = 

The email subscription is an optional feature which allows your visitors to subscribe or follow you by email. Just select the email icon, and you subscribers will receive your new posts automatically by email (or other channels). It can be seen as an automatic newsletter which you can offer without any hassle. 

You can also place a subscription form under question 8. 

The messages are taken from your RSS feed. Make sure that your RSS feed is valid (however that should be the standard case if you're using Wordpress). It is a free rss2email tool, allowing subscribers to apply various filter opportunities. You can set up as many feeds as you want. 

= Can I show a pop-up which asks users to share or subscribe? =

Yes, that is possible under question 7. 

= Why do you call your plugin "Ultimate"? How is it better or more ultimate than the other plugins like Shareaholic, Addthis, Social media feather, Social media widget, Socialize, Mashare and so on? = 

1.) The USM plugin has way more functions than the others  
2.) It is much easier to use (especially bloggers who are just starting out need an easy interface)
3.) It offers more design icon or symbols styles 
4.) It is 100% ethical 
5.) It is 100% free, also advanced features

= How does the sharing work exactly? = 

We apply the code from the social media sites so that your visitors can share your post or website. Therefore, we don't have any control over what gets shared, it is not our code. If you think that not the right picture gets shared, or the wrong text, then please contact the social media provider. 

--

FOR NON-ENGLISH PLUGIN USERS

We are currently working on the translation of the plugin. However, you can already decide to show some of the icons in your language. 

Please note that we're currently looking for volunteers to help us to translate the plugin into various languages. If you are interested, please email us at support at ultimatelysocial dot com and let us know into which language you could translate the plugin. Thank you!

= Informacion para las personas que hablan espagnol = 

Este plugin es el mejor plugin en el mercado para colocar los iconos de redes sociales ( medios de comunicacion social ) en su pagina web.

Los botones permiten a los usuarios a compartir su sitio, o visitar su perfil en los medios sociales. Puede elegir entre muchos estilos de diseno de iconos y beneficiarse de muchas opciones de personalizacion.

Tambien le permite ofrecer una suscripcion a sus visitantes, para que puedan recibir sus mensajes por correo electronico de forma automatica.

El plugin es totalmente gratuito y muy facil de usar.

= Informacoes para pessoas que falam portugues = 

Este plugin e o melhor plug-in no mercado para colocar icones de midia social em seu site.

Os botoes permitem que seus visitantes para compartilhar seu site, ou visite o seu perfil de midia social. Voce pode escolher de muitos estilos icone de design e beneficiar de muitas opcoes de personalizacao.

Ele tambem permite-lhe oferecer uma assinatura para seus visitantes, de modo que eles recebem suas mensagens por e-mail automaticamente.

O plugin e totalmente gratuito e muito facil de usar.


= Informationen fuer Menschen die deutsch sprechen = 

Dieses Plugin ist das beste Plugin auf dem Markt auf Ihrer Webseite Social-Media-Symbole zu platzieren.

Die Icons lassen Sie Ihre Besucher Ihrer Website zu teilen, oder Ihre Social-Media Profil zu besuchen. Sie koennen aus vielen Design Optionen und Stilen waehlen und von vielen Individualisierungsmoeglichkeiten profitieren.

Es erlaubt Ihnen auch ein Abonnement fuer Ihre Besucher zu bieten, so dass sie automatisch Ihre Beitraege per E-Mail erhalten.

Das Plugin ist voellig kostenlos und sehr einfach zu bedienen.


= Informasi untuk orang berbicara bahasa Indonesia = 

Plugin ini adalah plugin terbaik di pasar untuk menempatkan ikon media sosial di website Anda.

Tombol memungkinkan pengunjung Anda untuk berbagi situs Anda, atau kunjungi profil media sosial Anda. Anda dapat memilih dari berbagai gaya ikon desain dan manfaat dari banyak pilihan kustomisasi.

Hal ini juga memungkinkan Anda untuk menawarkan langganan untuk pengunjung Anda, sehingga mereka menerima posting Anda melalui email secara otomatis.

Plugin adalah gratis dan sangat mudah digunakan.




== Screenshots ==

1. After installing the plugin, you'll see this overview. You'll be taken through the easy-to-understand steps to configure your plugin 

2. As a first step you select which icons you want to display on your website

3. Then you'll define what the icons should do (they can perform several actions, e.g. lead users to your facebook page, or allow them to share your content on their facebook page)

4. In a third step you decide where the icons should be placed: a.) via Widget, b.) Floating, c.) via Shortcode and/or d.) Before or after posts

5. You can pick from a wide range of icon designs

6. Here you can animate your main icons (automatic shuffling, mouse-over effects etc.), to make visitors of your site aware that they can share, follow & like your site

7. You can choose to display counts next to your icons (e.g. number of Twitter-followers) 

8. There are many more options to choose from 

9. You can also display a pop-up (designed to your liking) which asks users to like & share your site


== Changelog ==

= 2.3.4 =
* Plugin updated for translations
* E-NOTICE error fixed

= 2.3.3 =
* Removed the js files from plugin and using the ones provided by WP now
* POST calls optimized (sanitize, escape, validate)
* Removed feedback option
* Tags changed

= 2.3.2 =
* Feedback mechanism disabled
* Tags reduced

= 2.3.1 =
* Added Facebook share button after/before posts
* G+ design issues on black background fixed

= 2.2.9 =
* Crashes/content disappearing fixed

= 2.2.7 =
* Overkill declaration in the CSS fixed 
* Custom icons can now have mailto:-functionality
* jQuery UI issues fixed
* Rectangle G+ icon now shown as last one as it takes more space (looks better)

= 2.2.6 =
* jQuery issues/conflicts fixed
* Script issues fixed
* Count issues for icons on homepage fixed
* Text added on plugin setting's page for easier understanding
* Issue that dashboard sometimes doesn't load fixed
* Instagram thin-icon issue fixed (misspelled, therefore didn't show)
* Custom icon uploads optimized 

= 2.2.5 =
* Facebook changed their API - please upgrade if you want Facebook sharing on mobile to work properly on your site! 

= 2.2.4 =
* Custom icon uploads optimized 

= 2.2.3 =
* Houzz error message fixed 

= 2.2.2 =
* Plugin made ready for translations

= 2.2.1 =
* Feed claiming optimized

= 2.2 =
* Shortpixel link updated

= 2.1 =
* Feed claiming bug fixed

= 2.0 =
* Houzz-button integrated
* New G+ button updated
* Quicker claiming of feed possible
* Comments to share-button added
* Credit to shortpixel added

= 1.9 =
* New feature: Users can now decide where exactly the floating icons will display
* Internal links corrected
* Fixed: Targets only labels within the social icons div.
* Subscriber counts fixed
* Apostrophe issues fixed
* Conflicts with Yoast SEO plugin resolved
* PHP errors fixed

= 1.8 =
* Plugin also allows a subscription form now (question 8)!

= 1.7 =
* Count issues fixed - please upgrade!
* Style constructor updated to PHP 5
* Text adjustments in admin area

= 1.6 =
* More explanations added how to fix if counts don't work
* Icon files are compressed now for faster loading - thank you ShortPixel.com!
* A typo in the code threw an error message in certain cases, this is fixed now

= 1.5 =
* jQuery issues fixed
* Vulnerability issues fixed
* Twitter-button didn't get displayed in full sometimes, this is fixed now
* CSS issues (occurred on some templates) fixed
* Facebook updated API (so counts didn't get displayed correctly anymore), we updated the plugin accordingly
* Sometimes error messages appeared on the front end, this is fixed now

= 1.4 =
* New follow-icons added
* More "rectangle" icons added before/after posts
* Widget was rendered incorrectly on some templates, fixed now
* Icons didn't always line up (on some themes), fixed now
* Youtube API got changed, which made the counts not displayed correctly, this is now adjusted in the plugin
* Slight layout adjustments in plugin's admin area


= 1.3 =
* Links with "@" in the url (e.g. as in Flickr-links) now get recognized as well
* Alignment issues of icons in tooltip fixed
* Layout optimizations in plugin area
* Users can now select to have the number of likes of their facebook page displayed as counts of the facebook icon on their blogs
* Typos in admin area corrected
* Users can now disable auto-scaling feature for mobile devices ("viewport" meta tag)

= 1.2 =
* Vulnerabilities (AJAX) fixed 
* OG-issues (caused in conjunction with other plugins) fixed

= 1.1 =
* Og-issues fixed
* Conflicts with Yoast SEO plugin sorted
* Alignments under posts didn't work sometimes before, fixed now
* When user selected icons to shuffle pop-up didn't show up, fixed now
* Short code corrected
* On some templates the checkboxes in the admin area couldn't get selected, fixed now
* Links now to the correct review screen
* Share-box only displayed partly sometimes, fixed now
* When sharing from a Facebook business page it returned errors, this should be fixed now (to be observed) 
* Sometimes facebook share count didn't increase despite liking it, this should be fixed now (to be observed) 
* Template CSS conflicts solved in the plugin
* Facebook sharing text issues fixed

= 1.0 =
* First release

== Upgrade Notice ==

= 2.3.4 =
* Upgrade if you faced issues 