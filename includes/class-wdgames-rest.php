<?php
/**
 * REST endpoint that plays a game.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Decides on the server whether a visitor wins, so the result cannot be forged in the browser.
 */
class WDGames_Rest {

	/**
	 * Hooks the route registration.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'rest_api_init', array( __CLASS__, 'register_routes' ) );
	}

	/**
	 * Registers the play route.
	 *
	 * @return void
	 */
	public static function register_routes() {
		register_rest_route(
			'wdgames/v1',
			'/play',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( __CLASS__, 'play' ),
				'permission_callback' => '__return_true',
				'args'                => array(
					'game' => array(
						'type'              => 'string',
						'required'          => true,
						'sanitize_callback' => 'sanitize_key',
					),
				),
			)
		);
	}

	/**
	 * Returns a hash that identifies the visitor without storing the raw IP address.
	 *
	 * @return string
	 */
	private static function visitor_key() {
		$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		return 'wdgames_cd_' . wp_hash( $ip );
	}

	/**
	 * Plays one game for the current visitor.
	 *
	 * @param WP_REST_Request $request The request.
	 * @return WP_REST_Response|WP_Error
	 */
	public static function play( $request ) {
		$opts = WDGames_Settings::get();
		$game = $request->get_param( 'game' );

		if ( ! in_array( $game, $opts['enabled_games'], true ) ) {
			return new WP_Error( 'wdgames_disabled', __( 'This game is not available.', 'woo-discount-games' ), array( 'status' => 400 ) );
		}

		$key = self::visitor_key();
		if ( get_transient( $key ) ) {
			return new WP_Error( 'wdgames_cooldown', __( 'You have already played. Please try again later.', 'woo-discount-games' ), array( 'status' => 429 ) );
		}
		set_transient( $key, 1, max( 1, $opts['cooldown_hours'] ) * HOUR_IN_SECONDS );

		$coupon = '';
		if ( wp_rand( 1, 100 ) <= $opts['win_chance'] ) {
			$coupon = WDGames_Coupon::create();
		}

		return rest_ensure_response(
			array(
				'won'     => '' !== $coupon,
				'coupon'  => $coupon,
				'message' => '' !== $coupon ? __( 'You won a coupon! Your code:', 'woo-discount-games' ) : __( 'Not this time. Thanks for playing!', 'woo-discount-games' ),
			)
		);
	}
}

