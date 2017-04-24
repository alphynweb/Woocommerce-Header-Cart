<?php
/**
 * Plugin Name: Alphynweb Woocommerce Header Cart
 * Plugin URI: http://www.alphynweb.co.uk
 * Description: Adds additional cart functionality to Woocommerce
 * Version: 1.0.0
 * Author: Alphynweb
 * Author URI: http://www.alphynweb.co.uk
 * License: GPL2
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

$plugin_dir = plugin_dir_path(__FILE__);

require_once $plugin_dir . 'class/class-aw-woocommerce-header-cart.php';

require_once $plugin_dir . 'menu/menu.php';

require_once $plugin_dir . 'settings/settings.php';

/* Add Cart if WooCommerce plugin is active */
function alphynweb_woocommerce_cart() {
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $alphynweb_woocommerce_cart = AwWoocommerceHeaderCart::get_instance();
        $alphynweb_woocommerce_cart->render_cart();
    }
}

add_action( 'alphynweb_woocommerce_cart', 'alphynweb_woocommerce_cart' );

/* Ensure cart contents update when products are added to the cart via AJAX */
function alphynweb_woocommerce_cart_fragments() {
    $alphynweb_woocommerce_cart = AwWoocommerceHeaderCart::get_instance();
    $fragments = $alphynweb_woocommerce_cart->cart_fragment();
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'alphynweb_woocommerce_cart_fragments' );