<?php
/**
 * Module part for displaying vertical promotion module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_ver_promo_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_ver_promo_module_bg' ) == 'image' && Kirki::get_option( 'front_page_ver_promo_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_ver_promo_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_ver_promo_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_ver_promo_module_id' ); ?>" class="module promo-box-ver-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<div class="promo-box-ver col-md-10 col-md-offset-1 text-center">
				<?php
					if ( Kirki::get_option( 'front_page_ver_promo_title' ) != '' ) {
						$animation = Kirki::get_option( 'front_page_ver_promo_title_animation' ) != 'none' ? ' class="wow ' . Kirki::get_option( 'front_page_ver_promo_title_animation' ) . '" data-wow-delay=".3s"' : '';

						echo '<h2' . $animation . '>' . strip_tags( html_entity_decode( Kirki::get_option( 'front_page_ver_promo_title' ) ), '<span>' ) . '</h2>';
					}
				?>

				<?php
					if ( Kirki::get_option( 'front_page_ver_promo_content' ) != '' ) {
						$animation = Kirki::get_option( 'front_page_ver_promo_content_animation' ) != 'none' ? ' class="wow ' . Kirki::get_option( 'front_page_ver_promo_content_animation' ) . '" data-wow-delay=".3s"' : '';

						echo '<p' . $animation . '>' . strip_tags( html_entity_decode( Kirki::get_option( 'front_page_ver_promo_content' ) ), '<span>' ) . '</p>';
					}
				?>

				<?php if ( Kirki::get_option( 'front_page_ver_promo_btn_text' ) != '' ) : ?>
					<?php $animation = Kirki::get_option( 'front_page_ver_promo_btn_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_ver_promo_btn_animation' ) . '" data-wow-delay=".3s' : ''; ?>

					<div class="promo-btn<?php echo $animation; ?>">
						<a href="<?php echo Kirki::get_option( 'front_page_ver_promo_btn_url' ); ?>" class="btn <?php echo Kirki::get_option( 'front_page_ver_promo_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><?php echo Kirki::get_option( 'front_page_ver_promo_btn_text' ); ?></a>
					</div><!-- .promo-btn -->
				<?php endif; ?>
			</div><!-- .promo-box-ver -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #promo-box-ver -->
