<?php
/**
 * Removes plugin data on uninstall.
 *
 * @package WooDiscountGames
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

delete_option( 'wdgames_settings' );

