<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

$cart_url  = isset( $args[ 'cart_url' ] ) ? $args[ 'cart_url' ] : null;
$count     = isset( $args[ 'count' ] ) ? $args[ 'count' ] : null;
$item_text = isset( $args[ 'item_text' ] ) ? $args[ 'item_text' ] : null;
$items     = isset( $args[ 'items' ] ) ? $args[ 'items' ] : null;
$total     = isset( $args[ 'total' ] ) ? $args[ 'total' ] : null;

$show_product_thumbnails = get_option( 'aw_woocommerce_cart_show_product_thumbnails' );

$show_viewcart_button          = get_option( 'aw_woocommerce_cart_show_viewcart_button' );
$show_emptycart_button         = get_option( 'aw_woocommerce_cart_show_emptycart_button' );
$show_proceedtocheckout_button = get_option( 'aw_woocommerce_cart_show_proceedtocheckout_button' );
$t                             = 0;
?>

<div class="aw-woocommerce-cart">

    <a href="<?php echo $cart_url; ?>" 
       title="<?php _e( 'View your shopping cart' ); ?>">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

        <?php //if ( $count ) { ?>

        <span class="cart-contents-count"><?php echo $count; ?></span>

        <?php //} ?>

        <?php //echo WC()->cart->get_cart_total();   ?>
    </a>

    <div class="cart-contents">

        <?php if ( $count > 0 ): ?>

            <table>
                <thead>
                    <tr>
                        <?php if ( $show_product_thumbnails ): ?>

                            <th>&nbsp;</th>

                        <?php endif; ?>

                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ( $items as $item => $values ):
                        $product_id = $values[ 'product_id' ];
                        $product    = wc_get_product( $product_id );
                        $product_data = $product->get_data();
                        $quantity = $values['quantity'];
                        $price      = ($product->get_price()) * $quantity;
                        ?>

                        <tr>
        <?php if ( $show_product_thumbnails ): ?>

                                <td class="aw-woocommerce-cart-product-image"><?php echo $product->get_image( $size = 'shop_thumbnail' ); ?></td>

        <?php endif; ?>
                            <td class="aw-woocommerce-cart-product-title"><?php echo $product->get_title(); ?></td>
                            <td class="aw-woocommerce-cart-product-quantity"><?php echo $quantity; ?></td>
                            <td class="aw-woocommerce-cart-product-price"><?php echo get_woocommerce_currency_symbol() . $price; ?></td>
                        </tr>

    <?php endforeach; ?>

                    <tr>
                        <td><strong>Total</strong></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo $total; ?></td>
                    </tr>
                </tbody>
            </table>

    <?php if ( $show_viewcart_button ): ?>

                <a class="button view-cart"
                   href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                    View Cart</a>

    <?php endif; ?>

            <?php
            if ( $show_proceedtocheckout_button ):
                do_action( 'woocommerce_proceed_to_checkout' );
            endif;
            ?>

            <?php
            if ( $show_emptycart_button ):
                do_action( 'clear_cart_button' );
            endif;
            ?>

        <?php else: ?>

            <p>There are no items in your cart</p>

<?php endif; ?>
    </div>

</div>