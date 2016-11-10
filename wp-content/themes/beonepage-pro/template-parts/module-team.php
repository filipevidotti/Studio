<?php
/**
 * Module part for displaying team module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_team_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_team_module_bg' ) == 'image' && Kirki::get_option( 'front_page_team_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_team_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_team_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_team_module_id' ); ?>" class="module team-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row"> 
			<?php if ( Kirki::get_option( 'front_page_team_module_title' ) != '' ) : ?>
				<?php $animation = Kirki::get_option( 'front_page_team_module_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_team_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( Kirki::get_option( 'front_page_team_module_title' ) ), '<span>' ); ?></h2>

					<?php if ( Kirki::get_option( 'front_page_team_module_subtitle' ) != '' ) : ?>
						<p><?php echo Kirki::get_option( 'front_page_team_module_subtitle' ); ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>
	<div class="team-container col-md-12 wow fadeIn" data-wow-delay=".5s" style="margin-bottom:30px; margin-top:30px">		
<div class="col-md-3">
	<img src="http://www.agenciagpweb.com.br/teste/01/wp-content/uploads/2015/11/Fred.jpg" width="100%">
</div>
<div class="col-md-9" >
<h3 class="member-name">FRED CHAMONE</h3>
<p>
Guitarrista, compositor, produtor audiovisual, engenheiro de estúdio e arranjador. Estudou música com diversos professores, cursou Engenharia de Som e sempre participa de workshops com grandes nomes do mercado. Desde 2003, quando montou seu primeiro home estúdio até hoje, foram mais de 100 artistas produzidos. Em 2010 foi contemplado nacionalmente pela Fundação Itaú Cultural na categoria Música Homenagem.  Ao longo de sua carreira, tocou em diversas bandas e com diferentes artistas. Participou de gravações como instrumentista em grandes estúdios, trabalhou com grandes produtores como Tadeu Patola (Charlie Brown Jr.), Paulo Anhaia (Rita Lee, CPM 22), Alexandre Calango (Jota Quest), Augusto Nogueira, entre outros.
</p>
</div>

</div>
			<div class="team-container col-md-12 owl-carousel wow fadeIn" data-wow-delay=".5s">
				<?php $members = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_team', true ); ?>

				<?php if ( ! empty( $members ) ) : ?>
					<?php foreach ( $members as $member ) : ?>
						<div class="team-member col-md-12">
							<div class="member-image">
								<img src="<?php echo $member['img_url']; ?>" alt="<?php echo isset( $member['name'] ) ? $member['name'] : ''; ?>">
							</div><!-- .member-image -->

							<div class="member-card">
								<?php if ( isset( $member['name'] ) ) : ?>
									<h3 class="member-name"><?php echo $member['name']; ?></h3>
								<?php endif; ?>

								<?php if ( isset( $member['title'] ) ) : ?>
									<p class="member-title"><?php echo $member['title']; ?></p>
								<?php endif; ?>
							</div><!-- .member-card -->

							<div class="member-profile">
								<?php if ( isset( $member['bio'] ) ) : ?>
									<div class="member-bio">
										<?php echo wpautop( $member['bio'] ); ?>
									</div><!-- .member-bio -->
								<?php endif; ?>

								<ul class="member-social">
									<?php 
										for ( $i = 1; $i <= 4; $i++ ) {
											if ( isset( $member['social_label_' . $i] ) && isset( $member['social_url_' . $i] ) && $member['social_label_' . $i] != '' ) {
												$social_label = strtolower( str_replace( ' ', '-', $member['social_label_' . $i] ) );
												$social_link = $member['social_url_' . $i];

												echo '<li><a href="' . $social_link . '"><i class="fa fa-' . $social_label . '"></i></a></li>';
											}
										}
									?> 
								</ul><!-- .member-social -->
							</div><!-- .member-profile -->
						</div><!-- .team-member -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .team-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #team -->