<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BeOnePage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			<div class="entry-gallery fslider">
				<div class="slider-wrap" data-lightbox="gallery">
					<?php foreach ( $images as $image ) : ?>
						<?php
							$image_thumb_url = wp_get_attachment_image_src( $image->ID, 'gallery-thumb' );
							$image_lg_url = wp_get_attachment_image_src( $image->ID, 'full' );
						?>

						<div class="slide">
							<a id="gallery-item" data-lightbox="gallery-item" href="<?php echo $image_lg_url[0]; ?>"><img src="<?php echo $image_thumb_url[0]; ?>" alt="<?php echo $image->post_title; ?>" /></a>
						</div><!--.slide -->
					<?php endforeach; ?>
				</div>
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
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-publish-date">
			<span class="post-date-day"><?php echo esc_html( get_the_date( 'd', $post->ID ) ); ?></span>
			<span class="post-date-month"><?php echo esc_html( get_the_date( 'M', $post->ID ) ); ?></span>
		</div><!-- .entry-publish-date -->

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .entry-excerpt -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php printf( '<a href="%1$s" class="btn-more">%2$s</a>', get_the_permalink(), Kirki::get_option( 'blog_page_read_more' ) ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
