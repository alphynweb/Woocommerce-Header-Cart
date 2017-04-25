<?php
/**
 * Plugin Name: Alphynweb Woocommerce Header Cart
 * Plugin URI: http://www.aw.co.uk
 * Description: Adds additional cart functionality to Woocommerce
 * Version: 1.0.0
 * Author: Alphynweb
 * Author URI: http://www.aw.co.uk
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
function aw_woocommerce_cart() {
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $aw_woocommerce_cart = AwWoocommerceHeaderCart::get_instance();
        $aw_woocommerce_cart->render_cart();
    }
}

add_action( 'alphynweb_woocommerce_cart', 'aw_woocommerce_cart' );

/* Ensure cart contents update when products are added to the cart via AJAX */
function aw_woocommerce_cart_fragments() {
    $aw_woocommerce_cart = AwWoocommerceHeaderCart::get_instance();
    $fragments = $aw_woocommerce_cart->cart_fragment();
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'aw_woocommerce_cart_fragments' );

// Fron end enqueue scripts
add_action( 'wp_enqueue_scripts', 'aw_woocommerce_header_cart_scripts' );

function aw_woocommerce_header_cart_scripts( $hook_suffix ) {
    // To do - only implement these on pages that use the plugin
    wp_register_style( 'aw_woocommerce_cart', plugins_url( 'styles/styles.css', __FILE__ ) );
    wp_enqueue_style( 'aw_woocommerce_cart' );
}

// Admin enqueue scripts
//add_action( 'admin_enqueue_scripts', 'thp_admin_styles_and_scripts' );

//function thp_admin_styles_and_scripts( $hook_suffix ) {
//    if ( $hook_suffix != 'settings_page_treehouse-plus' ) {
//        return;
//    }
//    wp_enqueue_script( 'thp-fields', plugins_url( 'scripts/thp_fields.js', __FILE__ ) );
//    wp_register_script( 'google-charts-loader', 'https://www.gstatic.com/charts/loader.js' );
//    wp_register_style( 'thp-treehouse', plugins_url( 'styles/admin-styles.css', __FILE__ ) );
//    wp_enqueue_script( 'google-charts-loader' );
//    wp_enqueue_style( 'thp-treehouse' );
//    }