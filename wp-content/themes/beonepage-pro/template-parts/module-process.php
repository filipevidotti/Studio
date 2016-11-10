<?php
/**
 * Module part for displaying process module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_process_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_process_module_bg' ) == 'image' && Kirki::get_option( 'front_page_process_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_process_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_process_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_process_module_id' ); ?>" class="module process-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_process_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_process_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_process_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_process_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_process_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_process_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php $processes = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_process', true ); ?>

			<div class="process-flow col-md-12">
				<ul class="process-label">
					<?php if ( ! empty( $processes ) ) : ?>
						<?php $i = 0; ?>

						<?php foreach ( $processes as $process ) : ?>
							<li data-order="<?php echo $i + 1; ?>" class="<?php echo $i == 0 ? 'process-active ' : ''; ?><?php echo isset( $process['animation'] ) && $process['animation'] != '' ? 'wow ' . $process['animation'] . '" data-wow-delay="' . $i * .5 . 's' : ''; ?>">
								<i class="fa fa-<?php echo isset( $process['icon'] ) ? $process['icon'] : ''; ?>"><i class="fa fa-<?php echo isset( $process['icon'] ) ? $process['icon'] : ''; ?> icon-clone"></i></i>

								<span data-active="<?php echo isset( $process['title'] ) ? $process['title'] : ''; ?>"><?php echo isset( $process['title'] ) ? $process['title'] : ''; ?></span>
							</li>

							<?php $i++; ?>
						<?php endforeach; ?> 
					<?php endif; ?>
				</ul><!-- .process-label -->

				<div class="line-process-container">
					<div class="line-process"></div>
				</div><!-- .line-process-container -->
			</div><!-- .process-flow -->

			<div class="process-container col-md-12 owl-carousel wow fadeIn" data-wow-delay=".5s">
				<?php if ( ! empty( $processes ) ) : ?>
					<?php foreach ( $processes as $process ) : ?>
						<div class="process-item">
							<p><?php echo isset( $process['description'] ) ? wpautop( $process['description'] ) : ''; ?></p>
						</div><!-- .process-item -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .process-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #process -->