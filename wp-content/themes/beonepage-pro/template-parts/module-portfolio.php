<?php
/**
 * Module part for displaying portfolio module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_portfolio_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_portfolio_module_bg' ) == 'image' && Kirki::get_option( 'front_page_portfolio_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_portfolio_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_portfolio_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_portfolio_module_id' ); ?>" class="module portfolio-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container-fluid">
		<div class="row row-nopadding">
			<?php if ( Kirki::get_option( 'front_page_portfolio_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_portfolio_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_portfolio_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_portfolio_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_portfolio_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_portfolio_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php
				$tags = get_terms( 'portfolio_tag' );
				$count = count( $tags );
			?>

			<?php if ( ! is_wp_error( $tags ) && $count > 0 && Kirki::get_option( 'front_page_portfolio_module_filter' ) == '1'  ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_portfolio_module_filter_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_portfolio_module_filter_animation' ) . '" data-wow-delay=".3s' : ''; ?>

				<div id="portfolio-filter" class="col-md-12 text-center<?php echo $animation; ?>">
					<a href="#" class="active" data-filter="*">Ver Todos</a>

					<?php
						foreach ( $tags as $tag ) {
							$tag_name = str_replace( ' ', '-', strtolower( $tag->name ) );

							printf( '<a href="#" data-filter=".portfolio-tag-%1s">%2s</a>', $tag_name, $tag->name );
						}
					?>
				</div><!-- #portfolio-filter -->
			<?php endif; ?>

			<div id="portfolio-container" class="col-md-10 col-md-offset-1"></div>

			<div id="portfolio-loader">
				<i class="fa fa-spinner fa-pulse"></i>
			</div><!-- .portfolio-loader -->

			<div class="portfolio-wrap col-md-12 clearfix">
				<?php
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => -1
					);
					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post();

							get_template_part( 'template-parts/content', 'portfolio' );

						endwhile;
					} else {
						global $switch_portfolio_post;

						$switch_portfolio_post = 'portfolio';

						get_template_part( 'template-parts/content', 'none' );
					}

					wp_reset_postdata();
				?>
			</div><!-- #portfolio-wrap -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</section><!-- #portfolio -->
