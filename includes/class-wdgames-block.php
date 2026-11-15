<?php
/**
 * Block registration.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the Discount Game block from its block.json file.
 */
class WDGames_Block {

	/**
	 * Hooks the block registration.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Registers the editor script and the block type.
	 *
	 * @return void
	 */
	public static function register() {
		wp_register_script(
			'wdgames-block-editor',
			WDGAMES_URL . 'blocks/game/index.js',
			array( 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-server-side-render' ),
			WDGAMES_VERSION,
			true
		);

		register_block_type(
			WDGAMES_PATH . 'blocks/game',
			array( 'editor_script_handles' => array( 'wdgames-block-editor' ) )
		);
	}
}

