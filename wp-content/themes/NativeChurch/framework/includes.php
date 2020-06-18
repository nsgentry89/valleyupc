<?php
if (!defined('ABSPATH'))
exit; // Exit if accessed directly
define('ImicFrameworkPath', dirname(__FILE__));
/*
* Here you include files which is required by theme
*/
require_once(ImicFrameworkPath . '/theme-functions.php');
/* CUSTOM POST TYPES
================================================== */
require_once(ImicFrameworkPath . '/custom-post-types/gallery-type.php');
require_once(ImicFrameworkPath . '/custom-post-types/staff-type.php');
require_once(ImicFrameworkPath . '/custom-post-types/sermon-type.php');
$imic_options = get_option('imic_options');
$event_feature = (isset($imic_options['enable_event_feature']))?$imic_options['enable_event_feature']:'1';
($event_feature=='1')?require_once(ImicFrameworkPath . '/custom-post-types/event-type.php'):'';
/* META BOX FRAMEWORK
================================================== */
require_once(ImicFrameworkPath . '/meta-box/meta-box.php');
require_once(ImicFrameworkPath . '/meta-box/meta-box-show-hide/meta-box-show-hide.php');
require_once(ImicFrameworkPath . '/meta-box/meta-box-conditional-logic/meta-box-conditional-logic.php');
require_once(ImicFrameworkPath . '/meta-boxes.php');
($event_feature=='1')?require_once(ImicFrameworkPath . '/tickets_clone_fields.php'):'';
/* SHORTCODES
 ================================================== */
require_once (ImicFrameworkPath . '/shortcodes.php');
/* MEGA MENU
	================================================== */  
require_once(ImicFrameworkPath . '/megamenu/megamenu.php');

