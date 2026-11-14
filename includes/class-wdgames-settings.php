<?php
/**
 * Settings page and option helpers.
 *
 * @package WooDiscountGames
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the settings page under the WooCommerce menu.
 */
class WDGames_Settings {

	const OPTION = 'wdgames_settings';

	/**
	 * Hooks the settings page.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Lists the available mini games.
	 *
	 * @return array Game slug => label.
	 */
	public static function games() {
		return array(
			'wheel'   => __( 'Spin the wheel', 'woo-discount-games' ),
			'box'     => __( 'Pick a box', 'woo-discount-games' ),
			'scratch' => __( 'Scratch card', 'woo-discount-games' ),
		);
	}

	/**
	 * Default option values.
	 *
	 * @return array
	 */
	public static function defaults() {
		return array(
			'enabled_games'  => array( 'wheel', 'box', 'scratch' ),
			'discount_type'  => 'percent',
			'amount'         => 10,
			'expiry_days'    => 7,
			'win_chance'     => 30,
			'cooldown_hours' => 24,
			'product_ids'    => array(),
		);
	}

	/**
	 * Returns the saved settings merged with the defaults.
	 *
	 * @return array
	 */
	public static function get() {
		$saved = get_option( self::OPTION, array() );
		return wp_parse_args( is_array( $saved ) ? $saved : array(), self::defaults() );
	}

	/**
	 * Adds the settings page to the WooCommerce menu.
	 *
	 * @return void
	 */
	public static function add_menu() {
		add_submenu_page(
			'woocommerce',
			__( 'Discount Games', 'woo-discount-games' ),
			__( 'Discount Games', 'woo-discount-games' ),
			'manage_woocommerce',
			'wdgames-settings',
			array( __CLASS__, 'render_page' )
		);
	}

	/**
	 * Registers the option with the Settings API.
	 *
	 * @return void
	 */
	public static function register() {
		register_setting(
			'wdgames_group',
			self::OPTION,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize' ),
				'default'           => self::defaults(),
			)
		);
	}

	/**
	 * Sanitizes the submitted settings.
	 *
	 * @param mixed $input Raw submitted value.
	 * @return array Clean settings.
	 */
	public static function sanitize( $input ) {
		$input    = is_array( $input ) ? $input : array();
		$defaults = self::defaults();
		$games    = isset( $input['enabled_games'] ) ? array_map( 'sanitize_key', (array) $input['enabled_games'] ) : array();
		$type     = isset( $input['discount_type'] ) ? sanitize_key( $input['discount_type'] ) : $defaults['discount_type'];
		$ids      = isset( $input['product_ids'] ) ? explode( ',', sanitize_text_field( $input['product_ids'] ) ) : array();

		return array(
			'enabled_games'  => array_values( array_intersect( array_keys( self::games() ), $games ) ),
			'discount_type'  => in_array( $type, array( 'percent', 'fixed_cart', 'fixed_product' ), true ) ? $type : $defaults['discount_type'],
			'amount'         => isset( $input['amount'] ) ? max( 0, (float) $input['amount'] ) : $defaults['amount'],
			'expiry_days'    => isset( $input['expiry_days'] ) ? absint( $input['expiry_days'] ) : $defaults['expiry_days'],
			'win_chance'     => isset( $input['win_chance'] ) ? min( 100, absint( $input['win_chance'] ) ) : $defaults['win_chance'],
			'cooldown_hours' => isset( $input['cooldown_hours'] ) ? absint( $input['cooldown_hours'] ) : $defaults['cooldown_hours'],
			'product_ids'    => array_values( array_filter( array_map( 'absint', $ids ) ) ),
		);
	}

	/**
	 * Prints one text input row.
	 *
	 * @param string $label Field label.
	 * @param string $key   Option key.
	 * @param string $value Current value.
	 * @return void
	 */
	private static function row( $label, $key, $value ) {
		?>
		<tr>
			<th scope="row"><label for="wdgames-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label></th>
			<td><input type="text" class="regular-text" id="wdgames-<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( self::OPTION . '[' . $key . ']' ); ?>" value="<?php echo esc_attr( $value ); ?>" /></td>
		</tr>
		<?php
	}

	/**
	 * Renders the settings page.
	 *
	 * @return void
	 */
	public static function render_page() {
		if ( ! current_user_can( 'manage_woocommerce' ) ) {
			return;
		}
		$opts = self::get();
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php settings_fields( 'wdgames_group' ); ?>
				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><?php esc_html_e( 'Enabled games', 'woo-discount-games' ); ?></th>
						<td>
							<?php foreach ( self::games() as $slug => $label ) : ?>
								<label>
									<input type="checkbox" name="<?php echo esc_attr( self::OPTION ); ?>[enabled_games][]" value="<?php echo esc_attr( $slug ); ?>" <?php checked( in_array( $slug, $opts['enabled_games'], true ) ); ?> />
									<?php echo esc_html( $label ); ?>
								</label><br />
							<?php endforeach; ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="wdgames-discount_type"><?php esc_html_e( 'Discount type', 'woo-discount-games' ); ?></label></th>
						<td>
							<select id="wdgames-discount_type" name="<?php echo esc_attr( self::OPTION ); ?>[discount_type]">
								<option value="percent" <?php selected( $opts['discount_type'], 'percent' ); ?>><?php esc_html_e( 'Percentage discount', 'woo-discount-games' ); ?></option>
								<option value="fixed_cart" <?php selected( $opts['discount_type'], 'fixed_cart' ); ?>><?php esc_html_e( 'Fixed cart discount', 'woo-discount-games' ); ?></option>
								<option value="fixed_product" <?php selected( $opts['discount_type'], 'fixed_product' ); ?>><?php esc_html_e( 'Fixed product discount', 'woo-discount-games' ); ?></option>
							</select>
						</td>
					</tr>
					<?php
					self::row( __( 'Coupon amount', 'woo-discount-games' ), 'amount', $opts['amount'] );
					self::row( __( 'Coupon expires after (days, 0 = never)', 'woo-discount-games' ), 'expiry_days', $opts['expiry_days'] );
					self::row( __( 'Chance to win (%)', 'woo-discount-games' ), 'win_chance', $opts['win_chance'] );
					self::row( __( 'Hours before a visitor can play again', 'woo-discount-games' ), 'cooldown_hours', $opts['cooldown_hours'] );
					self::row( __( 'Product IDs the coupon applies to (comma separated)', 'woo-discount-games' ), 'product_ids', implode( ',', $opts['product_ids'] ) );
					?>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

