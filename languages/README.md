# Translations

Discount Games for WooCommerce is translation ready and uses the text domain `woo-discount-games`.

To translate the plugin:

1. Create a .pot file with WP-CLI: `wp i18n make-pot . languages/woo-discount-games.pot`
2. Open the .pot file in Poedit and create a .po file for your language.
3. Save the generated .mo file in this folder, for example `woo-discount-games-de_DE.mo`.

Once the plugin is listed on WordPress.org it can also be translated at translate.wordpress.org.


# Frequently Asked Questions

Q: How can I use Discount Games for WooCommerce with screen readers?
A: For a fully accessible experience, please use the following steps:
1. Ensure your screen reader is set to read the plugin's UI elements, such as buttons and links.
2. Use the plugin's settings to customize the discount amount and expiration date.
3. For a more detailed explanation, please refer to the plugin's documentation or contact our support team.

# Frequently Asked Questions

Q: How can I use Discount Games for WooCommerce with RTL languages?
A: For a fully accessible experience, please use the following steps:
1. Ensure your screen reader is set to read the plugin's UI elements, such as buttons and links.
2. Use the plugin's settings to customize the discount amount and expiration date.
3. Note that RTL languages may require additional configuration to ensure proper display and formatting.
4. For a more detailed explanation, please refer to the plugin's documentation or contact our support team.

Q: How do I configure the plugin for RTL languages?
A: To configure the plugin for RTL languages, you will need to set the `direction` parameter in the plugin's settings to `right-to-left`. You can do this by following these steps:
1. Log in to your WooCommerce settings page.
2. Navigate to the `Discount Games` settings.
3. Scroll down to the `General` section.
4. Click on the `Advanced` tab.
5. In the `Direction` field, select `Right-to-Left` from the dropdown menu.
6. Save your changes and the plugin will be configured for RTL languages.

# Accessibility Guidelines for RTL Languages

To ensure the plugin is accessible for users of Right-to-Left (RTL) languages, follow these guidelines:

*   Use the `dir` attribute on all HTML elements to specify the direction of the text. For example, use `dir="rtl"` on the `<body>` element.
*   Use the `lang` attribute on all HTML elements to specify the language of the content. For example, use `lang="ar"` on the `<title>` element.
*   Ensure that all images and other media are properly labeled with alt text and descriptions in the target language.
*   Use the `aria-label` attribute on all interactive elements to provide a clear and consistent way to navigate the content.
*   Test the plugin thoroughly with RTL languages to ensure that it functions as expected and does not contain any accessibility issues.
