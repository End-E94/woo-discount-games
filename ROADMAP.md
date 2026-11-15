# Roadmap

Goal: WooCommerce plugin that gamifies coupon distribution. Mini games (spin the wheel, pick a box, scratch card) shown to site visitors through a shortcode and a block let them win single-use WooCommerce coupon codes restricted to selected products; the winner is decided on the server. Requirements: follow the latest WordPress coding standards (WPCS: tabs, escaping, sanitization, nonces, capability checks, prefixes wdgames_ and WDGames_, text domain woo-discount-games); ready for WordPress.org plugin review (GPL, no external resources, no tracking, readme.txt, direct file access guard, HPOS compatible, uninstall cleanup, translatable strings).

Each item is one small task that changes a single file. The roadmap bot ticks items off automatically.

## Core coupon engine
- [x] Create includes/class-wdgames-settings.php with the WooCommerce settings page for games, coupon type, amount, expiry, win chance, cooldown and product IDs _(done by roadmap bot, 2026-11-14, built-in)_
- [x] Create includes/class-wdgames-coupon.php that creates single-use WooCommerce coupons for winners _(done by roadmap bot, 2026-11-14, built-in)_
- [x] Create includes/class-wdgames-rest.php with the server-side play endpoint and a per-visitor cooldown _(done by roadmap bot, 2026-11-14, built-in)_

## Front end
- [x] Create includes/class-wdgames-shortcode.php with the wdgames_game shortcode that loads its assets only when used _(done by roadmap bot, 2026-11-14, built-in)_
- [x] Create assets/js/game.js that plays a game through the REST endpoint and shows the result accessibly _(done by roadmap bot, 2026-11-14, built-in)_
- [x] Create assets/css/game.css with game styles, a visible focus outline and a reduced-motion rule _(done by roadmap bot, 2026-11-14, built-in)_

## Bootstrap
- [x] Create includes/class-wdgames-plugin.php that loads the modules once WooCommerce is active _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create woo-discount-games.php with the WordPress plugin header, constants and the HPOS compatibility declaration _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create uninstall.php that deletes the plugin settings _(done by roadmap bot, 2026-11-15, built-in)_

## WordPress.org readiness and coding standards
- [x] Create readme.txt in the WordPress.org plugin readme format with description, installation, FAQ and changelog _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create phpcs.xml.dist that uses the WordPress-Extra, WordPress-Docs and PHPCompatibilityWP rulesets with text domain woo-discount-games and prefix wdgames _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create composer.json with dev dependencies wp-coding-standards/wpcs and phpcompatibility/phpcompatibility-wp and lint and fix scripts _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create languages/README.md explaining how to translate the plugin _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Update README.md with the plugin description, requirements, installation, shortcode usage and development instructions _(done by roadmap bot, 2026-11-15, built-in)_

## Cycle 2 - 2026-11-15
- [x] Create includes/class-wdgames-privacy.php that suggests privacy policy text for site owners _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create includes/class-wdgames-links.php that adds a Settings link to the plugins list _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create blocks/game/block.json that registers the Discount Game block with a game attribute _(done by roadmap bot, 2026-11-15, built-in)_
- [ ] Create blocks/game/render.php that renders the Discount Game block on the server
- [ ] Create blocks/game/index.js that adds the block editor interface for the Discount Game block
- [ ] Create includes/class-wdgames-block.php that registers the block and its editor script
- [ ] Update includes/class-wdgames-plugin.php to load the privacy, links and block modules
- [ ] Add a forced-colors rule for the play button focus outline to assets/css/game.css
