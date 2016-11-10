<?php
/**
 * Empty cart page
 *
 * @package BeOnePage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<p class="cart-empty">
	<?php _e( 'Your cart is currently empty.', 'beonepage' ) ?>
</p>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<p class="return-to-shop">
	<a class="wc-forward btn <?php echo Kirki::get_option( 'blog_page_button_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
		<?php _e( 'Return To Shop', 'beonepage' ) ?>
	</a>
</p>
