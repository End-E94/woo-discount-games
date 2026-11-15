=== Discount Games for WooCommerce ===
Contributors: end-e94
Tags: woocommerce, coupons, discount, gamification, mini games
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 0.1.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Gamify coupon distribution with mini games that let visitors win WooCommerce coupon codes for selected products.

== Description ==

Discount Games for WooCommerce adds mini games to your store. Visitors play a game and can win a single-use WooCommerce coupon code for the products you choose.

* Spin the wheel, pick a box and scratch card games
* The result is decided on the server, so it cannot be forged in the browser
* Single-use coupons with an optional expiry date, restricted to selected products
* Configurable win chance and a cooldown between plays
* Works with the [wdgames_game] shortcode
* No external services, no tracking, no data sent anywhere

== Installation ==

1. Upload the plugin folder to the /wp-content/plugins/ directory, or install it from the Plugins screen.
2. Activate the plugin. WooCommerce must be active.
3. Go to WooCommerce > Discount Games and configure the coupon and the games.
4. Add the [wdgames_game game="wheel"] shortcode to any page. Available games are wheel, box and scratch.

== Frequently Asked Questions ==

= Does the plugin require WooCommerce? =

Yes. Coupons are created with the WooCommerce coupon system.

= Does it send data to external services? =

No. A one-way hash of the visitor IP address is stored temporarily to limit how often a visitor can play. The plain IP address is not stored.

= Is it compatible with High-Performance Order Storage? =

Yes. The plugin declares compatibility with custom order tables.

== Changelog ==

= 0.1.0 =
* Initial release.

== Upgrade Notice ==

= 0.1.0 =
Initial release.

