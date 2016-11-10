<?php
/**
 * Module part for displaying widget module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_widget_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_widget_module_bg' ) == 'image' && Kirki::get_option( 'front_page_widget_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_widget_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_widget_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_widget_module_id' ); ?>" class="module widget-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo Kirki::get_option( 'front_page_widget_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_widget_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_widget_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_widget_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_widget_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_widget_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_widget_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php $widgets = Kirki::get_option( 'front_page_widget_module_widget' ); ?>

			<?php if ( ! empty( $widgets ) ) : ?>
				<?php foreach ( $widgets as $widget ) : ?>
					<div class="widget-area col-md-12">
						<?php dynamic_sidebar( $widget['widget_name'] ); ?>
					</div><!-- .widget-area -->
				<?php endforeach; ?> 
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #widget -->
