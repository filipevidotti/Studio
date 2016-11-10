<?php
/**
 * Proceed to checkout button
 *
 * @package BeOnePage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>" class="checkout-button btn <?php echo Kirki::get_option( 'blog_page_button_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?> alt wc-forward">
	<?php echo __( 'Proceed to Checkout', 'beonepage' ); ?>
</a>
