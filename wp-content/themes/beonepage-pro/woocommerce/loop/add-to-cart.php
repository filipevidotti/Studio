<?php
/**
 * Loop Add to Cart
 *
 * @package BeOnePage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><i class="fa fa-cart-plus"></i>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? preg_replace( '/button /', '', $class, 1 ) : 'button' ),
		esc_html( $product->add_to_cart_text() )
	),
$product );
