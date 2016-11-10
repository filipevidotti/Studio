<?php
/**
 * Module part for displaying icon service module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_icon_service_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_icon_service_module_bg' ) == 'image' && Kirki::get_option( 'front_page_icon_service_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_icon_service_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_icon_service_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_icon_service_module_id' ); ?>" class="module icon-service-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo Kirki::get_option( 'front_page_icon_service_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_icon_service_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_icon_service_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_icon_service_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_icon_service_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_icon_service_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_icon_service_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php $icon_service_boxes = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_icon_service_box', true ); ?>

			<?php if ( ! empty( $icon_service_boxes ) ) : ?>
				<?php foreach ( $icon_service_boxes as $icon_service_box ) : ?>
					<?php
						if ( Kirki::get_option( 'front_page_icon_service_module_layout' ) == 'fixed' ) {
							$width = 'col-md-4';
						} else {
							$width = 'col-md-3';
						}
					?>

					<div class="icon-service-box <?php echo $width; ?> text-center<?php echo isset( $icon_service_box['animation'] ) && $icon_service_box['animation'] != '' ? ' wow ' . $icon_service_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
						<?php if ( isset( $icon_service_box['url'] ) && $icon_service_box['url'] != '' ) : ?>
							<a href="<?php echo $icon_service_box['url']; ?>">
						<?php endif; ?>

						<div class="service-icon">
							<i class="fa fa-<?php echo isset( $icon_service_box['icon'] ) ? $icon_service_box['icon'] : ''; ?>"></i>
						</div><!-- .service-icon -->

						<?php if ( isset( $icon_service_box['title'] ) && $icon_service_box['title'] != '' ) : ?>
							<h3 class="service-title"><?php echo $icon_service_box['title']; ?></h3>
						<?php endif; ?>

						<?php if ( isset( $icon_service_box['description'] ) && $icon_service_box['description'] != '' ) : ?>
							<p class="service-content"><?php echo $icon_service_box['description']; ?></p>
						<?php endif; ?>

						<?php if ( isset( $icon_service_box['url'] ) && $icon_service_box['url'] != '' ) : ?>
							</a>
						<?php endif; ?>

						<div class="spacer"></div>
					</div><!-- .icon-service-box -->
				<?php endforeach; ?> 
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #icon-service -->
