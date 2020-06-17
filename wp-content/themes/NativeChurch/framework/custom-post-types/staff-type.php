<?php
/* ==================================================
  Staff Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'staff_register');
function staff_register() {
       $args_c = array(
    "label" => esc_html__('Staff Categories', "framework"),
    "singular_label" => esc_html__('Staff Category', "framework"),
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'rewrite' => true,
    'query_var' => true,
	'show_admin_column' => true,
);
register_taxonomy('staff-category', 'staff', $args_c);
    $labels = array(
        'name' => esc_html__('Staff', 'framework'),
        'singular_name' => esc_html__('Staff', 'framework'),
        'all_items'=> esc_html__('Staff Members', 'framework'),
        'add_new' => esc_html__('Add New', 'framework'),
        'add_new_item' => esc_html__('Add New Staff', 'framework'),
        'edit_item' => esc_html__('Edit Staff', 'framework'),
        'new_item' => esc_html__('New Staff', 'framework'),
        'view_item' => esc_html__('View Staff', 'framework'),
        'search_items' => esc_html__('Search Staff', 'framework'),
        'not_found' => esc_html__('No staff have been added yet', 'framework'),
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'framework'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
		'capability_type' => 'page',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes','excerpt', 'author'),
		'menu_icon' => 'dashicons-businessman',
        'has_archive' => true,
    );
    register_post_type('staff', $args);
}
?>