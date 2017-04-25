<?php

function aw_woocommerce_cart_options_init() {

    // Product display settings

    add_settings_section(
            'aw_woocommerce_cart_product_display_settings_section', // Id
            'Product Display Settings', // Title
            'aw_woocommerce_cart_product_display_settings_callback', // Callback
            'aw_woocommerce_cart_options_page' // Page
    );

    add_settings_field(
            'aw_woocommerce_cart_show_product_thumbnails', // ID
            'Show Product Thumbnails', // Title
            'aw_woocommerce_cart_show_product_thumbnails_render', // Callback
            'aw_woocommerce_cart_options_page', // Page
            'aw_woocommerce_cart_product_display_settings_section' // Section
    );

    register_setting(
            'aw_woocommerce_cart_options_page', // Option group
            'aw_woocommerce_cart_show_product_thumbnails' // Option name
    );

    // Button display settings

    add_settings_section(
            'aw_woocommerce_cart_button_display_settings_section', // Id
            'Button Display Settings', // Title
            'aw_woocommerce_cart_button_display_settings_callback', // Callback
            'aw_woocommerce_cart_options_page' // Page
    );

    add_settings_field(
            'aw_woocommerce_cart_show_viewcart_button', // ID
            'Show View Cart Button', // Title
            'aw_woocommerce_cart_show_viewcart_button_render', // Callback
            'aw_woocommerce_cart_options_page', // Page
            'aw_woocommerce_cart_button_display_settings_section' // Section
    );

    add_settings_field(
            'aw_woocommerce_cart_show_emptycart_button', // ID
            'Show Empty Cart Button', // Title
            'aw_woocommerce_cart_show_emptycart_button_render', // Callback
            'aw_woocommerce_cart_options_page', // Page
            'aw_woocommerce_cart_button_display_settings_section' // Section
    );

    add_settings_field(
            'aw_woocommerce_cart_show_proceedtocheckout_button', // ID
            'Show Proceed To Checkout Button', // Title
            'aw_woocommerce_cart_show_proceedtocheckout_button_render', // Callback
            'aw_woocommerce_cart_options_page', // Page
            'aw_woocommerce_cart_button_display_settings_section' // Section
    );

    register_setting(
            'aw_woocommerce_cart_options_page', // Option group
            'aw_woocommerce_cart_show_viewcart_button' // Option name
    );

    register_setting(
            'aw_woocommerce_cart_options_page', // Option group
            'aw_woocommerce_cart_show_emptycart_button' // Option name
    );

    register_setting(
            'aw_woocommerce_cart_options_page', // Option group
            'aw_woocommerce_cart_show_proceedtocheckout_button' // Option name
    );

}

function aw_woocommerce_cart_show_product_thumbnails_render() {
    $checked = get_option( 'aw_woocommerce_cart_show_product_thumbnails' );
    ?>

    <input type="checkbox" name="aw_woocommerce_cart_show_product_thumbnails" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function aw_woocommerce_cart_show_viewcart_button_render() {
    $checked = get_option( 'aw_woocommerce_cart_show_viewcart_button' );
    ?>

    <input type="checkbox" name="aw_woocommerce_cart_show_viewcart_button" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function aw_woocommerce_cart_show_emptycart_button_render() {
    $checked = get_option( 'aw_woocommerce_cart_show_emptycart_button' );
    ?>

    <input type="checkbox" name="aw_woocommerce_cart_show_emptycart_button" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function aw_woocommerce_cart_show_proceedtocheckout_button_render() {
    $checked = get_option( 'aw_woocommerce_cart_show_proceedtocheckout_button' );
    ?>

    <input type="checkbox" name="aw_woocommerce_cart_show_proceedtocheckout_button" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function aw_woocommerce_cart_product_display_settings_callback() {
    
}

function aw_woocommerce_cart_button_display_settings_callback() {
    
}

function render_aw_woocommerce_cart_options_page() {
    ?>

    <form action="options.php" method="post">

        <h1>Alphynweb Woocommerce Cart Settings</h1>

        <?php
        do_settings_sections( 'aw_woocommerce_cart_options_page' );
        settings_fields( 'aw_woocommerce_cart_options_page' );
        submit_button();
        ?>

    </form>

<?php }

add_action( 'admin_init', 'aw_woocommerce_cart_options_init' );
