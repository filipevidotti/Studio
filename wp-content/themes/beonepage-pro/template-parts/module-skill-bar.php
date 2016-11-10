<?php
/**
 * Module part for displaying skill bar module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_skill_bar_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_skill_bar_module_bg' ) == 'image' && Kirki::get_option( 'front_page_skill_bar_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_skill_bar_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_skill_bar_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_skill_bar_module_id' ); ?>" class="module skill-bar-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_skill_bar_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_skill_bar_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_skill_bar_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_skill_bar_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_skill_bar_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_skill_bar_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php $animation = Kirki::get_option( 'front_page_skill_bar_module_text_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_skill_bar_module_text_animation' ) . '" data-wow-delay=".5s' : ''; ?>

			<div class="content-box col-sm-6<?php echo $animation; ?>">
				<?php echo html_entity_decode( Kirki::get_option( 'front_page_skill_bar_module_text' ) ); ?>
			</div><!-- .content-box -->

			<?php $skill_bars = Kirki::get_option( 'front_page_skill_bar_module_skill_bar' ); ?>

			<?php if ( ! empty( $skill_bars ) ) : ?>
				<div id="skill-bar" class="skill-bar-container col-sm-6">
					<?php $i = 0; ?>

					<?php foreach ( $skill_bars as $skill_bar ) : ?>
						<?php
							$skill_bar_label = isset( $skill_bar['skill_bar_label'] ) && ! empty( $skill_bar['skill_bar_label'] ) ? $skill_bar['skill_bar_label'] : '';
							$skill_bar_pct = isset( $skill_bar['skill_bar_pct'] ) && ! empty( $skill_bar['skill_bar_pct'] ) ? $skill_bar['skill_bar_pct'] : '';
							$skill_bar_pct = preg_replace( '/[^0-9]/', '', $skill_bar_pct );
						?>

						<div class="skill-bar wow fadeInUp" data-wow-delay="<?php echo $i * .3 . 's'; ?>">
							<h3><?php echo $skill_bar_label; ?></h3>

							<div class="bar-line">
								<div class="line-active">
									<span class="bar-timer" data-to="<?php echo $skill_bar_pct; ?>" data-speed="3000"><?php echo $skill_bar_pct; ?></span>
								</div>
							</div>
						</div>
						<?php $i++; ?>
					<?php endforeach; ?> 
				</div><!-- .skill-bar -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #skill-bar -->
