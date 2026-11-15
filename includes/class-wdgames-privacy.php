<?php
/**
 * Privacy policy text.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Suggests privacy policy text for site owners.
 */
class WDGames_Privacy {

	/**
	 * Hooks the privacy policy suggestion.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'add_policy_text' ) );
	}

	/**
	 * Adds the suggested text to the privacy policy guide.
	 *
	 * @return void
	 */
	public static function add_policy_text() {
		if ( ! function_exists( 'wp_add_privacy_policy_content' ) ) {
			return;
		}

		$text = __( 'When a visitor plays a mini game, a one-way hash of their IP address is stored temporarily to limit how often they can play. The plain IP address is not stored. No data is sent to external services.', 'woo-discount-games' );

		wp_add_privacy_policy_content(
			__( 'Discount Games for WooCommerce', 'woo-discount-games' ),
			wp_kses_post( wpautop( $text ) )
		);
	}
}

