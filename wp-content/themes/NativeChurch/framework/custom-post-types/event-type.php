<?php
/* ==================================================
  Event Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'event_register');
function event_register() {
    $args_c = array(
    "label" => esc_html__('Event Categories', "framework"),
    "singular_label" => esc_html__('Event Category', "framework"),
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'rewrite' => true,
    'query_var' => true,
	'show_admin_column' => true,
);
register_taxonomy('event-category', 'event', $args_c);
    $labels = array(
        'name' => esc_html__('Events', 'framework'),
        'singular_name' => esc_html__('Event', 'framework'),
        'add_new' => esc_html__('Add New', 'framework'),
        'add_new_item' => esc_html__('Add New Event', 'framework'),
        'edit_item' => esc_html__('Edit Event', 'framework'),
        'new_item' => esc_html__('New Event', 'framework'),
        'view_item' => esc_html__('View Event', 'framework'),
        'search_items' => esc_html__('Search Event', 'framework'),
        'not_found' => esc_html__('No events have been added yet', 'framework'),
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'framework'),
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
        'taxonomies' => array('event-category'),
	
    );
    register_post_type('event', $args);
    register_taxonomy_for_object_type('event-category','event');
}
?>