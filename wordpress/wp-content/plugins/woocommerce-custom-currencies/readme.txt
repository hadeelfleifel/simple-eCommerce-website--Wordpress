=== WooCommerce Custom Currencies ===
Contributors: GalalAly2
Tags: woocommerce,currencies
Requires at least: 4.0
Tested up to: 4.0
Stable tag: 2.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add your currency to list of supported currencies in WooCommerce

== Description ==

Still a beta version.

A WordPress and WooCommerce plugin/extension that allows users to add their own currencies.

You can also define conversion rates for your custom currency (if it is not supported by PayPal) to use PayPal gateway through another supported currency like USD or GBP.

The officially supported gateway for conversions is the PayPal gateway that comes with WooCommerce by default.

Refunds are not yet supported.

New version supports only Wordpress 4.0 and WooCommerce 2.2

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin's zip file to the `/wp-content/plugins/` directory and extract it
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to WooCommerce -> Settings -> Currency Tab.

== Frequently Asked Questions ==

== Change log ==
= 2.1 =
Support Custom Currencies
Support Custom Symbol and Label

= 2.0.3 =
Should fix the file not found issue.

= 2.0.2 =
Currency symbol fix

= 2.0.1 =
* IPN Validation

= 2.0 =
* Supporting WP4.0 and WC2.2 only in new version

= 1.3 =
* Added order total conversion option to control it from the dashboard.
* Fixed the donations button.

= 1.2 =
* Fixed PayPal bug - will always convert item amounts to 2 decimal places.

= 1.1 =
* Added conversion to Paypal supported currencies for default WooCommerce Paypal gateway

= 1.0.2 =
* Removed paypal bug (an incomplete feature) in v1.0.1

= 1.0.1 =
* Added a notification when overriding a currency
* Fixed a minor js bug.