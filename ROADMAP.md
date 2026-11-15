# Roadmap

Goal: WooCommerce plugin that gamifies coupon distribution. Mini games (spin the wheel, pick a box, scratch card) shown to site visitors through a shortcode and a block let them win single-use WooCommerce coupon codes restricted to selected products; the winner is decided on the server. Requirements: follow the latest WordPress coding standards (WPCS: tabs, escaping, sanitization, nonces, capability checks, prefixes wdgames_ and WDGames_, text domain woo-discount-games); ready for WordPress.org plugin review (GPL, no external resources, no tracking, readme.txt, direct file access guard, HPOS compatible, uninstall cleanup, translatable strings).

Each item is one small task that changes a single file. The roadmap bot ticks items off automatically.

## Core coupon engine
- [x] Create includes/class-wdgames-settings.php with the WooCommerce settings page for games, coupon type, amount, expiry, win chance, cooldown and product IDs _(done by roadmap bot, 2026-11-14, built-in)_
- [x] Create includes/class-wdgames-coupon.php that creates single-use WooCommerce coupons for winners _(done by roadmap bot, 2026-11-14, built-in)_
- [ ] Create includes/class-wdgames-rest.php with the server-side play endpoint and a per-visitor cooldown

## Front end
- [ ] Create includes/class-wdgames-shortcode.php with the wdgames_game shortcode that loads its assets only when used
- [ ] Create assets/js/game.js that plays a game through the REST endpoint and shows the result accessibly
- [ ] Create assets/css/game.css with game styles, a visible focus outline and a reduced-motion rule

## Bootstrap
- [ ] Create includes/class-wdgames-plugin.php that loads the modules once WooCommerce is active
- [ ] Create woo-discount-games.php with the WordPress plugin header, constants and the HPOS compatibility declaration
- [ ] Create uninstall.php that deletes the plugin settings

## WordPress.org readiness and coding standards
- [ ] Create readme.txt in the WordPress.org plugin readme format with description, installation, FAQ and changelog
- [ ] Create phpcs.xml.dist that uses the WordPress-Extra, WordPress-Docs and PHPCompatibilityWP rulesets with text domain woo-discount-games and prefix wdgames
- [ ] Create composer.json with dev dependencies wp-coding-standards/wpcs and phpcompatibility/phpcompatibility-wp and lint and fix scripts
- [ ] Create languages/README.md explaining how to translate the plugin
- [ ] Update README.md with the plugin description, requirements, installation, shortcode usage and development instructions
