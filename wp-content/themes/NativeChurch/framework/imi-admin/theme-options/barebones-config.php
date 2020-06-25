<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "imic_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'framework' ),
        'page_title'           => esc_html__( 'Theme Options', 'framework' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'imi-admin-welcome',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

 	$ext_path = get_template_directory() . '/framework/imi-admin/theme-options/extensions/';
    Redux::setExtensions( $opt_name, $ext_path );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/imithemes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/imithemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
    } else {
    }

    Redux::setArgs( $opt_name, $args );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'framework' );
    Redux::setHelpSidebar( $opt_name, $content );

	$defaultAdminLogo = get_template_directory_uri().'/assets/images/logo@2x.png';
	$defaultBannerImages = get_template_directory_uri().'/assets/images/page-header1.jpg';
	$default_favicon = get_template_directory_uri() . '/assets/images/favicon.ico';
	$default_iphone = get_template_directory_uri() . '/assets/images/apple-iphone.png';
	$default_iphone_retina = get_template_directory_uri() . '/assets/images/apple-iphone-retina.png';
	$default_ipad = get_template_directory_uri() . '/assets/images/apple-ipad.png';
	$default_ipad_retina = get_template_directory_uri() . '/assets/images/apple-ipad-retina.png';
	$default_option_value = get_option('imic_options');
	$old_social_facebook = (isset($default_option_value['social-facebook']))?$default_option_value['social-facebook']:'Facebook';
	$old_social_twitter = (isset($default_option_value['social-twitter']))?$default_option_value['social-twitter']:'Twitter';
	$old_social_pinterest = (isset($default_option_value['social-pinterest']))?$default_option_value['social-pinterest']:'Pinterest';
	$old_social_gplus = (isset($default_option_value['social-googleplus']))?$default_option_value['social-googleplus']:'Plus';
	$old_social_ytube = (isset($default_option_value['social-youtube']))?$default_option_value['social-youtube']:'Youtube';
	$old_social_instagram = (isset($default_option_value['social-instagram']))?$default_option_value['social-instagram']:'Instagram';
	$old_social_vimeo = (isset($default_option_value['social-vimeo']))?$default_option_value['social-vimeo']:'Vimeo';
	$old_social_rss = (isset($default_option_value['site-rss']))?$default_option_value['site-rss']:'Rss';
	$default_logo = get_template_directory_uri() . '/assets/images/logo.png';
	$default_cover = get_template_directory_uri() . '/assets/images/cover.png';
	
    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
	'icon' => 'el-icon-cogs',
	'icon_class' => 'icon-large',
	'title' => esc_html__('General', 'framework'),
	'fields' => array(
        array(
            'id' => 'enable_maintenance',
            'type' => 'switch',
            'title' => esc_html__('Enable Maintenance', 'framework'),
            'subtitle' => esc_html__('Enable the themes in maintenance mode.', 'framework'),
            "default" => 0,
            'on' => esc_html__('Enabled', 'framework'),
            'off' => esc_html__('Disabled', 'framework'),
        ),
         array(
            'id' => 'switch-thumbnail',
            'type' => 'switch',
            'title' => esc_html__('Enable WP Thumbnail', 'framework'),
            'subtitle' => esc_html__('Enable/Disable the wordpress image thumbnail sizes for the website. If its disable then full size images will be used.', 'framework'),
            "default" => 1,
        ),
        array(
            'id' => 'enable_backtotop',
            'type' => 'switch',
            'title' => esc_html__('Enable Back To Top', 'framework'),
            'subtitle' => esc_html__('Enable the back to top button that appears at the bottom right corner of the screen.', 'framework'),
            "default" => 1,
        ),
       array(
            'id' => 'tracking-code',
            'type' => 'ace_editor',
            'title' => esc_html__('Tracking Code', 'framework'),
            'subtitle' => esc_html__('Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme. Please put code without opening and closing script tags.', 'framework'),
        ),
       array(
            'id' => 'space-before-head',
            'type' => 'ace_editor',
            'title' => esc_html__('Space before closing head tag', 'framework'),
            'subtitle' => esc_html__('Add your code before closing head tag', 'framework'),
			'default' => '',
        ),
       array(
            'id' => 'space-before-body',
            'type' => 'ace_editor',
            'title' => esc_html__('Space before closing body tag', 'framework'),
            'subtitle' => esc_html__('Add your code before closing body tag', 'framework'),
			'default' => '',
        ),
    )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-website',
    'title' => esc_html__('Responsive', 'framework'),
    'fields' => array(
        array(
            'id' => 'switch-responsive',
            'type' => 'switch',
            'title' => esc_html__('Enable Responsive', 'framework'),
            'subtitle' => esc_html__('Enable/Disable the responsive behaviour of the theme', 'framework'),
            "default" => 1,
        ),
        array(
            'id' => 'switch-zoom-pinch',
            'type' => 'switch',
            'title' => esc_html__('Enable Zoom on mobile devices', 'framework'),
            'subtitle' => esc_html__('Enable/Disable zoom pinch behaviour on touch devices', 'framework'),
            "default" => 0,
        ),
	)
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-screen',
    'title' => esc_html__('Layout', 'framework'),
    'fields' => array(
        array(
			'id'=>'site_layout',
			'type' => 'image_select',
			'compiler'=>true,
			'title' => esc_html__('Page Layout', 'framework'), 
			'subtitle' => esc_html__('Select the page layout type', 'framework'),
			'options' => array(
					'wide' => array('alt' => 'Wide', 'img' => get_template_directory_uri().'/assets/images/wide.png'),
					'boxed' => array('alt' => 'Boxed', 'img' => get_template_directory_uri().'/assets/images/boxed.png')
				),
			'default' => 'wide',
		),
		array(
			'id'=>'repeatable-bg-image',
			'type' => 'image_select',
			'required' => array('site_layout','equals','boxed'),
			'title' => esc_html__('Repeatable Background Images', 'framework'), 
			'subtitle' => esc_html__('Select image to set in background.', 'framework'),
			'options' => array(
				'pt1.png' => array('alt' => 'pt1', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt1.png'),
				'pt2.png' => array('alt' => 'pt2', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt2.png'),
				'pt3.png' => array('alt' => 'pt3', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt3.png'),
				'pt4.png' => array('alt' => 'pt4', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt4.png'),
				'pt5.png' => array('alt' => 'pt5', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt5.png'),
				'pt6.png' => array('alt' => 'pt6', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt6.png'),
				'pt7.png' => array('alt' => 'pt7', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt7.png'),
				'pt8.png' => array('alt' => 'pt8', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt8.png'),
				'pt9.png' => array('alt' => 'pt9', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt9.png'),
				'pt10.png' => array('alt' => 'pt10', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt10.png'),
				'pt11.jpg' => array('alt' => 'pt11', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt11.png'),
				'pt12.jpg' => array('alt' => 'pt12', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt12.png'),
				'pt13.jpg' => array('alt' => 'pt13', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt13.png'),
				'pt14.jpg' => array('alt' => 'pt14', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt14.png'),
				'pt15.jpg' => array('alt' => 'pt15', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt15.png'),
				'pt16.png' => array('alt' => 'pt16', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt16.png'),
				'pt17.png' => array('alt' => 'pt17', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt17.png'),
				'pt18.png' => array('alt' => 'pt18', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt18.png'),
				'pt19.png' => array('alt' => 'pt19', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt19.png'),
				'pt20.png' => array('alt' => 'pt20', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt20.png'),
				'pt21.png' => array('alt' => 'pt21', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt21.png'),
				'pt22.png' => array('alt' => 'pt22', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt22.png'),
				'pt23.png' => array('alt' => 'pt23', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt23.png'),
				'pt24.png' => array('alt' => 'pt24', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt24.png'),
				'pt25.png' => array('alt' => 'pt25', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt25.png'),
				'pt26.png' => array('alt' => 'pt26', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt26.png'),
				'pt27.png' => array('alt' => 'pt27', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt27.png'),
				'pt28.png' => array('alt' => 'pt28', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt28.png'),
				'pt29.png' => array('alt' => 'pt29', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt29.png'),
				'pt30.png' => array('alt' => 'pt30', 'img' => get_template_directory_uri().'/assets/images/patterns-t/pt30.png')
				)
		),	
		array(
			'id'=>'upload-repeatable-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload Repeatable Background Image', 'framework')
		),
		array(
			'id'=>'full-screen-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload Full Screen Background Image', 'framework')
		),
        array(
			'id'=>'site_width',
			'type' => 'text',
			'compiler'=>true,
			'title' => esc_html__('Site Width', 'framework'), 
			'subtitle' => esc_html__('Controls the overall site width. Without px, ex: 1040(Default). Recommended maximum width is 1170 to maintain the theme structure.', 'framework'),
			'default' => '1040',
		),	
		
    )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Content', 'framework'),
	'subsection' => true,
    'fields' => array(
		array(
			'id'       => 'content_padding_dimensions',
			'type'     => 'spacing',
			'units'    => array('px'),
			'mode'	   => 'padding',
			'left'	   => false,
			'right'	   => false,
			'output'   => array('.content'),
			'title'    => esc_html__('Top and Bottom padding for page content', 'framework'),
			'subtitle' => esc_html__('Enter top and bottom padding for page content. Default is 50px/50px', 'framework'),
			'default'            => array(
			'padding-top'     => '50px',
			'padding-bottom'  => '50px',
			'units'          => 'px',
			),
		),
		array(
			'id'       => 'content_min_height',
			'type'     => 'text',
			'title'    => esc_html__('Minimum Height for Content', 'framework'),
			'subtitle' => esc_html__('Enter minimum height for the page content part(Without px). Default is 400', 'framework'),
			'default'  => '400'
		),
        array(
			'id'=>'content_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('100% Content Width', 'framework'), 
			'subtitle' => esc_html__('Check this box to set the content area to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'framework'),
			'default' => '0',
		),
		array(  'id' => 'content_background',
				'type' => 'background',
				'background-color'=> true,
				'output' => array('.content'),
				'title' => esc_html__('Content area Background', 'framework'),
    			'subtitle' => esc_html__('Background color or image for the content area. This works for both boxed or wide layouts.', 'framework'),
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-chevron-up',
    'title' => esc_html__('Header', 'framework'),
    'desc' => esc_html__('These are the options for the header.', 'framework'),
    'fields' => array(
        array(
    		'id' => 'header_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Header Layout','framework'), 
			'subtitle' => esc_html__('Select the header layout', 'framework'),
    			'options' => array(
					'1' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-1.jpg'),
    				'2' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-2.jpg'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-3.jpg'),
    				'4' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-4.jpg'),
    				),
    		'default' => '1'
    	),
		array(
            'id' => 'header3_textarea',
            'type' => 'textarea',
			'required' => array('header_layout','equals','3'),
            'title' => esc_html__('Header Style 3 right area', 'framework'),
            'subtitle' => esc_html__('Enter html or text to show at the right side of the logo in place of default search form in header style 3', 'framework'),
            'default' => ''
        ),
        array(
			'id'=>'header_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('100% Header Width', 'framework'), 
			'subtitle' => esc_html__('Check this box to set the header to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'framework'),
			'default' => '0',
		),
		array(
            'id' => 'header_area_height',
            'type' => 'text',
            'title' => esc_html__('Header Area Height', 'framework'),
            'subtitle' => esc_html__('Enter height for header Area', 'framework'),
            'default' => 80
        ),
		array(  'id' => 'header_background_alpha',
				'type' => 'color_rgba',
				'output' => array('background-color' => '.site-header .topbar'),
				'title' => esc_html__('Header(Logo Area) Translucent Background', 'framework'),
				'subtitle'=> esc_html__('Default: rgba(255, 255, 255, 0.8)','framework'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
				'default'   => array(
					'color'     => '#ffffff',
					'alpha'     => .8
				),
		),
		array(  'id' => 'header_background_image',
				'type' => 'background',
				'background-color'=> false,
				'output' => array('.site-header .topbar'),
				'title' => esc_html__('Header(Logo Area) Background Image', 'framework'),
				'subtitle'=> esc_html__('This will override the translucent color style.','framework'),
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Sticky Header', 'framework'),
    'desc' => esc_html__('These are the options for the header.', 'framework'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable-header-stick',
            'type' => 'switch',
            'title' => esc_html__('Enable Header Stick', 'framework'),
            'subtitle' => esc_html__('Enable/Disable Header Stick behaviour of the theme', 'framework'),
            "default" => 1,
        ),
		array(  'id' => 'sticky_header_background_alpha',
			'type' => 'color_rgba',
			'output' => array('background-color' => '.is-sticky .main-menu-wrapper, .header-style4 .is-sticky .site-header .topbar, .header-style2 .is-sticky .main-menu-wrapper'),
			'title' => esc_html__('Sticky Header Background', 'framework'),
			'subtitle'=> esc_html__('Default: rgba(255, 255, 255, 0.8)','framework'),
			'desc' => esc_html__('On Header style 4 header logo area top area will be sticky so its bg color will be used here as well.', 'framework'),
			'options'       => array(
				'show_input'                => true,
				'show_initial'              => true,
				'show_alpha'                => true,
				'show_palette'              => false,
				'show_palette_only'         => false,
				'show_selection_palette'    => true,
				'max_palette_size'          => 10,
				'allow_empty'               => true,
				'clickout_fires_change'     => false,
				'choose_text'               => 'Choose',
				'cancel_text'               => 'Cancel',
				'show_buttons'              => true,
				'use_extended_classes'      => true,
				'palette'                   => null,  // show default
				'input_text'                => 'Select Color'
			),
			'default'   => array(
				'color'     => '#ffffff',
				'alpha'     => .8
			),
		),
		array(
			'id' => 'sticky_header_background',
			'type' => 'background',
			'background-color'=> false,
			'output' => array('.is-sticky .main-menu-wrapper, .header-style4 .is-sticky .site-header .topbar, .header-style2 .is-sticky .main-menu-wrapper'),
			'title' => esc_html__('Sticky Header Background Image', 'framework'),
    		'subtitle' => esc_html__('Background color or image for the header.', 'framework')
		),
		array(
			'id'       => 'sticky_link_color',
			'type'     => 'link_color',
			'required' => array('header_layout','!=','4'),
			'title'    => esc_html__('Sticky Header Link Color', 'framework'),
			'desc'     => esc_html__('Set the sticky header/menu links color, hover, active.', 'framework'),
			'output'   => array('.is-sticky .navigation > ul > li > a'),
		),
		array(
			'id'       => 'h4_sticky_link_color',
			'type'     => 'link_color',
			'required' => array('header_layout','=','4'),
			'title'    => esc_html__('Sticky Header Link Color', 'framework'),
			'desc'     => esc_html__('Set the sticky header/menu links color, hover, active.', 'framework'),
			'output'   => array('.header-style4 .is-sticky .top-navigation > li > a'),
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Topbar', 'framework'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'social-facebook',
            'type' => 'text',
			'Panel' => false,
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Facebook', 'framework'),
            'subtitle' => __('Facebook URL to link your social bar\'s facebook icon.', 'framework'),
            'desc' => esc_html__('Enter your facebook URL for your theme footer.', 'framework'),
            'default' => 'https://www.facebook.com/',
        ),
        array(
            'id' => 'social-twitter',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Twitter', 'framework'),
            'subtitle' => __("Twitter URL to link your social bar's twitter icon.", 'framework'),
            'desc' => esc_html__('Enter your twitter URL for your theme footer.', 'framework'),
            'default' => 'https://twitter.com/',
        ),
        array(
            'id' => 'social-pinterest',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Pinterest', 'framework'),
            'subtitle' => esc_html__('Pinterest URL to link your social bar\'s Pinterest icon.', 'framework'),
            'desc' => esc_html__('Enter your Pinterest URL for your theme footer.', 'framework'),
            'default' => 'https://www.pinterest.com/',
        ),
        array(
            'id' => 'social-googleplus',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Google+', 'framework'),
            'subtitle' => __('Google+ URL to link your social bar\'s googleplus icon.', 'framework'),
            'desc' => esc_html__('Enter your googleplus URL for your theme footer.', 'framework'),
            'default' => 'https://www.google.co.in/',
        ),
        array(
            'id' => 'social-youtube',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Youtube', 'framework'),
            'subtitle' => __('Youtube URL to link your social bar\'s youtube icon.', 'framework'),
            'desc' => esc_html__('Enter your Youtube URL for your theme footer.', 'framework'),
            'default' => 'http://youtube.com/',
        ),
		
		array(
            'id' => 'social-instagram',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Instagram', 'framework'),
            'subtitle' => __('Instagram URL to link your social bar\'s Instagram icon.', 'framework'),
            'desc' => esc_html__('Enter your Instagram URL for your theme footer.', 'framework'),
            'default' => 'http://instagram.com/',
        ),
		
		array(
            'id' => 'social-vimeo',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Vimeo', 'framework'),
            'subtitle' => __('Vimeo URL to link your social bar\'s Vimeo icon.', 'framework'),
            'desc' => esc_html__('Enter your Vimeo URL for your theme footer.', 'framework'),
            'default' => 'http://vimeo.com/',
        ),
        array(
            'id' => 'site-rss',
            'type' => 'text',
			'required' => array('theme_color_types','equals','0'),
            'title' => esc_html__('Rss', 'framework'),
            'subtitle' => __('Rss URL to link your  Rss icon.', 'framework'),
            'desc' => esc_html__('Enter your Rss URL for you theme footer.', 'framework'),
            'default' => site_url().'/feed/',
        ),
		array(
			'id' => 'header_social_links',
			'type' => 'sortable',
			'label' => true,
			'compiler'=>true,
			'title' => esc_html__('Social Links', 'framework'),
			'desc' => esc_html__('Enter the social links and sort to active and display according to sequence in header.', 'framework'),
			'options' => array(
				'fa-facebook-square' => 'facebook',
				'fa-twitter-square' => 'twitter',
				'fa-pinterest' => 'pinterest',
				'fa-google-plus' => 'google',
				'fa-youtube' => 'youtube',
				'fa-instagram' => 'instagram',
				'fa-vimeo-square' => 'vimeo',
				'fa-rss' => 'rss',
				'fa-dribbble' => 'dribbble',
				'fa-dropbox' => 'dropbox',
				'fa-bitbucket' => 'bitbucket',
				'fa-flickr' => 'flickr',
				'fa-foursquare' => 'foursquare',
				'fa-github' => 'github',
				'fa-gittip' => 'gittip',
				'fa-linkedin' => 'linkedin',
				'fa-pagelines' => 'pagelines',
				'fa-skype' => 'Enter Skype ID',
				'fa-tumblr' => 'tumblr',
				'fa-vk' => 'vk',
				'fa-envelope' => 'Enter Email Address'
			),
		)
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Inner Page Header', 'framework'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'header_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Sub Pages Header Image', 'framework'),
            'desc' => esc_html__('Default header image for post types.', 'framework'),
            'subtitle' => __('Set this image as default header image for all Page/Post/Event/Sermons/Gallery.', 'framework'),
            'default' => array('url' => ''),
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Mobile Header', 'framework'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'slider_behind_header',
            'type' => 'checkbox',
            'title' => esc_html__('Show slider behind header', 'framework'),
            'desc' => esc_html__('Uncheck if you want the slider on homepage to show below the header and not behind in header style 1 and 3.', 'framework'),
            'default' => 1,
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-upload',
    'title' => esc_html__('Logo', 'framework'),
    'fields' => array(
        array(
            'id' => 'logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo', 'framework'),
            'desc' => esc_html__('Logo used by most of the devices including desktops and not retina devices', 'framework'),
            'subtitle' => esc_html__('Upload site logo to display in header.', 'framework'),
            'default' => array('url' => $default_logo),
        ),
		array(
            'id' => 'logo_alt_text',
            'type' => 'text',
            'title' => esc_html__('Logo Image Alt Text', 'framework'),
            'subtitle' => esc_html__('Enter logo image alternative text. This will appear in browser tooltip on logo image hover.', 'framework'),
            'default' => 'Logo'
        ),
        array(
            'id' => 'retina_logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo for Retina Devices', 'framework'),
            'desc' => esc_html__('Retina Display is a marketing term developed by Apple to refer to devices and monitors that have a resolution and pixel density so high – roughly 300 or more pixels per inch', 'framework'),
            'subtitle' => esc_html__('Upload site logo to display in header.', 'framework'),
        ),
		array(
            'id' => 'retina_logo_width',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Width for Retina Logo', 'framework'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'framework'),
        ),
		array(
            'id' => 'retina_logo_height',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Height for Retina Logo', 'framework'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'framework'),
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Admin Logo', 'framework'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_admin_login_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Custom admin login logo', 'framework'),
            'compiler' => 'true',
            'desc' => esc_html__('Upload a 254 x 95px image here to replace the admin login logo.', 'framework'),
            'default' => array('url' => $default_logo),
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Favicon Options', 'framework'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_favicon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Custom favicon', 'framework'),
            'desc' => esc_html__('Upload a .ico favicon image that will represent your website favicon', 'framework'),
            'default' => array('url' => $default_favicon),
        ),
        array(
            'id' => 'iphone_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPhone Icon', 'framework'),
            'desc' => esc_html__('Upload Favicon for Apple iPhone (57px x 57px)', 'framework'),
            'default' => array('url' => $default_iphone),
        ),
        array(
            'id' => 'iphone_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPhone Retina Icon', 'framework'),
            'desc' => esc_html__('Upload Favicon for Apple iPhone Retina Version (114px x 114px)', 'framework'),
            'default' => array('url' => $default_iphone_retina),
        ),
        array(
            'id' => 'ipad_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPad Icon', 'framework'),
            'desc' => esc_html__('Upload Favicon for Apple iPad (72px x 72px)', 'framework'),
            'default' => array('url' => $default_ipad),
        ),
        array(
            'id' => 'ipad_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPad Retina Icon Upload', 'framework'),
            'desc' => esc_html__('Upload Favicon for Apple iPad Retina Version (144px x 144px)', 'framework'),
            'default' => array('url' => $default_ipad_retina),
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-lines',
    'title' => esc_html__('Menu', 'framework'),
    'fields' => array(
		array(  'id' => 'navigation_background_alpha',
			'type' => 'color_rgba',
			'output' => array('background-color' => '.navigation, .header-style2 .main-menu-wrapper'),
			'title' => esc_html__('Navigation Bar Background', 'framework'),
			'subtitle'=> esc_html__('Default: #f8f7f3)','framework'),
			'options'       => array(
				'show_input'                => true,
				'show_initial'              => true,
				'show_alpha'                => true,
				'show_palette'              => false,
				'show_palette_only'         => false,
				'show_selection_palette'    => true,
				'max_palette_size'          => 10,
				'allow_empty'               => true,
				'clickout_fires_change'     => false,
				'choose_text'               => 'Choose',
				'cancel_text'               => 'Cancel',
				'show_buttons'              => true,
				'use_extended_classes'      => true,
				'palette'                   => null,  // show default
				'input_text'                => 'Select Color'
			),
			'default'   => array(
				'color'     => '#F8F7F3',
				'alpha'     => 1
			),
		),
        array(
			'id'          => 'main_nav_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Main Navigation Typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto Condensed, Font weight - Normal, Font Size - 16px, Letter Spacing - 0, Text Transform - Uppercase', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => false,
			'text-transform'=> true,
			'letter-spacing' => true,
			'output'      => array('.navigation > ul > li > a'),
			'units'       =>'px',
		),
		array(
			'id'       => 'mainmenu_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Main Navigation Link Color', 'framework'),
			'subtitle' => esc_html__('Default Regular: #5E5E5E / Hover: Your primary color / Active: Your primary color', 'framework'),
			'desc'     => esc_html__('Set the top navigation parent links color, hover, active.', 'framework'),
			'output'   => array('.navigation > ul > li > a'),
		),
		array(  'id' => 'main_dropdown_background_alpha',
				'type' => 'color_rgba',
				'output' => array('background-color' => '.navigation > ul > li ul','border-bottom-color' => '.navigation > ul > li.megamenu > ul:before, .navigation > ul > li ul:before','border-right-color' => '.navigation > ul > li ul li ul:before'),
				'title' => esc_html__('Main Menu Dropdown Background', 'framework'),
				'subtitle'=> esc_html__('Default: #ffffff','framework'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
				'default'   => array(
					'color'     => '#ffffff',
					'alpha'     => 1
				),
		),
		array(
			'id'       => 'main_menu_dropdown_border',
			'type'     => 'border',
			'title'    => esc_html__('Main Menu Dropdown Links Border Bottom', 'framework'),
			'subtitle' => esc_html__('Default: 1px solid #f8f7f3', 'framework'),
			'output'   => array('.navigation > ul > li > ul li > a'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'default'  => array(
				'border-color'  => '#f8f7f3',
				'border-style'  => 'solid',
				'border-width' => '1px',
			)
		),
        array(
			'id'          => 'main_nav_dropdown_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Main Navigation Dropdown Typography', 'framework'),
			'subtitle'   	=> esc_html__('Defaults: Font Family - Roboto Condensed, Font weight - Normal, Font Size - 14px, Line Height - 20px, Letter Spacing - 0, Text transform - Uppercase', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform'=> true,
			'output'      => array('.navigation > ul > li > ul li > a'),
			'units'       =>'px',
		),
		array(
			'id'       => 'main_dropdown_link_color',
			'type'     => 'link_color',
			'title'    => __('Main Menu Dropdown Link Color', 'framework'),
			'subtitle' => __('Defaults: Regular - #5E5E5E, Hover - Your primary color, Active - Your primary color', 'framework'),
			'desc'     => __('Set the dropdown menu links color, hover, active.', 'framework'),
			'output'   => array('.navigation > ul > li > ul li > a'),
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Mobile Menu', 'framework'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'mobile_menu_icon',
            'type'        => 'typography',
			'title'       => esc_html__('Mobile Menu Icon', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'subsets' 	  => false,
			'color' 		  => true,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => true,
			'font-family' => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('.site-header .menu-toggle'),
			'units'       =>'px',
            'default' => array(
             	'font-size' => '18px',
				'color' => '#5e5e5e',
              ),
        ),
		array(
            'id' => 'mobile_menu_text',
            'type' => 'text',
            'title' => esc_html__('Show text with mobile menu icon', 'framework'),
            'subtitle' => esc_html__('Enter text you want to show next to mobile menu icon. Keep it short and sweet. Eg: Menu', 'framework'),
			'default'=> ''
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Top Menu', 'framework'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable-top-menu',
            'type' => 'switch',
            'title' => esc_html__('Enable Top Menu for Mobile', 'framework'),
            'subtitle' => esc_html__('Enable/Disable top navigation for small screen devices. If enabled, your top navigation will show as select menu on mobile devices.', 'framework'),
            "default" => 1,
        ),
        array(
			'id'          => 'top_nav_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Top Navigation Typography', 'framework'),
			'subtitle'       => esc_html__('xDefaults: Font Family - Roboto Condensed, Font weight - Bold, Font Size - 12px, Line Height - 20px, Letter Spacing - 2px, Text transform - Uppercase', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform'=> true,
			'output'      => array('.top-navigation > li > a'),
			'units'       =>'px',
		),
		array(
			'id'       => 'topmenu_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Top Navigation Link Color', 'framework'),
			'subtitle' => esc_html__('Defaults: Regular - #5E5E5E, Hover - Your primary color, Active - Your primary color', 'framework'),
			'desc'     => esc_html__('Set the top navigation parent links color, hover, active.', 'framework'),
			'output'   => array('.top-navigation > li > a'),
		),
		array(  'id' => 'top_dropdown_background_alpha',
			'type' => 'color_rgba',
			'output' => array('background-color' => '.top-navigation > li ul','border-bottom-color' => '.top-navigation > li.megamenu > ul:before, .top-navigation > li ul:before','border-right-color' => '.top-navigation > li ul li ul:before'),
			'title' => esc_html__('Top Menu Dropdown Background', 'framework'),
			'subtitle'=> esc_html__('Default: #ffffff','framework'),
			'options'       => array(
				'show_input'                => true,
				'show_initial'              => true,
				'show_alpha'                => true,
				'show_palette'              => false,
				'show_palette_only'         => false,
				'show_selection_palette'    => true,
				'max_palette_size'          => 10,
				'allow_empty'               => true,
				'clickout_fires_change'     => false,
				'choose_text'               => 'Choose',
				'cancel_text'               => 'Cancel',
				'show_buttons'              => true,
				'use_extended_classes'      => true,
				'palette'                   => null,  // show default
				'input_text'                => 'Select Color'
			),
			'default'   => array(
				'color'     => '#ffffff',
				'alpha'     => 1
			),
		),
		array(
			'id'       => 'top_menu_dropdown_border',
			'type'     => 'border',
			'title'    => esc_html__('Top Menu Dropdown Links Border Bottom', 'framework'),
			'subtitle' => esc_html__('Default: 1px solid #f8f7f3', 'framework'),
			'output'   => array('.top-navigation > li > ul li > a'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'default'  => array(
				'border-color'  => '#f8f7f3',
				'border-style'  => 'solid',
				'border-width' => '1px',
			)
		),
        array(
			'id'          => 'top_nav_dropdown_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Top Navigation Dropdown Typography', 'framework'),
			'subtitle'       => esc_html__('Defaults:Font Family - Roboto Condensed, Font weight - Normal, Font Size - 12px, Line Height - 20px, Letter Spacing - 2px, Text transform - Uppercase', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform'=> true,
			'letter-spacing' => true,
			'output'      => array('.top-navigation > li > ul li > a'),
			'units'       =>'px',
		),
		array(
			'id'       => 'top_dropdown_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Top Menu Dropdown Link Color', 'framework'),
			'subtitle' => esc_html__('Default Regular: #5E5E5E / Hover: Your primary color / Active: Your primary color', 'framework'),
			'desc'     => esc_html__('Set the dropdown menu links color, hover, active.', 'framework'),
			'output'   => array('.top-navigation > li > ul li > a'),
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-chevron-down',
    'title' => esc_html__('Footer', 'framework'),
    'desc' => esc_html__('These are the options for the footer.', 'framework'),
    'fields' => array(
        array(
			'id'=>'footer_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('100% Footer Width', 'framework'), 
			'subtitle' => esc_html__('Check this box to set the footer to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'framework'),
			'default' => '0',
		),
		array(
    		'id' => 'footer_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Footer Layout', 'framework'), 
			'subtitle' => esc_html__('Select the footer layout', 'framework'),
    			'options' => array(
					'12' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-1.png'),
    				'6' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-2.png'),
    				'4' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-3.png'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-4.png'),
					'2' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-5.png'),
    							),
    		'default' => '4'
    	),
        array(
            'id' => 'footer_top_sec',
            'type' => 'section',
			'indent' => true,
            'title' => esc_html__('Footer Widgets Area', 'framework'),
        ),
		array(  'id' => 'top_footer_background_alpha',
				'type' => 'background',
				'output' => array('.site-footer'),
				'title' => esc_html__('Footer(Widgets Area) Background', 'framework'),
				'subtitle'=> esc_html__('Default: #F8F7F3','framework'),
				'default'  => array(
					'background-color' => '#F8F7F3',
				)
		),
		array(
			'id'=> 'footer_padding',
			'type'=> 'spacing',
			'output'=> array('.site-footer'),
			'mode' => 'padding',
			'left'=> false,
			'right'=> false,
			'units'=> array('px'),
			'title'=> esc_html__('Footer Widget Area Padding', 'framework'),
			'desc'=> esc_html__('Enter Top and Bottom padding values for the footer widget area. Do not include px in the fields', 'framework'),
			'default'=> array(
				'padding-top'=> '50px',
				'padding-bottom'=> '50px',
				'units'=> 'px',
			)
		),
        array(
			'id'          => 'top_footer_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Footer(Widgets Area) Typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => true,
			'output'      => array('.site-footer, .site-footer p'),
			'units'       =>'px',
		),
        array(
			'id'          => 'top_footer_widgets_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Footer Widgets Title Typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => true,
			'output'      => array('.site-footer .widgettitle'),
			'units'       =>'px',
			'default'     => array(
				'color'=> '#333333',
			),
		),
		array(
			'id'       => 'top_footer_widget_border',
			'type'     => 'border',
			'title'    => esc_html__('Border Bottom for Footer Widget Lists', 'framework'),
			'subtitle' => esc_html__('Default: 1px solid #ECEAE4', 'framework'),
			'output'   => array('.site-footer .listing-header, .site-footer .post-title, .site-footer .listing .item, .site-footer .post-meta, .site-footer .widget h4.footer-widget-title, .site-footer .widget ul > li'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'default'  => array(
				'border-color'  => '#ECEAE4',
				'border-style'  => 'solid',
				'border-width' => '1px',
			)
		),
		array(
			'id'       => 'top_footer_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Footer(Widgets Area) Link Color', 'framework'),
			'subtitle' => esc_html__('Defaults: Regular - #5E5E5E, Hover - Your primary color, Active - Your primary color', 'framework'),
			'desc'     => esc_html__('Set the top footer links color, hover, active.', 'framework'),
			'output'   => array('.site-footer a'),
		),
        array(
            'id' => 'footer_bottom_sec',
            'type' => 'section',
			'indent' => true,
            'title' => esc_html__('Footer Copyrights Area', 'framework'),
        ),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'textarea',
            'title' => esc_html__('Footer Copyright Text', 'framework'),
            'subtitle' => esc_html__(' Enter Copyright Text', 'framework'),
            'default' => esc_html__('All Rights Reserved', 'framework')
        ),
		array(
			'id' => 'footer_social_links',
			'type' => 'sortable',
			'label' => true,
			'compiler'=>true,
			'title' => esc_html__('Social Links', 'framework'),
			'desc' => esc_html__('Insert Social URL in their respective fields and sort as your desired order.', 'framework'),
			'options' => array(
				'fa-facebook' => $old_social_facebook,
				'fa-twitter' => $old_social_twitter,
				'fa-pinterest' => $old_social_pinterest,
				'fa-google-plus' => $old_social_gplus,
				'fa-youtube' => $old_social_ytube,
				'fa-instagram' => $old_social_instagram,
				'fa-vimeo-square' => $old_social_vimeo,
				'fa-rss' => $old_social_rss,
				'fa-dribbble' => 'dribbble',
				'fa-dropbox' => 'dropbox',
				'fa-bitbucket' => 'bitbucket',
				'fa-flickr' => 'flickr',
				'fa-foursquare' => 'foursquare',
				'fa-github' => 'github',
				'fa-gittip' => 'gittip',
				'fa-linkedin' => 'linkedin',
				'fa-pagelines' => 'pagelines',
				'fa-skype' => 'Enter Skype ID',
				'fa-tumblr' => 'tumblr',
				'fa-vk' => 'vk',
				'fa-envelope' => 'Enter Email Address'
			),
		),
		array(  'id' => 'bottom_footer_background_alpha',
				'type' => 'background',
				'output' => array('.site-footer-bottom'),
				'title' => esc_html__('Footer(Copyrights Area) Background', 'framework'),
				'subtitle'=> esc_html__('Default: #ECEAE4','framework'),
				'default'  => array(
					'background-color' => '#ECEAE4',
				)
		),
		array(
			'id'=> 'copyrights_padding',
			'type'=> 'spacing',
			'output'=> array('.site-footer-bottom'),
			'mode' => 'padding',
			'left'=> false,
			'right'=> false,
			'units'=> array('px'),
			'title'=> esc_html__('Footer Copyrights Area Padding', 'framework'),
			'desc'=> esc_html__('Enter Top and Bottom padding values for the footer copyrights area. Do not include px in the fields', 'framework'),
			'default'=> array(
				'padding-top'=> '20px',
				'padding-bottom'=> '20px',
				'units'=> 'px',
			)
		),	
        array(
			'id'          => 'bottom_footer_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Footer(Copyrights Area) Typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => true,
			'output'      => array('.site-footer-bottom .copyrights-col-left'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Line height should be same as the height you just defined above.', 'framework'),
		),
		array(
			'id'       => 'bottom_footer_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Footer(Copyrights Area) Links Color', 'framework'),
			'subtitle' => esc_html__('Defaults Regular - #5E5E5E, Hover - Your primary color,  Active - Your primary color', 'framework'),
			'desc'     => esc_html__('Set the bottom footer links color, hover, active.', 'framework'),
			'output'   => array('.site-footer-bottom .copyrights-col-left a'),
		),
		array(  'id' => 'footer_social_background_alpha',
			'type' => 'color_rgba',
			'output' => array('background-color' => '.site-footer-bottom .social-icons a'),
			'title' => esc_html__('Footer Social Icons Background', 'framework'),
			'subtitle'=> esc_html__('Default: #999999','framework'),
			'options'       => array(
				'show_input'                => true,
				'show_initial'              => true,
				'show_alpha'                => true,
				'show_palette'              => false,
				'show_palette_only'         => false,
				'show_selection_palette'    => true,
				'max_palette_size'          => 10,
				'allow_empty'               => true,
				'clickout_fires_change'     => false,
				'choose_text'               => 'Choose',
				'cancel_text'               => 'Cancel',
				'show_buttons'              => true,
				'use_extended_classes'      => true,
				'palette'                   => null,  // show default
				'input_text'                => 'Select Color'
			),
			'default'   => array(
				'color'     => '#999999',
				'alpha'     => 1
			),
		),
		array(  'id' => 'footer_social_background_hover_alpha',
			'type' => 'color_rgba',
			'output' => array('background-color' => '.site-footer-bottom .social-icons a:hover'),
			'title' => esc_html__('Footer Social Icons Hover Background', 'framework'),
			'subtitle'=> esc_html__('Default: #666666','framework'),
			'options'       => array(
				'show_input'                => true,
				'show_initial'              => true,
				'show_alpha'                => true,
				'show_palette'              => false,
				'show_palette_only'         => false,
				'show_selection_palette'    => true,
				'max_palette_size'          => 10,
				'allow_empty'               => true,
				'clickout_fires_change'     => false,
				'choose_text'               => 'Choose',
				'cancel_text'               => 'Cancel',
				'show_buttons'              => true,
				'use_extended_classes'      => true,
				'palette'                   => null,  // show default
				'input_text'                => 'Select Color'
			),
			'default'   => array(
				'color'     => '#666666',
				'alpha'     => 1
			),
		),
		array(
			'id'       => 'footer_social_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Footer Social Icons Link Color', 'framework'),
			'subtitle' => esc_html__('Default Regular: #ffffff - Hover: Your primary color - Active: Your primary color', 'framework'),
			'desc'     => esc_html__('Set the bottom footer social icons link color, hover, active.', 'framework'),
			'output'   => array('.site-footer-bottom .social-icons a'),
		),
		array(
			'id'       => 'footer_social_link_dimensions',
			'type'     => 'dimensions',
			'units'    => array('px'),
			'output'   => array('.site-footer-bottom .social-icons a'),
			'title'    => esc_html__('Footer Social Icons Dimensions', 'framework'),
			'subtitle' => esc_html__('Enter width/height of the footer rounded icons. Default is 25/25', 'framework'),
			'default'  => array(
				'width'   => '25',
				'height'  => '25'
			),
		),
        array(
			'id'          => 'footer_social_link_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Footer Social Links typography', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'preview' => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('.site-footer-bottom .social-icons a'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Line height should be same as the height you just defined above.', 'framework'),
			'default'     => array(
				'font-size'=> '14px',
				'line-height'=>'25px'
			),
		),	
    )
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-lines',
    'title' => esc_html__('Sidebars', 'framework'),
    'fields' => array(
        array(
    		'id' => 'sidebar_position',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Sidebar position','framework'), 
			'subtitle' => esc_html__('Select the Global Sidebar Position. Can be overridden by page sidebar settings.', 'framework'),
    			'options' => array(
    				'2' => array('title' => 'Left', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
					'1' => array('title' => 'Right', 'img' => ReduxFramework::$_url.'assets/img/2cr.png'),
    				),
    		'default' => '1'
    	),
		array(
			'id'       => 'post_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Post Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on post pages.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Page Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on pages.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'event_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Event Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on events.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'cause_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Cause Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on causes.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'sermon_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Sermon Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on sermon pages.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'staff_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Staff Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on staff pages.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'bbpress_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('bbpress Sidebar Option', 'framework'), 
			'desc'     => esc_html__('Select sidebar to display by default on all bbpress pages globally.', 'framework'),
			'data'  => 'sidebars',
			'default'  => '',
		)
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-brush',
    'title' => esc_html__('Color Scheme', 'framework'),
    'fields' => array(
        array(
            'id' => 'section-backgrounds-start',
            'type' => 'section',
            'title' => esc_html__('Primary Color', 'framework'),
            'subtitle' => esc_html__('Set the primary color scheme for the website', 'framework'),
            'indent' => false
       ),
         array(
            'id'=>'theme_color_type',
            'type' => 'button_set',
            'compiler'=>true,
            'title' => esc_html__('Site Color Scheme', 'framework'), 
            'subtitle' => esc_html__('Select the color scheme of the website', 'framework'),
            'options' => array(
                    '0' => esc_html__('Pre-Defined Color Schemes','framework'),
                    '1' => esc_html__('Custom Color','framework')
                ),
            'default' => '0',
            ),
        array(
            'id' => 'theme_color_scheme',
            'type' => 'select',
            'required' => array('theme_color_type','equals','0'),
            'title' => esc_html__('Predefined Schemes', 'framework'),
            'subtitle' => esc_html__('Select your themes alternative color scheme.', 'framework'),
            'options' => array('color1.css' => 'color1.css', 'color2.css' => 'color2.css', 'color3.css' => 'color3.css', 'color4.css' => 'color4.css', 'color5.css' => 'color5.css', 'color6.css' => 'color6.css', 'color7.css' => 'color7.css', 'color8.css' => 'color8.css', 'color9.css' => 'color9.css', 'color10.css' => 'color10.css'),
            'default' => 'color1.css',
        ),  
        array(
            'id'=>'custom_theme_color',
            'type' => 'color',
            'required' => array('theme_color_type','equals','1'),
            'title' => esc_html__('Custom Color', 'framework'), 
            'subtitle' => esc_html__('Pick a primary color for the template.', 'framework'),
            'validate' => 'color',
        ),
    )
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-font',
    'title' => esc_html__('Typography', 'framework'),
    'subtitle' => esc_html__('Global Font Family Sets (Can be override with dedicated styling options)', 'framework'),
	'desc' => esc_html__('These options are as per the design which consists of 3 fonts. For more advanced typography options see Sub Sections below this in Left Sidebar. Make sure you set these options only if you have knowledge about every property to avoid disturbing the whole layout. If something went wrong just reset this section to reset all fields in Typography Options or click the small cross signs in each select field/delete text from input fields to reset them.','framework'),
    'fields' => array(
        array(
            'id' => 'body_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Primary font', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>true,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('h1,h2,h3,h4,h5,h6,body,.event-item .event-detail h4,.site-footer-bottom'),
			'units'       =>'px',
	    	'subtitle' => esc_html__('Please Enter Body Font.', 'framework'),
            'default' => array(
             	'font-family' => 'Roboto',
				'font-backup' => '',
				'word-spacing' => '0px',
				'letter-spacing' => '0px',
              ),
        ),
        array(
            'id' => 'heading_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Secondary font', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>true,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('h4,.title-note,.btn,.top-navigation,.navigation,.notice-bar-title strong,.timer-col #days, .timer-col #hours, .timer-col #minutes, .timer-col #seconds,.event-date,.event-date .date,.featured-sermon .date,.page-header h1,.timeline > li > .timeline-badge span,.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button'),
			'units'       =>'px',
            'subtitle' => esc_html__('Please Enter Heading Font', 'framework'),
            'default' => array(
            	'font-family' => 'Roboto Condensed',
				'font-backup' => '',
				'word-spacing' => '0px',
				'letter-spacing' => '0px',
               ),
        ),
        array(
            'id' => 'metatext_date_font_typography',
            'type' => 'typography',
            'title' => esc_html__('Metatext/date Cursive Font', 'framework'),
            'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>true,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('blockquote p,.cursive,.meta-data,.fact'),
			'units'       =>'px',
            'subtitle' => esc_html__('Please Enter Metatext date Font', 'framework'),
            'default' => array(
           	 	'font-family' => 'Volkhov',
				'font-backup' => '',
				'word-spacing' => '0px',
				'letter-spacing' => '0px',
            ),
        ),
    )
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-check-empty',
    'title' => esc_html__('Body', 'framework'),
    'subtitle' => esc_html__('Style typography, color and other settings for body content', 'framework'),
	'subsection' => true,
    'fields' => array(
        array(
			'id'          => 'body_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('Body text default typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto, Font weight - Normal, Font Size - 14px, Line Height - 20px, Letter Spacing - 0px, Color - #666666, Text transform - none', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('.page-content, .page-content p'),
			'units'       =>'px',
		),
        array(
			'id'          => 'body_h1_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('H1 heading typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto, Font weight - Normal, Font Size - 36px, >Line Height - 42px, Letter Spacing - 0px, Color - #333333, Text transform - none', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform' => true,
			'letter-spacing' => true,
			'output'      => array('.page-content h1'),
			'units'       =>'px',
		),
        array(
			'id'          => 'body_h2_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('H2 heading typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto, Font weight - Normal, Font Size - 30px, Line Height - 36px, Letter Spacing - 0px, Color - #333333, Text transform - none', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform' => true,
			'letter-spacing' => true,
			'output'      => array('.page-content h2'),
			'units'       =>'px',
		),
        array(
			'id'          => 'body_h3_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('H3 heading typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto, Font weight - Normal, Font Size - 24px, Line Height - 30px, Letter Spacing - 0px, Color - #333333, Text transform - none', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform' => true,
			'letter-spacing' => true,
			'output'      => array('.page-content h3'),
			'units'       =>'px',
		),
        array(
			'id'          => 'body_h4_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('H4 heading typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto Condensed, Font weight - Bold, Font Size - 16px, Line Height - 22px, Letter Spacing - 2px, Color - #333333, Text transform - Uppercase', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform' => true,
			'letter-spacing' => true,
			'output'      => array('.page-content h4'),
			'units'       =>'px',
		),
        array(
			'id'          => 'body_h5_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('H5 heading typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto, Font weight - Bold, Font Size - 16px, Line Height - 22px, Letter Spacing - 0px, Color - #333333, Text transform - none', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform' => true,
			'letter-spacing' => true,
			'output'      => array('.page-content h5'),
			'units'       =>'px',
		),
        array(
			'id'          => 'body_h6_font_typo',
			'type'        => 'typography',
			'title'       => esc_html__('H6 heading typography', 'framework'),
			'subtitle'       => esc_html__('Defaults: Font Family - Roboto, Font weight - Normal, Font Size - 12px, Line Height - 18px, Letter Spacing - 0px, Color - #333333, Text transform - none', 'framework'),
			'desc'		  => esc_html__('This applies to only the parts of your website where the content from page editor comes in','framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'text-transform' => true,
			'letter-spacing' => true,
			'output'      => array('.page-content h6'),
			'units'       =>'px',
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-share',
    'title' => __('Share Options', 'framework'),
    'fields' => array(
        array(
            'id' => 'switch_sharing',
            'type' => 'switch',
            'title' => esc_html__('Social Sharing', 'framework'),
            'subtitle' => esc_html__('Enable/Disable theme default social sharing buttons for posts/events/sermons/causes single pages.', 'framework'	
			),
            "default" => 1,
       	),
		 array(
			'id'=>'sharing_style',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Share Buttons Style', 'framework'), 
			'subtitle' => esc_html__('Choose the style of share button icons', 'framework'),
			'options' => array(
					'0' => esc_html__('Rounded','framework'),
					'1' => esc_html__('Squared','framework')
				),
			'default' => '0',
		),
		 array(
			'id'=>'sharing_color',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Share Buttons Color', 'framework'), 
			'subtitle' => esc_html__('Choose the color scheme of the share button icons', 'framework'),
			'options' => array(
					'0' => esc_html__('Brand Colors','framework'),
					'1' => esc_html__('Theme Color','framework'),
					'2' => esc_html__('GrayScale','framework')
				),
			'default' => '0',
			),
		array(
			'id'       => 'share_icon',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => esc_html__('Social share options', 'framework'),
			'subtitle' => esc_html__('Click on the buttons to disable/enable share buttons', 'framework'),
			'options'  => array(
				'1' => 'Facebook',
				'2' => 'Twitter',
				'3' => 'Google',
				'4' => 'Tumblr',
				'5' => 'Pinterest',
				'6' => 'Reddit',
				'7' => 'Linkedin',
				'8' => 'Email',
				'9' => 'VKontakte'
			),
			'default' => array(
				'1' => '1',
				'2' => '1',
				'3' => '1',
				'4' => '1',
				'5' => '1',
				'6' => '1',
				'7' => '1',
				'8' => '1',
				'9' => '0'
			)
		),
		array(
			'id'       => 'share_post_types',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => esc_html__('Select share buttons for post types', 'framework'),
			'subtitle'     => esc_html__('Uncheck to disable for any type', 'framework'),
			'options'  => array(
				'1' => 'Posts',
				'2' => 'Pages',
				'3' => 'Events',
				'4' => 'Sermons',
				'5' => 'Causes',
				'6' => 'Gallery'
			),
			'default' => array(
				'1' => '1',
				'2' => '1',
				'3' => '1',
				'4' => '1',
				'5' => '1',
				'6' => '1'
			)
		),
		array(
            'id' => 'facebook_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Facebook share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Facebook share icon browser tooltip.', 'framework'),
            'default' => 'Share on Facebook'
        ),
		array(
            'id' => 'twitter_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Twitter share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Twitter share icon browser tooltip.', 'framework'),
            'default' => 'Tweet'
        ),
		array(
            'id' => 'google_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Google Plus share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Google Plus share icon browser tooltip.', 'framework'),
            'default' => 'Share on Google+'
        ),
		array(
            'id' => 'tumblr_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Tumblr share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Tumblr share icon browser tooltip.', 'framework'),
            'default' => 'Post to Tumblr'
        ),
		array(
            'id' => 'pinterest_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Pinterest share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Pinterest share icon browser tooltip.', 'framework'),
            'default' => 'Pin it'
        ),
		array(
            'id' => 'reddit_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Reddit share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Reddit share icon browser tooltip.', 'framework'),
            'default' => 'Submit to Reddit'
        ),
		array(
            'id' => 'linkedin_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Linkedin share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Linkedin share icon browser tooltip.', 'framework'),
            'default' => 'Share on Linkedin'
        ),
		array(
            'id' => 'email_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Email share icon', 'framework'),
            'subtitle' => esc_html__('Text for the Email share icon browser tooltip.', 'framework'),
            'default' => 'Email'
        ),
		array(
            'id' => 'vk_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for vk share icon', 'framework'),
            'subtitle' => esc_html__('Text for the vk share icon browser tooltip.', 'framework'),
            'default' => 'Share on vk'
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-zoom-in',
    'title' => __('Lightbox Options', 'framework'),
    'fields' => array(
        array(
            'id' => 'switch_lightbox',
            'type' => 'button_set',
            'title' => esc_html__('Lightbox Plugin', 'framework'),
            'subtitle' => esc_html__('Choose the plugin for the Lightbox Popup for theme.', 'framework'	
			),
			'options' => array(
				'0' => esc_html__('PrettyPhoto','framework'),
				'1' => esc_html__('Magnific Popup','framework')
			),
            "default" => 0,
       	),
		array(
			'id'       => 'prettyphoto_theme',
			'type'     => 'select',
			'required' => array('switch_lightbox','equals','0'),
			'title'    => esc_html__('Theme Style', 'framework'), 
			'desc'     => esc_html__('Select style for the prettyPhoto Lightbox', 'framework'),
			'options'  => array(
				'pp_default' => esc_html__('Default','framework'),
				'light_rounded' => esc_html__('Light Rounded','framework'),
				'dark_rounded' => esc_html__('Dark Rounded','framework'),
				'light_square' => esc_html__('Light Square','framework'),
				'dark_square' => esc_html__('Dark Square','framework'),
				'facebook' => esc_html__('Facebook','framework'),
			),
			'default'  => 'pp_default',
		),
		array(
			'id' => 'prettyphoto_opacity',
			'required' => array('switch_lightbox','equals','0'),
			'type' => 'slider',
			'title' => esc_html__('Overlay Opacity', 'framework'),
			'desc' => esc_html__('Enter values between 0.1 to 1. Default is 0.5', 'framework'),
			"default" => .5,
			"min" => 0,
			"step" => .1,
			"max" => 1,
			'resolution' => 0.1,
			'display_value' => 'text'
		),
        array(
            'id' => 'prettyphoto_title',
			'required' => array('switch_lightbox','equals','0'),
            'type' => 'button_set',
            'title' => esc_html__('Show Image Title', 'framework'),
			'options' => array(
				0 => esc_html__('Yes','framework'),
				1 => esc_html__('No','framework')
			),
            "default" => 0,
       	),
        array(
            'id' => 'prettyphoto_opt_resize',
			'required' => array('switch_lightbox','equals','0'),
            'type' => 'button_set',
            'title' => esc_html__('Allow Image Resize', 'framework'),
			'options' => array(
				true => esc_html__('Yes','framework'),
				false => esc_html__('No','framework')
			),
            "default" => true,
       	),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-podcast',
    'title' => esc_html__('Podcast Options', 'framework'),
    'fields' => array(
		array(
            'id' => 'podcast_title',
            'type' => 'text',
            'title' => esc_html__('Podcast Title', 'framework'),
            'placeholder' => 'e.g. '. get_bloginfo('name').''
        ),
		array(
            'id' => 'podcast_description',
            'type' => 'text',
            'title' => esc_html__('Podcast Description', 'framework'),
            'placeholder' => 'e.g. '. get_bloginfo('description').''
        ),
		array(
            'id' => 'podcast_website_url',
            'type' => 'text',
            'title' => esc_html__('Website Link', 'framework'),
            'placeholder' => 'e.g. '. home_url().''
        ),
		array(
            'id' => 'podcast_language',
            'type' => 'text',
            'title' => esc_html__('Language', 'framework'),
            'placeholder' => 'e.g. '.get_bloginfo('language').''
        ),
		array(
            'id' => 'podcast_copyright',
            'type' => 'text',
            'title' => esc_html__('Copyright', 'framework'),
			'desc' => esc_html__('Copy "&copy;" to put a copyright symbol.','framework'),
            'placeholder' => 'e.g. Copyright &copy; ' . get_bloginfo('name').''
        ),
		array(
            'id' => 'podcast_webmaster_name',
            'type' => 'text',
            'title' => esc_html__('Webmaster Name', 'framework'),
            'placeholder' => 'e.g. Your name'
        ),
		array(
            'id' => 'podcast_webmaster_email',
            'type' => 'text',
            'title' => esc_html__('Webmaster Email', 'framework'),
            'placeholder' => 'e.g. ' . get_bloginfo('admin_email').''
        ),
		array(
            'id' => 'podcast_itunes_author',
            'type' => 'text',
            'title' => esc_html__('Author', 'framework'),
			'desc' => esc_html__('This will display at the "Artist" in the iTunes Store.','framework'),
            'placeholder' => 'e.g. Primary Speaker or Church Name'
        ),
		array(
            'id' => 'podcast_itunes_subtitle',
            'type' => 'text',
            'title' => esc_html__('Subtitle', 'framework'),
			'desc' => esc_html__('Your subtitle should briefly tell the listener what they can expect to hear.','framework'),
            'placeholder' => 'e.g. Preaching and teaching audio from'
        ),
		array(
            'id' => 'podcast_itunes_summary',
            'type' => 'textarea',
            'title' => esc_html__('Summary', 'framework'),
			'desc' => esc_html__('Keep your Podcast Summary short, sweet and informative. Be sure to include a brief statement about your mission and in what region your audio content originates.','framework'),
            'placeholder' => 'e.g. Weekly teaching audio brought to you by'
        ),
		array(
            'id' => 'podcast_itunes_owner_name',
            'type' => 'text',
            'title' => esc_html__('Owner Name', 'framework'),
			'desc' => esc_html__('This should typically be the name of your Church.','framework'),
            'placeholder' => 'e.g. ' . get_bloginfo('name').''
        ),
		array(
            'id' => 'podcast_itunes_owner_email',
            'type' => 'text',
            'title' => esc_html__('Owner Email', 'framework'),
			'desc' => esc_html__('Use an email address that you dont mind being made public. If someone wants to contact you regarding your Podcast this is the address they will use.','framework'),
            'placeholder' => 'e.g. ' . get_bloginfo('admin_email').''
        ),
		array(
            'id' => 'podcast_itunes_cover_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Cover Image', 'framework'),
			'desc' => esc_html__('This JPG will serve as the Podcast artwork in the iTunes Store. The image should be 1400px by 1400px','framework'),
            'default' => array('url' => $default_cover),
        ),
		array(
            'id' => 'podcast_itunes_top_category',
            'type' => 'text',
            'title' => esc_html__('Top Category', 'framework'),
			'desc' => __('Choose the appropriate top-level category for your Podcast listing in iTunes. <a href="http://www.apple.com/itunes/podcasts/specs.html#submitting" target="_blank">Reference</a>','framework'),
			'default' => 'Religion & Spirituality'
        ),
		array(
            'id' => 'podcast_itunes_sub_category',
            'type' => 'text',
            'title' => esc_html__('Sub Category', 'framework'),
			'desc' => __('Choose the appropriate sub category for your Podcast listing in iTunes. <a href="http://www.apple.com/itunes/podcasts/specs.html#submitting" target="_blank">Reference</a>','framework'),
			'default' => 'Christianity'
        ),
		array(
            'id' => 'podcast_itunes_feed_url',
            'type' => 'text',
            'title' => esc_html__('Feed URL', 'framework'),
			'desc' => esc_html__('This is your Feed URL to submit to iTunes','framework'),
			'default' => ''.home_url('/').'feed/?post_type=sermons',
			'readonly' => true
        ),
		array(
			'id'   => 'info_normal',
			'type' => 'info',
			'desc' => 'Use the <a href="http://www.feedvalidator.org/check.cgi?url='.home_url('/').'feed/?post_type=sermons" target="_blank">Feed Validator</a> to diagnose and fix any problems before submitting your Podcast to iTunes.
						<p>Once your Podcast Settings are complete and your Sermons are ready, its time to <a href="https://podcastsconnect.apple.com" target="_blank">Submit Your Podcast</a> to the iTunes Store! Check <a href="http://www.apple.com/itunes/podcasts/specs.html#submitting" target="_blabk">how to submit your podcast</a></p>
						<p>Alternatively, if you want to track your Podcast subscribers, simply pass the Podcast Feed URL above through <a href="http://feedburner.google.com/" target="_blank">FeedBurner</a>. FeedBurner will then give you a new URL to submit to iTunes instead.</p>
						<p>Please read the <a href="http://www.apple.com/itunes/podcasts/creatorfaq.html" target="_blank">iTunes FAQ for Podcast Makers</a> for more information.</p>'
		)
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-calendar',
    'title' => esc_html__('Calendar Options', 'framework'),
    'fields' => array(
		array(
		'id'=>'calendar_header_view',
		'type' => 'image_select',
		'compiler'=>true,
		'title' => esc_html__('Calendar Header View','framework'), 
		'subtitle' => esc_html__('Select the view for your calendar header', 'framework'),
			'options' => array(
				1 => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/calendarheaderLayout/header-1.jpg'),
				2 => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/calendarheaderLayout/header-2.jpg'),
				),
		'default' => 1
		),
		array(
            'id' => 'calendar_event_limit',
            'type' => 'text',	
            'title' => esc_html__('Limit of Events', 'framework'),
            'desc' => esc_html__('Enter a number to limit number of events to show maximum in a single day block of calendar and remaining in a small popover(Default is 4)', 'framework'),
			'default' => '4',
        ),
        array(
            'id' => 'calendar_month_name',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Month Name', 'framework'),
            'desc' => esc_html__('Insert month name in local language by comma seperated to display on event calender like: January,February,March,April,May,June,July,August,September,October,November,December', 'framework'),
			'default' => 'January,February,March,April,May,June,July,August,September,October,November,December',
        ),
		array(
            'id' => 'calendar_month_name_short',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Month Name Short', 'framework'),
            'desc' => esc_html__('Insert month name short in local language by comma seperated to display on event calender like: Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec', 'framework'),
			'default' => 'Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec',
        ),
		array(
            'id' => 'calendar_day_name',
            'type' => 'textarea',
			'rows' => 2,	
            'title' => esc_html__('Calendar Day Name', 'framework'),
            'desc' => esc_html__('Insert day name in local language by comma seperated to display on event calender like: Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'framework'),
			'default' => 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ),
		array(
            'id' => 'calendar_day_name_short',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Day Name Short', 'framework'),
            'desc' => esc_html__('Insert day name short in local language by comma seperated to display on event calender like: Sun,Mon,Tue,Wed,Thu,Fri,Sat', 'framework'),
			'default' => 'Sun,Mon,Tue,Wed,Thu,Fri,Sat',
        ),
		array(
            'id' => 'calendar_today',
            'type' => 'text',	
            'title' => esc_html__('Heading Today', 'framework'),
            'desc' => esc_html__('Translate Calendar Heading for Today Button', 'framework'),
			'default' => 'Today',
        ),
		array(
            'id' => 'calendar_month',
            'type' => 'text',	
            'title' => esc_html__('Heading Month', 'framework'),
            'desc' => esc_html__('Translate Calendar Heading for Month Button', 'framework'),
			'default' => 'Month',
        ),
		array(
            'id' => 'calendar_week',
            'type' => 'text',	
            'title' => esc_html__('Heading Week', 'framework'),
            'desc' => esc_html__('Translate Calendar Heading for Week Button', 'framework'),
			'default' => 'Week',
        ),
		array(
            'id' => 'calendar_day',
            'type' => 'text',	
            'title' => esc_html__('Heading Day', 'framework'),
            'desc' => esc_html__('Translate Calendar Heading for Day Button', 'framework'),
			'default' => 'Day',
        ),
		array(
			'id'       => 'event_feeds',
			'type'     => 'checkbox',
			'title'    => esc_html__('Show WP Events', 'framework'),
			'desc'     => esc_html__('Check if you want to show your Wordpress Events in Calendar.', 'framework'),
			'default'  => '1'// 1 = on | 0 = off
		),
		array(
            'id' => 'google_feed_key',
            'type' => 'text',	
            'title' => esc_html__('Google Calendar API Key', 'framework'),
            'desc' => __('Enter Google Calendar Feed API Key. <a href="http://support.imithemes.com/forums/topic/setting-up-google-calendar-api-for-events-calendar">Instructions Here</a>', 'framework'),
			'default' => '',
        ),
		array(
            'id' => 'google_feed_id',
            'type' => 'text',	
            'title' => esc_html__('Google Calendar ID', 'framework'),
			'subtitle' => __('You can specify individual calendar IDs for each calendar using the calendar shortcode.', 'framework'),
            'desc' => __('Enter your Google Calendar ID. <a href="http://support.imithemes.com/forums/topic/setting-up-google-calendar-api-for-events-calendar/">Instructions Here</a>', 'framework'),
			'default' => '',
        ),
		array(
			'id'=>'event_default_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__('Event Color', 'framework'), 
			'subtitle' => esc_html__('Pick a default bg color for events blocks over Calendar.', 'framework'),
			'validate' => 'color',
			'default' => ''
			),
			array(
			'id'=>'recurring_event_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__('Recurring Event Color', 'framework'), 
			'subtitle' => esc_html__('Pick a bg color for recurring events blocks over calendar.', 'framework'),
			'validate' => 'color',
			'default' => ''
			),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-bullhorn',
    'title' => esc_html__('Event Options', 'framework'),
    'fields' => array(
        array(
            'id' => 'enable_event_feature',
            'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Enable Event', 'framework'), 
			'subtitle' => esc_html__('Enable or disable event functionality using this switch.', 'framework'),
			'options' => array(
					'1' => esc_html__('Enable','framework'),
					'0' => esc_html__('Disable','framework'),
				),
			'default' => '1',
		),
        array(
            'id' => 'recurring_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Recurring Icon', 'framework'),
            'subtitle' => esc_html__('Show/Hide recurring icon which comes next to event name in listing/grid of events.', 'framework'),
			'on' => 'Yes',
			'off' => 'No',
            "default" => 1,
        ),
        array(
            'id' => 'event_google_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Google Icon', 'framework'),
            'subtitle' => esc_html__('Show/Hide Google icon which comes before the title of events in listing, grid, timeline layouts.', 'framework'),
			'on' => 'Yes',
			'off' => 'No',
            "default" => 1,
        ),
		array(
            'id' => 'event_google_open_link',
            'type' => 'switch',
            'title' => esc_html__('Open Google Events', 'framework'),
            'subtitle' => esc_html__('Open google event links in new tab/window.', 'framework'),
			'on' => 'Yes',
			'off' => 'No',
            "default" => 1,
        ),
		array(
            'id' => 'countdown_timer',
            'type' => 'select',
            'title' => esc_html__('Events Display Time', 'framework'),
            'subtitle' => esc_html__('Select till End Time/Start Time', 'framework'),
            'options' => array('0' => 'Start Time', '1' => 'End Time'),
            'default' => '0',
        ),
		array(
          'id'=>'event_tm_opt',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Show Event Time', 'framework'), 
			'subtitle' => esc_html__('Show event time of events in listing, grid, calender layouts.', 'framework'),
			'options' => array(
					'0' => esc_html__('Start Time','framework'),
					'1' => esc_html__('End Time','framework'),
					'2' => esc_html__('Both','framework')
				),
			'default' => '0',
			),
		array(
          'id'=>'event_dt_opt',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Show Event Date', 'framework'), 
			'subtitle' => esc_html__('Show event date of events in listing, grid, calender layouts.', 'framework'),
			'options' => array(
					'0' => esc_html__('Start Date','framework'),
					'1' => esc_html__('End Date','framework'),
					'2' => esc_html__('Both','framework')
				),
			'default' => '0',
			),
        array(
            'id' => 'theme-events-page',
            'type' => 'select',
            'data' => 'pages',
            'title' => __( 'All Events Page' , 'framework' ),
            'desc' => __( 'Select the page for all events' , 'framework' )
        ),
	),
));


Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-user',
    'title' => esc_html__('Staff Options', 'framework'),
    'subtitle' => esc_html__('Staff Posts Options', 'framework'),
    'fields' => array(
        array(
            'id' => 'switch_staff_read_more',
            'type' => 'switch',
            'title' => esc_html__('Show Read More Button on Staff Listing', 'framework'),
            'subtitle' => esc_html__('Enable/Disable read more button link on staff listing shortcode or template."', 'framework'	
			),
            "default" => 0,
       	),
		 array(
			'id'=>'staff_read_more',
			'type' => 'button_set',
			'compiler'=>true,
			'required' => array('switch_staff_read_more','equals','1'),
			'title' => esc_html__('Read More Style', 'framework'), 
			'subtitle' => esc_html__('Choose the read more style', 'framework'),
			'options' => array(
					'0' => esc_html__('Button','framework'),
					'1' => esc_html__('Text Link','framework')
				),
			'default' => '0',
		),
		 array(
			'id'=>'staff_read_more_text',
			'type' => 'text',
			'compiler'=>true,
			'required' => array('switch_staff_read_more','equals','1'),
			'title' => esc_html__('Read More text', 'framework'), 
			'subtitle' => esc_html__('Enter button/link text for read more', 'framework'),
			'default' => 'Read more',
		),
        array(
            'id' => 'theme-staff-page',
            'type' => 'select',
            'data' => 'pages',
            'title' => __( 'All Staff Page' , 'framework' ),
            'desc' => __( 'Select the page for all staff' , 'framework' )
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-music',
    'title' => esc_html__('Sermon Options', 'framework'),
    'subtitle' => esc_html__('Sermon Posts Options', 'framework'),
    'fields' => array(
        array(
            'id' => 'switch_sermon_filters',
            'type' => 'switch',
            'title' => esc_html__('Show Sermons Filters', 'framework'),
            'subtitle' => esc_html__('Enable/Disable filters on sermons archive pages"', 'framework'),
            "default" => 1,
       	),
        array(
            'id' => 'theme-sermon-page',
            'type' => 'select',
            'data' => 'pages',
            'title' => __( 'All Sermons Page' , 'framework' ),
            'desc' => __( 'Select the page for all sermons' , 'framework' )
        ),
	)
));
			
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-edit',
    'title' => esc_html__('Custom CSS/JS', 'framework'),
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',	
            'title' => esc_html__('CSS Code', 'framework'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'framework'),
            'mode' => 'css',
            'theme' => 'monokai',
            'desc' => '',
            'default' => "#header{\nmargin: 0 auto;\n}"
        ),
        array(
            'id' => 'custom_js',
            'type' => 'ace_editor',	
            'title' => esc_html__('JS Code', 'framework'),
            'subtitle' => esc_html__('Paste your JS code here.', 'framework'),
            'mode' => 'javascript',
            'theme' => 'chrome',
            'desc' => '',
            'default' => "jQuery(document).ready(function(){\n\n});"
        )
    )
));
			
Redux::setSection( $opt_name, array(
	  'title' => esc_html__('Import / Export', 'framework'),
	  'desc' => esc_html__('Import and Export your Theme Framework settings from file, text or URL.', 'framework'),
	  'icon' => 'el-icon-download',
	  'fields' => array(
		  array(
			  'id' => 'opt-import-export',
			  'type' => 'import_export',
			 'title' => esc_html__('Import Export','framework'),
			  'subtitle' => esc_html__('Save and restore your Theme options','framework'),
			  'full_width' => false,
		  ),
	  )
));

/*
* <--- END SECTIONS
*/