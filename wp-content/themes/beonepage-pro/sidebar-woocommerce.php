<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package BeOnePage
 */

if ( ! is_active_sidebar( 'sidebar-woocommerce' ) ) {
	return;
}
?>

<div class="col-md-3">
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
	</div><!-- #secondary -->
</div><!-- .col-md-3 -->
