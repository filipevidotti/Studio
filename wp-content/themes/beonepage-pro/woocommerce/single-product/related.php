<?php
/**
 * Related Products
 *
 * @package BeOnePage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$posts_per_page = 8;

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

	<div class="related products">

		<h2><?php _e( 'Related Products', 'beonepage' ); ?></h2>

		<div id="oc-product" class="owl-carousel product-carousel">

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<div class="oc-item">

					<?php wc_get_template_part( 'content', 'product' ); ?>

				</div><!-- .oc-item-->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #oc-product -->
	</div><!-- .related -->

<?php endif;

wp_reset_postdata();
