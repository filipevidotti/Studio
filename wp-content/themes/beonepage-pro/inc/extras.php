<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BeOnePage
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function beonepage_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class for front page.
	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'beonepage_body_classes' );

/**
 * Get theme version.
 *
 * @return string $theme_version The theme version.
 */
function beonepage_get_version() {
	$theme_info = wp_get_theme();

	// If it's a child theme, then get parent theme.
	if ( is_child_theme() ) {
		$theme_info = wp_get_theme( $theme_info->parent_theme );
	}

	$theme_version = $theme_info->display( 'Version' );

	return $theme_version;
}

/**
 * Register the required plugins for this theme.
 *
 * @link https://github.com/TGMPA/TGM-Plugin-Activation
 */
function beonepage_register_required_plugins() {
	// Required plugin.
	$plugins = array(
		array(
			'name'               => 'BeOnePage Pro Plugin',
			'slug'               => 'beonepage-pro-plugin',
			'source'             => get_template_directory_uri() . '/plugins/beonepage-pro-plugin.zip',
			'required'           => true,
			'version'            => '1.1.2',
			'force_activation'   => true,
			'force_deactivation' => true
		),
	);

	// Array of configuration settings.
	$config = array(
		'id'           => 'beonepage_tgmpa',
		'default_path' => '',
		'menu'         => 'beonepage-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'is_automatic' => true
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'beonepage_register_required_plugins' );

/**
 * Only show blog posts and products in search results.
 *
 * @param array $query The WP_Query object.
 */

function beonepage_search_filter( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
		if ( isset( $query->query['post_type'] ) ) {
			$wc_post_type = 'product';
		} else {
			$wc_post_type = '';
		}

		if ( $query->is_search && ( $post_type = '' || $wc_post_type != 'product' ) ) {
			$query->set( 'post_type', array( 'post' ) );
		}
	}
}
add_filter( 'pre_get_posts', 'beonepage_search_filter' );

/**
 * Get the current URL of the page being viewed.
 *
 * @global object $wp
 * @return string $current_url Current URL.
 */
function beonepage_get_current_url() {
	global $wp;

	if ( empty( $_SERVER['QUERY_STRING'] ) )
		$current_url = trailingslashit( home_url( $wp->request ) );
	else
		$current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', trailingslashit( home_url( $wp->request ) ) );

	return $current_url;
}

/**
 * Filter to remove thumbnail image dimension attributes.
 *
 * @return string $html The HTML codes without width and height attributes.
 */
function beonepage_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );

    return $html;
}
add_filter( 'post_thumbnail_html', 'beonepage_remove_thumbnail_dimensions', 10, 3 );

/**
 * Change the excerpt length.
 */
function beonepage_custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'beonepage_custom_excerpt_length', 999 );

/**
 * Change the excerpt more string at the end.
 */
function beonepage_new_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'beonepage_new_excerpt_more' );

/**
 * Include the Portfolio details template.
 */
function beonepage_ajax_portfolio() {
	get_template_part( 'template-parts/content', 'ajax-portfolio' );

	wp_die();
}
add_action( 'wp_ajax_ajax_portfolio', 'beonepage_ajax_portfolio' );
add_action( 'wp_ajax_nopriv_ajax_portfolio', 'beonepage_ajax_portfolio' );

/**
 * Add page loading transition.
 *
 * @param array $classes
 * @return array $classes
 */