/* PLUGIN INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/tgm/plugin-includes.php');
/* WIDGETS INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/widgets/upcoming_events.php');
require_once(ImicFrameworkPath . '/widgets/latest_gallery.php');
require_once(ImicFrameworkPath . '/widgets/selected_post.php');
require_once(ImicFrameworkPath . '/widgets/custom_category.php');
require_once(ImicFrameworkPath . '/widgets/recent_sermons.php');
require_once(ImicFrameworkPath . '/widgets/sermon_speakers.php');
require_once(ImicFrameworkPath . '/widgets/twitter_feeds/twitter_feeds.php');
require_once(ImicFrameworkPath . '/widgets/Advertisement.php');
require_once(ImicFrameworkPath . '/widgets/featured_event.php');
require_once(ImicFrameworkPath . '/widgets/recent_post.php');
/* Woocommerce INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/woocommerce.php');
/* Category Extra Field Option
================================================== */
require_once(ImicFrameworkPath . '/extra_category_field.php');
require_once(ImicFrameworkPath . '/term_color_picker.php');
/* LOAD STYLESHEETS
================================================== */
if (!function_exists('imic_enqueue_styles')) {
function imic_enqueue_styles() {
global $imic_options;
$event_feature = (isset($imic_options['enable_event_feature']))?$imic_options['enable_event_feature']:'1';
$theme_info = wp_get_theme();
        wp_register_style('imic_bootstrap', IMIC_THEME_PATH . '/assets/css/bootstrap.css', array(), $theme_info->get( 'Version' ), 'all');
        wp_register_style('imic_fontawesome', IMIC_THEME_PATH . '/assets/css/font-awesome.css', array(), $theme_info->get( 'Version' ), 'all');
        wp_register_style('imic_animations', IMIC_THEME_PATH . '/assets/css/animations.css', array(), $theme_info->get( 'Version' ), 'all');
        wp_register_style('imic_mediaelementplayer', IMIC_THEME_PATH . '/assets/vendor/mediaelement/mediaelementplayer.css', array(), $theme_info->get( 'Version' ), 'all');
        wp_register_style('imic_main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ), 'all');
        wp_register_style('imic_prettyPhoto', IMIC_THEME_PATH . '/assets/vendor/prettyphoto/css/prettyPhoto.css', array(), $theme_info->get( 'Version' ), 'all');
		wp_register_style('imic_magnific', IMIC_THEME_PATH . '/assets/vendor/magnific/magnific-popup.css', array(), $theme_info->get( 'Version' ), 'all');
		wp_register_style('imic_owl1', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/css/owl.carousel.css', array(), $theme_info->get( 'Version' ), 'all');
		wp_register_style('imic_owl2', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/css/owl.theme.css', array(), $theme_info->get( 'Version' ), 'all');
        wp_register_style('imic_colors', IMIC_THEME_PATH . '/assets/colors/' . $imic_options['theme_color_scheme'], array(), $theme_info->get( 'Version' ), 'all');
        ($event_feature=='1')?wp_register_style('imic_fullcalendar_css', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/fullcalendar.min.css', array(), $theme_info->get( 'Version' ), 'all'):'';
        ($event_feature=='1')?wp_register_style('imic_fullcalendar_print', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/fullcalendar.print.css', array(), $theme_info->get( 'Version' ), 'print'):'';
        //**Enqueue STYLESHEETPATH**//
        wp_enqueue_style('imic_bootstrap');
        wp_enqueue_style('imic_fontawesome');
        wp_enqueue_style('imic_animations');
        wp_enqueue_style('imic_mediaelementplayer');
        wp_enqueue_style('imic_main');
		if(isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox']== 0){
			wp_enqueue_style('imic_prettyPhoto');
		}elseif(isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox']== 1){
			wp_enqueue_style('imic_magnific');
		}
        wp_enqueue_style('imic_fullcalendar_css');
        wp_enqueue_style('imic_fullcalendar_print');
        if ($imic_options['theme_color_type'][0] == 0) {
            wp_enqueue_style('imic_colors');
        }
        //**End Enqueue STYLESHEETPATH**//
    }
    add_action('wp_enqueue_scripts', 'imic_enqueue_styles', 99);
}
if (!function_exists('imic_enqueue_scripts')) {
    function imic_enqueue_scripts() {
		$theme_info = wp_get_theme();
        global $imic_options;
        $event_feature = (isset($imic_options['enable_event_feature']))?$imic_options['enable_event_feature']:'1';
		$google_api_key = $imic_options['google_feed_key'];
		$google_calendar_id = $imic_options['google_feed_id'];
        $monthNamesValue = $imic_options['calendar_month_name'];
        $monthNames = (empty($monthNamesValue)) ? array() : explode(',', trim($monthNamesValue));
        $monthNamesShortValue = $imic_options['calendar_month_name_short'];
        $monthNamesShort = (empty($monthNamesShortValue)) ? array() : explode(',', trim($monthNamesShortValue));
        $dayNamesValue = $imic_options['calendar_day_name'];
        $dayNames = (empty($dayNamesValue)) ? array() : explode(',', trim($dayNamesValue));
        $dayNamesShortValue = $imic_options['calendar_day_name_short'];
        $dayNamesShort = (empty($dayNamesShortValue)) ? array() : explode(',', trim($dayNamesShortValue));
        //**register script**//
        wp_register_script('imic_jquery_modernizr', IMIC_THEME_PATH . '/assets/js/modernizr.js',$theme_info->get( 'Version' ), 'jquery');
        wp_register_script('imic_jquery_prettyphoto', IMIC_THEME_PATH . '/assets/vendor/prettyphoto/js/prettyphoto.js', array('jquery'), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_magnific', IMIC_THEME_PATH . '/assets/vendor/magnific/jquery.magnific-popup.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
        wp_register_script('imic_jquery_helper_plugins', IMIC_THEME_PATH . '/assets/js/helper-plugins.js', array('jquery'), $theme_info->get( 'Version' ), true);
        wp_register_script('imic_jquery_bootstrap', IMIC_THEME_PATH . '/assets/js/bootstrap.js', array('jquery'), $theme_info->get( 'Version' ), true);
        wp_register_script('imic_jquery_waypoints', IMIC_THEME_PATH . '/assets/js/waypoints.js', array('jquery'), $theme_info->get( 'Version' ), true);
        wp_register_script('imic_jquery_mediaelement_and_player', IMIC_THEME_PATH . '/assets/vendor/mediaelement/mediaelement-and-player.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
        wp_register_script('imic_jquery_init', IMIC_THEME_PATH . '/assets/js/init.js', array('jquery'), $theme_info->get( 'Version' ), true);
        wp_register_script('imic_jquery_flexslider', IMIC_THEME_PATH . '/assets/vendor/flexslider/js/jquery.flexslider.js', array('jquery'), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_owl_carousel', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/js/owl.carousel.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_owl_carousel_init', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/js/owl.carousel.init.js', array('jquery'), $theme_info->get( 'Version' ), true);
        if($event_feature=='1'){
			wp_register_script('imic_jquery_countdown', IMIC_THEME_PATH . '/assets/vendor/countdown/js/jquery.countdown.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
			wp_register_script('imic_jquery_countdown_init', IMIC_THEME_PATH . '/assets/vendor/countdown/js/countdown.init.js', array('jquery'), $theme_info->get( 'Version' ), true);
        	wp_register_script('imic_fullcalendar', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/fullcalendar.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
			wp_register_script('imic_gcal', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/gcal.js', array('jquery'), $theme_info->get( 'Version' ), true);
       		wp_register_script('imic_calender_events', IMIC_THEME_PATH . '/assets/js/calender_events.js', array('jquery'), $theme_info->get( 'Version' ), true);
			wp_register_script('imic_calender_updated', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/lib/moment.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
			wp_register_script('imic_print_ticket', IMIC_THEME_PATH . '/assets/js/print-ticket.js', array('jquery'), $theme_info->get( 'Version' ), true);
			wp_register_script('imic_event_pay', IMIC_THEME_PATH . '/assets/js/event_pay.js', array('jquery'), $theme_info->get( 'Version' ), true);
		}
        wp_register_script('imic_sticky', IMIC_THEME_PATH . '/assets/js/sticky.js', array('jquery'), $theme_info->get( 'Version' ), true);
        //**End register script**//
        //**Enqueue script**//
		
        wp_enqueue_script('imic_jquery_modernizr');
        wp_enqueue_script('jquery');
        ($event_feature=='1')?wp_enqueue_script('imic_calender_updated'):'';
        if(isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0){
			wp_enqueue_script('imic_jquery_prettyphoto');
		}elseif(isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1){
			wp_enqueue_script('imic_jquery_magnific');
		}
        ($event_feature=='1')?wp_enqueue_script('imic_event_scripts', IMIC_THEME_PATH . '/assets/js/event_script.js', array('jquery'), $theme_info->get( 'Version' ), true):'';
        ($event_feature=='1')?wp_localize_script('imic_event_scripts', 'events', array('ajaxurl'=>admin_url('admin-ajax.php'))):'';
        wp_enqueue_script('imic_jquery_helper_plugins');
        wp_enqueue_script('imic_jquery_bootstrap');
        wp_enqueue_script('imic_jquery_waypoints');
        wp_enqueue_script('imic_jquery_mediaelement_and_player');
        wp_enqueue_script('imic_jquery_flexslider');
        ($event_feature=='1')?wp_enqueue_script('imic_jquery_countdown'):'';
        ($event_feature=='1')?wp_enqueue_script('imic_jquery_countdown_init'):'';
        if ($imic_options['enable-header-stick'] == 1) {
            wp_enqueue_script('imic_sticky');
        }
        wp_enqueue_script('imic_jquery_init');
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
		wp_enqueue_script('agent-register', IMIC_THEME_PATH . '/assets/js/agent-register.js', '', '', true);
		wp_localize_script('agent-register', 'agent_register', array('ajaxurl' => admin_url('admin-ajax.php')));
        wp_localize_script('imic_jquery_init', 'initval', array('tmp' => get_template_directory_uri()));
        wp_enqueue_script('event_ajax', IMIC_THEME_PATH . '/assets/js/event_ajax.js', '', '', true);
        wp_localize_script('event_ajax', 'urlajax', array('homeurl' => get_template_directory_uri(),'ajaxurl' => admin_url('admin-ajax.php')));
        ($event_feature=='1')?wp_localize_script('imic_jquery_countdown', 'upcoming_data', array('c_time' =>date_i18n('U'))):'';
        //**End Enqueue script**//
    }
    add_action('wp_enqueue_scripts', 'imic_enqueue_scripts');
}
/* LOAD BACKEND SCRIPTS
  ================================================== */
function imic_admin_scripts() {
     wp_register_script('imic-admin-functions', IMIC_THEME_PATH . '/assets/js/imic_admin.js', 'jquery', NULL, TRUE);
     wp_enqueue_script('imic-admin-functions');
     if(isset($_REQUEST['taxonomy'])){
      wp_register_script('imic-upload', IMIC_THEME_PATH . '/assets/js/upload.js', 'jquery', NULL, TRUE);
      wp_enqueue_media();
      wp_enqueue_script('imic-upload');
  }}
add_action('admin_init', 'imic_admin_scripts');
function nativechurch_load_backend_scripts($hook) {
 
	if( $hook == 'widgets.php' ) 
	{
		wp_enqueue_script('imic-selected-post', IMIC_THEME_PATH . '/assets/js/selected_post.js', 'jquery', NULL, TRUE);
		wp_localize_script('imic-selected-post', 'cats', array('ajaxurl' => admin_url('admin-ajax.php')));
	}
}
add_action('admin_enqueue_scripts', 'nativechurch_load_backend_scripts');
/* LOAD BACKEND STYLE
  ================================================== */
function imic_admin_styles() {
    add_editor_style(IMIC_THEME_PATH . '/assets/css/editor-style.css');
    echo '<style>.imic-image-select-repeatable-bg-image{width:50px;}#upload_category_button,#upload_category_button_remove{width:auto !important;}</style>';
}
add_action('admin_head', 'imic_admin_styles');
/* LOAD Page Builder Prebuilt Pages
  ================================================== */
require_once(ImicFrameworkPath . '/page-builder/page-builder.php');
?>
