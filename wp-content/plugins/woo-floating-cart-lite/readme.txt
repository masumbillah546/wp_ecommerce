=== XT WooCommerce Floating Cart ===

Plugin Name: XT WooCommerce Floating Cart
Contributors: XplodedThemes
Author: XplodedThemes
Author URI: https://www.xplodedthemes.com
Tags: woocommerce cart, floating cart, site cart, mini cart, interactive cart, cart
Requires at least: 4.6
Tested up to: 5.5
Stable tag: trunk
Requires PHP: 5.4+
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An Interactive Side Cart / Floating Cart for WooCommerce that slides in when the user decides to buy an item.

== Description ==

An Interactive Side Cart / Floating Cart for WooCommerce that slides in when the user decides to buy an item. Fully customizable right from WordPress Customizer with Live Preview. Products, quantities and prices are updated instantly via Ajax.

**Video Overview**

[youtube https://www.youtube.com/watch?v=_1cRp4E7iEQ]

<a target="_blank" href="https://www.youtube.com/watch?v=_1cRp4E7iEQ">https://www.youtube.com/watch?v=_1cRp4E7iEQ</a>

**Demo**

[https://demos.xplodedthemes.com/woo-floating-cart/](https://demos.xplodedthemes.com/woo-floating-cart/)

**Free Version**

- Unobstructive Floating Cart
- Fast add to cart
- Update quantities
- Remove product from cart
- Undo product removal
- Show max quantity reached msg
- Change Cart / Counter Position
- Responsive / Mobile Support

**Premium Features**

Fully customizable right from WordPress Customizer with Live Preview.

- All Free Features
- Live Preview Customizer
- Enable Fly To Cart animation
- Enable Coupons
- Enable Cart Totals
- Enable Express Checkout Form
- Enable Cart Menu Item
- Enable Auto Height
- Select Between Morph  Slide Animation
- Support variations, bundles & composites
- Display product attributes within the cart
- Change Cart Width / Height
- Apply Google Fonts
- Custom Colors / Backgrounds
- Custom Icons (SVG / Image / Font Icons)
- Select from 11 loading spinner animations
- Exclude pages from displaying the cart
- Device Visibility options
- Ajax add to cart on Single Product pages
- Ajax add to cart within Quick View Modals
- Select between Checkout Or View Cart button
- Option to trigger the cart on Mouse Over
- Display Subtotal or Total
- RTL Support
- Automated Updates & Security Patches
- Priority Email & Help Center Support

**Compatible With <a target="_blank" href="https://xplodedthemes.com/products/woo-quick-view/">Woo Quick View</a>**
**Compatible With <a target="_blank" href="https://xplodedthemes.com/products/woo-variation-swatches/">Woo Variation Swatches</a>**

**Translations**

- English - default

*Note:* All our plugins are localized / translatable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful.

== Installation ==

Installing "XT Woo Floating Cart" can be done by following these steps:

1. Download the plugin from the customer area at "XplodedThemes.com" 
2. Upload the plugin ZIP file through the 'Plugins > Add New > Upload' screen in your WordPress dashboard
3. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

#### V.1.8.1 - 28.10.2020
- **enhance**: Smoother fade in cart loading
- **enhance**: Preload images before animating the Fly to cart image. Better experience if the image is too large, might take longer to load, by then the animation is already complete.
- **enhance**: Instant clicks on mobile. Replace all click events with touchstart on mobile which removes the extra 300ms delay.
- **update**: XT Framework update

#### V.1.8.0 - 26.10.2020
- **update**: Updated XT Framework.
- **fix**: Fix issue with Fly to cart image being out of proportion on some themes.
- **fix**: Minor CSS Fixes

#### V.1.7.9 - 23.10.2020
- **new**: **Pro** Added new **Cart Header Message** option. Can be used to display promo messages.
- **new**: **Woo Add To Cart** : On single product pages, make the scroll up to **Added to cart notice** optional!
- **new**: **Woo Add To Cart** : Enable Disable Ajax add to cart on shop or single product pages
- **new**: **Woo Add To Cart** : Added Redirect options (to cart, to checkout, to custom page) after add to cart.
- **fix**: Some themes were not showing the "Added to cart" notice on single pages when Ajax add to cart is enabled.
- **update**: Moved the option **Force showing add to cart button on shop page** to the **Woo Add To Cart** since it will be shared with other plugins.
- **update**: Moved the option **Hide "View Cart" Link after add to cart** to the **Woo Add To Cart** since it will be shared with other plugins.

#### V.1.7.8 - 21.10.2020
- **new**: Moved the Add To Cart spinner override settings to it's on **Woo Add To Cart** section. Added custom loading spinners and confirmation checkmarks for the Add to cart button. These settings will now be shared between the **Woo Quick View**, **Woo Floating Cart** & **Woo Variation Swatches** plugins.
- **new**: **Pro** Added new **Cart Product Price Display** option. Select between (Subtotal or Item Price). Item price will also display sale strikethrough prices

#### V.1.7.7 - 15.10.2020
- **support**: **Pro** Better theme support for the fly to cart animation

#### V.1.7.6 - 14.10.2020
- **fix**: **Pro** Cart Menu Item CSS Fixes
- **update**: XT Framework update
- **Update**: Updated translation file

#### V.1.7.5 - 10.10.2020
- **new**: **Pro** Added new option to re-order cart quantity field parts. (Minus / Plus Icons & Input field) https://d.pr/i/MZMkWT
- **enhance**: Auto increase quantity field width based on quantity

#### V.1.7.4 - 07.10.2020
- **new**: XT Framework System Status will now show info about the active theme as well as XT Plugin templates that are overridden by the theme. Similar to woocommerce, it will now be easier to know which plugin templates are outdated.

#### V.1.7.3.3 - 29.09.2020
- **fix**: Minor CSS fixes to the Menu Cart Icon

#### V.1.7.3.1 - 23.09.2020
- **fix**: Fixed minor issue with success message disappearing after applying a coupon code.

#### V.1.7.3 - 20.08.2020
- **new**: Added new "Cart Trigger Shortcode" option. Similar to the "Cart Menu Item" except it's a shortcode that can be inserted anywhere and can trigger the floating cart.

#### V.1.7.2 - 14.08.2020
- **Update**: Update Kirki Framework to v3.1.5
- **fix**: Fixed issue with customizer fields being hidden on WP v5.5

#### V.1.7.1 - 28.07.2020
- **support**: Added support for **WooCommerce SecureSubmit Gateway** plugin within the checkout form.

#### V.1.7.0 - 23.07.2020
- **new**: Cart menu item alignment option based on device screen.
- **fix**: Cart menu item styles not being loaded on native cart / checkout pages.
- **fix**: Fly to cart animation on the single product page is not pulling the correct image on some themes.

#### V.1.6.9 - 21.07.2020
- **update**: Updated translation files

#### V.1.6.8 - 16.07.2020
- **new**: **Pro** Added Total Savings option within Cart Extras Settings. When enabled, savings will be visible within cart totals.
- **new**: **Pro** Added a Badge option for the Cart Menu Item Counter instead of text only.
- **fix**: Fixed issue with main framework

#### V.1.6.7 - 01.07.2020
- **support**: Support Fly to cart animation for products built manually with Elementor Builder
- **new**: **Pro** Added option to override existing theme Add To Cart loading spinner. Choose between 11 different loading spinners and 2 checkmark icons for when a product has been added to the cart.

#### V.1.6.6 - 07.06.2020
- **fix**: Disable floating cart when Elementor Page Builder is active to prevent conflicts.
- **fix**: Fix issue with cart footer flickering on safari when removing products or increasing / decreasing quantities

#### V.1.6.5 - 12.05.2020
- **fix**: Fixed conflict with Avada theme
- **new**: Added option to force showing add to cart button on shop archive page. Some themes do not show it by default, ex: Divi theme.

#### V.1.6.4 - 01.05.2020
- **fix**: Fixed conflict with Divi Theme Page Builder

#### V.1.6.3 - 22.04.2020
- **new**: **Pro** Added Cart Menu Item option. Displays a cart icon with cart count, total price or both inside any menu. The menu item will also toggle the floating cart on click.
- **fix**: Minor CSS fixes

#### V.1.6.1 - 20.04.2020
- **support**: **Pro** Better theme support for the Fly to cart animation

#### V.1.6.0 - 18.04.2020
- **fix**: **Pro** Fixed fly to cart animation issue when Slider Revolution is active
- **update**: **Pro** Updated GSAP animation library.

#### V.1.5.9.1 - 12.04.2020
- **fix**: Minor CSS fixes

#### V.1.5.9 - 11.04.2020
- **fix**: Woocommerce functions is_cart() and is_checkout() always returning true because of the plugin causing issues with some themes that are relying on those functions. This should no longer be a problem.
- **fix**: Minor CSS fixes

#### V.1.5.8 - 07.04.2020
- **new**: **Pro** Added JS API function: xt_woofc_is_cart_open()
- **fix**: Minor CSS fixes
- **enhance**: Dynamically adjust the suggested products slider height based on each slide's height
- **enhance**: Better responsive display for suggested products.
- **support**: **Pro** Support Woo Quick View so it can be triggered from within the cart suggested products.
- **support**: **Pro** Fly to cart animation should now support any theme

#### V.1.5.6 - 06.04.2020
- **fix**: Fixed issue cart auto height overflowing window height.

#### V.1.5.5 - 03.04.2020
- **fix**: Fixed issue with cart trigger not being completely visible on all browsers except chrome when Slide animation is enabled.
- **fix**: Fixed issue with media queries not being applied correctly in some cases
- **update**: XT Framework update v1.1.3, better media queries handling

#### V.1.5.4 - 27.03.2020
- **new**: **Pro** Added new cart appear animation option. You can now choose between the default "Morph" or the new "Slide" animation.
- **new**: **Pro** Added option to select between Pixels or Percent when setting cart Width and Height
- **new**: **Pro** Added new cart "Auto Height" option. The height will automatically adjust to fit the cart content as much as possible.
- **new**: **Pro** Added ability to set a different "Width, Height & Border Radius" for each screen view (Desktop, Tablet, Mobile)
- **new**: **Pro** Added ability to set a different "Border Radius" for when the cart is expanded for each screen view (Desktop, Tablet, Mobile)
- **new**: **Pro** Added the option to change the overlay color when the cart is active
- **new**: **Pro** Added a the option to enable a close button within the header (Useful when the cart animation is set to "Slide")
- **new**: Added javascript API function to toggle, open & close cart programmatically.
- **new**: Added the option to adjust the Z-Index for the quick view modal
- **enhance**: Smoother close / open icon transition
- **fix**: Minor fixes

#### V.1.5.2.2 - 18.02.2020
- **update**: XT Framework update / bug fixes

#### V.1.5.2 - 05.02.2020
- **fix**: Fixed issue with single product page "add to cart" event not being detected by tracking plugins such as Facebook Pixel / Google Analytics and others.

#### V.1.5.1 - 29.01.2020
- **fix**: Fixed issue with plugin TextDomain not being loaded properly
- **update**: Updated translation files

#### V.1.5.0 - 28.01.2020
- **fix**: Show grand total (including taxes, shipping, coupons, etc...) only if cart totals or checkout form are enabled. Otherwise, show cart subtotal instead.

#### V.1.4.9 - 10.01.2019
- **fix**: Fix intermittent issue with Suggested Products slider showing duplicated nav arrows and bullets

#### V.1.4.8 - 10.01.2019
- **fix**: Fix issue with Suggested Products customizer options not applying correctly
- **new**: **Pro** Added Suggested Products position option

#### V.1.4.7 - 10.01.2019
- **update**: XT Framework update.

#### V.1.4.6 - 09.01.2019
- **enhance**: Major backend changes. All XT Plugins will now appear under "XT Plugins" menu.
- **new**: **Pro** Added new option to show product suggestions within the cart (Up-Sell, Cross-Sell and Related products)
- **update**: Cart & Counter Position can now be changed within the free version.
- **update**: Cart Footer settings can now be changed within the free version.

#### V.1.4.5 - 22.11.2019
- **fix**: Minor Fixes

#### V.1.4.4 - 18.11.2019
- **Fix**: Fixed intermittent issue with page being reloaded after adding product to cart when either "Cart Totals" or "Checkout Form" options are enabled.
- **Fix**: Fixed issue with add_to_cart event not being picked up by google tag manager plugins / facebook pixel etc..
- **Fix**: Fixes caching issues
- **Update**: Template changes: /templates/parts/cart/list.php

#### V.1.4.3 - 30.10.2019
- **Fix**: Add proper hooks to min / max cart product quantities to support other plugins such as WooCommerce Min / Max Quantities
- **Fix**: Fix envato license validation issue
- **Update**: Template changes: /templates/parts/cart/list/product/quantity.php

#### V.1.4.2 - 29.10.2019
- **Fix**: Shipping Address fields showing when Virtual/Downloadable product is added in the cart when it's not supposed to.
- **Fix**: **Pro** When the checkout form is enabled within the Floating Cart, the native cart page was not showing the cart totals section.

#### V.1.4.1 - 29.10.2019
- **Support**: Support WordPress v5.2.4

#### V.1.4.0 - 23.10.2019
- **Update**: **Pro** Update customizer library to v3.0.45
- **Fix**: **Pro** Fixed issue with some customizer fields hidden on Flatsome theme and others.

#### V.1.3.9 - 11.10.2019
- **Fix**: Fixed javascript error / infinite loading when adding product to the cart and maximum quantity has been reached.
- **Fix**: Fixed add to cart on archive page not working on some custom themes.
- **Update**: Update Freemius SDK to v2.3.1

#### V.1.3.8 - 27.08.2019
- **Support**: Better support for **Woocommerce Product Addons** plugin. Fix issue with hidden required fields.

#### V.1.3.7.1 - 23.08.2019
- **Update**: Updated pot translation file

#### V.1.3.7 - 19.08.2019
- **Update**: **Pro** Updated customizer library to V3.0.44

#### V.1.3.6 - 09.07.2019
- **Update**: Removed unused libraries within the free version to be conform with WordPress directory guidelines

#### V.1.3.5 - 20.06.2019
- **Fix**: **Pro** Fixed issue with Checkout Form not appearing after adding the first product to the cart unless the page is reloaded.
- **Fix**: **Pro** Fixed issue with shipping method switching on native woocommerce cart / checkout pages

#### V.1.3.4 - 11.06.2019
- **New**: Adding "Please Wait..." loading text to checkout button once clicked. Or "Placing Order..." if Checkout form is enabled.
- **Enhance**: **Pro** Cart Totals: Faster shipping methods switching
- **Support**: Improved theme support

#### V.1.3.3 - 09.06.2019
- **Fix**: **Pro** Fixed couple of event firing issues with the checkout form and totals.
- **Fix**: **Pro** Fixed issue with shipping methods switching not updating totals
- **Enhance**: **Pro** Block cart body scrolling whenever a dropdown (countries, cities etc..) is open. This way, only the dropdown will be scrolling and nothing else.

#### V.1.3.2 - 01.06.2019
- **New**: **Pro** Added option to block main site page scroll when the floating cart is open
- **Support**: **Pro** **WooCommerce for PayPal by AngellEye** - Express Paypal button will be injected within cart totals / checkout form

#### V.1.3.1 - 22.05.2019
- **Fix**: **Pro** Fixed issue with totals not being triggered whenever a coupon is applied.
- **Fix**: Fixed javascript error on shop page.

#### V.1.3.0 - 21.05.2019
- **New**: **Pro** Added option to apply coupons within the floating cart
- **New**: **Pro** Added option to display totals (including tax, shipping, coupons etc..) below product list.
- **New**: **Pro** Added option to enable 1 step checkout form below product list. If enabled, totals will also be displayed.
- **New**: **Pro** Added option to display product SKU.
- **New**: Added option to initialize cart via ajax on page load.
- **Fix**: **Pro** Fixed customizer typography field issue with font variants.
- **Fix**: Fixed issue with WooCommerce error messages disappearing after a second.
- **Fix**: After product removal, the undo action should restore the product to the previous position within the cart
- **Support**: **Pro** Standard fonts can now be selected or can inherit theme fonts without loading google fonts.
- **Support**: Shop page ajax "add to cart" will also work with Woo Variation Swatches plugin: http://xplodedthemes.com/products/woo-variation-swatches/
- **Enhance**: Shop page "add to cart" now supports ajax queue. No matter how many products are added to the cart and at what speed, they will all be added one after the other. This should pass any stress test.

#### V.1.2.9 - 04.04.2019
- **Fix**: **Pro** Fixed licensing issue
- **Fix**: Minor CSS Fixes

#### V.1.2.8 - 18.03.2019
- **Fix**: **Pro** Fixed Visibility "Hide on Pages" Dropdown to include all languages if WPML is enabled
- **Fix**: **Pro** Fix issue when validating **WooCommerce Extra Product Options** plugin required fields
- **Fix**: Fix issue with Min / Max quantities not respecting limits
- **Fix**: Minor CSS Fixes
- **Update**: **Pro** Updated Customizer Framework
- **New**: **Pro** Added option to Link / Unlink product to single product page
- **New**: **Pro** Added option to Hide Product Thumbs
- **New**: **Pro** Added new Device Visibility Option (Show on tablet and mobile)
- **Support**: Better WPML Support

#### V.1.2.7 - 11.03.2019
- **Fix**: Fixed conflict with WPML causing floating cart not to add items.

#### V.1.2.6 - 26.02.2019
- **Fix**: Fixed bug with customizer default values

#### V.1.2.5 - 26.02.2019
- **Update**: Update Freemius SDK to v2.2.4
- **Update**: **Pro** Update plugin updater to support php 7.3
- **New**: **Pro** Added option to set trigger / counter position and size based on breakpoint - Desktop, Tablet, Mobile
- **Fix**: **Pro** Fixed trigger counter position not being set within the customizer
- **Fix**: **Pro** Fixed issue with Customizer Link field

#### V.1.2.4 - 27.01.2019
- **Fix**: Force user to set a quantity if manually set to 0
- **Fix**: **Pro** Woocommerce "added to cart notice" on single product page is showing when reloading a page instead of showing directly after the animation
- **New**: **Pro** Added option to change trigger icon colors - Font Icon Only
- **Update**: Updated jquery.mobile library
- **Enhance**: Better composite / bundle product display

#### V.1.2.3 - 18.01.2019
- **Support**: Added support for validating required fields from Product Addon plugin: https://wordpress.org/plugins/woocommerce-product-addon/
- **Update**: Update Freemius SDK to v2.2.3

#### V.1.2.2 - 11.01.2019
- **Fix**: Fixed issue with license key migration

#### V.1.2.1 - 10.01.2019
- **Fix**: Fixed license migration issue

#### V.1.2.0 - 09.01.2019
- **New**: Added option to resize cart trigger & counter
- **Update**: Migrated Licensing / Billing System to Freemius
- **Fix**: Prefixed all plugin css classes and php function with "xt_" example: "woofc" becomes "xt_woofc", if you added custom css or have overridden plugin templates within your theme, make sure to add this prefix or else it will break

#### V.1.1.7 - 27.10.2018
- **Fix**: Fixed issue with some customizer color fields not showing
- **Fix**: Minor cart refresh fixes

#### V.1.1.6 - 24.09.2018
- **Fix**: Fixed intermittent issue with checkout button not being visible when adding first product

#### V.1.1.5 - 11.09.2018
- **Fix**: Prevent variable product from being added to cart if no option has been selected
- **Fix**: Minor Customizer Fixes

#### V.1.1.4 - 04.08.2018
- **Enhance**: Faster Ajax Load
- **Enhance**: Faster product add to cart on single product pages
- **Enhance**: Faster product quantity update, remove and undo

#### V.1.1.3 - 04.08.2018
- **Fix**: Fix issue with undo remove
- **Enhance**: Faster product add to cart on single product pages

#### V.1.1.2 - 25.03.2018
- **Fix**: Fix fly to cart animation to try and only animate the image without the whole container
- **Fix**: Fix conflict with 2 different serializeJSON libraries
- **Fix**: Fix javascript error on some shop pages, especially when using Dokan plugin
- **Fix**: Bypass add to cart buttons within gravity forms so they can work as usual.
- **Support**: Support Woo Product Table Plugin

#### V.1.1.1 - 15.01.2018
- **Support**: Support Woo Variations Table Plugin

#### V.1.1.0 - 25.11.2017
- **Support**: Wordpress v4.9 Customizer Support
- **Enhance**: Added Ajax queue system faster and more reliable Ajax requests

#### V.1.0.9.5 - 24.10.2017
- **Fix**: Fix compatibility issue with the X Theme
- **Support**: Better theme compatibility

#### V.1.0.9.4 - 11.10.2017
- **Fix**: Fix bundled items removal issue with Composite / Bundled products
- **Fix**: Replace deprecated functions
- **Enhance**: Disable the Single Add To Cart button until the floating cart is ready

#### V.1.0.9.3 - 25.09.2017
- **Fix**: Better compatibility with Composite and Bundled products

#### V.1.0.9.2 - 07.07.2017
- **Fix**: Fix multiple domain license check bug

#### V.1.0.9.1 - 21.06.2017
- **New**: Added option to show / hide bundled products for WooCommerce Product Bundles plugin
- **Support**: Support WooCommerce Product Bundles plugin

#### V.1.0.9 - 16.06.2017
- **Fix**: Fix product attributes display issue if attribute value is set to "Any"
- **Update**: Template changes: /templates/parts/cart/list/product.php
- **Update**: Template changes: /templates/parts/cart/list/product/variations.php

#### V.1.0.8.9 - 07.06.2017
- **Fix**: Fixed issue with product remove not updating subtotal on first try

#### V.1.0.8.8 - 20.04.2017
- **Fix**: Fixed deprecated function warnings caused by WooCommerce v3.0.x
- **Update**: Template changes: /templates/parts/cart/list/product/thumbnail.php

#### V.1.0.8.7 - 19.04.2017
- **Fix**: Fixed issue with products not adding to cart right after removing a product

#### V.1.0.8.6 - 18.04.2017
- **Fix**: Fixed issue with having to click twice to remove a product after adding it
- **Enhance**: Changed the Checkout label to Cart in go to cart mode

#### V.1.0.8.5 - 11.04.2017
- **Fix**: Fixed intermittent 502 error with ajax requests
- **Fix**: Fixed fly to cart animation from Woo Quick View modal

#### V.1.0.8.4 - 10.04.2017
- **New**: Added option to display product attributes as a list or inline
- **New**: Added option to hide product attributes labels
- **New**: Added option to automatically open the cart after adding a product
- **Fix**: Fixed product attributes display on WooCommerce v3.x.x
- **Update**: Template changes: /templates/parts/cart/list/product/variations.php and /templates/parts/cart/list/product.php

#### V.1.0.8.3 - 10.04.2017
- **New**: Added option to resize default cart width and height
- **Enhance**: Better trigger icon animation when trigger position is set to Top Left or Top Right
- **Fix**: Fixed issue with some third party quick view modals add to cart button infinite loading.
- **Fix**: Fixed single post fly to cart animation on WooCommerce v3.x.x
- **Update**: Template changes: /templates/minicart.php and /templates/parts/cart/footer.php

#### V.1.0.8.2 - 04.04.2017
- **Fix**: Fixed issue with Remove / Undo cart total not updating sometimes.
- **Fix**: Fixed issue with local license being reset by it self.

#### V.1.0.8.1 - 16.03.2017
- **New**: Added color and typography customization options for the newly added error message
- **Support**: Supports WooCommerce Currency Converter Widget
- **Enhance**: Show error message within cart header whenever product quantity has reached stock limit or a minimum quantity is required.
- **Enhance**: Show woocommerce error messages within single product pages if ajax add to cart request failed for X reason

#### V.1.0.8 - 15.03.2017
- **New**: Auto sync cart content with third party mini cart plugins or within themes.
- **New**: Added global javascript function xt_woofc_refresh_cart() for developers to force cart refresh within plugins or themes.
- **Support**: Added support for Woo Quick View Plugin
- **Support**: Added Support for caching plugins
- **Fix**: Fix cart issues on non woocommerce pages.

#### V.1.0.7 - 17.02.2017
- **New**: Sync cart with native WooCommerce cart page on Add, remove, update products
- **New**: Fly to cart animation now works on single product pages and within Quick View plugins
- **Support**: Added support for Yith Product Addons Plugin
- **Support**: Better support for third party plugins
- **Enhance**: Centralize template output functions
- **Fix**: Fixed customizer issue with checkout background color not being changed

#### V.1.0.6 - 11.02.2017
- **New**: Added Product Variations Support
- **New**: Added option to display product attributes within the cart
- **New**: Added option to select between Subtotal or Total to be displayed within the checkout button
- **New**: Added option to hide the WooCommerce “View Cart” link that appears after adding an item to cart
- **Enhance**: Better theme compatibility

#### V.1.0.5.1 - 30.01.2017
- **Fix**: Fixed weird issue with customizer fields visibility on WordPress 4.7.2
- **Fix**: Fixed issue with Customizer Typography fields not being displayed

#### V.1.0.5 - 26.01.2017
- **New**: Added option to change the checkout link to redirect to the cart page instead.
- **New**: Added option to trigger the cart on Mouse Over with optional delay
- **New**: Added Device Visibility options

#### V.1.0.4.1 - 19.01.2017
- **Fix**: Fixed minor bug with add to cart button when used with third party gift card plugins
- **Fix**: Fixed bug with customizer sections being hidden on some themes due to a conflict

#### V.1.0.4 - 10.01.2017
- **New**: Ajax Add to cart now supported on single shop pages and within product quick views
- **Enhance**: License System now allows the same purchase code to be valid within a multisite setup. 1 License: unlimited domains, subdomains, folders as long as as it is under a multisite.
- **Fix**: Fixed WooCommerce installation check notice

#### V.1.0.3 - 16.12.2016
- **New**: Now supports RTL
- **Fix**: Minor CSS fix with Fly to cart animation

#### V.1.0.2 - 30.11.2016
- **New**: Added 11 different loading spinners (optional)
- **New**: Added new Fly To Cart animation (optional)
- **New**: Added option to exclude pages from displaying the cart
- **Fix**: Allow html in product titles
- **Fix**: License validation Fix

#### V.1.0.1 - 02.11.2016
- **New**: Added hover background / color option to checkout button.
- **Enhance**: Replaced click with click event for faster taps on mobile.
- **Update**: Updated Translation Files
- **Fix**: Removed hover effect on mobile for faster response
- **Fix**: Fixed bug with checkout button typography options
- **Fix**: Minor CSS Fixes

#### V.1.0.0 - 01.11.2016
- **Initial**: Initial Version

