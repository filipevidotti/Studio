<?php
/**
 * Module part for displaying icon service with image module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_icon_service_img_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_icon_service_img_module_bg' ) == 'image' && Kirki::get_option( 'front_page_icon_service_img_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_icon_service_img_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_icon_service_img_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_icon_service_img_module_id' ); ?>" class="module icon-service-img-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo Kirki::get_option( 'front_page_icon_service_img_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_icon_service_img_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_icon_service_img_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_icon_service_img_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_icon_service_img_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_icon_service_img_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_icon_service_img_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php
				$icon_service_img_boxes = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_icon_service_img_box', true );

				if ( ! empty( $icon_service_img_boxes ) ) {
					$len = count( $icon_service_img_boxes );
					$left_boxes = array_slice( $icon_service_img_boxes, 0, ceil( $len / 2 ) );
					$right_boxes = array_slice( $icon_service_img_boxes, floor( $len / 2 ) );
				}
			?>

			<?php if ( ! empty( $left_boxes ) ) : ?>
				<div class="left-icon-boxes col-md-4">
					<?php foreach ( $left_boxes as $left_box ) : ?>
						<div class="icon-service-box<?php echo isset( $left_box['animation'] ) && $left_box['animation'] != '' ? ' wow ' . $left_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
							<?php if ( isset( $left_box['url'] ) && $left_box['url'] != '' ) : ?>
								<a href="<?php echo $left_box['url']; ?>">
							<?php endif; ?>

							<div class="service-icon text-center">
								<i class="fa fa-<?php echo isset( $left_box['icon'] ) ? $left_box['icon'] : ''; ?>"></i>
							</div><!-- .service-icon -->

							<?php if ( isset( $left_box['title'] ) && $left_box['title'] != '' ) : ?>
								<h3 class="service-title"><?php echo $left_box['title']; ?></h3>
							<?php endif; ?>

							<?php if ( isset( $left_box['description'] ) && $left_box['description'] != '' ) : ?>
								<p class="service-content"><?php echo $left_box['description']; ?></p>
							<?php endif; ?>

							<?php if ( isset( $left_box['url'] ) && $left_box['url'] != '' ) : ?>
								</a>
							<?php endif; ?>

							<div class="spacer"></div>
						</div><!-- .icon-service-box -->
					<?php endforeach; ?> 
				</div><!-- .left-icon-boxes -->
			<?php endif; ?>

			<?php if ( Kirki::get_option( 'front_page_icon_service_img_module_img' ) != '' ) : ?>
				<?php $img_animation = Kirki::get_option( 'front_page_icon_service_img_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_icon_service_img_animation' ) . '" data-wow-delay=".5s' : ''; ?>

				<div class="icon-box-img col-md-4<?php echo $img_animation; ?>">
					<img src="<?php echo Kirki::get_option( 'front_page_icon_service_img_module_img' ); ?>">
				</div><!-- .icon-box-img -->
			<?php endif; ?>

			<?php if ( ! empty( $right_boxes ) ) : ?>
				<div class="right-icon-boxes col-md-4">
					<?php foreach ( $right_boxes as $right_box ) : ?>
						<div class="icon-service-box<?php echo isset( $right_box['animation'] ) && $right_box['animation'] != '' ? ' wow ' . $right_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
							<?php if ( isset( $right_box['url'] ) && $right_box['url'] != '' ) : ?>
								<a href="<?php echo $right_box['url']; ?>">
							<?php endif; ?>

							<div class="service-icon text-center">
								<i class="fa fa-<?php echo isset( $right_box['icon'] ) ? $right_box['icon'] : ''; ?>"></i>
							</div><!-- .service-icon -->

							<?php if ( isset( $right_box['title'] ) && $right_box['title'] != '' ) : ?>
								<h3 class="service-title"><?php echo $right_box['title']; ?></h3>
							<?php endif; ?>

							<?php if ( isset( $right_box['description'] ) && $right_box['description'] != '' ) : ?>
								<p class="service-content"><?php echo $right_box['description']; ?></p>
							<?php endif; ?>

							<?php if ( isset( $right_box['url'] ) && $right_box['url'] != '' ) : ?>
								</a>
							<?php endif; ?>

							<div class="spacer"></div>
						</div><!-- .icon-service-box -->
					<?php endforeach; ?> 
				</div><!-- .right-icon-boxes -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #icon-service -->
