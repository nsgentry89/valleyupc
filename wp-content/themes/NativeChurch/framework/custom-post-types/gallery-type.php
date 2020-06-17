<?php
/* ==================================================
  Gallery Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'gallery_register');
function gallery_register() {
	$args_c = array(
    "label" => esc_html__('Gallery Categories', "framework"),
    "singular_label" => esc_html__('Gallery Category', "framework"),
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'rewrite' => true,
    'query_var' => true,
	'show_admin_column' => true,
);
register_taxonomy('gallery-category', 'gallery', $args_c);
    $labels = array(
        'name' => esc_html__('Gallery', 'framework'),
        'singular_name' => esc_html__('Gallery Item', 'framework'),
        'add_new' => esc_html__('Add New', 'framework'),
        'all_items'=> esc_html__('Gallery items', 'framework'),
        'add_new_item' => esc_html__('Add New Gallery Item', 'framework'),
        'edit_item' => esc_html__('Edit Gallery Item', 'framework'),
        'new_item' => esc_html__('New Gallery Item', 'framework'),
        'view_item' => esc_html__('View Gallery Item', 'framework'),
        'search_items' => esc_html__('Search Gallery', 'framework'),
        'not_found' => esc_html__('No gallery items have been added yet', 'framework'),
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'framework'),
        'parent_item_colon' => '',
    );
   $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'thumbnail','post-formats', 'author'),
		'menu_icon' => 'dashicons-format-gallery',
        'has_archive' => true,
       );
    register_post_type('gallery', $args);
	register_taxonomy_for_object_type('gallery-category','gallery');
}
?>