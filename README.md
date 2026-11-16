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
