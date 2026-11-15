<?php
/**
 * Plugin action links.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Adds a Settings link to the plugins list.
 */
class WDGames_Links {

	/**
	 * Hooks the filter.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'plugin_action_links_' . plugin_basename( WDGAMES_FILE ), array( __CLASS__, 'add_settings_link' ) );
	}

	/**
	 * Prepends a Settings link.
	 *
	 * @param array $links Existing action links.
	 * @return array
	 */
	public static function add_settings_link( $links ) {
		$url = admin_url( 'admin.php?page=wdgames-settings' );
		array_unshift( $links, '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'woo-discount-games' ) . '</a>' );
		return $links;
	}
}

