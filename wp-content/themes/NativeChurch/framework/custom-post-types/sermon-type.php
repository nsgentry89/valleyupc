<?php
/* ==================================================
  Sermons Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'sermons_register', 0);
function sermons_register() {
    $args_c = array(
    "label" => esc_html__('Sermons Categories','framework'),
    "singular_label" => esc_html__('Sermons Category','framework'),
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'rewrite' => true,
   'query_var' => true,
   'show_admin_column' => true,
);
register_taxonomy('sermons-category', 'sermons',$args_c);
$args_tag = array(
    "label" => esc_html__('Sermons Tag','framework'),
    "singular_label" => esc_html__('Sermons Tag','framework'),
    'public' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'rewrite' => true,
   'query_var' => true,
   'show_admin_column' => true,
);
register_taxonomy('sermons-tag', 'sermons', $args_tag);
$args_sermons_speaker = array(
    "label" => esc_html__('Sermons Speakers','framework'),
    "singular_label" => esc_html__('Sermons Speakers','framework'),
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'rewrite' => true,
   'query_var' => true,
   'show_admin_column' => true,
);
register_taxonomy('sermons-speakers', 'sermons',$args_sermons_speaker);
    $labels = array(
        'name' => esc_html__('Sermons', 'framework'),
        'singular_name' => esc_html__('Sermons Item','framework'),
        'add_new' => esc_html__('Add New', 'framework'),
        'add_new_item' => esc_html__('Add New Sermons Item', 'framework'),
        'edit_item' => esc_html__('Edit Sermons Item', 'framework'),
        'new_item' => esc_html__('New Sermons Item', 'framework'),
        'view_item' => esc_html__('View Sermons Item', 'framework'),
        'search_items' => esc_html__('Search Sermons', 'framework'),
        'not_found' => esc_html__('No sermons items have been added yet', 'framework'),
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
        'supports' => array('title', 'editor', 'thumbnail','comments', 'author'),
		'menu_icon' => 'dashicons-controls-volumeon',
        'has_archive' => false,
        'taxonomies' => array('sermons-tag','sermons-category','sermons-speakers')
    );
     register_post_type('sermons', $args);
     register_taxonomy_for_object_type('sermons-category','sermons');
     register_taxonomy_for_object_type('sermons-tag','sermons');
     register_taxonomy_for_object_type('sermons-speakers','sermons');
}
?>