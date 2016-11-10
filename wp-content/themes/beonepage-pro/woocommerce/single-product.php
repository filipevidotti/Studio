<?php
/**
 * The Template for displaying all single products.
 *
 * @package BeOnePage
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<header class="page-header img-background clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>

					<?php beonepage_get_breadcrumbs(); ?>
				</div><!-- col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</header><!-- .page-header -->

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
							remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

							/**
							 * woocommerce_before_main_content hook
							 *
							 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
							 * @hooked woocommerce_breadcrumb - 20
							 */
							do_action( 'woocommerce_before_main_content' );
						?>

							<div class="single-product clearfix">
								<?php while ( have_posts() ) : the_post(); ?>

									<?php wc_get_template_part( 'content', 'single-product' ); ?>

								<?php endwhile; // end of the loop. ?>
							</div><!-- .single-product -->

						<?php
							/**
							 * woocommerce_after_main_content hook
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							do_action( 'woocommerce_after_main_content' );
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-md-9 -->

			<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
		</div><!-- .row-->
	</div><!-- .container -->

<?php get_footer( 'shop' ); ?>
