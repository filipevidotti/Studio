<?php
/**
 * Template part for displaying blog posts.
 *
 * @package BeOnePage
 */
?>

<a class="blog-item wow fadeIn" href="<?php echo esc_url( get_permalink() ); ?>" data-wow-delay=".5s">
	<div class="entry-media">
		<?php $images = beonepage_get_post_images( $post->ID ); ?>

		<?php if ( get_post_meta( $post->ID, '_beonepage_option_post_embed_src', true ) == 'audio' ) : ?>
			<div class="entry-audio aligncenter embed-responsive embed-responsive-4by3">
				<?php echo wp_oembed_get( get_post_meta( $post->ID, '_beonepage_option_post_embed_audio_url', true ) ); ?>
			</div><!--.entry-audio -->
		<?php elseif ( get_post_meta( $post->ID, '_beonepage_option_post_embed_src', true ) == 'video' ) : ?>
			<div class="entry-video aligncenter embed-responsive embed-responsive-4by3">
				<?php echo wp_oembed_get( get_post_meta( $post->ID, '_beonepage_option_post_embed_video_url', true ) ); ?>
			</div><!--.entry-video -->
		<?php elseif ( count( $images ) > 1 ) : ?>
			<div class="entry-gallery fslider">
				<div class="slider-wrap" data-lightbox="gallery">
					<?php foreach ( $images as $image ) : ?>
						<?php
							$image_url = wp_get_attachment_image_src( $image->ID, 'gallery-thumb' );
							$image_lg_url = wp_get_attachment_image_src( $image->ID, 'full' );
						?>

						<div class="slide">
							<img src="<?php echo $image_url[0]; ?>" alt="<?php echo $image->post_title; ?>" />
						</div><!--.slide -->
					<?php endforeach; ?>
				</div>
			</div><!--.entry-gallery -->
		<?php else : ?>
			<?php the_post_thumbnail( 'gallery-thumb' ); ?>
		<?php endif; ?>

		<div class="entry-publish-date">
			<span class="post-date-day"><?php echo esc_html( get_the_date( 'd', $post->ID ) ); ?></span>
			<span class="post-date-month"><?php echo esc_html( get_the_date( 'M', $post->ID ) ); ?></span>
		</div><!-- .entry-publish-date -->

		<div class="read-more">
			<?php echo Kirki::get_option( 'front_page_blog_module_read_more' ); ?>
		</div><!-- .read-more -->
	</div><!-- .entry-media -->

	<div class="entry-meta">
		<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>

		<?php if ( beonepage_categorized_blog() ) : ?>
			<div class="entry-cats">
				<?php
					$categories_list = get_the_category();

					if ( $categories_list ) {
						$i = 1;
						$c = count( $categories_list );

						foreach( $categories_list as $category ) {
							if ( $i == 1 ) {
								if ( $c == 1 ) {
									printf( esc_html__( 'Posted in %1$s', 'beonepage' ), $category->cat_name );
								} else {
									printf( esc_html__( 'Posted in %1$s, ', 'beonepage' ), $category->cat_name );
								}
							} else if ( $i < $c ) {
								echo $category->cat_name . esc_html__( ', ', 'beonepage' );
							} else {
								echo $category->cat_name;
							}

							$i++;
						}
					}
				?>
			</div><!-- .entry-cats -->
		<?php endif; ?>
	</div><!-- .entry-meta -->
</a><!-- .blog-item -->
