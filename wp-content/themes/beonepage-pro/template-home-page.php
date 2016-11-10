<?php
/**
 * Template Name: Home Page
 * 
 * @package BeOnePage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				$modules = maybe_unserialize( Kirki::get_option( 'front_page_module_manager' ) );

				if ( ! empty( $modules ) ) {
					foreach ( $modules as $module ) {
						get_template_part( 'template-parts/module', $module );
					}
				}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
