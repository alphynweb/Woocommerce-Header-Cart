<?php

function alphynweb_woocommerce_cart_options_init() {

    // Product display settings

    add_settings_section(
            'alphynweb_woocommerce_cart_product_display_settings_section', // Id
            'Product Display Settings', // Title
            'alphynweb_woocommerce_cart_product_display_settings_callback', // Callback
            'alphynweb_woocommerce_cart_options_page' // Page
    );

    add_settings_field(
            'alphynweb_woocommerce_cart_show_product_thumbnails', // ID
            'Show Product Thumbnails', // Title
            'alphynweb_woocommerce_cart_show_product_thumbnails_render', // Callback
            'alphynweb_woocommerce_cart_options_page', // Page
            'alphynweb_woocommerce_cart_product_display_settings_section' // Section
    );

    register_setting(
            'alphynweb_woocommerce_cart_options_page', // Option group
            'alphynweb_woocommerce_cart_show_product_thumbnails' // Option name
    );

    // Button display settings

    add_settings_section(
            'alphynweb_woocommerce_cart_button_display_settings_section', // Id
            'Button Display Settings', // Title
            'alphynweb_woocommerce_cart_button_display_settings_callback', // Callback
            'alphynweb_woocommerce_cart_options_page' // Page
    );

    add_settings_field(
            'alphynweb_woocommerce_cart_show_viewcart_button', // ID
            'Show View Cart Button', // Title
            'alphynweb_woocommerce_cart_show_viewcart_button_render', // Callback
            'alphynweb_woocommerce_cart_options_page', // Page
            'alphynweb_woocommerce_cart_button_display_settings_section' // Section
    );

    add_settings_field(
            'alphynweb_woocommerce_cart_show_emptycart_button', // ID
            'Show Empty Cart Button', // Title
            'alphynweb_woocommerce_cart_show_emptycart_button_render', // Callback
            'alphynweb_woocommerce_cart_options_page', // Page
            'alphynweb_woocommerce_cart_button_display_settings_section' // Section
    );

    add_settings_field(
            'alphynweb_woocommerce_cart_show_proceedtocheckout_button', // ID
            'Show Proceed To Checkout Button', // Title
            'alphynweb_woocommerce_cart_show_proceedtocheckout_button_render', // Callback
            'alphynweb_woocommerce_cart_options_page', // Page
            'alphynweb_woocommerce_cart_button_display_settings_section' // Section
    );

    register_setting(
            'alphynweb_woocommerce_cart_options_page', // Option group
            'alphynweb_woocommerce_cart_show_viewcart_button' // Option name
    );

    register_setting(
            'alphynweb_woocommerce_cart_options_page', // Option group
            'alphynweb_woocommerce_cart_show_emptycart_button' // Option name
    );

    register_setting(
            'alphynweb_woocommerce_cart_options_page', // Option group
            'alphynweb_woocommerce_cart_show_proceedtocheckout_button' // Option name
    );

}

function alphynweb_woocommerce_cart_show_product_thumbnails_render() {
    $checked = get_option( 'alphynweb_woocommerce_cart_show_product_thumbnails' );
    ?>

    <input type="checkbox" name="alphynweb_woocommerce_cart_show_product_thumbnails" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function alphynweb_woocommerce_cart_show_viewcart_button_render() {
    $checked = get_option( 'alphynweb_woocommerce_cart_show_viewcart_button' );
    ?>

    <input type="checkbox" name="alphynweb_woocommerce_cart_show_viewcart_button" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function alphynweb_woocommerce_cart_show_emptycart_button_render() {
    $checked = get_option( 'alphynweb_woocommerce_cart_show_emptycart_button' );
    ?>

    <input type="checkbox" name="alphynweb_woocommerce_cart_show_emptycart_button" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function alphynweb_woocommerce_cart_show_proceedtocheckout_button_render() {
    $checked = get_option( 'alphynweb_woocommerce_cart_show_proceedtocheckout_button' );
    ?>

    <input type="checkbox" name="alphynweb_woocommerce_cart_show_proceedtocheckout_button" <?php
    if ( $checked ) {
        echo "checked";
    };
    ?> />

<?php }

function alphynweb_woocommerce_cart_product_display_settings_callback() {
    
}

function alphynweb_woocommerce_cart_button_display_settings_callback() {
    
}

function render_alphynweb_woocommerce_cart_options_page() {
    ?>

    <form action="options.php" method="post">

        <h1>Alphynweb Woocommerce Cart Settings</h1>

        <?php
        do_settings_sections( 'alphynweb_woocommerce_cart_options_page' );
        settings_fields( 'alphynweb_woocommerce_cart_options_page' );
        submit_button();
        ?>

    </form>

<?php }

add_action( 'admin_init', 'alphynweb_woocommerce_cart_options_init' );
