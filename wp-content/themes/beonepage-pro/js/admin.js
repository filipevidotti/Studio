/**
 * admin.js
 *
 * Contain all handlers for admin page.
 */
 
( function( $ ) {
	$( document ).ready( function() {
		if ( admin_vars.screen == 'nav-menus.php' ) {
			// Icon for menu items.
			var	selected_icon,
				icon_item_object;

			// Trigger events when click "Choose Icon" and "Remove Icon" links.
			$( 'body' ).on( 'click', '.thickbox, a.remove-menu-icon', function() {
				icon_item_object = $( this );

				// Add class for selected icon.
				if ( icon_item_object.parents( 'div' ).children( '.field-menu-icon' ).find( 'input[type="hidden"]' ).val() ) {
					selected_icon = icon_item_object.parents( 'div' ).children( '.field-menu-icon' ).find( 'input[type="hidden"]' ).val();

					$( 'ul.font-icons li i.fa-' + selected_icon ).addClass( 'active' );
				}
			} );

			// Trigger events when select an icon.
			$( 'ul.font-icons li' ).click(function () {
				selected_icon = $( this ).attr( 'id' );

				icon_item_object.parents( 'div' ).children( '.field-menu-icon' ).find( 'input[type="hidden"]' ).val( selected_icon );
				icon_item_object.parents( 'div' ).children( '.field-menu-icon' ).find( 'i' ).removeClass().addClass( 'fa fa-' + selected_icon );
				$( 'ul.font-icons li i' ).removeClass( 'active' );

				tb_remove();

				$( '#TB_window #menu-icon-search' ).val( '' );
				$( '#TB_window ul.font-icons li' ).show();
				$( 'span#icons-search-result' ).hide();
			} );

			// Trigger events when click "Remove Icon" link.
			$( 'body' ).on( 'click', 'a.remove-menu-icon', function() {
				icon_item_object.parents( 'div' ).children( '.field-menu-icon' ).find( 'input[type="hidden"]' ).val( '' );
				icon_item_object.parents( 'div' ).children( '.field-menu-icon' ).find( 'i' ).removeClass().addClass( 'icon-none' );
				$( 'ul.font-icons li i' ).removeClass( 'active' );
			} );

			// Determine when a user has stopped typing in a text field.
			$( '#menu-icon-search' ).typeWatch( {
				wait: 500,
				highlight: false,
				captureLength: 0,
				callback: function() {
					var count = 0,
						val = $( this ).val().replace( ' ', '-' );

					// Icon search filter.
					$( '#TB_window ul.font-icons li' ).each( function() {
						if ( $( this ).attr( 'id' ).search( new RegExp( val, 'i' ) ) < 0 ) {
							$( this ).hide();
						} else {
							$( this ).show();
							count++;
						}
					} );

					// Show text for icon search results.
					$( 'span#icons-search-result' ).show();

					if ( count == 1 ) {
						$( 'span#icons-search-result' ).html( '<strong>' + count + '</strong> ' + admin_vars.s_icon_found );
					} else if ( count > 1 ) {
						$( 'span#icons-search-result' ).html( '<strong>' + count + '</strong> ' + admin_vars.p_icons_found );
					} else {
						$( 'span#icons-search-result' ).html( admin_vars.no_icons_found );
					}
				}
			} );
		}

		if ( admin_vars.screen == 'post.php' || admin_vars.screen == 'post-new.php' ) {
			var $post_audio_url_box = $( '[class*=embed-audio-url]' ),
				$post_video_url_box = $( '[class*=embed-video-url]' );

			function toggleEmbedBox() {
				if ( $( 'input[name*="embed_src"]:checked' ).val() == 'audio' ) {
					$post_audio_url_box.show();
					$post_video_url_box.hide();
					$( '#post-formats-select #post-format-audio' ).prop( 'checked', true );
				} else if ( $( 'input[name*="embed_src"]:checked' ).val() == 'video' ) {
					$post_video_url_box.show();
					$post_audio_url_box.hide();
					$( '#post-formats-select #post-format-video' ).prop( 'checked', true );
				} else {
				   $post_audio_url_box.hide();
				   $post_video_url_box.hide();
				}
			}

			toggleEmbedBox();

			$( '[class*=embed-src] input' ).on( 'change', toggleEmbedBox );

			function toggleTypeBox() {
				var	$slider_img_url_box = $( '[class*=img-url]' ),
					$slider_video_url_box = $( '[class*=video-url]' );

				$( '#_beonepage_option_swiper_slider_repeat' ).find( '.cmb-repeatable-grouping' ).each( function() {
					if ( $( this ).find( '[name*="type"]:checked'  ).val() == 'image' ) {
						$( this ).find( $slider_img_url_box ).show();
						$( this ).find( $slider_video_url_box ).hide();
					} else if ( $( this ).find( '[name*="type"]:checked' ).val() == 'video' ) {
						$( this ).find( $slider_video_url_box ).show();
						$( this ).find( $slider_img_url_box ).hide();
					} else {
						$( this ).find( 'ul li:first-child input' ).prop( 'checked', true );
						$( this ).find( $slider_img_url_box ).show();
						$( this ).find( $slider_video_url_box ).hide();
					}
				} );
			}

			toggleTypeBox();

			$( '[class*=swiper-slider][class*=cmb-type-radio-inline] input' ).on( 'change', toggleTypeBox );

			setTimeout( function() {
				$( '#_beonepage_option_swiper_slider_repeat' ).find( '.move-up, .move-down' ).on( 'click', function() {
					setTimeout( function() {
						toggleTypeBox();
					}, 500 );
				} );
			}, 500 );

			$( '#_beonepage_option_swiper_slider button.cmb-add-group-row' ).on( 'click', function() {
				setTimeout( function() {
					toggleTypeBox();

					$( '[class*=swiper-slider][class*=cmb-type-radio-inline] input' ).on( 'change', toggleTypeBox );
				}, 500 );
			} );
		}
	} );
} )( jQuery );