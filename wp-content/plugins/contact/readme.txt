=== Contact Details ===
Contributors: stvwhtly
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GP9YMEPUGV24A
Tags: contact, global, details, options, info, phone, fax, mobile, email, address, form
Requires at least: 3.9
Tested up to: 4.0
Stable tag: 0.8.1

Adds the ability to easily enter and display contact information.

== Description ==

Adds the ability to enter contact information and output the details in your posts, pages or templates.

Use the shortcode `[contact type="phone"]` to display any of the contact details, or use the function call `<?php if ( function_exists( 'contact_detail' ) ) { contact_detail( 'phone' ); } ?>`.

Once you have defined a contact email address, use the shortcode `[contact type="form"]` to output the contact form.

**Languages:** Also available in Español (Spanish) and українська (Ukrainian by Michael Yunat).

== Installation ==

Here we go:

1. Upload the `contact` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Enter you contact details on the options page `Settings > Contact Details`.
4. Display the details using either the shortcodes or function calls.

== Frequently Asked Questions ==

= How do I edit my contact details? =

Navigate to the settings page by clicking on `Settings` on the left hand menu, and then the `Contact Details` option.

= Can I add extra contact details fields? =

Yes, it is possible to modify the contact detail fields using the `contact_details` filter.

`add_filter( 'contact_details', function( $details ) {
	// Add a simple text input...
	$details['twitter'] = __( 'Twitter' );
	// Add a new textarea...
	$details['bank'] = array(
		'label' => __( 'Bank' ),
		'input' => 'textarea'
	);
	// Remove an existing field...
	unset( details['fax'] );
	// You must always return the modified array...
	return $details;
} );`

= What contact details can I store? =

Current available contact fields are: `phone`, `fax`, `mobile`, `email` and `address`.

= How do I include details in my template? =

You can use the following function call to output details in your templates:

<?php if ( function_exists( 'contact_detail' ) ) { contact_detail( 'fax' ); } ?>

= How do you fetch contact details without outputting the value? =

The fourth parameter passed to `contact_detail()` determines whether the value is returned, by setting the value to false.

`$phone = contact_detail( 'phone', '<b>', '</b>', false );`

The above code will fetch the phone number stored and wrap the response in bold tags.

= How can I customise the contact form? =

If you require more customisation that cannot be achieved using CSS, you can define your own template file.

To do this add the the attribute `include` to the shortcode tag, e.g. `[contact type="form" include="myfile.php"]`.

This file should be placed within your theme directory and should include the processing and output of errors.

I suggest you use the `contact.php` file used by the plugin as a starting point / template.

= Can I translate your plugin to another language? =

Yes, of course. If you would like to translate this plugin to another language, please provide me with the releavant Poedit files.

I will be certain to include and attribute any contributions to those who provide any translations.

== Screenshots ==

1. The contact details management page.

== Changelog ==

= 0.8.1 =
* Readme changes to language list.
* Set from email as sender email.
= 0.8 =
* Introduced `contact-send` filter.
* Ability to disable spamcheck via shortcode using `spamcheck="false"`.
= 0.7.7 =
* Added Ukrainian (uk_UA) language translation.
* Allow for additional attributes to be passed through to template files.
= 0.7.6 =
* Re-added email address to settings page, lost during recent update.
* Modified upgrade process to work now that register_activation_hook no longer fires for plugin updates.
= 0.7.5 =
* Corrected new contributor name.
= 0.7.4 =
* Removed old plugin contributor and author details.
= 0.7.3 =
* Resolving the SVN mix-up tagging versions.
= 0.7.2 =
* Integration of i18n abilities, using Spanish (es_ES) as an example.
* Added the ability to modify the fields shown to the details page.
* Updated donate link ;)
= 0.7.1 =
* Bug fix to shortcode function call that displays contact details.
= 0.7 =
* Integrated Akismet to check for SPAM submissions. (Requires Akismet Plugin) 
* Improved input / output escaping and added nonce field to contact form.
= 0.6 =
* Added functionality to include a website url as part of the email form.
* Submitted comments are now checked against the simple blacklist.
* Updated use of user levels (deprecated) to user roles and capabilities.
* Contact email address defaults to site admin email.
= 0.5 =
* Added ability to include custom form template.
= 0.4.3 =
* Added class names to contact form rows to allow easier customisation.
= 0.4.2 =
* Fixed PHP warning on settings page if no options existed.
= 0.4.1 =
* Fixed form input ids and labels.
= 0.4 =
* Added contact form.
= 0.3 =
* Fixed errors when error reporting is set to all.
* Added details screenshot.
= 0.2 =
* The function `contact_details` now outputs by default instead of having to echo the response.
* Function calls now includes before, after and echo options.
= 0.1.1 =
* Updated/Corrected plugin name.
= 0.1 =
* This is the very first version.