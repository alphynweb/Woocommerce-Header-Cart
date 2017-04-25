<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class AwWoocommerceHeaderCart
{

    private static $instance;
    protected $cart_items;   // Cart items
    protected $cart_total;   // Cart total
    protected $cart_count;   // Number of cart items
    protected $cart_url;     // Cart url
    protected $plugin_dir;   // Plugin base directory
    protected $template_dir; // Plugin template directory

    public function __construct() {
        $this->set_cart_items();
        $this->set_cart_total();
        $this->set_cart_count();
        $this->set_cart_url();
        $this->set_plugin_dir();
        $this->set_template_dir();
    }

    public static function get_instance() {
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function render_cart() {

        $items    = $this->get_cart_items();
        $total    = $this->get_cart_total();
        $count    = $this->get_cart_count();
        $cart_url = $this->get_cart_url();

        $item_text = ($count === 1) ? "Item" : "Items";

        $args = [
            'items'     => $items,
            'total'     => $total,
            'cart_url'  => $cart_url,
            'count'     => $count,
            'item_text' => $item_text
        ];

        include_once $this->get_template_dir() . 'cart.php';
    }

    public function cart_fragment() {
        ob_start();
        $this->render_cart();
        $fragments[ '.aw-woocommerce-cart' ] = ob_get_clean();
        return $fragments;
    }

    // Getters
    // Cart items
    protected function get_cart_items() {
        return WC()->cart->get_cart();
    }

    // Cart total
    protected function get_cart_total() {
        return WC()->cart->get_cart_total();
    }

    // Cart contents count
    protected function get_cart_count() {
        return esc_html( WC()->cart->get_cart_contents_count() );
    }

    // Cart url
    protected function get_cart_url() {
        return wc_get_cart_url();
    }

    // Plugin directory
    protected function get_plugin_dir() {
        return $this->plugin_dir;
    }

    // Template directory
    protected function get_template_dir() {
        return $this->template_dir;
    }

    // Setters
    // Cart items
    protected function set_cart_items() {
        $this->cart_items = WC()->cart->get_cart();
    }

    // Cart total
    protected function set_cart_total() {
        $this->cart_total = WC()->cart->get_cart_total();
    }

    // Cart contents count
    protected function set_cart_count() {
        $this->cart_count = WC()->cart->get_cart_contents_count();
    }

    // Cart url
    protected function set_cart_url() {
        $this->cart_url = wc_get_cart_url();
    }

    // Plugin directory
    protected function set_plugin_dir() {
        $this->plugin_dir = plugin_dir_path( __DIR__ );
    }

    // Template direcotry
    protected function set_template_dir() {
        $this->template_dir = $this->get_plugin_dir() . 'templates/';
    }

}
