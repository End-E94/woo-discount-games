<?php
/**
 * Plugin Name:          Discount Games for WooCommerce
 * Plugin URI:           https://github.com/End-E94/woo-discount-games
 * Description:          Gamifies coupon distribution with mini games that let visitors win WooCommerce coupon codes for selected products.
 * Version:              0.1.0
 * Requires at least:    6.5
 * Requires PHP:         7.4
 * Requires Plugins:     woocommerce
 * Author:               End-E94
 * Author URI:           https://github.com/End-E94
 * License:              GPL v3 or later
 * License URI:          https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:          woo-discount-games
 * Domain Path:          /languages
 * WC requires at least: 8.2
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

define( 'WDGAMES_VERSION', '0.1.0' );
define( 'WDGAMES_FILE', __FILE__ );
define( 'WDGAMES_PATH', plugin_dir_path( __FILE__ ) );
define( 'WDGAMES_URL', plugin_dir_url( __FILE__ ) );

require_once WDGAMES_PATH . 'includes/class-wdgames-plugin.php';

/**
 * Declares compatibility with WooCommerce High-Performance Order Storage.
 *
 * @return void
 */
function wdgames_declare_compatibility() {
	if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', WDGAMES_FILE, true );
	}
}
add_action( 'before_woocommerce_init', 'wdgames_declare_compatibility' );
add_action( 'plugins_loaded', array( 'WDGames_Plugin', 'init' ) );

