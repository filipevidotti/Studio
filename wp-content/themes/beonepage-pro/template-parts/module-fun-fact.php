<?php
/**
 * Module part for displaying fun fact module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_fun_fact_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_fun_fact_module_bg' ) == 'image' && Kirki::get_option( 'front_page_fun_fact_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_fun_fact_module_id' ); ?>" class="sm-section module fun-fact-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo Kirki::get_option( 'front_page_fun_fact_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<div id="fun-fact" class="fun-fact-container wow fadeIn clearfix" data-wow-delay=".3s">
				<?php $facts = Kirki::get_option( 'front_page_fun_fact_module_fact' ); ?>

				<?php if ( ! empty( $facts ) ) : ?>
					<?php foreach ( $facts as $fact ) : ?>
						<?php
							$fact_label = isset( $fact['fact_label'] ) && ! empty( $fact['fact_label'] ) ? $fact['fact_label'] : '';
							$fact_number = isset( $fact['fact_num'] ) && ! empty( $fact['fact_num'] ) ? $fact['fact_num'] : '';
							$fact_number = preg_replace( '/[^0-9]/', '', $fact_number );
						?>

						<div class="fact-item <?php echo Kirki::get_option( 'front_page_fun_fact_module_layout' ) == 'fixed' ? 'col-md-3' : 'col-lg-2 col-md-4'; ?> col-sm-4 col-xs-6 text-center">
							<div class="fact-number" data-to="<?php echo $fact_number; ?>" data-speed="3000"><?php echo $fact_number; ?></div>
							<div class="fact-text"><?php echo $fact_label; ?></div>
						</div><!-- .fun-item -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- #fun-fact -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #fun-fact -->
