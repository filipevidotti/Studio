<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeOnePage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix' ) ); ?>>
	<header class="entry-header">
		<?php $images = beonepage_get_post_images( $post->ID ); ?>

		<?php if ( get_post_meta( $post->ID, '_beonepage_option_post_embed_src', true ) == 'audio' ) : ?>
			<div class="entry-audio aligncenter embed-responsive embed-responsive-16by9">
				<?php echo wp_oembed_get( get_post_meta( $post->ID, '_beonepage_option_post_embed_audio_url', true ) ); ?>
			</div><!--.entry-audio -->
		<?php elseif ( get_post_meta( $post->ID, '_beonepage_option_post_embed_src', true ) == 'video' ) : ?>
			<div class="entry-video aligncenter embed-responsive embed-responsive-16by9">
				<?php echo wp_oembed_get( get_post_meta( $post->ID, '_beonepage_option_post_embed_video_url', true ) ); ?>
			</div><!--.entry-video -->
		<?php elseif ( count( $images ) > 1 ) : ?>
			<div class="entry-gallery text-center">
				<div id="master" class="fslider">
					<div class="slider-wrap" data-lightbox="gallery">
						<?php foreach ( $images as $image ) : ?>
							<?php
								$image_md_url = wp_get_attachment_image_src( $image->ID, 'gallery-thumb' );
								$image_lg_url = wp_get_attachment_image_src( $image->ID, 'full' );
							?>

							<div class="slide">
								<a href="<?php echo $image_lg_url[0]; ?>" data-lightbox="gallery-item"><img src="<?php echo $image_md_url[0]; ?>" alt="<?php echo $image->post_title; ?>" /></a>
							</div><!--.slide -->
						<?php endforeach; ?>
					</div>
				</div><!--#master -->

				<div id="slave" class="fslider" data-item-width="100" data-item-margin="3">
					<div class="slider-wrap">
						<?php
							$i = 0;
							foreach ( $images as $image ) :
						?>
							<?php $image_sm_url = wp_get_attachment_image_src( $image->ID, 'gallery-thumb-sm' ); ?>

							<div class="slide" data-animate="zoomIn" data-wow-delay="<?php echo $i . 'ms'; ?>">
								<img src="<?php echo $image_sm_url[0]; ?>" alt="<?php echo $image->post_title; ?>" />
							</div><!--.slide -->
						<?php
							$i += 200;
							endforeach;
						?>
					</div>
				</div><!--#slave -->
			</div><!--.entry-gallery -->
		<?php elseif ( has_post_thumbnail() ) : ?>
			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
			?>

			<div class="entry-image">
				<a href="<?php echo esc_url( $thumb_url[0] ); ?>" data-lightbox="image"><?php echo get_the_post_thumbnail( null, 'full', array( 'class' => 'image-fade' ) ); ?></a>
			</div><!--.entry-image -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php beonepage_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beonepage' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php beonepage_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
