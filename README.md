# woo-discount-games
Gamifies coupon code distribution by adding mini games for site visitors that allow them to win coupon codes for selected products on site

## Description

Discount Games for WooCommerce adds mini games (spin the wheel, pick a box, scratch card) that let visitors win single-use WooCommerce coupon codes for selected products. The winner is decided on the server.

## Requirements

- WordPress 6.5 or newer
- PHP 7.4 or newer
- WooCommerce 8.2 or newer

## Installation

1. Upload the plugin folder to wp-content/plugins and activate it.
2. Go to WooCommerce > Discount Games and configure the coupon and the games.
3. Add the shortcode to any page.

## Usage

Add [wdgames_game game="wheel"] to a page. Available games are wheel, box and scratch.

## Development

Run composer install, then composer lint to check the code against the WordPress coding standards and composer fix to fix what can be fixed automatically.

## Block and shortcode

The Discount Game block is available in the block editor under Widgets and has a game type setting.

The same games can be placed with the shortcode: [wdgames_game game="box"] or [wdgames_game game="scratch"].

## Accessibility Guidelines

This plugin aims to provide an accessible experience for users. To ensure this, follow these guidelines:

- Use ARIA attributes on interactive elements to provide a clear experience for screen readers.
- Ensure sufficient color contrast between the game elements and the background.
- Test the plugin with screen readers and other accessibility tools to identify and fix any issues.

### Additional Accessibility Guidelines for Screen Readers

- Use descriptive text for all images, including those used for game elements.
- Ensure that all interactive elements, such as buttons and links, have a clear and consistent label.
- Provide alternative text for any audio or video elements used in the plugin.
- Use the `aria-label` attribute to provide a clear description of the plugin's functionality for screen readers.

### Compatibility with WordPress Themes

This plugin is designed to work seamlessly with popular WordPress themes. However, if you're experiencing any issues or want to customize the plugin's behavior, you can use the following filters to achieve this:

* `wdgames_discount_games_theme` - This filter allows you to specify a custom theme for the plugin's UI.
* `wdgames_discount_games_theme_class` - This filter enables you to add custom CSS classes to the plugin's theme.

### Accessibility Guidelines for Screen Readers

To ensure compatibility with screen readers, please note the following guidelines:

* Use descriptive text for buttons, links, and other interactive elements.
* Provide alternative text for images and other visual content.
* Use ARIA attributes to define the role and state of interactive elements.
* Ensure that all content is readable by screen readers, including captions, descriptions, and labels.
* Test the plugin with popular screen readers such as JAWS, NVDA, and VoiceOver to ensure compatibility.

* Ensure compatibility with WordPress theme's color scheme by using the `wpThemeColor` filter.
* Use the `wpThemeHeaderImage` filter to ensure the header image is properly sized and positioned.
* Be mindful of theme-specific CSS classes and IDs when using the plugin's shortcodes or widgets.
* Test the plugin with different WordPress themes to ensure compatibility and adjust the plugin's code as needed.

* Ensure compatibility with page builders by using the `wpBuilderElement` filter to target specific elements and attributes.
* Be aware of page builder-specific classes and attributes when using the plugin's shortcodes or widgets.
* Test the plugin with popular page builders such as Elementor, Beaver Builder, and Divi Builder to ensure compatibility and adjust the plugin's code as needed.
