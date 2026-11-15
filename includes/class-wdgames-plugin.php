<?php
/**
 * Plugin bootstrap.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Loads the plugin modules once WooCommerce is available.
 */
class WDGames_Plugin {

	/**
	 * Module file slugs. Each maps to includes/class-wdgames-{slug}.php and the class WDGames_{Slug}.
	 */
	const MODULES = array( 'settings', 'coupon', 'rest', 'shortcode', 'privacy', 'links', 'block' );

	/**
	 * Boots the plugin.
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', array( __CLASS__, 'missing_woocommerce_notice' ) );
			return;
		}

		foreach ( self::MODULES as $module ) {
			require_once WDGAMES_PATH . 'includes/class-wdgames-' . $module . '.php';
			$class = 'WDGames_' . ucfirst( $module );
			if ( method_exists( $class, 'init' ) ) {
				$class::init();
			}
		}
	}

	/**
	 * Tells administrators that WooCommerce is required.
	 *
	 * @return void
	 */
	public static function missing_woocommerce_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		echo '<div class="notice notice-error"><p>' . esc_html__( 'Discount Games for WooCommerce requires WooCommerce to be installed and active.', 'woo-discount-games' ) . '</p></div>';
	}
}

