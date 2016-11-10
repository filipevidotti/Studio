<?php
/**
 * Kirki Advanced Customizer
 *
 * @category BeOnePage
 * @package Kirki
 * @link    https://github.com/aristath/kirki
 */

/**
 * Remover or change default sections for Theme Customizer.
 */
function beonepage_remove_customize_section( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->get_panel( 'nav_menus' )->priority = 35;
	$wp_customize->get_control( 'site_icon' )->priority = 5;
	$wp_customize->get_control( 'site_icon' )->section = 'site_icon_logo';
}
add_action( 'customize_register', 'beonepage_remove_customize_section', 1000 );

// Early exit if Kirki is not installed
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Create panels using the Kirki API.
 */
Kirki::add_section( 'site_general', array(
	'priority'    => 10,
	'title'       => __( 'General', 'beonepage' ),
	'description' => __( 'You may need to refresh the page to see the changes.', 'beonepage' ),
) );

Kirki::add_section( 'site_typography', array(
	'priority'    => 20,
	'title'       => __( 'Typography', 'beonepage' ),
	'description' => __( 'Here you can change the fonts of your site.', 'beonepage' )
) );

Kirki::add_section( 'site_icon_logo', array(
	'priority'    => 30,
	'title'       => __( 'Icon & Logo', 'beonepage' ),
	'description' => __( 'Here you can upload your own custom favicon and logo image', 'beonepage' )
) );

/* Front Page Panel Start */
Kirki::add_panel( 'site_front_page', array(
	'priority'        => 40,
	'title'           => __( 'Front Page', 'beonepage' ),
	'active_callback' => 'is_front_page'
) );

