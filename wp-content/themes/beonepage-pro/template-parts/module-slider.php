<?php
/**
 * Module part for displaying slider module.
 *
 * @package BeOnePage
 */
?>

<?php if ( Kirki::get_option( 'front_page_slider_type' ) == '1' ) : ?>
	<section id="slider" class="slider text-slider<?php echo Kirki::get_option( 'front_page_text_slider_parallax' ) == '1' ? ' slider-parallax' : ''; ?> full-screen nopadding clearfix">
		<div class="slider-wrapper">
			<div class="slider-caption text-center clearfix">
				<?php
					if ( Kirki::get_option( 'front_page_text_slider_title' ) != '' ) {
						echo '<h1>' . strip_tags( html_entity_decode( Kirki::get_option( 'front_page_text_slider_title' ) ), '<span>' ) . '</h1>';
					}
				?>

				<?php
					if ( Kirki::get_option( 'front_page_text_slider_content' ) != '' ) {
						echo '<p>' . strip_tags( html_entity_decode( Kirki::get_option( 'front_page_text_slider_content' ) ), '<span>' ) . '</p>';
					}
				?>

				<?php if ( Kirki::get_option( 'front_page_text_slider_btn_text' ) != '' ) : ?>
					<div class="slider-btn">
						<a href="<?php echo Kirki::get_option( 'front_page_text_slider_btn_url' ); ?>" class="btn <?php echo Kirki::get_option( 'front_page_text_slider_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><?php echo Kirki::get_option( 'front_page_text_slider_btn_text' ); ?></a>
					</div><!-- .slider-btn -->
				<?php endif; ?>
			</div><!-- .slider-caption -->
		</div><!-- .slider-wrapper -->

		<?php if ( Kirki::get_option( 'front_page_text_slider_scroll_down' ) == '1' ) : ?>
			<div class="scroll-down wow bounce" data-wow-delay="2s"></div>
		<?php endif; ?>
	</section><!-- #slider -->
<?php else : ?>
	<section id="slider" class="slider swiper-slider<?php echo Kirki::get_option( 'front_page_swiper_slider_parallax' ) == '1' ? ' slider-parallax' : ''; ?> full-screen nopadding clearfix">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php $slides = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_swiper_slider', true ); ?>

				<?php if ( ! empty( $slides ) ) : ?>
					<?php foreach ( $slides as $slide ) : ?>
						<?php
							$img_url = isset( $slide['img_url'] ) ? $slide['img_url'] : '';
							$video_url = isset( $slide['video_url'] ) ? $slide['video_url'] : '';
						?>

						<div class="swiper-slide" style="background-image: url('<?php echo $img_url; ?>')">
							<?php if ( $slide['type'] == 'video' && $video_url != '' && ! wp_is_mobile() ) : ?>
								<div class="yt-bg-player" data-yt-video="<?php echo $video_url; ?>">
							<?php endif; ?>

								<div class="slider-caption text-center clearfix">
									<?php if ( isset( $slide['title'] ) && $slide['title'] != '' ) : ?>
										<h1 data-animation="<?php echo isset( $slide['title_animation'] ) ? $slide['title_animation'] : ''; ?>" data-animation-delay="500"><?php echo $slide['title']; ?></h1>
									<?php endif; ?>

									<?php if ( isset( $slide['description'] ) && $slide['description'] != '' ) : ?>
										<p data-animation="<?php echo isset( $slide['description_animation'] ) ? $slide['description_animation'] : ''; ?>" data-animation-delay="250"><?php echo $slide['description']; ?></p>
									<?php endif; ?>

									<?php if ( isset( $slide['btn_text'] ) && $slide['btn_text'] != '' ) : ?>
										<div class="slider-btn" data-animation="<?php echo isset( $slide['btn_animation'] ) ? $slide['btn_animation'] : ''; ?>" data-animation-delay="500">
											<a href="<?php echo isset( $slide['btn_url'] ) && $slide['btn_url'] != '' ? $slide['btn_url'] : ''; ?>" class="btn <?php echo Kirki::get_option( 'front_page_swiper_slider_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $slide['btn_text']; ?></a>
										</div><!-- .slider-btn -->
									<?php endif; ?>
								</div><!-- .slider-caption -->

							<?php if ( $slide['type'] == 'video' && $video_url != '' && ! wp_is_mobile() ) : ?>
								</div><!-- .yt-bg-player -->
							<?php endif; ?>	
						</div><!-- .swiper-slide -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .swiper-wrapper -->

			<div id="slider-arrow-left"><i class="fa fa-chevron-left"></i></div>
			<div id="slider-arrow-right"><i class="fa fa-chevron-right"></i></div>

			<div id="slide-number">
				<div id="slide-number-current"></div><span><?php echo esc_html( '/'); ?></span><div id="slide-number-total"></div>
			</div><!-- #slide-number -->
		</div><!-- .swiper-container -->

		<?php if ( Kirki::get_option( 'front_page_swiper_slider_scroll_down' ) == '1' ) : ?>
			<div class="scroll-down wow bounce" data-wow-delay="2s"></div>
		<?php endif; ?>
	</section><!-- #slider -->
<?php endif; ?>
