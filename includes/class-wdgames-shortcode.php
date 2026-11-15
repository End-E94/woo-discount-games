<?php
/**
 * The [wdgames_game] shortcode.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Renders a mini game and loads its assets only when it is used.
 */
class WDGames_Shortcode {

	/**
	 * Registers the shortcode and the assets.
	 *
	 * @return void
	 */
	public static function init() {
		add_shortcode( 'wdgames_game', array( __CLASS__, 'render' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'register_assets' ) );
	}

	/**
	 * Registers the front-end style and script without loading them.
	 *
	 * @return void
	 */
	public static function register_assets() {
		wp_register_style( 'wdgames-game', WDGAMES_URL . 'assets/css/game.css', array(), WDGAMES_VERSION );
		wp_register_script(
			'wdgames-game',
			WDGAMES_URL . 'assets/js/game.js',
			array(),
			WDGAMES_VERSION,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
		wp_localize_script(
			'wdgames-game',
			'wdgamesData',
			array(
				'endpoint' => esc_url_raw( rest_url( 'wdgames/v1/play' ) ),
				'error'    => __( 'Something went wrong. Please try again.', 'woo-discount-games' ),
			)
		);
	}

	/**
	 * Renders the game markup.
	 *
	 * @param array|string $atts Shortcode attributes.
	 * @return string
	 */
	public static function render( $atts ) {
		$atts   = shortcode_atts( array( 'game' => 'wheel' ), $atts, 'wdgames_game' );
		$game   = sanitize_key( $atts['game'] );
		$opts   = WDGames_Settings::get();
		$labels = WDGames_Settings::games();

		if ( ! isset( $labels[ $game ] ) || ! in_array( $game, $opts['enabled_games'], true ) ) {
			return '';
		}

		wp_enqueue_style( 'wdgames-game' );
		wp_enqueue_script( 'wdgames-game' );

		return sprintf(
			'<div class="wdgames-game wdgames-game--%1$s" data-game="%1$s"><h3 class="wdgames-title">%2$s</h3><div class="wdgames-stage" aria-hidden="true"></div><button type="button" class="wdgames-play wp-element-button">%3$s</button><p class="wdgames-result" role="status" aria-live="polite"></p></div>',
			esc_attr( $game ),
			esc_html( $labels[ $game ] ),
			esc_html__( 'Play', 'woo-discount-games' )
		);
	}
}

