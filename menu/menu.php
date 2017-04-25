<?php

function aw_woocommerce_cart_menu() {
    add_options_page(
            'Alphynweb Woocommerce Cart Options', // Page title
            'Alphynweb Woocommerce Cart Options', // Menu title
            'manage_options', // Capability
            'aw-woocommerce-cart', // Menu slug
            'render_aw_woocommerce_cart_options_page' // Callback
    );
}

add_action( 'admin_menu', 'aw_woocommerce_cart_menu' );
