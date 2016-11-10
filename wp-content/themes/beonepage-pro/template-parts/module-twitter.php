<?php
/**
 * Module part for displaying twitter module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( Kirki::get_option( 'front_page_twitter_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( Kirki::get_option( 'front_page_twitter_module_bg' ) == 'image' && Kirki::get_option( 'front_page_twitter_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( Kirki::get_option( 'front_page_twitter_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . Kirki::get_option( 'front_page_twitter_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo Kirki::get_option( 'front_page_twitter_module_id' ); ?>" class="module twitter-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container-fluid">
		<div class="row row-nopadding">
			<div class="twitter-container text-center">
				<?php $animation = Kirki::get_option( 'front_page_twitter_twitter_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_twitter_twitter_animation' ) . '" data-wow-delay=".3s' : ''; ?>

				<div class="twitter-icon<?php echo $animation; ?>"><i class="fa fa-twitter"></i></div>

				<?php if ( class_exists( 'beOnePageTwitterModule' ) ) : ?>

					<?php
						$obj = new beOnePageTwitterModule;

						try {
							$tweets = $obj->getTweets();
						}

						catch ( Exception $e ) {
							if ( $e->getMessage() != '' ) {
								echo '<p>' . esc_html( 'Connection Timed Out', 'beonepage' ) . '</p>';
							} else {
								$tweets = $obj->getTweets();
							}
						}
					?>

					<?php if ( isset( $tweets['error'] ) ) : ?>
						<p><?php echo esc_html( $tweets['error'] ); ?></p>
					<?php elseif ( ! empty( $tweets ) ) : ?>
						<div class="tweet-container owl-carousel wow fadeIn" data-wow-delay=".3s">
							<?php foreach ( $tweets as $tweet ) : ?>
								<?php
									$text = $obj->link_replace( $tweet['text'] );
									$text = preg_replace( '/RT/', '<i class="fa fa-retweet"></i>', $text, 1 );
								?>

								<div class="tweet col-md-6 col-md-offset-3">
									<p><?php echo $text; ?></p>
									<span class="tweet-timestamp"><?php echo $obj->changeTimeFormat( strtotime( $tweet['timestamp'] ) ); ?></span>
								</div>
							<?php endforeach; ?> 
						</div><!-- .tweet-container -->
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( Kirki::get_option( 'front_page_twitter_btn_text' ) != '' ) : ?>
					<?php $animation = Kirki::get_option( 'front_page_twitter_btn_animation' ) != 'none' ? ' wow ' . Kirki::get_option( 'front_page_twitter_btn_animation' ) . '" data-wow-delay=".3s' : ''; ?>

					<div class="twitter-btn<?php echo $animation; ?>">
						<a href="<?php echo Kirki::get_option( 'front_page_twitter_btn_url' ); ?>" target="_blank" class="btn <?php echo Kirki::get_option( 'front_page_twitter_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><?php echo Kirki::get_option( 'front_page_twitter_btn_text' ); ?></a>
					</div><!-- .twitter-btn -->
				<?php endif; ?>
			</div><!-- .twitter-container -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</section><!-- #twitter -->