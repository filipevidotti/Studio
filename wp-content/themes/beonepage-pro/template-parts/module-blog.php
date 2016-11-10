<?php
/**
 * Module part for displaying blog module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_blog_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_blog_module_bg' ) == 'image' && Kirki::get_option( 'front_page_blog_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_blog_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_blog_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_blog_module_id' ); ?>" class="module blog-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container-fluid">
		<div class="row row-nopadding">
			<?php if ( Kirki::get_option( 'front_page_blog_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_blog_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_blog_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_blog_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_blog_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_blog_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<div class="blog-wrap col-md-12 clearfix">
				<?php
					$args = array(
						'ignore_sticky_posts' => 1,
						'posts_per_page'      => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-audio', 'post-format-video', 'post-format-gallery', 'post-format-image' )
							)
						),
					);
					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post();

							get_template_part( 'template-parts/content', 'blog' );

						endwhile;
				?>

					<a class="blog-item wow fadeIn" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" data-wow-delay=".5s">
						<?php printf( '<img src="%s">', esc_url( get_template_directory_uri() . '/images/blog-placeholder.png' ) ); ?>

						<div class="see-more-wrap">
							<div class="sm-container">
								<div class="sm-icon"><i class="fa fa-external-link"></i></div>
								<div class="sm-text"><?php echo Kirki::get_option( 'front_page_blog_module_view_more' ); ?></div>
							</div>
						</div><!-- .see-more-wrap -->
					</a><!-- .blog-item -->

				<?php
					} else {
						global $switch_portfolio_post;

						$switch_portfolio_post = 'post';

						get_template_part( 'template-parts/content', 'none' );
					}

					wp_reset_postdata();
				?>
			</div><!-- #blog-wrap -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</section><!-- #blog -->