if ( kirki_get_option( 'general_page_transition' ) == '1' ) {
	// Add page loading transition class to body.
	function beonepage_add_animsition_class( $classes ) {
		$classes[] = 'animsition';

			return $classes;
	}
	add_filter( 'body_class', 'beonepage_add_animsition_class' );

	// Enqueue styles and script for page loading transition.
	function beonepage_add_animsition_style_script() {
		wp_enqueue_style( 'beonepage-spinner-style', get_template_directory_uri() . '/layouts/loaders.css', array(), '20150816' );
		wp_enqueue_style( 'beonepage-animsition-style', get_template_directory_uri() . '/layouts/animsition.min.css', array(), '4.0.0' );
		wp_enqueue_script( 'beonepage-animsition-script', get_template_directory_uri() . '/js/animsition.min.js', array(), '4.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'beonepage_add_animsition_style_script' );
}

/**
 * Get attachment ID by URL.
 *
 * @param string $url The URL to resolve.
 * @return int $post_id The found post ID.
 */
function beonepage_get_attachment_id_by_url( $url ) {
	global $wpdb;

	$dir = wp_upload_dir();
	$path = $url;

    if ( strpos( $path, $dir['baseurl'] . '/' ) === 0 ) {
		$path = substr( $path, strlen( $dir['baseurl'] . '/' ) );
    }

    $sql = $wpdb->prepare(
		"SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' AND meta_value = %s",
		$path
    );

    $post_id = $wpdb->get_var( $sql );

    if ( !empty( $post_id ) ) {
		return (int) $post_id;
    }
}

/**
 * Send mail using wp_mail().
 */
function beonepage_contact_send_message() {
	if ( ! wp_verify_nonce( $_POST['ajax_contact_form_nonce'], 'ajax_contact_form' ) ) {
		$msg = array( 'error' => __( 'Verification error. Try again!', 'beonepage' ) );
	} else {
		$to       = get_option( 'admin_email' );
		$name     = sanitize_text_field( $_POST['name'] );
		$email    = sanitize_email( $_POST['email'] );
		$phone    = sanitize_text_field( $_POST['phone'] );
		$subject  = sanitize_text_field( $_POST['subject'] );
		$message  = sanitize_text_field( $_POST['message'] );
		$headers  = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
		$headers .= "Reply-To: $email\r\n";

		if ( $phone != '' ) {
			$subject .= ', from: ' . $name . ', ' . __( 'phone', 'beonepage' ) . ': ' . $phone ;
		}

		// Send the email using wp_mail().
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			$msg = array( 'success' => __( 'Thank you. The Mailman is on his way!', 'beonepage' ) );
		} else {
			$msg = array( 'error' => __( "Sorry, don't know what happened. Try later!", 'beonepage' ) );
		}
	}

	wp_send_json( $msg );
}
add_action( 'wp_ajax_contact_form', 'beonepage_contact_send_message' );
add_action( 'wp_ajax_nopriv_contact_form', 'beonepage_contact_send_message' );

/**
 * MailChimp subscribe.
 */
if ( class_exists( 'beOnePageProPlugin' ) ) {
	function beonepage_mailchimp_subscribe() {
		if ( ! wp_verify_nonce( $_POST['ajax_subscribe_form_nonce'], 'ajax_subscribe_form' ) ) {
			$msg = array( 'error' => __( 'Verification error. Try again!', 'beonepage' ) );
		} elseif ( Kirki::get_option( 'front_page_subscribe_mailchimp_api' ) == '' || Kirki::get_option( 'front_page_subscribe_mailchimp_list' ) == '' ) {
			$msg = array( 'error' => __( 'Not properly configured, please check your settings.', 'beonepage' ) );
		} else {
			$api_key = Kirki::get_option( 'front_page_subscribe_mailchimp_api' );
			$list_id = Kirki::get_option( 'front_page_subscribe_mailchimp_list' );

			$mailchimp = new Mailchimp( $api_key );

			try {
				$subscriber = $mailchimp->lists->subscribe( $list_id, array( 'email' => sanitize_email( $_POST['email'] ) ) );
			}

			catch ( Exception $e ) {
				$result = $e->getMessage();
			}

			if ( ! empty( $subscriber['leid'] ) ) {
				$msg = array( 'success' => __( 'Thanks, we will be in touch!', 'beonepage' ) );
			} else {
				$msg = array( 'error' => $result );
			}
		}

		wp_send_json( $msg );
	}
	add_action( 'wp_ajax_subscribe_form', 'beonepage_mailchimp_subscribe' );
	add_action( 'wp_ajax_nopriv_subscribe_form', 'beonepage_mailchimp_subscribe' );
}

/**
 * Add numeric pagination.
 */
function beonepage_numeric_pagination( $pages = '', $range = 2 ) {
     $showitems = ( $range * 2 ) + 1;

     global $paged;

     if ( empty( $paged ) ) $paged = 1;

     if ( $pages == '' ) {
		global $wp_query;

		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( $pages != 1 ) {
		echo '<nav class="posts-navigation text-center hidden-xs clearfix" role="navigation">';
		echo '<ul>';

		if( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo '<li><a href=' . get_pagenum_link( 1 ) . '>' . esc_html__( 'First', 'beonepage' ) . '</a></li>';
		}

		if( $paged > 1 && $showitems < $pages ) {
			echo '<li><a href=' . get_pagenum_link( $paged - 1 ) . '>' . esc_html__( 'Prev', 'beonepage' ) . '</a></li>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<li class="active"><a href=' . get_pagenum_link( $i ) . '>' . $i . '</a></li>' : '<li><a href=' . get_pagenum_link( $i ) . '>' . $i . '</a></li>';
			}
		}

		if ( $paged < $pages && $showitems < $pages) {
			echo '<li><a href=' . get_pagenum_link( $paged + 1 ) . '>' . esc_html__( 'Next', 'beonepage' ) . '</a></li>';
		}

		if ( $paged < $pages - 1 &&  $pages > $paged + $range - 1 && $showitems < $pages ) {
			echo '<li><a href=' . get_pagenum_link( $pages ) . '>' . esc_html__( 'Last', 'beonepage' ) . '</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
	}
}

/**
 * Get images attached to post.
 *
 * @param int $post_id The post ID.
 * @return array $images The image posts.
 */
function beonepage_get_post_images( $post_id ) {
	$args = array();
	$defaults = array(
		'numberposts'    => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_mime_type' => 'image',
		'post_parent'    =>  $post_id,
		'post_type'      => 'attachment',
	);

	$args = wp_parse_args( $args, $defaults );
	$images = get_posts( $args );

	return $images;
}

/**
 * Set/unset post formats.
 *
 * @param int $post_id The post ID.
 */
function beonepage_set_post_type( $post_id ) {
	global $pagenow; 

	if ( in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
		if ( get_post_type( $post_id ) == 'post' ) {
			if ( get_post_meta( $post_id, '_beonepage_option_post_embed_src', true ) == 'audio' ) {
				set_post_format( $post->ID, 'audio' );
			} elseif ( get_post_meta( $post_id, '_beonepage_option_post_embed_src', true ) == 'video' ) {
				set_post_format( $post->ID, 'video' );
			} elseif ( count( beonepage_get_post_images ( $post_id ) ) > 1 ) {
				set_post_format( $post->ID, 'gallery' );
			} elseif ( has_post_thumbnail( $post_id ) ) {
				set_post_format( $post->ID, 'image' );
			} elseif ( ! has_post_thumbnail( $post_id ) ) {
				set_post_format( $post->ID, '' );
			}
		}
	}
}
add_action( 'save_post', 'beonepage_set_post_type', 10, 3 );

/**
 * Remove WordPress Admin Bar style from header.
 */
function beonepage_remove_admin_bar_style() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'beonepage_remove_admin_bar_style' );

/**
 * Remove Recent Comments Widget style from header.
 */
function beonepage_remove_recent_comments_style() {  
	global $wp_widget_factory;  

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}  
add_action( 'widgets_init', 'beonepage_remove_recent_comments_style' );

/**
 * Change the font size for Tag Cloud widget.
 */
function beonepage_custom_tag_cloud_font( $args ) {
	$custom_args = array( 'smallest' => 10, 'largest' => 10 );
	$args = wp_parse_args( $args, $custom_args );

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'beonepage_custom_tag_cloud_font' );

/**
 * Hide editor on Front Page.
 *
 */
function beonepage_hide_editor() {
	global $pagenow, $post;

	if ( ! ( $pagenow == 'post.php' ) ) {
		return;
	}

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	if ( ! isset( $post_id ) ) {
		return;
	};

	if ( $post_id == get_option( 'page_on_front' ) ) {
		remove_post_type_support( 'page', 'editor' );
	}
}
add_action( 'admin_head', 'beonepage_hide_editor' );

/**
 * Update option after Customizer save.
 */
function beonepage_customize_save_after() {
	update_option( 'blogname', Kirki::get_option( 'icon_logo_title' ) );

	if ( Kirki::get_option( 'general_front_page' ) != '0' ) {
		update_option( 'show_on_front ', 'page' );
		update_option( 'page_on_front', Kirki::get_option( 'general_front_page' ) );
		update_option( 'page_for_posts', Kirki::get_option( 'general_posts_page' ) );
	}
}
add_action( 'customize_save_after', 'beonepage_customize_save_after' );

/**
 * Set option data when Customizer controls are initialized.
 */
function beonepage_customize_controls_init() {
	set_theme_mod( 'icon_logo_title', get_bloginfo( 'name' ) );
	set_theme_mod( 'general_front_page', get_option( 'page_on_front' ) );
	set_theme_mod( 'general_posts_page', get_option( 'page_for_posts' ) );
}
add_action( 'customize_controls_init', 'beonepage_customize_controls_init' );

/**
 * Enqueue scripts and styles for admin pages.
 */
function beonepage_admin_scripts() {
	global $pagenow;

	if ( ! is_admin() ) {
		return;
	}

	if ( in_array( $pagenow, array( 'nav-menus.php', 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_script( 'beonepage-admin-script', get_template_directory_uri() . '/js/admin.js', array(), beonepage_get_version(), true );
	}

	// Localize the script with new data.
	wp_localize_script( 'beonepage-admin-script', 'admin_vars', array(
		'screen'         => $pagenow,
		's_icon_found'   => esc_html__( 'icon found.', 'beonepage' ),
		'p_icons_found'  => esc_html__( 'icons found.', 'beonepage' ),
		'no_icons_found' => esc_html__( 'No icons found.', 'beonepage' )
	) );
}
add_action( 'admin_enqueue_scripts', 'beonepage_admin_scripts' );

/**
 * Get tweets class.
 */
if ( class_exists( 'beOnePageProPlugin' ) ) {
	class beOnePageTwitterModule {
		/* Return Tweets */
		public function getTweets() {
			$config = array();
			$config['username'] = Kirki::get_option( 'front_page_twitter_twitter_username' );
			$config['count'] = 5;
			$config['access_token'] = Kirki::get_option( 'front_page_twitter_twitter_tat' );
			$config['access_token_secret'] = Kirki::get_option( 'front_page_twitter_twitter_tats' );
			$config['consumer_key'] = Kirki::get_option( 'front_page_twitter_twitter_tck' );
			$config['consumer_key_secret'] = Kirki::get_option( 'front_page_twitter_twitter_tcs' );

			$transient = $config['username'];
			$result = get_transient( $transient );
			$error = esc_html__( 'Not properly configured, please check your settings.', 'beonepage' );

			if ( empty( $config['username'] ) || empty( $config['access_token'] ) || empty( $config['access_token_secret'] ) || empty( $config['consumer_key'] ) || empty( $config['consumer_key_secret'] ) ) {
				return array( 'error' => $error );
			}

			if ( ! $result ) {
				$results = $this->oauthRetrieveTweets( $config );

				if ( isset( $results->errors ) ) {
					return array( 'error' => $error );
				} else {
					$result = $this->parseTweets( $results );
					set_transient( $transient, $result, 300 );
				}
			} else {
				if ( is_string( $result ) )
					unserialize( $result );
			}

			return $result;
		}

		/* OAUTH - API 1.1 */
		private function oauthRetrieveTweets( $config ) {
			$options = array(
				'trim_user' => true,
				'exclude_replies' => false,
				'include_rts' => true,
				'count' => $config['count'],
				'screen_name' => $config['username']
			);

			$connection = new Abraham\TwitterOAuth\TwitterOAuth( $config['consumer_key'], $config['consumer_key_secret'], $config['access_token'], $config['access_token_secret'] );
			$result = $connection->get( 'statuses/user_timeline', $options );

			return $result;
		}

		/* Parse / Sanitize */
		public function parseTweets( $results = array() ) {
			$tweets = array();

			foreach( $results as $result ) {
				$timestamp = $result->created_at;

				$tweets[] = array(
					'id'        => $result->id_str,
					'text'      => filter_var( $result->text, FILTER_SANITIZE_STRING ),
					'timestamp' => $timestamp
				);
			}

			return $tweets;
		}

		/* Change Text To Link */
		private function changeTextLink( $matches ) {
			return '<a href="' . $matches[0] . '" target="_blank">' . $matches[0] . '</a>';
		}

		/* Change Hashtag To Link */
		private function changeHashtagLink( $matches ) {
			return '<a href="http://twitter.com/hashtag/' . str_replace( '#', '', $matches[0] ) . '" target="_blank">' . $matches[0] . '</a>';
		}

		/* Username Link */
		private function changeUserLink( $matches ) {
			return '<a href="http://twitter.com/' . str_replace( '@', '', $matches[0] ) . '" target="_blank">' . $matches[0] . '</a>';
		}

		/* Convert Links */
		public function link_replace( $text ) {
			$string = preg_replace_callback( "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\w+)?/", array( &$this, 'changeTextLink' ), $text );
			$string = preg_replace_callback( "/(?<!&)#(\w+)/", array( &$this, 'changeHashtagLink' ), $string );
			$string = preg_replace_callback( '/@([A-Za-z0-9_]{1,15})/', array( &$this, 'changeUserLink' ), $string );

			return $string;
		}

		/* Convert Time Format */
		public function changeTimeFormat( $date ) {
			// Array of time period chunks.
			$chunks = array(
				array( 60 * 60 * 24 * 365 , esc_html__( 'year', 'beonepage' ), esc_html__( 'years', 'beonepage' ) ),
				array( 60 * 60 * 24 * 30 , esc_html__( 'month', 'beonepage' ), esc_html__( 'months', 'beonepage' ) ),
				array( 60 * 60 * 24 * 7, esc_html__( 'week', 'beonepage' ), esc_html__( 'weeks', 'beonepage' ) ),
				array( 60 * 60 * 24 , esc_html__( 'day', 'beonepage' ), esc_html__( 'days', 'beonepage' ) ),
				array( 60 * 60 , esc_html__( 'hour', 'beonepage' ), esc_html__( 'hours', 'beonepage' ) ),
				array( 60 , esc_html__( 'minute', 'beonepage' ), esc_html__( 'minutes', 'beonepage' ) ),
				array( 1, esc_html__( 'second', 'beonepage' ), esc_html__( 'seconds', 'beonepage' ) )
			);

			$current_time = strtotime( current_time( 'mysql', 1 ) );

			// Difference in seconds.
			$since = $current_time - $date;

			// Something went wrong with date calculation and we ended up with a negative date.
			if ( $since < 0 )
				return esc_html__( 'sometime', 'beonepage' );

			// The first chunk.
			for ( $i = 0, $j = count( $chunks ); $i < $j; $i++ ) {
				$seconds = $chunks[$i][0];

				// Finding the biggest chunk (if the chunk fits, break).
				if ( ( $count = floor( $since / $seconds ) ) != 0 )
					break;
			}

			// Set output var.
			$output = ( $count == 1 ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];

			if ( ! (int)trim( $output ) ) {
				$output = '0 ' . esc_html__( 'seconds', 'beonepage' );
			}

			$output .= esc_html__( ' ago', 'beonepage' );

			return $output;
		}
	}
}

/**
 * Get font icons list.
 *
 * @return array $font_icons
 */
function beonepage_icon_list() {
	$font_icons = array(
		'glass', 'music', 'search', 'envelope-o', 'heart', 'star', 'star-o', 'user', 'film', 'th-large', 'th', 'th-list', 'check', 'remove', 'close', 'times', 'search-plus', 'search-minus', 'power-off', 'signal', 'gear', 'cog', 'trash-o', 'home', 'file-o', 'clock-o', 'road', 'download', 'arrow-circle-o-down', 'arrow-circle-o-up', 'inbox', 'play-circle-o', 'rotate-right', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'dedent', 'outdent', 'indent', 'video-camera', 'photo', 'image', 'picture-o', 'pencil', 'map-marker', 'adjust', 'tint', 'edit', 'pencil-square-o', 'share-square-o', 'check-square-o', 'arrows', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-circle', 'minus-circle', 'times-circle', 'check-circle', 'question-circle', 'info-circle', 'crosshairs', 'times-circle-o', 'check-circle-o', 'ban', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'mail-forward', 'share', 'expand', 'compress', 'plus', 'minus', 'asterisk', 'exclamation-circle', 'gift', 'leaf', 'fire', 'eye', 'eye-slash', 'warning', 'exclamation-triangle', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder', 'folder-open', 'arrows-v', 'arrows-h', 'bar-chart-o', 'bar-chart', 'twitter-square', 'facebook-square', 'camera-retro', 'key', 'gears', 'cogs', 'comments', 'thumbs-o-up', 'thumbs-o-down', 'star-half', 'heart-o', 'sign-out', 'linkedin-square', 'thumb-tack', 'external-link', 'sign-in', 'trophy', 'github-square', 'upload', 'lemon-o', 'phone', 'square-o', 'bookmark-o', 'phone-square', 'twitter', 'facebook-f', 'facebook', 'github', 'unlock', 'credit-card', 'feed', 'rss', 'hdd-o', 'bullhorn', 'bell', 'certificate', 'hand-o-right', 'hand-o-left', 'hand-o-up', 'hand-o-down', 'arrow-circle-left', 'arrow-circle-right', 'arrow-circle-up', 'arrow-circle-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'arrows-alt', 'group', 'users', 'chain', 'link', 'cloud', 'flask', 'cut', 'scissors', 'copy', 'files-o', 'paperclip', 'save', 'floppy-o', 'square', 'navicon', 'reorder', 'bars', 'list-ul', 'list-ol', 'strikethrough', 'underline', 'table', 'magic', 'truck', 'pinterest', 'pinterest-square', 'google-plus-square', 'google-plus', 'money', 'caret-down', 'caret-up', 'caret-left', 'caret-right', 'columns', 'unsorted', 'sort', 'sort-down', 'sort-desc', 'sort-up', 'sort-asc', 'envelope', 'linkedin', 'rotate-left', 'undo', 'legal', 'gavel', 'dashboard', 'tachometer', 'comment-o', 'comments-o', 'flash', 'bolt', 'sitemap', 'umbrella', 'paste', 'clipboard', 'lightbulb-o', 'exchange', 'cloud-download', 'cloud-upload', 'user-md', 'stethoscope', 'suitcase', 'bell-o', 'coffee', 'cutlery', 'file-text-o', 'building-o', 'hospital-o', 'ambulance', 'medkit', 'fighter-jet', 'beer', 'h-square', 'plus-square', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-double-down', 'angle-left', 'angle-right', 'angle-up', 'angle-down', 'desktop', 'laptop', 'tablet', 'mobile-phone', 'mobile', 'circle-o', 'quote-left', 'quote-right', 'spinner', 'circle', 'mail-reply', 'reply', 'github-alt', 'folder-o', 'folder-open-o', 'smile-o', 'frown-o', 'meh-o', 'gamepad', 'keyboard-o', 'flag-o', 'flag-checkered', 'terminal', 'code', 'mail-reply-all', 'reply-all', 'star-half-empty', 'star-half-full', 'star-half-o', 'location-arrow', 'crop', 'code-fork', 'unlink', 'chain-broken', 'question', 'info', 'exclamation', 'superscript', 'subscript', 'eraser', 'puzzle-piece', 'microphone', 'microphone-slash', 'shield', 'calendar-o', 'fire-extinguisher', 'rocket', 'maxcdn', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-circle-down', 'html5', 'css3', 'anchor', 'unlock-alt', 'bullseye', 'ellipsis-h', 'ellipsis-v', 'rss-square', 'play-circle', 'ticket', 'minus-square', 'minus-square-o', 'level-up', 'level-down', 'check-square', 'pencil-square', 'external-link-square', 'share-square', 'compass', 'toggle-down', 'caret-square-o-down', 'toggle-up', 'caret-square-o-up', 'toggle-right', 'caret-square-o-right', 'euro', 'eur', 'gbp', 'dollar', 'usd', 'rupee', 'inr', 'cny', 'rmb', 'yen', 'jpy', 'ruble', 'rouble', 'rub', 'won', 'krw', 'bitcoin', 'btc', 'file', 'file-text', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'thumbs-up', 'thumbs-down', 'youtube-square', 'youtube', 'xing', 'xing-square', 'youtube-play', 'dropbox', 'stack-overflow', 'instagram', 'flickr', 'adn', 'bitbucket', 'bitbucket-square', 'tumblr', 'tumblr-square', 'long-arrow-down', 'long-arrow-up', 'long-arrow-left', 'long-arrow-right', 'apple', 'windows', 'android', 'linux', 'dribbble', 'skype', 'foursquare', 'trello', 'female', 'male', 'gittip', 'gratipay', 'sun-o', 'moon-o', 'archive', 'bug', 'vk', 'weibo', 'renren', 'pagelines', 'stack-exchange', 'arrow-circle-o-right', 'arrow-circle-o-left', 'toggle-left', 'caret-square-o-left', 'dot-circle-o', 'wheelchair', 'vimeo-square', 'turkish-lira', 'try', 'plus-square-o', 'space-shuttle', 'slack', 'envelope-square', 'wordpress', 'openid', 'institution', 'bank', 'university', 'mortar-board', 'graduation-cap', 'yahoo', 'google', 'reddit', 'reddit-square', 'stumbleupon-circle', 'stumbleupon', 'delicious', 'digg', 'pied-piper', 'pied-piper-alt', 'drupal', 'joomla', 'language', 'fax', 'building', 'child', 'paw', 'spoon', 'cube', 'cubes', 'behance', 'behance-square', 'steam', 'steam-square', 'recycle', 'automobile', 'car', 'cab', 'taxi', 'tree', 'spotify', 'deviantart', 'soundcloud', 'database', 'file-pdf-o', 'file-word-o', 'file-excel-o', 'file-powerpoint-o', 'file-photo-o', 'file-picture-o', 'file-image-o', 'file-zip-o', 'file-archive-o', 'file-sound-o', 'file-audio-o', 'file-movie-o', 'file-video-o', 'file-code-o', 'vine', 'codepen', 'jsfiddle', 'life-bouy', 'life-buoy', 'life-saver', 'support', 'life-ring', 'circle-o-notch', 'ra', 'rebel', 'ge', 'empire', 'git-square', 'git', 'y-combinator-square', 'yc-square', 'hacker-news', 'tencent-weibo', 'qq', 'wechat', 'weixin', 'send', 'paper-plane', 'send-o', 'paper-plane-o', 'history', 'circle-thin', 'header', 'paragraph', 'sliders', 'share-alt', 'share-alt-square', 'bomb', 'soccer-ball-o', 'futbol-o', 'tty', 'binoculars', 'plug', 'slideshare', 'twitch', 'yelp', 'newspaper-o', 'wifi', 'calculator', 'paypal', 'google-wallet', 'cc-visa', 'cc-mastercard', 'cc-discover', 'cc-amex', 'cc-paypal', 'cc-stripe', 'bell-slash', 'bell-slash-o', 'trash', 'copyright', 'at', 'eyedropper', 'paint-brush', 'birthday-cake', 'area-chart', 'pie-chart', 'line-chart', 'lastfm', 'lastfm-square', 'toggle-off', 'toggle-on', 'bicycle', 'bus', 'ioxhost', 'angellist', 'cc', 'shekel', 'sheqel', 'ils', 'meanpath', 'buysellads', 'connectdevelop', 'dashcube', 'forumbee', 'leanpub', 'sellsy', 'shirtsinbulk', 'simplybuilt', 'skyatlas', 'cart-plus', 'cart-arrow-down', 'diamond', 'ship', 'user-secret', 'motorcycle', 'street-view', 'heartbeat', 'venus', 'mars', 'mercury', 'intersex', 'transgender', 'transgender-alt', 'venus-double', 'mars-double', 'venus-mars', 'mars-stroke', 'mars-stroke-v', 'mars-stroke-h', 'neuter', 'genderless', 'facebook-official', 'pinterest-p', 'whatsapp', 'server', 'user-plus', 'user-times', 'hotel', 'bed', 'viacoin', 'train', 'subway', 'medium', 'yc', 'y-combinator', 'optin-monster', 'opencart', 'expeditedssl', 'battery-4', 'battery-full', 'battery-3', 'battery-three-quarters', 'battery-2', 'battery-half', 'battery-1', 'battery-quarter', 'battery-0', 'battery-empty', 'mouse-pointer', 'i-cursor', 'object-group', 'object-ungroup', 'sticky-note', 'sticky-note-o', 'cc-jcb', 'cc-diners-club', 'clone', 'balance-scale', 'hourglass-o', 'hourglass-1', 'hourglass-start', 'hourglass-2', 'hourglass-half', 'hourglass-3', 'hourglass-end', 'hourglass', 'hand-grab-o', 'hand-rock-o', 'hand-stop-o', 'hand-paper-o', 'hand-scissors-o', 'hand-lizard-o', 'hand-spock-o', 'hand-pointer-o', 'hand-peace-o', 'trademark', 'registered', 'creative-commons', 'gg', 'gg-circle', 'tripadvisor', 'odnoklassniki', 'odnoklassniki-square', 'get-pocket', 'wikipedia-w', 'safari', 'chrome', 'firefox', 'opera', 'internet-explorer', 'tv', 'television', 'contao', '500px', 'amazon', 'calendar-plus-o', 'calendar-minus-o', 'calendar-times-o', 'calendar-check-o', 'industry', 'map-pin', 'map-signs', 'map-o', 'map', 'commenting', 'commenting-o', 'houzz', 'vimeo', 'black-tie', 'fonticons', 'reddit-alien', 'edge', 'credit-card-alt', 'codiepie', 'modx', 'fort-awesome', 'usb', 'product-hunt', 'mixcloud', 'scribd', 'pause-circle', 'pause-circle-o', 'stop-circle', 'stop-circle-o', 'shopping-bag', 'shopping-basket', 'hashtag', 'bluetooth', 'bluetooth-b', 'percent'
	);

	return $font_icons;
}
