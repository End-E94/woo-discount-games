<?php
/**
 * Renders the Discount Game block.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

$wdgames_game = isset( $attributes['game'] ) ? sanitize_key( $attributes['game'] ) : 'wheel';
?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
	<?php echo WDGames_Shortcode::render( array( 'game' => $wdgames_game ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped inside render(). ?>
</div>