Kirki::add_section( 'site_front_page_module_manager', array(
	'priority'    => 41,
	'title'       => __( 'Module Manager', 'beonepage' ),
	'description' => __( 'Here you can enable/disable and reorder modules for front page.', 'beonepage' ),
	'panel'       => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_slider_module', array(
	'priority' => 42,
	'title'    => __( 'Slider Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_icon_service_module', array(
	'priority' => 43,
	'title'    => __( 'Icon Service Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_icon_service_img_module', array(
	'priority' => 44,
	'title'    => __( 'Icon Service with Image Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_portfolio_module', array(
	'priority' => 45,
	'title'    => __( 'Portfolio Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_ver_promo_module', array(
	'priority' => 46,
	'title'    => __( 'Vertical Promotion Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_hor_promo_module', array(
	'priority' => 47,
	'title'    => __( 'Horizontal Promotion Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_blog_module', array(
	'priority' => 48,
	'title'    => __( 'Blog Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_contact_module', array(
	'priority' => 49,
	'title'    => __( 'Contact Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_process_module', array(
	'priority' => 50,
	'title'    => __( 'Process Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_team_module', array(
	'priority' => 51,
	'title'    => __( 'Team Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_skill_bar_module', array(
	'priority' => 52,
	'title'    => __( 'Skill Bar Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_testimonial_module', array(
	'priority' => 53,
	'title'    => __( 'Testimonial Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_client_module', array(
	'priority' => 54,
	'title'    => __( 'Client Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_fun_fact_module', array(
	'priority' => 55,
	'title'    => __( 'Fun Fact Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_pricing_table_module', array(
	'priority' => 56,
	'title'    => __( 'Pricing Table Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_twitter_module', array(
	'priority' => 57,
	'title'    => __( 'Twitter Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_subscribe_module', array(
	'priority' => 58,
	'title'    => __( 'MailChimp Subscribe Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_widget_module', array(
	'priority' => 59,
	'title'    => __( 'Widget Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );

Kirki::add_section( 'site_front_page_custom_module', array(
	'priority' => 60,
	'title'    => __( 'Custom Module', 'beonepage' ),
	'panel'    => 'site_front_page'
) );
/* Front Page Panel End */

Kirki::add_section( 'nav_menu_style', array(
    'title'          => __( 'Menu Style', 'beonepage' ),
    'description'    => __( 'Here you can customize your menu styles.', 'beonepage' ),
    'panel'          => 'nav_menus',
    'priority'       => 0
) );

Kirki::add_section( 'site_blog_page', array(
	'priority'    => 60,
	'title'       => __( 'Blog Page', 'beonepage' ),
	'description' => __( 'Here you can customize your blog pages.', 'beonepage' ),
	'active_callback' => 'beonepage_is_blog_page'
) );

Kirki::add_section( 'site_footer', array(
	'priority'    => 120,
	'title'       => __( 'Site Footer', 'beonepage' ),
	'description' => __( 'Here you can customize the footer on your site.', 'beonepage' )
) );

/**
 * Create a config instance that will be used by fields added via the static methods.
 */
Kirki::add_config( 'beonepage_kirki', array(
	'option_type' => 'theme_mod'
) );

/**
 * Create fields using the Kirki API static functions.
 */
/* General Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'dropdown-pages',
	'settings' => 'general_front_page',
	'label'    => __( 'Front Page', 'beonepage' ),
	'help'     => __( 'Create a blank page with Home Page template and set it as Front Page.', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => get_option( 'page_on_front' ),
	'priority' => 10
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'dropdown-pages',
	'settings' => 'general_posts_page',
	'label'    => __( 'Posts Page', 'beonepage' ),
	'help'     => __( 'Create a blank page and set it as Posts Page.', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => get_option( 'page_for_posts' ),
	'priority' => 20
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'general_page_transition',
	'label'    => __( 'Enable Page Loading Transition?', 'beonepage' ),
	'help'     => __( 'You can show interactive loader while the page loads in the background.', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '1',
	'priority' => 30
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'select',
	'setting'  => 'page_transition_spinner',
	'label'    => __( 'Spinner', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '16',
	'priority' => 31,
	'choices'  => array(
		'1'  => __( 'Ball Pulse', 'beonepage' ),
		'2'  => __( 'Ball Grid Pulse', 'beonepage' ),
		'3'  => __( 'Ball Clip Rotate', 'beonepage' ),
		'4'  => __( 'Ball Clip Rotate Pulse', 'beonepage' ),
		'5'  => __( 'Ball Clip Rotate Multiple', 'beonepage' ),
		'6'  => __( 'Square Spin', 'beonepage' ),
		'7'  => __( 'Ball Pulse Rise', 'beonepage' ),
		'8'  => __( 'Ball Rotate', 'beonepage' ),
		'9'  => __( 'Cube Transition', 'beonepage' ),
		'10' => __( 'Ball Zig Zag', 'beonepage' ),
		'11' => __( 'Ball Zig Zag Deflect', 'beonepage' ),
		'12' => __( 'Ball Triangle Path', 'beonepage' ),
		'13' => __( 'Ball Scale', 'beonepage' ),
		'14' => __( 'Line Scale', 'beonepage' ),
		'15' => __( 'Line Scale Party', 'beonepage' ),
		'16' => __( 'Ball Scale Multiple', 'beonepage' ),
		'17' => __( 'Ball Pulse Sync', 'beonepage' ),
		'18' => __( 'Ball Beat', 'beonepage' ),
		'19' => __( 'Line Scale Pulse Out', 'beonepage' ),
		'20' => __( 'Line Scale Pulse Out Rapid', 'beonepage' ),
		'21' => __( 'Ball Scale Ripple', 'beonepage' ),
		'22' => __( 'Ball Scale Ripple Multiple', 'beonepage' ),
		'23' => __( 'Ball Spin Fade Loader', 'beonepage' ),
		'24' => __( 'Line Spin Fade Loader', 'beonepage' ),
		'25' => __( 'Triangle Skew Spin', 'beonepage' ),
		'26' => __( 'Pacman', 'beonepage' ),
		'27' => __( 'Ball Grid Beat', 'beonepage' ),
		'28' => __( 'Semi Circle Spin', 'beonepage' ),
	),
	'required' => array(
        array(
            'setting'  => 'general_page_transition',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'color',
	'setting'  => 'loading_spinner_color',
	'label'    => __( 'Spinner Color', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '#ffcc00',
	'priority' => 32,
	'required' => array(
        array(
            'setting'  => 'general_page_transition',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'color',
	'setting'  => 'loading_background_color',
	'label'    => __( 'Background Color', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '#181a1c',
	'priority' => 33,
	'required' => array(
        array(
            'setting'  => 'general_page_transition',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'general_sticky_menu',
	'label'    => __( 'Enable Sticky Menu?', 'beonepage' ),
	'help'     => __( 'If enable, the menu will be accessible from anywhere without having to scroll.', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '1',
	'priority' => 40
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'general_progress_bar',
	'label'    => __( 'Enable Scrolling Progress Bar?', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '1',
	'priority' => 50,
	'required'  => array(
        array(
            'setting'  => 'general_sticky_menu',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'progress_bar_color',
	'label'     => __( 'Progress Bar Color', 'beonepage' ),
	'section'   => 'site_general',
	'default'   => '#ffcc00',
	'priority'  => 51,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.scroll-progress-bar div',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.scroll-progress-bar div',
			'property' => 'background-color'
		)
	),
	'required'  => array(
		array(
            'setting'  => 'general_sticky_menu',
            'operator' => '==',
            'value'    => 1
        ),
        array(
            'setting'  => 'general_progress_bar',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'general_go_to_top',
	'label'    => __( 'Enable Go to Top Button?', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '1',
	'priority' => 60
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'general_go_to_top_btn_tyle',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_general',
	'default'  => '1',
	'priority' => 61,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    ),
	'required' => array(
        array(
            'setting'  => 'general_go_to_top',
            'operator' => '==',
            'value'    => 1
        )
    )
) );
/* General Section End */

/* Typography Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'typography_primary_font_family',
	'label'       => __( 'Primary Font Family', 'beonepage' ),
	'description' => __( 'The font family used for Body Text.', 'beonepage' ),
	'section'     => 'site_typography',
	'default'     => 'Open Sans',
	'priority'    => 10,
	'choices'     => Kirki_Fonts::get_font_choices(),
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'font-family'
		)
    ),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'typography_secondary_font_family',
	'label'       => __( 'Secondary Font Family', 'beonepage' ),
	'description' => __( 'The font family used for H1-H6 Tags, Tooltips and Slider.', 'beonepage' ),
	'section'     => 'site_typography',
	'default'     => 'Dosis',
	'priority'    => 20,
	'choices'     => Kirki_Fonts::get_font_choices(),
	'output'      => array(
		array(
			'element'  => 'h1, h2, h3, h4, h5, h6, .tooltip, .slider-caption h1, .slider-caption p, .slider-btn a, .process-label span, .team-member .member-title, .testimonial-name span, .fact-number, .item-price, .tweet-timestamp',
			'property' => 'font-family'
		)
    ),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'typography_tertiary_font_family',
	'label'       => __( 'Tertiary Font Family', 'beonepage' ),
	'description' => __( 'The font family used for Site Title, Menu, Module Subtitle and Contact Boxes.', 'beonepage' ),
	'section'     => 'site_typography',
	'default'     => 'Raleway',
	'priority'    => 30,
	'choices'     => Kirki_Fonts::get_font_choices(),
	'output'      => array(
		array(
			'element'  => '.site-title, .main-navigation, #slide-number, .module-caption p, .promo-box-ver p, .contact-item .ci-title, .skill-bar .line-active span, .testimonial-box .testimonial-name, .fact-text, .pb-detail ul li, .widget:not(.woocommerce) ul li span',
			'property' => 'font-family'
		)
    ),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'slider',
	'settings'    => 'typography_body_font_size',
	'label'       => __( 'Font Size', 'beonepage' ),
	'section'     => 'site_typography',
	'default'     => 13,
	'priority'    => 40,
	'choices'     => array(
		'min'  => 12,
		'max'  => 16,
		'step' => 0.5
    ),
	'transport'   => 'postMessage',
	'js_vars'     => array(
        array(
			'element'  => 'body',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px'
        )
    ),
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'font-size',
			'units'    => 'px'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'typography_google_font_info',
    'section'  => 'site_typography',
    'default'  => sprintf(
		__( 'Choose from over 600+ %1$sGoogle Fonts%2$s and preview them instantly without refreshing the page.', 'beonepage' ),
		'<a href="' . esc_url( 'http://www.google.com/fonts' ) . '" target="_blank">',
		'</a>'
	),
    'priority' => 50
) );
/* Typography Section End */

/* Icon & Logo Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'icon_logo_type',
	'label'    => __( 'Logo Type', 'beonepage' ),
	'section'  => 'site_icon_logo',
	'default'  => '1',
	'priority' => 10,
	'choices'  => array(
		'1' => __( 'Text', 'beonepage' ),
		'2' => __( 'Image', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'icon_logo_title',
	'label'     => __( 'Site Title', 'beonepage' ),
	'section'   => 'site_icon_logo',
	'default'   => get_bloginfo( 'name' ),
	'priority'  => 11,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.site-title a',
			'function' => 'html',
			'property' => 'text'
		)
    ),
	'required' => array(
        array(
            'setting'  => 'icon_logo_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'upload',
	'settings' => 'icon_logo_logo',
	'label'    => __( 'Upload Logo', 'beonepage' ),
	'section'  => 'site_icon_logo',
	'default'  => '',
	'priority' => 12,
	'required' => array(
        array(
            'setting'  => 'icon_logo_type',
            'operator' => '==',
            'value'    => 2
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'upload',
	'settings' => 'icon_logo_retina_logo',
	'label'    => __( 'Upload Retina Logo', 'beonepage' ),
	'help'     => __( 'If you wish to use a retina logo, make sure that you use double the size of your standard logo.', 'beonepage' ),
	'section'  => 'site_icon_logo',
	'default'  => '',
	'priority' => 13,
	'required' => array(
        array(
            'setting'  => 'icon_logo_type',
            'operator' => '==',
            'value'    => 2
        )
    )
) );
/* Icon & Logo Section End */

/* Menu Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'menu_style_layout',
	'label'       => __( 'Layout', 'beonepage' ),
	'description' => __( 'Choose the layout for the menu.', 'beonepage' ),
	'section'     => 'nav_menu_style',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => array(
		'fixed' => __( 'Fixed-width', 'beonepage' ),
		'full'  => __( 'Full-width', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_link_color',
	'label'     => __( 'Link Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#fff',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.site-title a, .main-navigation a',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.site-title a, .main-navigation a',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_link_color_hover',
	'label'     => __( 'Link Color on Hover', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#ffcc00',
	'priority'  => 30,
	'output'    => array(
		array (
			'element'  => '.site-title a:hover, .main-navigation li.current-menu-item a, .main-navigation a:hover',
			'property' => 'color'
		),
		array (
			'element'  => '.main-navigation ul ul',
			'property' => 'border-top-color'
		),
		array (
			'element'  => '.main-navigation li li a:hover, .mobile-menu, body.small-device .mobile-menu:hover',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_submenu_bg_color',
	'label'     => __( 'Submenu Background Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#23282d',
	'priority'  => 40,
	'output'    => array(
		array (
			'element'  => '.main-navigation li li a',
			'property' => 'background-color'
		),
		array (
			'element'  => 'body.small-device .main-navigation li li a:hover',
			'property' => 'background-color',
			'units'    => '!important'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_submenu_link_color',
	'label'     => __( 'Submenu Link Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#eee',
	'priority'  => 50,
	'output'    => array(
		array (
			'element'  => '.main-navigation li li a, body.small-device .main-navigation li li a:hover',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_submenu_link_color_hover',
	'label'     => __( 'Submenu Link Color on Hover', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#000',
	'priority'  => 60,
	'output'    => array(
		array (
			'element'  => '.main-navigation li li a:hover',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_submenu_separator_color',
	'label'     => __( 'Submenu Separator Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#333',
	'priority'  => 70,
	'output'    => array(
		array (
			'element'  => '.main-navigation li li, body.small-device .main-navigation li, body.small-device .main-navigation li ul a',
			'property' => 'border-bottom-color'
		),
		array (
			'element'  => 'body.small-device .main-navigation li ul',
			'property' => 'border-top-color'
		),
		array (
			'element'  => 'body.small-device .main-navigation li ul a',
			'property' => 'border-left-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_sticky_menu_bg_color',
	'label'     => __( 'Sticky Menu Background Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#18191b',
	'priority'  => 80,
	'output'    => array(
		array (
			'element'  => '.sticky-header',
			'property' => 'background-color'
		),
		array (
			'element'  => '.mobile-menu',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_sticky_menu_link_color',
	'label'     => __( 'Sticky Menu Link Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#fff',
	'priority'  => 90,
	'output'    => array(
		array (
			'element'  => '.sticky-header a',
			'property' => 'color'
		),
		array (
			'element'  => '.mobile-menu:hover, body.small-device .mobile-menu.closed:hover',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'menu_style_sticky_menu_border_color',
	'label'     => __( 'Sticky Menu Border Color', 'beonepage' ),
	'section'   => 'nav_menu_style',
	'default'   => '#333',
	'priority'  => 100,
	'output'    => array(
		array (
			'element'  => '.sticky-header',
			'property' => 'border-bottom-color'
		)
	)
) );
/* Menu Section End */

/* Front Page Panel Start */
Kirki::add_field( 'beagency_kirki', array(
	'type'        => 'sortable',
	'settings'    => 'front_page_module_manager',
	'description' => __( 'Drag to reorder modules', 'beonepage' ),
	'section'     => 'site_front_page_module_manager',
	'default'     => array( 'slider', 'icon-service', 'portfolio', 'ver-promo', 'blog', 'contact' ),
	'priority'    => 10,
	'choices'     => array(
		'slider'           => __( 'Slider', 'beonepage' ),
		'icon-service'     => __( 'Icon Service', 'beonepage' ),
		'icon-service-img' => __( 'Icon Service with Image', 'beonepage' ),
		'portfolio'        => __( 'Portfolio', 'beonepage' ),
		'ver-promo'        => __( 'Vertical Promotion', 'beonepage' ),
		'hor-promo'        => __( 'Horizontal Promotion', 'beonepage' ),
		'blog'             => __( 'Blog', 'beonepage' ),
		'contact'          => __( 'Contact', 'beonepage' ),
		'process'          => __( 'Process', 'beonepage' ),
		'team'             => __( 'Team', 'beonepage' ),
		'skill-bar'        => __( 'Skill Bar', 'beonepage' ),
		'testimonial'      => __( 'Testimonial', 'beonepage' ),
		'client'           => __( 'Client', 'beonepage' ),
		'fun-fact'         => __( 'Fun Fact', 'beonepage' ),
		'pricing-table'    => __( 'Pricing Table', 'beonepage' ),
		'twitter'          => __( 'Twitter', 'beonepage' ),
		'subscribe'        => __( 'MailChimp Subscribe', 'beonepage' ),
		'widget'           => __( 'Widget', 'beonepage' ),
		'custom'           => __( 'Custom', 'beonepage' )
	)
) );

/* Slider Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_slider_type',
	'label'    => __( 'Slider Type', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 10,
	'choices'  => array(
		'1' => __( 'Text', 'beonepage' ),
		'2' => __( 'Image', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_text_slider_title',
	'label'     => __( 'Heading', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_slider_module',
	'default'   => 'Be <span>Imaginative</span> &bull; Be <span>Yourself</span>',
	'priority'  => 11,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.slider .slider-caption h1',
			'function' => 'html',
			'property' => 'text'
		)
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_text_slider_content',
	'label'     => __( 'Content', 'beonepage' ),
	'section'   => 'site_front_page_slider_module',
	'default'   => 'We handcraft well-thought-out WordPress themes',
	'priority'  => 12,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.slider .slider-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_text_slider_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_slider_module',
	'default'   => '#fff',
	'priority'  => 13,
	'output'    => array(
		array (
			'element'  => '.text-slider',
			'property' => 'color'
		),
		array (
			'element'  => '.text-slider .scroll-down:before',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_text_slider_btn_text',
	'label'     => __( 'Button Text', 'beonepage' ),
	'section'   => 'site_front_page_slider_module',
	'default'   => 'Learn More',
	'priority'  => 14,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.slider-btn .btn',
			'function' => 'html',
			'property' => 'text'
		)
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_text_slider_btn_url',
	'label'     => __( 'Button URL', 'beonepage' ),
	'section'   => 'site_front_page_slider_module',
	'default'   => 'http://betheme.me',
	'priority'  => 15,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.slider-btn a',
			'function' => 'attr',
			'property' => 'href'
		)
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_text_slider_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 16,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'background',
	'setting'  => 'front_page_text_slider_bg',
	'label'    => __( 'Background Image', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => array(
		'image'    => get_template_directory_uri() . '/images/background.jpg',
		'position' => 'center-center'
	),
	'priority' => 17,
	'output'   => '.text-slider',
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_text_slider_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 18,
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_text_slider_scroll_down',
	'label'    => __( 'Enable Scroll Down Button?', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 19,
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_swiper_slider_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_slider_module',
	'default'   => '#fff',
	'priority'  => 21,
	'output'    => array(
		array (
			'element'  => '.swiper-slider',
			'property' => 'color'
		),
		array (
			'element'  => '.swiper-slider .scroll-down:before',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 2
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_swiper_slider_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 22,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 2
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_swiper_slider_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 23,
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 2
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_swiper_slider_scroll_down',
	'label'    => __( 'Enable Scroll Down Button?', 'beonepage' ),
	'section'  => 'site_front_page_slider_module',
	'default'  => '1',
	'priority' => 24,
	'required' => array(
        array(
            'setting'  => 'front_page_slider_type',
            'operator' => '==',
            'value'    => 2
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_swiper_slider_notice',
    'section'  => 'site_front_page_slider_module',
    'default'  => '<p>' . __( "You can create slides from Slider Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 25
) );
/* Slider Module Section End */

/* Icon Service Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_icon_service_module_layout',
	'label'       => __( 'Layout', 'beonepage' ),
	'description' => __( 'Choose the layout for the container.', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_module',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => array(
		'fixed' => __( 'Fixed-width', 'beonepage' ),
		'full'  => __( 'Full-width', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_icon_service_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_module',
	'default'     => 'icon-service-module',
	'priority'    => 20,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_icon_service_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => 'Icon <span>Service</span> Module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_icon_service_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => 'Subtitle for icon service module',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_icon_service_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => '#eceff3',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.icon-service-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => '#888',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.icon-service-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => '#ffcc00',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.icon-service-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_module_hover_color',
	'label'     => __( 'Icon Background on Hover', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => '#ffcc00',
	'priority'  => 90,
	'output'    => array(
		array (
			'element'  => '.icon-service-module .icon-service-box:hover .service-icon',
			'property' => 'background-color'
		),
		array(
			'element'  => '.icon-service-module .icon-service-box:hover .service-icon',
			'property' => 'border-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_icon_service_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_module',
	'default'     => 'color',
	'priority'    => 100,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_module',
	'default'   => '#181a1c',
	'priority'  => 101,
	'output'    => array(
		array (
			'element'  => '.icon-service-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_icon_service_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 102,
	'output'      => '.icon-service-module',
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_icon_service_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_icon_service_module',
	'default'  => '1',
	'priority' => 103,
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_icon_service_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_icon_service_module',
    'default'  => '',
    'priority' => 104,
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_icon_service_module_bg_notice',
    'section'  => 'site_front_page_icon_service_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 105,
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_icon_service_module_notice',
    'section'  => 'site_front_page_icon_service_module',
    'default'  => '<p>' . __( "You can create icon service boxes from Icon Services Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 110
) );
/* Icon Service Module Section End */

/* Icon Service with Image Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_icon_service_img_module_layout',
	'label'       => __( 'Layout', 'beonepage' ),
	'description' => __( 'Choose the layout for the container.', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_img_module',
	'default'     => 'full',
	'priority'    => 10,
	'choices'     => array(
		'fixed' => __( 'Fixed-width', 'beonepage' ),
		'full'  => __( 'Full-width', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_icon_service_img_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_img_module',
	'default'     => 'icon-service-img-module',
	'priority'    => 20,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_icon_service_img_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => 'Icon <span>Service</span> with Image Module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-img-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_icon_service_img_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => 'Subtitle for icon service with image module',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-img-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_icon_service_img_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_img_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_img_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => '#eceff3',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-img-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.icon-service-img-module, .icon-service-img-module .icon-service-box:hover i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_img_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => '#888',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-img-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.icon-service-img-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_img_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => '#ffcc00',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.icon-service-img-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.icon-service-img-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'upload',
	'setting'  => 'front_page_icon_service_img_module_img',
	'label'    => __( 'Image', 'beonepage' ),
	'section'  => 'site_front_page_icon_service_img_module',
	'default'  => '',
	'priority' => 90
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_icon_service_img_animation',
	'label'       => __( 'Image Animation', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_img_module',
	'default'     => 'none',
	'priority'    => 100,
	'choices'     => beonepage_animate()
) );


Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_img_module_icon_color',
	'label'     => __( 'Icon Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => '#ffcc00',
	'priority'  => 110,
	'output'    => array(
		array (
			'element'  => '.icon-service-img-module .service-icon',
			'property' => 'color'
		),
		array (
			'element'  => '.icon-service-img-module .icon-service-box:hover .service-icon',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_icon_service_img_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_img_module',
	'default'     => 'color',
	'priority'    => 120,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_icon_service_img_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_icon_service_img_module',
	'default'   => '#181a1c',
	'priority'  => 121,
	'output'    => array(
		array (
			'element'  => '.icon-service-img-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_img_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_icon_service_img_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_icon_service_img_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 122,
	'output'      => '.icon-service-img-module',
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_img_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_icon_service_img_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_icon_service_img_module',
	'default'  => '1',
	'priority' => 123,
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_img_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_icon_service_img_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_icon_service_img_module',
    'default'  => '',
    'priority' => 124,
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_img_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_icon_service_img_module_bg_notice',
    'section'  => 'site_front_page_icon_service_img_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 125,
	'required' => array(
        array(
            'setting'  => 'front_page_icon_service_img_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_icon_service_img_module_notice',
    'section'  => 'site_front_page_icon_service_img_module',
    'default'  => '<p>' . __( "You can create icon service boxes from Icon Services with Image Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 130
) );
/* Icon Service with Image Module Section End */

/* Portfolio Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_portfolio_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_portfolio_module',
	'default'     => 'portfolio-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_portfolio_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => 'Portfolio Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_portfolio_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => 'Subtitle for portfolio module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_portfolio_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_portfolio_module',
	'default'     => 'none',
	'priority'    => 40,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#181a1c',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#111',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#111',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_portfolio_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_portfolio_module',
	'default'     => 'color',
	'priority'    => 80,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#ffcc00',
	'priority'  => 81,
	'output'    => array(
		array (
			'element'  => '.portfolio-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_portfolio_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_portfolio_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 82,
	'output'      => '.portfolio-module',
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_portfolio_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_portfolio_module',
	'default'  => '1',
	'priority' => 83,
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_portfolio_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_portfolio_module',
    'default'  => '',
    'priority' => 84,
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_portfolio_module_bg_notice',
    'section'  => 'site_front_page_portfolio_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 85,
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_portfolio_module_filter',
	'label'    => __( 'Enable Portfolio Filter?', 'beonepage' ),
	'section'  => 'site_front_page_portfolio_module',
	'default'  => '1',
	'priority' => 90
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_portfolio_module_filter_animation',
	'label'       => __( 'Filter Animation', 'beonepage' ),
	'section'     => 'site_front_page_portfolio_module',
	'default'     => 'none',
	'priority'    => 91,
	'choices'     => beonepage_animate(),
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_filter',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_portfolio_module_all',
	'label'     => __( 'Show All Button Text', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => 'Show All',
	'priority'  => 92,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#portfolio-filter a:first-child',
			'function' => 'html',
			'property' => 'text'
		)
    ),
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_filter',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_filter_color',
	'label'     => __( 'Filter Font Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#333',
	'priority'  => 93,
	'output'    => array(
		array (
			'element'  => '#portfolio-filter a',
			'property' => 'color'
		),
		array (
			'element'  => '#portfolio-filter a:hover, #portfolio-filter .active',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_filter',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_filter_bg_color',
	'label'     => __( 'Filter Background Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#eee',
	'priority'  => 94,
	'output'    => array(
		array (
			'element'  => '#portfolio-filter a:hover, #portfolio-filter .active',
			'property' => 'color'
		),
		array (
			'element'  => '#portfolio-filter a',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_portfolio_module_filter',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color-alpha',
	'settings'  => 'front_page_portfolio_module_item_bg_color',
	'label'     => __( 'Portfolio Item Background on Hover', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => 'rgba(0,0,0,.8)',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-caption',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-caption',
			'property' => 'background-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_item_title_color',
	'label'     => __( 'Portfolio Item Title Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#ffcc00',
	'priority'  => 110,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-caption .entry-title',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-caption .entry-title',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_item_title_color',
	'label'     => __( 'Portfolio Item Title Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#ffcc00',
	'priority'  => 120,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-caption .entry-title',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-caption .entry-title',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_item_tag_color',
	'label'     => __( 'Portfolio Item Tag Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#ddd',
	'priority'  => 130,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-caption .entry-meta',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-caption .entry-meta',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_modal_title_color',
	'label'     => __( 'Portfolio Modal Title Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#ffcc00',
	'priority'  => 140,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-ajax-title h2, #portfolio-navigation a:hover, .portfolio-meta li span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-ajax-title h2, #portfolio-navigation a:hover, .portfolio-meta li span',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_modal_content_color',
	'label'     => __( 'Portfolio Modal Content Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#eceff3',
	'priority'  => 150,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-ajax-single',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-ajax-single',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_modal_sp_color',
	'label'     => __( 'Portfolio Modal Separator Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#333',
	'priority'  => 160,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-ajax-title',
			'function' => 'css',
			'property' => 'border-bottom-color'
		),
		array(
			'element'  => '.portfolio-single-content .line',
			'function' => 'css',
			'property' => 'border-top-color'
		)
    ),
	'output'    => array(
		array(
			'element'  => '.portfolio-ajax-title',
			'property' => 'border-bottom-color'
		),
		array(
			'element'  => '.portfolio-single-content .line',
			'property' => 'border-top-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_portfolio_module_modal_bg_color',
	'label'     => __( 'Portfolio Modal Background Color', 'beonepage' ),
	'section'   => 'site_front_page_portfolio_module',
	'default'   => '#181a1c',
	'priority'  => 170,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.portfolio-ajax-single',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.portfolio-ajax-single',
			'property' => 'background-color'
		)
	),
) );
/* Portfolio Module Section End */

/* Vertical Promotion Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_ver_promo_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_ver_promo_module',
	'default'     => 'ver-promo-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_ver_promo_title',
	'label'     => __( 'Heading', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_ver_promo_module',
	'default'   => 'We are <span>BeTheme</span>',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-ver-module .promo-box-ver h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_ver_promo_title_animation',
	'label'       => __( 'Heading Animation', 'beonepage' ),
	'section'     => 'site_front_page_ver_promo_module',
	'default'     => 'none',
	'priority'    => 30,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_ver_promo_content',
	'label'     => __( 'Content', 'beonepage' ),
	'section'   => 'site_front_page_ver_promo_module',
	'default'   => 'We build more than just Themes. We build User Experience for both, you and your visitors.',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-ver-module .promo-box-ver p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_ver_promo_content_animation',
	'label'       => __( 'Content Animation', 'beonepage' ),
	'section'     => 'site_front_page_ver_promo_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_ver_promo_btn_text',
	'label'     => __( 'Button Text', 'beonepage' ),
	'section'   => 'site_front_page_ver_promo_module',
	'default'   => 'Learn More',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-ver-module .promo-btn .btn',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_ver_promo_btn_url',
	'label'     => __( 'Button URL', 'beonepage' ),
	'section'   => 'site_front_page_ver_promo_module',
	'default'   => 'http://betheme.me',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-ver-module .promo-btn a',
			'function' => 'attr',
			'property' => 'href'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_ver_promo_btn_animation',
	'label'       => __( 'Button Animation', 'beonepage' ),
	'section'     => 'site_front_page_ver_promo_module',
	'default'     => 'none',
	'priority'    => 80,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_ver_promo_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_ver_promo_module',
	'default'  => '1',
	'priority' => 90,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_ver_promo_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_ver_promo_module',
	'default'   => '#eceff3',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-ver-module, .promo-box-ver h2',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.promo-box-ver-module, .promo-box-ver h2',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_ver_promo_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_ver_promo_module',
	'default'     => 'color',
	'priority'    => 110,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_ver_promo_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_ver_promo_module',
	'default'   => '#181a1c',
	'priority'  => 111,
	'output'    => array(
		array (
			'element'  => '.promo-box-ver-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_ver_promo_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_ver_promo_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_ver_promo_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 112,
	'output'      => '.promo-box-ver-module',
	'required' => array(
        array(
            'setting'  => 'front_page_ver_promo_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_ver_promo_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_ver_promo_module',
	'default'  => '1',
	'priority' => 113,
	'required' => array(
        array(
            'setting'  => 'front_page_ver_promo_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_ver_promo_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_ver_promo_module',
    'default'  => '',
    'priority' => 114,
	'required' => array(
        array(
            'setting'  => 'front_page_ver_promo_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_ver_promo_module_bg_notice',
    'section'  => 'site_front_page_ver_promo_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 115,
	'required' => array(
        array(
            'setting'  => 'front_page_ver_promo_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );
/* Vertical Promotion Module Section End */

/* Horizontal Promotion Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_hor_promo_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_hor_promo_module',
	'default'     => 'hor-promo-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_hor_promo_title',
	'label'     => __( 'Heading', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_hor_promo_module',
	'default'   => '<span>WordPress Themes</span> That Make Your Life <span>Easier</span>',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-hor-module .promo-box-hor h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_hor_promo_title_animation',
	'label'       => __( 'Heading Animation', 'beonepage' ),
	'section'     => 'site_front_page_hor_promo_module',
	'default'     => 'none',
	'priority'    => 30,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_hor_promo_content',
	'label'     => __( 'Content', 'beonepage' ),
	'section'   => 'site_front_page_hor_promo_module',
	'default'   => 'We build more than just Themes. We build User Experience for both, you and your visitors.',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-hor-module .promo-box-hor p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_hor_promo_content_animation',
	'label'       => __( 'Content Animation', 'beonepage' ),
	'section'     => 'site_front_page_hor_promo_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_hor_promo_btn_text',
	'label'     => __( 'Button Text', 'beonepage' ),
	'section'   => 'site_front_page_hor_promo_module',
	'default'   => 'Start Browsing',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-hor-module .promo-btn .btn',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_hor_promo_btn_url',
	'label'     => __( 'Button URL', 'beonepage' ),
	'section'   => 'site_front_page_hor_promo_module',
	'default'   => 'http://betheme.me',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-hor-module .promo-btn a',
			'function' => 'attr',
			'property' => 'href'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_hor_promo_btn_animation',
	'label'       => __( 'Button Animation', 'beonepage' ),
	'section'     => 'site_front_page_hor_promo_module',
	'default'     => 'none',
	'priority'    => 80,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_hor_promo_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_hor_promo_module',
	'default'  => '1',
	'priority' => 90,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_hor_promo_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_hor_promo_module',
	'default'   => '#eceff3',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.promo-box-hor-module, .promo-box-ver h2',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.promo-box-hor-module, .promo-box-ver h2',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_hor_promo_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_hor_promo_module',
	'default'     => 'color',
	'priority'    => 110,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_hor_promo_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_hor_promo_module',
	'default'   => '#181a1c',
	'priority'  => 111,
	'output'    => array(
		array (
			'element'  => '.promo-box-hor-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_hor_promo_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_hor_promo_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_hor_promo_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 112,
	'output'      => '.promo-box-hor-module',
	'required' => array(
        array(
            'setting'  => 'front_page_hor_promo_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_hor_promo_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_hor_promo_module',
	'default'  => '1',
	'priority' => 113,
	'required' => array(
        array(
            'setting'  => 'front_page_hor_promo_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );
/* Horizontal Promotion Module Section End */

/* Blog Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_blog_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_blog_module',
	'default'     => 'blog-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_blog_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => 'Blog Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_blog_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => 'Subtitle for blog module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_blog_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_blog_module',
	'default'     => 'none',
	'priority'    => 40,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#181a1c',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module, .blog-module .entry-title, .blog-module .entry-cats',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#111',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#111',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_blog_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_blog_module',
	'default'     => 'color',
	'priority'    => 80,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#ffcc00',
	'priority'  => 81,
	'output'    => array(
		array (
			'element'  => '.blog-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_blog_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_blog_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_blog_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 82,
	'output'      => '.blog-module',
	'required' => array(
        array(
            'setting'  => 'front_page_blog_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_blog_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_blog_module',
	'default'  => '1',
	'priority' => 83,
	'required' => array(
        array(
            'setting'  => 'front_page_blog_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_blog_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_blog_module',
    'default'  => '',
    'priority' => 84,
	'required' => array(
        array(
            'setting'  => 'front_page_blog_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_blog_module_bg_notice',
    'section'  => 'site_front_page_blog_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 85,
	'required' => array(
        array(
            'setting'  => 'front_page_blog_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_pd_color',
	'label'     => __( 'Post Date Font Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#222',
	'priority'  => 90,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-item .entry-publish-date span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-item .entry-publish-date span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color-alpha',
	'settings'  => 'front_page_blog_module_pd_bg_color',
	'label'     => __( 'Post Date Background Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => 'rgba(255,255,255,.9)',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-item .entry-publish-date',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-item .entry-publish-date',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_blog_module_read_more',
	'label'     => __( 'Read More Button Text', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => 'Read More',
	'priority'  => 110,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module .read-more',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_rm_color',
	'label'     => __( 'Read More Font Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#181a1c',
	'priority'  => 120,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-item .read-more',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-item .read-more',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color-alpha',
	'settings'  => 'front_page_blog_module_rm_bg_color',
	'label'     => __( 'Read More Background Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => 'rgba(255,204,0,.9)',
	'priority'  => 130,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-item .read-more',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.blog-item .read-more',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_blog_module_view_more',
	'label'     => __( 'View More Button Text', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => 'View More',
	'priority'  => 140,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.blog-module .see-more-wrap .sm-text',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_vw_color',
	'label'     => __( 'View More Font Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#eee',
	'priority'  => 150,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.see-more-wrap .sm-container',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.see-more-wrap .sm-container',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_vw_icon_color',
	'label'     => __( 'View More Icon Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#eee',
	'priority'  => 160,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.see-more-wrap .sm-icon',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.see-more-wrap .sm-icon',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_blog_module_vw_bg_color',
	'label'     => __( 'View More Background Color', 'beonepage' ),
	'section'   => 'site_front_page_blog_module',
	'default'   => '#222',
	'priority'  => 170,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.see-more-wrap',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.see-more-wrap',
			'property' => 'background-color'
		)
	)
) );
/* Blog Module Section End */

/* Contact Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_contact_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_contact_module',
	'default'     => 'contact-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_contact_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '<span>Contact</span> Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_contact_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => 'Subtitle for contact module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_contact_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_contact_module',
	'default'     => 'none',
	'priority'    => 40,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_contact_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '#eceff3',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.contact-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_contact_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '#888',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.contact-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_contact_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '#ffcc00',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.contact-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_contact_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_contact_module',
	'default'     => 'color',
	'priority'    => 80,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_contact_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '#181a1c',
	'priority'  => 81,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module, #gmap .circle-left, #gmap .circle-right',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.contact-module, #gmap .circle-left, #gmap .circle-right',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_contact_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_contact_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 82,
	'output'      => '.contact-module',
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_contact_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_contact_module',
	'default'  => '1',
	'priority' => 83,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_contact_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_contact_module',
    'default'  => '',
    'priority' => 84,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_contact_module_bg_notice',
    'section'  => 'site_front_page_contact_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 85,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_contact_module_cf_animation',
	'label'       => __( 'Contact Form Animation', 'beonepage' ),
	'section'     => 'site_front_page_contact_module',
	'default'     => 'none',
	'priority'    => 90,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_contact_module_send',
	'label'     => __( 'Send Button Text', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => 'Send',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.contact-module button',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_contact_module_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_contact_module',
	'default'  => '1',
	'priority' => 110,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_contact_module_gmap',
	'label'    => __( 'Enable Google Maps?', 'beonepage' ),
	'section'  => 'site_front_page_contact_module',
	'default'  => '1',
	'priority' => 120
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_contact_module_gmap_lat',
	'label'     => __( 'Latitude', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '-19.9672019',
	'priority'  => 121,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_gmap',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_contact_module_gmap_lng',
	'label'     => __( 'Longitude', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'default'   => '-43.9493269',
	'priority'  => 122,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_gmap',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_contact_module_gmap_notice',
    'section'  => 'site_front_page_contact_module',
    'default'  => '<p><a href="' . esc_url( 'http://support.google.com/maps/answer/18539' ) . '" target="_blank">' . __( 'How to find latitude and longitude coordinates of a location?', 'beonepage' ) . '</a></p>',
    'priority' => 123,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_gmap',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_contact_module_gmap_api_key',
	'label'     => __( 'Google Maps API key', 'beonepage' ),
	'section'   => 'site_front_page_contact_module',
	'priority'  => 124,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_gmap',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_contact_module_gmap_api_link',
    'section'  => 'site_front_page_contact_module',
    'default'  => '<p><a href="' . esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ) . '" target="_blank">' . __( 'How to get an API key?', 'beonepage' ) . '</a></p>',
    'priority' => 125,
	'required' => array(
        array(
            'setting'  => 'front_page_contact_module_gmap',
            'operator' => '==',
            'value'    => '1'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_contact_module_notice',
    'section'  => 'site_front_page_contact_module',
    'default'  => '<p>' . __( "You can create contact items from Contact Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 130
) );
/* Contact Module Section End */

/* Process Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_process_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_process_module',
	'default'     => 'process-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_process_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '<span>Process</span> Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.process-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_process_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => 'Subtitle for process module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.process-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_process_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_process_module',
	'default'     => 'none',
	'priority'    => 40,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_process_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '#eceff3',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.process-module',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.line-process-wrapper .owl-dot span',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.process-module',
			'property' => 'color'
		),
		array(
			'element'  => '.line-process-wrapper .owl-dot span',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_process_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '#888',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.process-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.process-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_process_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '#ffcc00',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.process-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.process-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_process_module_label_color',
	'label'     => __( 'Process Label Color', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '#888',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.process-label',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.line-process-container',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.process-label',
			'property' => 'color'
		),
		array(
			'element'  => '.line-process-container',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_process_module_active_color',
	'label'     => __( 'Active Process Color', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '#ffcc00',
	'priority'  => 90,
	'output'    => array(
		array (
			'element'  => '.process-label .icon-clone, .process-label span:before',
			'property' => 'color'
		),
		array(
			'element'  => '.line-process, .line-process-wrapper .owl-dot span:after',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_process_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_process_module',
	'default'     => 'color',
	'priority'    => 100,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_process_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_process_module',
	'default'   => '#181a1c',
	'priority'  => 101,
	'output'    => array(
		array (
			'element'  => '.process-module, .line-process-wrapper .owl-dot.active span',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_process_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_process_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_process_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 102,
	'output'      => '.process-module',
	'required' => array(
        array(
            'setting'  => 'front_page_process_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_process_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_process_module',
	'default'  => '1',
	'priority' => 103,
	'required' => array(
        array(
            'setting'  => 'front_page_process_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_process_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_process_module',
    'default'  => '',
    'priority' => 104,
	'required' => array(
        array(
            'setting'  => 'front_page_process_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_process_module_bg_notice',
    'section'  => 'site_front_page_process_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 105,
	'required' => array(
        array(
            'setting'  => 'front_page_process_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_process_module_notice',
    'section'  => 'site_front_page_process_module',
    'default'  => '<p>' . __( "You can create process flow from Process Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 110
) );
/* Process Module Section End */

/* Team Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_team_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_team_module',
	'default'     => 'team-module',
	'priority'    => 20,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_team_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '<span>Team</span> Module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.team-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_team_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => 'Subtitle for team module',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.team-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_team_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_team_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_team_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '#eceff3',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.team-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.team-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_team_module_sp_color',
	'label'     => __( 'Separator Line & Dots Color', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '#888',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.team-module .separator span',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.team-module .owl-dot span, .team-module .owl-dot:after',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.team-module .separator span',
			'property' => 'color'
		),
		array (
			'element'  => '.team-module .owl-dot span, .team-module .owl-dot:after',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_team_module_sp_i_color',
	'label'     => __( 'Separator Circle & Active Dot Color', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '#ffcc00',
	'priority'  => 80,
	'output'    => array(
		array (
			'element'  => '.team-module .separator i, .team-member .member-title',
			'property' => 'color'
		),
		array (
			'element'  => '.team-module .owl-dot.active:after',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_team_module_bio_color',
	'label'     => __( 'Font Color for Bio', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '#ccc',
	'priority'  => 90,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.team-member .member-profile',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.team-member .member-profile',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_team_module_bio_bg_color',
	'label'     => __( 'Background Color for Bio', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '#111',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.team-member .member-profile',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.team-member .member-profile',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_team_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_team_module',
	'default'     => 'color',
	'priority'    => 110,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_team_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_team_module',
	'default'   => '#181a1c',
	'priority'  => 111,
	'output'    => array(
		array (
			'element'  => '.team-module, .team-member .member-card',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_team_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_team_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_team_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 112,
	'output'      => '.team-module',
	'required' => array(
        array(
            'setting'  => 'front_page_team_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_team_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_team_module',
	'default'  => '1',
	'priority' => 113,
	'required' => array(
        array(
            'setting'  => 'front_page_team_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_team_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_team_module',
    'default'  => '',
    'priority' => 114,
	'required' => array(
        array(
            'setting'  => 'front_page_team_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_team_module_bg_notice',
    'section'  => 'site_front_page_team_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 115,
	'required' => array(
        array(
            'setting'  => 'front_page_team_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_team_module_notice',
    'section'  => 'site_front_page_team_module',
    'default'  => '<p>' . __( "You can create team members from Team Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 120
) );
/* Team Module Section End */

/* Skill Bar Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_skill_bar_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_skill_bar_module',
	'default'     => 'skill-bar-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_skill_bar_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => '<span>Skill Bar</span> Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_skill_bar_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => 'Subtitle for skill bar module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'select',
	'settings' => 'front_page_skill_bar_module_animation',
	'label'    => __( 'Caption Animation', 'beonepage' ),
	'section'  => 'site_front_page_skill_bar_module',
	'default'  => 'none',
	'priority' => 40,
	'choices'  => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_skill_bar_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => '#eceff3',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.skill-bar-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_skill_bar_module_sp_color',
	'label'     => __( 'Separator Line & Progress Bar Color', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => '#888',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module .separator span',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.skill-bar .bar-line',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.skill-bar-module .separator span',
			'property' => 'color'
		),
		array (
			'element'  => '.skill-bar .bar-line',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_skill_bar_module_sp_i_color',
	'label'     => __( 'Separator Circle & Active Bar Color', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => '#ffcc00',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module .separator i',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.skill-bar .line-active',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.skill-bar-module .separator i',
			'property' => 'color'
		),
		array (
			'element'  => '.skill-bar .line-active',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_skill_bar_module_pct',
	'label'     => __( 'Percentage Background Color', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => '#272727',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar .line-active span',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.skill-bar .line-active span',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_skill_bar_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_skill_bar_module',
	'default'     => 'color',
	'priority'    => 90,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_skill_bar_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_skill_bar_module',
	'default'   => '#181a1c',
	'priority'  => 91,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.skill-bar-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_skill_bar_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_skill_bar_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_skill_bar_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 92,
	'output'      => '.skill-bar-module',
	'required' => array(
        array(
            'setting'  => 'front_page_skill_bar_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_skill_bar_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_skill_bar_module',
	'default'  => '1',
	'priority' => 93,
	'required' => array(
        array(
            'setting'  => 'front_page_skill_bar_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_skill_bar_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_skill_bar_module',
    'default'  => '',
    'priority' => 94,
	'required' => array(
        array(
            'setting'  => 'front_page_skill_bar_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_skill_bar_module_bg_notice',
    'section'  => 'site_front_page_skill_bar_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 95,
	'required' => array(
        array(
            'setting'  => 'front_page_skill_bar_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'editor',
	'settings'    => 'front_page_skill_bar_module_text',
	'label'       => __( 'Content Box', 'beonepage' ),
	'section'     => 'site_front_page_skill_bar_module',
	'default'     => '',
	'priority'    => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.skill-bar-module .content-box',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'select',
	'settings' => 'front_page_skill_bar_module_text_animation',
	'label'    => __( 'Content Box Animation', 'beonepage' ),
	'section'  => 'site_front_page_skill_bar_module',
	'default'  => 'none',
	'priority' => 110,
	'choices'  => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'repeater',
	'settings' => 'front_page_skill_bar_module_skill_bar',
	'label'    => __( 'Skill Bar', 'beonepage' ),
	'section'  => 'site_front_page_skill_bar_module',
	'priority' => 120,
	'default'  => array(),
	'fields'   => array(
		'skill_bar_label' => array(
			'type'    => 'text',
			'label'   => __( 'Skill Bar Label', 'beonepage' ),
			'default' => ''
		),
		'skill_bar_pct' => array(
			'type'    => 'text',
			'label'   => __( 'Skill Bar Percentage (e.g. 80%)', 'beonepage' ),
			'default' => ''
		)
	)
) );
/* Skill Bar Module Section End */

/* Testimonial Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_testimonial_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_testimonial_module',
	'default'     => 'testimonial-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_testimonial_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => '<span>Testimonial</span> Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.testimonial-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_testimonial_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => 'Subtitle for testimonial module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.testimonial-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_testimonial_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_testimonial_module',
	'default'     => 'none',
	'priority'    => 40,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_testimonial_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => '#eceff3',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.testimonial-module, .testimonial-name span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.testimonial-module, .testimonial-name span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_testimonial_module_sp_color',
	'label'     => __( 'Separator Line & Dots Color', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => '#888',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.testimonial-module .separator span',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.testimonial-module .owl-dot span, .testimonial-module .owl-dot:after',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.testimonial-module .separator span',
			'property' => 'color'
		),
		array (
			'element'  => '.testimonial-module .owl-dot span, .testimonial-module .owl-dot:after',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_testimonial_module_sp_i_color',
	'label'     => __( 'Separator Circle & Active Dot Color', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => '#ffcc00',
	'priority'  => 70,
	'output'    => array(
		array (
			'element'  => '.testimonial-module .separator i, .testimonial-member .member-title, .testimonial-box blockquote:before, .testimonial-box .testimonial-name',
			'property' => 'color'
		),
		array (
			'element'  => '.testimonial-module .owl-dot.active:after',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color-alpha',
	'settings'  => 'front_page_testimonial_module_box',
	'label'     => __( 'Testimonial Box Background Color', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => 'rgba(17,17,17,.8)',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.testimonial-box blockquote',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.testimonial-box blockquote',
			'property' => 'background-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_testimonial_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_testimonial_module',
	'default'     => 'color',
	'priority'    => 90,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_testimonial_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_testimonial_module',
	'default'   => '#181a1c',
	'priority'  => 91,
	'output'    => array(
		array (
			'element'  => '.testimonial-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_testimonial_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_testimonial_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_testimonial_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 92,
	'output'      => '.testimonial-module',
	'required' => array(
        array(
            'setting'  => 'front_page_testimonial_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_testimonial_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_testimonial_module',
	'default'  => '1',
	'priority' => 93,
	'required' => array(
        array(
            'setting'  => 'front_page_testimonial_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_testimonial_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_testimonial_module',
    'default'  => '',
    'priority' => 94,
	'required' => array(
        array(
            'setting'  => 'front_page_testimonial_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_testimonial_module_bg_notice',
    'section'  => 'site_front_page_testimonial_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 95,
	'required' => array(
        array(
            'setting'  => 'front_page_testimonial_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_testimonial_module_notice',
    'section'  => 'site_front_page_testimonial_module',
    'default'  => '<p>' . __( "You can create testimonials from Testimonial Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 100
) );
/* Testimonial Module Section End */

/* Client Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_client_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_client_module',
	'default'     => 'client-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_client_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_client_module',
	'default'     => 'color',
	'priority'    => 20,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_client_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_client_module',
	'default'   => '#181a1c',
	'priority'  => 21,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.client-module',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.client-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_client_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_client_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_client_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 22,
	'output'      => '.client-module',
	'required' => array(
        array(
            'setting'  => 'front_page_client_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_client_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_client_module',
	'default'  => '1',
	'priority' => 23,
	'required' => array(
        array(
            'setting'  => 'front_page_client_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );
/* Client Module Section End */

/* Fun Fact Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_fun_fact_module_layout',
	'label'       => __( 'Layout', 'beonepage' ),
	'description' => __( 'Choose the layout for the container.', 'beonepage' ),
	'section'     => 'site_front_page_fun_fact_module',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => array(
		'fixed' => __( 'Fixed-width', 'beonepage' ),
		'full'  => __( 'Full-width', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_fun_fact_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_fun_fact_module',
	'default'     => 'fun-fact-module',
	'priority'    => 20,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_fun_fact_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_fun_fact_module',
	'default'   => '#eceff3',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.fun-fact-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.fun-fact-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_fun_fact_module_label',
	'label'     => __( 'Label Color', 'beonepage' ),
	'section'   => 'site_front_page_fun_fact_module',
	'default'   => '#ffcc00',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.fun-fact-module .fact-text',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.fun-fact-module .fact-text',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_fun_fact_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_fun_fact_module',
	'default'     => 'color',
	'priority'    => 50,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_fun_fact_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_fun_fact_module',
	'default'   => '#181a1c',
	'priority'  => 51,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.fun-fact-module',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.fun-fact-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_fun_fact_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_fun_fact_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_fun_fact_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 52,
	'output'      => '.fun-fact-module',
	'required' => array(
        array(
            'setting'  => 'front_page_fun_fact_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_fun_fact_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_fun_fact_module',
	'default'  => '1',
	'priority' => 53,
	'required' => array(
        array(
            'setting'  => 'front_page_fun_fact_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'repeater',
	'settings' => 'front_page_fun_fact_module_fact',
	'label'    => __( 'Fun Fact', 'beonepage' ),
	'section'  => 'site_front_page_fun_fact_module',
	'priority' => 60,
	'default'  => array(),
	'fields'   => array(
		'fact_label' => array(
			'type'    => 'text',
			'label'   => __( 'Fact Label', 'beonepage' ),
			'default' => ''
		),
		'fact_num'   => array(
			'type'    => 'text',
			'label'   => __( 'Fact Number', 'beonepage' ),
			'default' => ''
		)
	)
) );
/* Fun Fact Module Section End */

/* Pricing Table Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_pricing_table_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_pricing_table_module',
	'default'     => 'pricing-table-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_pricing_table_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '<span>Pricing Table</span> Module',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.pricing-table-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_pricing_table_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => 'Subtitle for pricing table module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.pricing-table-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_pricing_table_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_pricing_table_module',
	'default'     => 'none',
	'priority'    => 40,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_pricing_table_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '#eceff3',
	'priority'  => 50,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.pricing-table-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.pricing-table-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_pricing_table_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '#888',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.pricing-table-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.pricing-table-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_pricing_table_module_sp_i_color',
	'label'     => __( 'Separator Circle & Featured Table Color', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '#ffcc00',
	'priority'  => 70,
	'output'    => array(
		array (
			'element'  => '.pricing-table-module .separator i, .item-price',
			'property' => 'color'
		),
		array(
			'element'  => '.pb-active-price, .pb-special-price, .pb-star',
			'property' => 'background-color'
		),
		array (
			'element'  => '.item-price',
			'property' => 'border-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_pricing_table_module_box',
	'label'     => __( 'Pricing Table Box Font Color', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '#eceff3',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.pricing-item, .pb-star, .pb-active-price, .pb-special-price',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.pricing-item, .pb-star, .pb-active-price, .pb-special-price',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_pricing_table_module_box_bg',
	'label'     => __( 'Pricing Table Box Background Color', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '#111',
	'priority'  => 90,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.pricing-item',
			'function' => 'css',
			'property' => 'background-color'
		),
		array(
			'element'  => '.pb-star:after',
			'function' => 'css',
			'property' => 'border-bottom-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.pricing-item',
			'property' => 'background-color'
		),
		array (
			'element'  => '.pb-star:after',
			'property' => 'border-bottom-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_pricing_table_module_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_pricing_table_module',
	'default'  => '1',
	'priority' => 100,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_pricing_table_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_pricing_table_module',
	'default'     => 'color',
	'priority'    => 110,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_pricing_table_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_pricing_table_module',
	'default'   => '#181a1c',
	'priority'  => 111,
	'output'    => array(
		array (
			'element'  => '.pricing-table-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_pricing_table_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_pricing_table_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_pricing_table_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 112,
	'output'      => '.pricing-table-module',
	'required' => array(
        array(
            'setting'  => 'front_page_pricing_table_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_pricing_table_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_pricing_table_module',
	'default'  => '1',
	'priority' => 113,
	'required' => array(
        array(
            'setting'  => 'front_page_pricing_table_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_pricing_table_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_pricing_table_module',
    'default'  => '',
    'priority' => 114,
	'required' => array(
        array(
            'setting'  => 'front_page_pricing_table_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_pricing_table_module_bg_notice',
    'section'  => 'site_front_page_pricing_table_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 115,
	'required' => array(
        array(
            'setting'  => 'front_page_pricing_table_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_pricing_table_module_notice',
    'section'  => 'site_front_page_pricing_table_module',
    'default'  => '<p>' . __( "You can create pricing items from Pricing Table Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>',
    'priority' => 120
) );
/* Pricing Table Module Section End */

/* Twitter Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_twitter_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_twitter_module',
	'default'     => 'twitter-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_twitter_twitter_animation',
	'label'       => __( 'Twitter Logo Animation', 'beonepage' ),
	'section'     => 'site_front_page_twitter_module',
	'default'     => 'none',
	'priority'    => 20,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_twitter_username',
	'label'     => __( 'Twitter Username', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '',
	'priority'  => 30
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_twitter_tck',
	'label'     => __( 'Consumer Key', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '',
	'priority'  => 40
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_twitter_tcs',
	'label'     => __( 'Consumer Secret', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '',
	'priority'  => 50
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_twitter_tat',
	'label'     => __( 'Access Token', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '',
	'priority'  => 60
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_twitter_tats',
	'label'     => __( 'Access Token Secret', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '',
	'priority'  => 70
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_contact_module_twitter_notice',
    'section'  => 'site_front_page_twitter_module',
    'default'  => '<p><a href="' . esc_url( 'http://docs.betheme.me/article/32-getting-twitter-api-consumer-and-secret-keys' ) . '" target="_blank">' . __( 'How to get Twitter API Consumer and Secret Keys?', 'beonepage' ) . '</a></p>',
    'priority' => 80
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_btn_text',
	'label'     => __( 'Button Text', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => 'Follow Us',
	'priority'  => 90,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.twitter-module .twitter-btn .btn',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_twitter_btn_url',
	'label'     => __( 'Button URL', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => 'http://betheme.me',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.twitter-module .twitter-btn a',
			'function' => 'attr',
			'property' => 'href'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_twitter_btn_animation',
	'label'       => __( 'Button Animation', 'beonepage' ),
	'section'     => 'site_front_page_twitter_module',
	'default'     => 'none',
	'priority'    => 110,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'front_page_twitter_btn_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_front_page_twitter_module',
	'default'  => '1',
	'priority' => 120,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_twitter_color',
	'label'     => __( 'Tweet Color', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '#eceff3',
	'priority'  => 130,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.twitter-module',
			'function' => 'css',
			'property' => 'color'
		),
		array(
			'element'  => '.twitter-module .owl-dot span, .twitter-module .owl-dot:after',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.twitter-module',
			'property' => 'color'
		),
		array (
			'element'  => '.twitter-module .owl-dot span, .twitter-module .owl-dot:after',
			'property' => 'background-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_twitter_link_color',
	'label'     => __( 'Twitter Logo & Link Color', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '#ffcc00',
	'priority'  => 140,
	'output'    => array(
		array (
			'element'  => '.twitter-module .twitter-icon, .twitter-module .tweet a',
			'property' => 'color'
		),
		array (
			'element'  => '.twitter-module .owl-dot.active:after',
			'property' => 'background-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_twitter_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_twitter_module',
	'default'     => 'color',
	'priority'    => 150,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_twitter_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_twitter_module',
	'default'   => '#181a1c',
	'priority'  => 151,
	'output'    => array(
		array (
			'element'  => '.twitter-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_twitter_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_twitter_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_twitter_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 152,
	'output'      => '.twitter-module',
	'required' => array(
        array(
            'setting'  => 'front_page_twitter_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_twitter_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_twitter_module',
	'default'  => '1',
	'priority' => 153,
	'required' => array(
        array(
            'setting'  => 'front_page_twitter_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_twitter_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_twitter_module',
    'default'  => '',
    'priority' => 154,
	'required' => array(
        array(
            'setting'  => 'front_page_twitter_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_twitter_module_bg_notice',
    'section'  => 'site_front_page_twitter_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 155,
	'required' => array(
        array(
            'setting'  => 'front_page_twitter_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );
/* Twitter Module Section End */

/* MailChimp Subscribe Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_subscribe_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_subscribe_module',
	'default'     => 'subscribe-module',
	'priority'    => 10,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_subscribe_title',
	'label'     => __( 'Heading', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => '<span>Subscribe</span> to Our <span>Newsletter</span>',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.subscribe-module h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_subscribe_title_animation',
	'label'       => __( 'Heading Animation', 'beonepage' ),
	'section'     => 'site_front_page_subscribe_module',
	'default'     => 'none',
	'priority'    => 30,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_subscribe_content',
	'label'     => __( 'Content', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => 'We make sure you do not miss any news.',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.subscribe-module p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_subscribe_content_animation',
	'label'       => __( 'Content Animation', 'beonepage' ),
	'section'     => 'site_front_page_subscribe_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_subscribe_mailchimp_api',
	'label'     => __( 'MailChimp API Key', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => '',
	'priority'  => 60
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_subscribe_mailchimp_list',
	'label'     => __( 'MailChimp List ID', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => '',
	'priority'  => 70
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_subscribe_mailchimp_api_notice',
    'section'  => 'site_front_page_subscribe_module',
    'default'  => '<p><a href="' . esc_url( 'http://docs.betheme.me/article/33-getting-mailchimp-api-key-and-list-id' ) . '" target="_blank">' . __( 'How to get MailChimp API Key and List ID?', 'beonepage' ) . '</a></p>',
    'priority' => 80
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_subscribe_btn_text',
	'label'     => __( 'Button Text', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => 'Notify Me',
	'priority'  => 90,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.subscribe-module .btn',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_subscribe_btn_animation',
	'label'       => __( 'Button Animation', 'beonepage' ),
	'section'     => 'site_front_page_subscribe_module',
	'default'     => 'none',
	'priority'    => 100,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_subscribe_btn_color',
	'label'     => __( 'Button Color', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => '#ffcc00',
	'priority'  => 110,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.subscribe-module .input-group-btn',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.subscribe-module .input-group-btn',
			'property' => 'background-color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_subscribe_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => '#eceff3',
	'priority'  => 120,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.subscribe-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.subscribe-module',
			'property' => 'color'
		)
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_subscribe_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_subscribe_module',
	'default'     => 'color',
	'priority'    => 130,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_subscribe_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_subscribe_module',
	'default'   => '#181a1c',
	'priority'  => 131,
	'output'    => array(
		array (
			'element'  => '.subscribe-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_subscribe_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_subscribe_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_subscribe_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 132,
	'output'      => '.subscribe-module',
	'required' => array(
        array(
            'setting'  => 'front_page_subscribe_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_subscribe_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_subscribe_module',
	'default'  => '1',
	'priority' => 133,
	'required' => array(
        array(
            'setting'  => 'front_page_subscribe_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );
/* MailChimp Subscribe Module Section End */

/* Widget Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_widget_module_layout',
	'label'       => __( 'Layout', 'beonepage' ),
	'description' => __( 'Choose the layout for the container.', 'beonepage' ),
	'section'     => 'site_front_page_widget_module',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => array(
		'fixed' => __( 'Fixed-width', 'beonepage' ),
		'full'  => __( 'Full-width', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_widget_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_widget_module',
	'default'     => 'widget-module',
	'priority'    => 20,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_widget_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'default'   => '<span>Widget</span> Module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.widget-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_widget_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'default'   => 'Subtitle for skill bar module',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.widget-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'select',
	'settings' => 'front_page_widget_module_animation',
	'label'    => __( 'Caption Animation', 'beonepage' ),
	'section'  => 'site_front_page_widget_module',
	'default'  => 'none',
	'priority' => 50,
	'choices'  => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_widget_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'default'   => '#eceff3',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.widget-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.widget-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_widget_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'default'   => '#888',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.widget-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.widget-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_widget_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'default'   => '#ffcc00',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.widget-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.widget-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_widget_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_widget_module',
	'default'     => 'color',
	'priority'    => 90,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_widget_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'default'   => '#181a1c',
	'priority'  => 91,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.widget-module',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.widget-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_widget_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_widget_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_widget_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 92,
	'output'      => '.widget-module',
	'required' => array(
        array(
            'setting'  => 'front_page_widget_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_widget_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_widget_module',
	'default'  => '1',
	'priority' => 93,
	'required' => array(
        array(
            'setting'  => 'front_page_widget_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_widget_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_widget_module',
    'default'  => '',
    'priority' => 94,
	'required' => array(
        array(
            'setting'  => 'front_page_widget_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_widget_module_bg_notice',
    'section'  => 'site_front_page_widget_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 95,
	'required' => array(
        array(
            'setting'  => 'front_page_widget_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'repeater',
	'settings'  => 'front_page_widget_module_widget',
	'label'     => __( 'Widget Area', 'beonepage' ),
	'section'   => 'site_front_page_widget_module',
	'priority'  => 100,
	'transport' => 'postMessage',
	'default'   => array(),
	'fields'    => array(
		'widget_name' => array(
			'type'    => 'text',
			'label'   => __( 'Widget Area Name', 'beonepage' ),
			'default' => ''
		),
		'widget_num' => array(
			'type'    => 'select',
			'label'   => __( 'Number of Widgets per Row', 'beonepage' ),
			'default' => '1',
			'choices' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6'
			)
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_widget_module_notice',
    'section'  => 'site_front_page_widget_module',
    'default'  => '<p>' . __( 'First you need to create widget areas, save and refresh the page, then go to Customizer -> Widgets to manage widgets.', 'beonepage' ) . '</p>',
    'priority' => 110
) );
/* Widget Module Section End */

/* Custom Module Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_custom_module_layout',
	'label'       => __( 'Layout', 'beonepage' ),
	'description' => __( 'Choose the layout for the container.', 'beonepage' ),
	'section'     => 'site_front_page_custom_module',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => array(
		'fixed' => __( 'Fixed-width', 'beonepage' ),
		'full'  => __( 'Full-width', 'beonepage' ),
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'text',
	'settings'    => 'front_page_custom_module_id',
	'label'       => __( 'Module ID', 'beonepage' ),
	'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
	'section'     => 'site_front_page_custom_module',
	'default'     => 'custom-module',
	'priority'    => 20,
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'front_page_custom_module_title',
	'label'     => __( 'Title', 'beonepage' ),
	'help'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
	'section'   => 'site_front_page_custom_module',
	'default'   => '<span>Custom</span> Module',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.custom-module .module-caption h2',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'textarea',
	'settings'  => 'front_page_custom_module_subtitle',
	'label'     => __( 'Subtitle', 'beonepage' ),
	'section'   => 'site_front_page_custom_module',
	'default'   => 'Subtitle for custom module',
	'priority'  => 40,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.custom-module .module-caption p',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'front_page_custom_module_animation',
	'label'       => __( 'Caption Animation', 'beonepage' ),
	'section'     => 'site_front_page_custom_module',
	'default'     => 'none',
	'priority'    => 50,
	'choices'     => beonepage_animate()
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_custom_module_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_front_page_custom_module',
	'default'   => '#eceff3',
	'priority'  => 60,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.custom-module',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.custom-module',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_custom_module_sp_color',
	'label'     => __( 'Separator Line Color', 'beonepage' ),
	'section'   => 'site_front_page_custom_module',
	'default'   => '#888',
	'priority'  => 70,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.custom-module .separator span',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.custom-module .separator span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_custom_module_sp_i_color',
	'label'     => __( 'Separator Circle Color', 'beonepage' ),
	'section'   => 'site_front_page_custom_module',
	'default'   => '#ffcc00',
	'priority'  => 80,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.custom-module .separator i',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.custom-module .separator i',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'front_page_custom_module_bg',
	'label'       => __( 'Background', 'beonepage' ),
	'section'     => 'site_front_page_custom_module',
	'default'     => 'color',
	'priority'    => 90,
	'choices'     => array(
		'color' => __( 'Color', 'beonepage' ),
		'image' => __( 'Image', 'beonepage' ),
		'video' => __( 'Video', 'beonepage' )
	),
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'front_page_custom_module_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_front_page_custom_module',
	'default'   => '#181a1c',
	'priority'  => 91,
	'output'    => array(
		array (
			'element'  => '.custom-module',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'front_page_custom_module_bg',
            'operator' => '==',
            'value'    => 'color'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'background',
	'setting'     => 'front_page_custom_module_bg_img',
	'label'       => __( 'Background Image', 'beonepage' ),
	'section'     => 'site_front_page_custom_module',
	'default'     => array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	),
	'priority'    => 92,
	'output'      => '.custom-module',
	'required' => array(
        array(
            'setting'  => 'front_page_custom_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'front_page_custom_module_bg_parallax',
	'label'    => __( 'Enable Parallax Scrolling?', 'beonepage' ),
	'section'  => 'site_front_page_custom_module',
	'default'  => '1',
	'priority' => 93,
	'required' => array(
        array(
            'setting'  => 'front_page_custom_module_bg',
            'operator' => '==',
            'value'    => 'image'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'text',
    'settings' => 'front_page_custom_module_bg_video',
    'label'    => __( 'YouTube URL', 'beonepage' ),
    'section'  => 'site_front_page_custom_module',
    'default'  => '',
    'priority' => 94,
	'required' => array(
        array(
            'setting'  => 'front_page_custom_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'front_page_custom_module_bg_notice',
    'section'  => 'site_front_page_custom_module',
    'default'  => "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>",
    'priority' => 95,
	'required' => array(
        array(
            'setting'  => 'front_page_custom_module_bg',
            'operator' => '==',
            'value'    => 'video'
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'editor',
	'settings'    => 'front_page_custom_module_content',
	'label'       => __( 'Content Box', 'beonepage' ),
	'section'     => 'site_front_page_custom_module',
	'default'     => '',
	'priority'    => 100
) );
/* Custom Module Section End */
/* Front Page Panel End */

/* Blog Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'background',
	'setting'  => 'blog_page_header_bg',
	'label'    => __( 'Header Image', 'beonepage' ),
	'section'  => 'site_blog_page',
	'default'  => array(
		'image'    => get_template_directory_uri() . '/images/header_bg.jpg',
		'position' => 'center-center'
	),
	'priority' => 10,
	'output'   => '.page-header',
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'blog_page_header_color',
	'label'     => __( 'Header Font Color', 'beonepage' ),
	'section'   => 'site_blog_page',
	'default'   => '#eceff3',
	'priority'  => 20,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.page-header',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.page-header',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'blog_page_bg_color',
	'label'     => __( 'Body Background Color', 'beonepage' ),
	'section'   => 'site_blog_page',
	'default'   => '#18191b',
	'priority'  => 30,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => 'body, .woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beagency_kirki', array(
    'type'     => 'color',
    'settings' => 'blog_page_accent_color',
    'label'    => __( 'Accent Color', 'beonepage' ),
    'section'  => 'site_blog_page',
    'default'  => '#ffcc00',
    'priority' => 40,
	'output'   => array(
		array(
			'element'  => 'h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, .bcrumbs .active, article a, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce div.product .stock, .woocommerce .woocommerce-info:before, .woocommerce .woocommerce-message:before, .woocommerce a.remove, .woocommerce ul.product_list_widget ins, .product_meta span a',
			'property' => 'color'
		),
		array(
			'element'  => '.woocommerce a.remove',
			'property' => 'color',
			'units'    => '!important'
		),
		array(
			'element'  => 'ins, #contact-form-result span, #subscribe-form-result, .blog-list .post-date-day, .blog-list .btn-more, .posts-navigation ul li.active a, .widget .widget-title:after, .woocommerce span.onsale, #oc-product .owl-dot.active:after',
			'property' => 'background-color'
		),
		array(
			'element'  => '::selection',
			'property' => 'background-color'
		),
		array(
			'element'  => '::-moz-selection',
			'property' => 'background-color'
		),
		array(
			'element'  => '.posts-navigation ul li.active a, .posts-navigation ul li.active a:hover',
			'property' => 'border-color'
		),
		array(
			'element'  => 'blockquote',
			'property' => 'border-left-color'
		),
		array(
			'element'  => '.blog-list .entry-content, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message',
			'property' => 'border-top-color'
		),
		array(
			'element'  => '.single-post .entry-image',
			'property' => 'border-bottom-color'
		)
	)
) );

Kirki::add_field( 'beagency_kirki', array(
    'type'      => 'color',
    'settings'  => 'blog_page_text_color',
    'label'     => __( 'Text Color', 'beonepage' ),
    'section'   => 'site_blog_page',
    'default'   => '#eee',
    'priority'  => 50,
	'output'    => array(
		array(
			'element'  => 'body, .posts-navigation ul li a:hover, .posts-navigation ul li.active a',
			'property' => 'color'
		),
		array(
			'element'  => '.blog-list .btn-more:hover, #oc-product .owl-dot span, #oc-product .owl-dot:after',
			'property' => 'background-color'
		),
		array(
			'element'  => '.nav-links li a:hover, .posts-navigation ul li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li',
			'property' => 'border-color'
		),
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs:before',
			'property' => 'border-bottom-color'
		)
	)
) );

Kirki::add_field( 'beagency_kirki', array(
    'type'        => 'color',
    'settings'     => 'blog_page_additional_color_1',
    'label'       => __( 'Additional  Color', 'beonepage' ),
    'description' => __( 'This additional color defines the color of Read More and Post Date.', 'beonepage' ),
    'section'     => 'site_blog_page',
    'default'     => '#111',
    'priority'    => 60,
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.blog-list .post-date-day, .blog-list .btn-more',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'      => array(
		array(
			'element'  => '.blog-list .post-date-day, .blog-list .btn-more',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beagency_kirki', array(
    'type'        => 'color',
    'settings'     => 'blog_page_additional_color_2',
    'label'       => __( 'Additional Color', 'beonepage' ),
    'description' => __( 'This additional color defines the color of Navigation and Post Meta for Widgets.', 'beonepage' ),
    'section'     => 'site_blog_page',
    'default'     => '#aaa',
    'priority'    => 70,
	'output'      => array(
		array(
			'element'  => '.posts-navigation ul li a, .widget:not(.woocommerce) ul li span',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beagency_kirki', array(
    'type'        => 'color',
    'settings'     => 'blog_page_sp_color',
    'label'       => __( 'Border & Separator Line Color', 'beonepage' ),
    'section'     => 'site_blog_page',
    'default'     => '#333',
    'priority'    => 80,
	'output'      => array(
		array(
			'element'  => '.comment-avatar',
			'property' => 'background-color'
		),
		array(
			'element'  => 'textarea, input[type="text"], input[type="email"], .nav-links li a, .posts-navigation ul li a, .comment-body, .comment-avatar, .widget .tagcloud a, .woocommerce #reviews #comments ol.commentlist, .woocommerce #reviews #comments ol.commentlist li img.avatar, .woocommerce #reviews #comments ol.commentlist li .comment-text',
			'property' => 'border-color'
		),
		array(
			'element'  => '.comments-area',
			'property' => 'border-top-color'
		),
		array(
			'element'  => '.single-post .entry-meta, .single-post .entry-footer, .search-list article, .blog-list article, .blog-list .post-date-month, .comment-list, .widget',
			'property' => 'border-bottom-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_page_button_style',
	'label'    => __( 'Button Style', 'beonepage' ),
	'section'  => 'site_blog_page',
	'default'  => '1',
	'priority' => 90,
	'choices'  => array(
		'1' => __( 'Light', 'beonepage' ),
		'2' => __( 'Dark', 'beonepage' )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'text',
	'settings'  => 'blog_page_read_more',
	'label'     => __( 'Read More Button Text', 'beonepage' ),
	'section'   => 'site_blog_page',
	'default'   => 'Read More',
	'priority'  => 100,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.entry-footer .btn-more',
			'function' => 'html',
			'property' => 'text'
		)
    )
) );
/* Blog Section End */

/* Footer Section Start */
Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'footer_color',
	'label'     => __( 'Font Color', 'beonepage' ),
	'section'   => 'site_footer',
	'default'   => '#eee',
	'priority'  => 10,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.site-footer',
			'function' => 'css',
			'property' => 'color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.site-footer',
			'property' => 'color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'footer_bg_color',
	'label'     => __( 'Background Color', 'beonepage' ),
	'section'   => 'site_footer',
	'default'   => '#0b0b0b',
	'priority'  => 20,
	'output'    => array(
		array (
			'element'  => '.site-footer',
			'property' => 'background-color'
		)
	)
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'footer_site_logo',
	'label'    => __( 'Show Site Logo?', 'beonepage' ),
	'section'  => 'site_footer',
	'default'  => '0',
	'priority' => 30
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_site_logo_animation',
	'label'       => __( 'Site Logo Animation', 'beonepage' ),
	'section'     => 'site_footer',
	'default'     => 'none',
	'priority'    => 31,
	'choices'     => beonepage_animate(),
	'required' => array(
        array(
            'setting'  => 'footer_site_logo',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'footer_site_title',
	'label'    => __( 'Show Site Title?', 'beonepage' ),
	'section'  => 'site_footer',
	'default'  => '1',
	'priority' => 40
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_site_title_animation',
	'label'       => __( 'Site Title Animation', 'beonepage' ),
	'section'     => 'site_footer',
	'default'     => 'none',
	'priority'    => 41,
	'choices'     => beonepage_animate(),
	'required' => array(
        array(
            'setting'  => 'footer_site_title',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beagency_kirki', array(
	'type'     => 'checkbox',
	'settings' => 'footer_social_link',
	'label'    => __( 'Enable Social Links?', 'beonepage' ),
	'section'  => 'site_footer',
	'default'  => '1',
	'priority' => 50
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_social_link_animation',
	'label'       => __( 'Social Links Animation', 'beonepage' ),
	'section'     => 'site_footer',
	'default'     => 'none',
	'priority'    => 51,
	'choices'     => beonepage_animate(),
	'required' => array(
        array(
            'setting'  => 'footer_social_link',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'      => 'color',
	'settings'  => 'footer_social_link_bg_color',
	'label'     => __( 'Icon Background Color', 'beonepage' ),
	'section'   => 'site_footer',
	'default'   => '#272727',
	'priority'  => 52,
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.social-link a',
			'function' => 'css',
			'property' => 'background-color'
		)
    ),
	'output'    => array(
		array (
			'element'  => '.social-link a',
			'property' => 'background-color'
		)
	),
	'required' => array(
        array(
            'setting'  => 'footer_social_link',
            'operator' => '==',
            'value'    => 1
        )
    )
) );

Kirki::add_field( 'beonepage_kirki', array(
	'type'     => 'editor',
	'settings' => 'footer_copyright',
	'label'    => __( 'Copyright Information', 'beonepage' ),
	'help'     => __( 'Want to remove the theme byline? See section "Upgrade" for more information.', 'beonepage' ),
	'section'  => 'site_footer',
	'default'  => __( 'Copyrights &copy; 2016. All Rights Reserved.', 'beonepage'),
	'priority' => 60
) );

Kirki::add_field( 'beonepage_kirki', array(
    'type'     => 'custom',
    'settings' => 'footer_remove_copyright',
    'section'  => 'site_footer',
    'default'  => '<i>' . __( 'Note: to remove theme byline, you need activate your', 'beonepage' ) . ' ' . '<a href="' . admin_url( 'themes.php?page=' . get_template() . '-license' ) . '">' . __( 'theme license', 'beonepage' ) . '</a>.</i>',
    'priority' => 70
) );
/* Footer Section End */

/**
 * Check if it's a blog page.
 */
function beonepage_is_blog_page() {
	if ( is_front_page() ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Animate array.
 */
function beonepage_animate() {
	$animate = array(
		'none'          => __( 'none', 'beonepage' ),
		'flash'         => __( 'flash', 'beonepage' ),
		'pulse'         => __( 'pulse', 'beonepage' ),
		'rubberBand'    => __( 'rubberBand', 'beonepage' ),
		'shake'         => __( 'shake', 'beonepage' ),
		'swing'         => __( 'swing', 'beonepage' ),
		'tada'          => __( 'tada', 'beonepage' ),
		'wobble'        => __( 'wobble', 'beonepage' ),
		'jello'         => __( 'jello', 'beonepage' ),
		'bounce'        => __( 'bounce', 'beonepage' ),
		'bounceIn'      => __( 'bounceIn', 'beonepage' ),
		'bounceInLeft'  => __( 'bounceInLeft', 'beonepage' ),
		'bounceInRight' => __( 'bounceInRight', 'beonepage' ),
		'bounceInUp'    => __( 'bounceInUp', 'beonepage' ),
		'bounceInDown'  => __( 'bounceInDown', 'beonepage' ),
		'fadeIn'        => __( 'FadeIn', 'beonepage' ),
		'fadeInLeft'    => __( 'FadeInLeft', 'beonepage' ),
		'fadeInRight'   => __( 'FadeInRight', 'beonepage' ),
		'fadeInUp'      => __( 'FadeInUp', 'beonepage' ),
		'fadeInDown'    => __( 'FadeInDown', 'beonepage' ),
		'flipInX'       => __( 'flipInX', 'beonepage' ),
		'flipInY'       => __( 'flipInY', 'beonepage' ),
		'slideInLeft'   => __( 'slideInLeft', 'beonepage' ),
		'slideInRight'  => __( 'slideInRight', 'beonepage' ),
		'slideInUp'     => __( 'slideInUp', 'beonepage' ),
		'slideInDown'   => __( 'slideInDown', 'beonepage' ),
		'zoomIn'        => __( 'zoomIn', 'beonepage' ),
		'zoomInLeft'    => __( 'zoomInLeft', 'beonepage' ),
		'zoomInRight'   => __( 'zoomInRight', 'beonepage' ),
		'zoomInUp'      => __( 'zoomInUp', 'beonepage' ),
		'zoomInDown'    => __( 'zoomInDown', 'beonepage' )
	);

	return $animate;
}

/**
 * Configuration for the Kirki Customizer.
 */
function beonepage_kirki_configuration() {
	$args = array(
		'logo_image' => 'http://betheme.me/wp-content/uploads/2015/09/logo.png'
	);

	return $args;
}
add_filter( 'kirki/config', 'beonepage_kirki_configuration' );

/**
 * Change the URL that will be used by Kirki
 * to load its assets in the customizer.
 */
function beonepage_kirki_update_url( $config ) {
    $config['url_path'] = get_template_directory_uri() . '/inc/kirki/';

    return $config;
}
add_filter( 'kirki/config', 'beonepage_kirki_update_url' );

function beonepage_choose_google_font_variants( $chosen_variants, $font, $variants ) {
	if ( in_array( '300', $variants ) ) {
		$chosen_variants[] = '300';
	}

	if ( in_array( '500', $variants ) ) {
		$chosen_variants[] = '500';
	}

	if ( in_array( '600', $variants ) ) {
		$chosen_variants[] = '600';
	}

	return array_unique( $chosen_variants );
}
add_filter( 'kirki/font/variants', 'beonepage_choose_google_font_variants', 10, 3 );
