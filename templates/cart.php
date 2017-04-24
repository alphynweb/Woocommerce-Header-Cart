<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

$cart_url  = isset( $args[ 'cart_url' ] ) ? $args[ 'cart_url' ] : null;
$count     = isset( $args[ 'count' ] ) ? $args[ 'count' ] : null;
$item_text = isset( $args[ 'item_text' ] ) ? $args[ 'item_text' ] : null;
$items     = isset( $args[ 'items' ] ) ? $args[ 'items' ] : null;
$total     = isset( $args[ 'total' ] ) ? $args[ 'total' ] : null;

$show_product_thumbnails = get_option( 'alphynweb_woocommerce_cart_show_product_thumbnails' );

$show_viewcart_button          = get_option( 'alphynweb_woocommerce_cart_show_viewcart_button' );
$show_emptycart_button         = get_option( 'alphynweb_woocommerce_cart_show_emptycart_button' );
$show_proceedtocheckout_button = get_option( 'alphynweb_woocommerce_cart_show_proceedtocheckout_button' );
?>

<div class="alphynweb-woocommerce-cart">

    <a class="alphynweb-woocommerce-cart" href="<?php echo $cart_url; ?>" 
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

                            <th>Thumb</th>

                        <?php endif; ?>

                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ( $items as $item => $values ):
                        $alphynweb_cart_product = $values[ 'data' ]->post;
                        //product image
                        $product_details        = wc_get_product( $values[ 'product_id' ] );
                        $quantity               = $values[ 'quantity' ];
                        $price                  = get_post_meta( $values[ 'product_id' ], '_price', true ) * $quantity;
                        ?>

                        <tr>
                            <?php if ( $show_product_thumbnails ): ?>

                                <td>Thumb</td>

                            <?php endif; ?>
                            <td><?php echo $alphynweb_cart_product->post_title; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo get_woocommerce_currency_symbol() . $price; ?></td>
                        </tr>

                    <?php endforeach; ?>

                    <tr>
                        <td><strong>Total</strong></td>
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