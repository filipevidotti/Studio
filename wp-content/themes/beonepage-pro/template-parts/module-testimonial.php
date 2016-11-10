<?php
/**
 * Module part for displaying testimonial module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_testimonial_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_testimonial_module_bg' ) == 'image' && Kirki::get_option( 'front_page_testimonial_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_testimonial_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_testimonial_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_testimonial_module_id' ); ?>" class="module testimonial-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_testimonial_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_testimonial_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_testimonial_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_testimonial_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_testimonial_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_testimonial_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<div class="testimonial-container col-md-12 owl-carousel wow fadeIn" data-wow-delay=".5s">
				<?php $testimonials = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_testimonial', true ); ?>

				<?php if ( ! empty( $testimonials ) ) : ?>
					<?php foreach ( $testimonials as $testimonial ) : ?>
						<div class="testimonial-item col-md-12">
							<div class="testimonial-box">
								<blockquote>
									<p><?php echo isset( $testimonial['description'] ) ? $testimonial['description'] : ''; ?></p>
								</blockquote>

								<div class="testimonial-by">
									<div class="testimonial-img"><img src="<?php echo isset( $testimonial['img_url'] ) ? $testimonial['img_url'] : ''; ?>" alt="<?php echo isset( $testimonial['name'] ) ? $testimonial['name'] : ''; ?>"></div>
									<div class="testimonial-name"><?php echo isset( $testimonial['name'] ) ? $testimonial['name'] : ''; ?><span><?php echo isset( $testimonial['addition'] ) ? $testimonial['addition'] : ''; ?></span></div>
								</div><!-- .testimonial-by -->
							</div><!-- .testimonial-box -->
						</div><!-- .testimonial-item -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .testimonial-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #testimonial -->
