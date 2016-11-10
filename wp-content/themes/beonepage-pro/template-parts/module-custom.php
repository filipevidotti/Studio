<?php
/**
 * Module part for displaying custom module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_custom_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_custom_module_bg' ) == 'image' && Kirki::get_option( 'front_page_custom_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_custom_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_custom_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_custom_module_id' ); ?>" class="module custom-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo Kirki::get_option( 'front_page_custom_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_custom_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_custom_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_custom_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_custom_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_custom_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_custom_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<div class="content-box col-md-12">
				<?php echo do_shortcode( html_entity_decode( Kirki::get_option( 'front_page_custom_module_content' ) ) ); ?>
			</div><!-- .content-box -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #custom -->
