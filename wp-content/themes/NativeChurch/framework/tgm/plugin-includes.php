<?php
require_once NATIVECHURCH_INC_PATH . '/tgm/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nativechurch_register_required_plugins' );

function nativechurch_register_required_plugins() {
	$plugins_path = get_template_directory() . '/framework/tgm/plugins/';
    $plugins = array(
        array(
			'name' => esc_html__('Breadcrumb NavXT', 'framework'),
			'slug' => 'breadcrumb-navxt',
			'required' 	=> false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-navxt.png',
		),
		array(
			'name' => esc_html__('Pojo Sidebars', 'framework'),
			'slug' => 'pojo-sidebars',
			'required' 	=> false,
			'type'  => 'Required',
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-pojo.png',
		),
		array(
			'name' => esc_html__('Loco Translate', 'framework'),
			'slug' => 'loco-translate',
			'required' 	=> false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-loco.png',
		),
       	array(
			'name' => esc_html__('WooCommerce', 'framework'),
		    'slug' => 'woocommerce',
			'required' 	=> false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-woo.png',
		),
		array(
			'name' => esc_html__('Contact Form 7', 'framework'),
		    'slug' => 'contact-form-7',
			'required' 	=> false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-cf7.png',
		),
		array(
			'name' => esc_html__('Give - WordPress Donation Plugin', 'framework'),
		   	'slug' => 'give',
			'required' => false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-give.png',
		),
		array(
			'name' => esc_html__('Social Media Icon Widget', 'framework'),
		   	'slug' => 'social-media-icons-widget',
			'required' => false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-social.png',
		),
		array(
			'name' => esc_html__('Page Builder by SiteOrigin', 'framework'),
		   	'slug' => 'siteorigin-panels',
			'required' => true,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-siteorigin.png',
		),
		array(
			'name' => esc_html__('SiteOrigin Widgets Bundle', 'framework'),
		   	'slug' => 'so-widgets-bundle',
			'required' => true,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-widgetbundle.png',
		),
		array(
			'name' => esc_html__('Black Studio TinyMCE Widget', 'framework'),
		   	'slug' => 'black-studio-tinymce-widget',
			'required' => true,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-blackstudio.png',
		),
		array(
			'name' => esc_html__('Regenerate Thumbnails', 'framework'),
		   	'slug' => 'regenerate-thumbnails',
			'required' => false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-regen.png',
		),
		array(
            'name'               => esc_html__('Revolution Slider', 'framework'),
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => $plugins_path. 'revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version' 			 => '5.4.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-revslider.png',
        ),
			array(
            'name'               => esc_html__('Payment imithemes', 'framework'),
            'slug'               => 'Payment-Imithemes',
            'source'             => $plugins_path. 'Payment-Imithemes.zip',
            'required'           => false,
            'version'            => '1.5.1',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-imithemes.png',
        ),
		array(
            'name'               => esc_html__('iPray', 'framework'),
            'slug'               => 'ipray',
			'source'             => $plugins_path. 'ipray.zip',
			'version' 			 => '1.5',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
			'image_src'	=> get_template_directory_uri() . '/framework/tgm/images/plugin-ipray.png',
        ),
            
    );
    
	$config = array(
		'id'			=> 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',						// Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins',	// Menu slug.
		'parent_slug'	=> 'themes.php',			// Parent menu slug.
		'capability'	=> 'edit_theme_options',	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	=> false,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> true,					// Automatically activate plugins after installation or not.
		'message'		=> '',						// Message to output right before the plugins table.
	);
	
	tgmpa( $plugins, $config );
	
}
if(function_exists('vc_set_as_theme')) vc_set_as_theme( $disable_updater = true );