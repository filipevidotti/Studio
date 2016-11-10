<?php
/**
 * The template for displaying product content within loops.
 *
 * @package BeOnePage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div <?php post_class(); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="product-image">
		<?php
			remove_action ( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<a href="<?php the_permalink(); ?>"><?php woocommerce_template_loop_product_thumbnail(); ?></a>

		<div class="product-overlay">
			<?php

				/**
				 * woocommerce_after_shop_loop_item hook
				 *
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );

			?>

			<?php
				global $woocommerce;

				echo '<a href="' . $woocommerce->cart->get_cart_url() . '" class="view_cart" title="' . esc_attr__( 'View cart', 'beonepage' ) . '"><i class="fa fa-search-plus"></i>' . esc_html__( 'View Cart', 'beonepage' ) . '</a>';
			?>
		</div><!-- .product-overlay -->
	</div><!-- .product-image -->

	<div class="product-desc">
		<?php
			remove_action ( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

			/**
			 * woocommerce_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
		?>

		<div class="product-title">
			<a href="<?php the_permalink(); ?>"><?php woocommerce_template_loop_product_title(); ?></a>
		</div><!-- .product-title -->

		<?php
			remove_action ( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			remove_action ( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<div class="product-price">
			<?php woocommerce_template_loop_price(); ?>
		</div><!-- .product-title -->

		<?php woocommerce_template_loop_rating(); ?>
	</div><!-- .product-desc -->

</div>
