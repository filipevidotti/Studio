<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeOnePage
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		<?php if ( Kirki::get_option( 'footer_site_title' ) == '1' || Kirki::get_option( 'footer_site_logo' ) == '1' ) : ?>
			<div class="site-branding col-md-12 clearfix">
				<?php if ( Kirki::get_option( 'footer_site_logo' ) == '1' ) : ?>
					<div class="site-logo wow <?php echo Kirki::get_option( 'footer_site_title_animation' ); ?>" data-wow-delay=".3s">
						<?php
							$site_logo_alt = get_post_meta( beonepage_get_attachment_id_by_url( Kirki::get_option( 'icon_logo_logo' ) ), '_wp_attachment_image_alt', true );
							$site_logo_alt = $site_logo_alt != '' ? $site_logo_alt : 'logo';

							if ( Kirki::get_option( 'icon_logo_retina_logo' ) != '' ) {
								$site_retina_logo_alt = get_post_meta( beonepage_get_attachment_id_by_url( Kirki::get_option( 'icon_logo_retina_logo' ) ), '_wp_attachment_image_alt', true );
								$site_retina_logo_alt = $site_retina_logo_alt != '' ? $site_retina_logo_alt : 'logo';
							}
						?>

						<img class="standard-logo" src="<?php echo Kirki::get_option( 'icon_logo_logo' ); ?>" alt="<?php echo esc_attr( $site_logo_alt ); ?>">

						<?php $site_retina_logo = Kirki::get_option( 'icon_logo_retina_logo' ) != '' ? Kirki::get_option( 'icon_logo_retina_logo' ) : Kirki::get_option( 'icon_logo_logo' ); ?>

						<img class="retina-logo" src="<?php echo $site_retina_logo; ?>" alt="<?php echo esc_attr( $site_retina_logo_alt ); ?>">
					</div><!-- .site-logo -->
				<?php endif; ?>

				<?php if ( Kirki::get_option( 'footer_site_title' ) == '1' ) : ?>
					<h1 class="site-title wow <?php echo Kirki::get_option( 'footer_site_title_animation' ); ?>" data-wow-delay=".3s"><?php bloginfo( 'name' ); ?></h1>
				<?php endif; ?>
			</div><!-- .site-branding -->
		<?php endif; ?>

		<?php if ( Kirki::get_option( 'footer_social_link' ) == '1' ) : ?>
			<div class="social-link col-md-12 wow <?php echo Kirki::get_option( 'footer_social_link_animation' ); ?>" data-wow-delay=".3s">
				<?php
					wp_nav_menu( array(
						'menu'           => 'secondary',
						'theme_location' => 'secondary',
						'container'      => false,
						'link_before'    => '<div>',
						'link_after'     => '</div>',
						'depth'          => 1,
						'walker'         => new beonepage_Walker_Nav_Menu,
						'fallback_cb'    => 'beonepage_Walker_Nav_Menu::fallback'
						)
					);
				?>
			</div><!-- .social-link -->
		<?php endif; ?>

		<div class="site-info col-md-12">
		
			<?php
				$byline = '';

				

				echo html_entity_decode( Kirki::get_option( 'footer_copyright' ) ) . $byline;
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php if ( Kirki::get_option( 'general_go_to_top' ) == '1' ) : ?>
		<div id="go-to-top" class="go-to-top btn <?php echo Kirki::get_option( 'general_go_to_top_btn_tyle' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><i class="fa fa-angle-up"></i></div>
	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
