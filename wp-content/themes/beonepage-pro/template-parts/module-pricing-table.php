<?php
/**
 * Module part for displaying pricing table module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_pricing_table_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_pricing_table_module_bg' ) == 'image' && Kirki::get_option( 'front_page_pricing_table_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_pricing_table_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_pricing_table_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_pricing_table_module_id' ); ?>" class="module pricing-table-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php if ( Kirki::get_option( 'front_page_pricing_table_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_pricing_table_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_pricing_table_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_pricing_table_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_pricing_table_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_pricing_table_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<div class="pricing-table-container text-center clearfix">
				<?php
					$pricing_tables = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_pricing_table', true );
					$pricing_table_num = count( $pricing_tables );

					if ( $pricing_table_num < 4 ) {
						$col_md = 'col-md-4';
					} else {
						$col_md = 'col-md-3';
					}
				?>

				<?php if ( ! empty( $pricing_tables ) ) : ?>
					<?php foreach ( $pricing_tables as $pricing_table ) : ?>
						<div class="<?php echo esc_attr( $col_md ); ?> wow <?php echo isset( $pricing_table['animation'] ) && $pricing_table['animation'] != 'none' ? $pricing_table['animation'] : ''; ?>" data-wow-delay=".5s">
							<?php if ( isset( $pricing_table['pick'] ) && $pricing_table['pick'] == 'on' ) : ?>
								<div class="pb-featured">
									<span class="pb-star"><i class="fa fa-star"></i></span>
								</div><!-- pb-featured -->
							<?php endif; ?>

							<div class="pricing-item">
								<?php if ( isset( $pricing_table['title'] ) && $pricing_table['title'] != '' ) : ?>
									<h3 class="pb-heading"><?php echo $pricing_table['title']; ?></h3>
								<?php endif; ?>

								<div class="item-price<?php echo isset( $pricing_table['pick'] ) && $pricing_table['pick'] == 'on' ? ' pb-special-price' : ''; ?>">
									<div class="price-wrapper">
										<?php if ( isset( $pricing_table['currency'] ) && $pricing_table['currency'] != '' ) : ?>
											<span class="pb-currency"><?php echo $pricing_table['currency']; ?></span>
										<?php endif; ?>

										<?php if ( isset( $pricing_table['price'] ) && $pricing_table['price'] != '' ) : ?>
											<span class="pb-price"><?php echo $pricing_table['price']; ?></span>
										<?php endif; ?>
									</div>

									<?php if ( isset( $pricing_table['duration'] ) && $pricing_table['duration'] != '' ) : ?>
										<div class="pb-duration"><?php echo $pricing_table['duration']; ?></div>
									<?php endif; ?>
								</div><!-- item-price -->

								<?php if ( isset( $pricing_table['content'] ) && $pricing_table['content'] != '' ) : ?>
									<div class="pb-detail">
										<?php
											$items = explode( "\n", $pricing_table['content'] );

											echo '<ul>';

											foreach( $items as $item ) {
												if ( strpos( $item, '+' ) === 0 ) {
													$item = str_replace( '+', '<i class="fa fa-check-square-o"></i>', $item );
												} elseif ( strpos( $item, '-' ) === 0 ) {
													$item = str_replace( '-', '<i class="fa fa-times"></i>', $item );
												}

												echo '<li>' . str_replace( array( "\r", "\n" ), '' , $item ) . '</li>';
											}

											echo '</ul>';
										?>
									</div><!-- pb-detail -->
								<?php endif; ?>

								<a href="<?php echo isset( $pricing_table['btn_url'] ) && $pricing_table['btn_url'] != '' ? $pricing_table['btn_url'] : ''; ?>" class="btn <?php echo Kirki::get_option( 'front_page_pricing_table_module_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>">
									<?php echo isset( $pricing_table['btn_text'] ) && $pricing_table['btn_text'] != '' ? $pricing_table['btn_text'] : ''; ?>
								</a>
							</div><!-- pricing-item -->
						</div><!-- .col-md-* -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .pricing-table-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #pricing-table -->
