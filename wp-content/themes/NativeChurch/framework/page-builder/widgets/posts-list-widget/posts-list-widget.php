<?php

/*
Widget Name: Posts List Widget
Description: A widget to show posts list/grid view.
Author: imithemes
Author URI: http://imithemes.com
*/

class Posts_List_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'posts-list-widget',
			__('Posts List Widget', 'framework'),
			array(
				'description' => __('A widget to show posts list/grid view.', 'framework'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'framework'),
				),

				'allpostsbtn' => array(
					'type' => 'text',
					'label' => __('All posts button text', 'framework'),
					'default' => __('All Posts', 'framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'framework'),
				),

				'allpostsurl' => array(
					'type' => 'link',
					'label' => __('All posts button URL', 'framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'framework'),
				),

				'categories' => array(
					'type' => 'text',
					'label' => __('Categories (Enter comma separated post category slugs)', 'framework'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => __( 'Number of Posts to show', 'framework' ),
					'default' => 4,
					'min' => 1,
					'max' => 25,
					'integer' => true,
				),
				'show_post_meta' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __('Show post meta like post date, author, categories, comments?', 'framework'),
				),
				'excerpt_length' => array(
					'type' => 'text',
					'default' => 50,
					'label' => __('Length of excerpt(Enter the number of words to show)? Leave blank to hide - Default is: 50', 'framework'),
				),
				'read_more_text' => array(
					'type' => 'text',
					'default' => 'Continue reading',
					'label' => __('Continue reading button text, Leave blank to hide button - Default is Continue Reading', 'framework'),
				),
				'listing_layout' => array(
					'type' => 'section',
					'label' => __( 'Layout', 'framework' ),
					'hide' => false,
					'description' => __( 'Choose listing layout.', 'framework' ),
					'fields' => array(
						'layout_type'    => array(
							'type'    => 'radio',
							'default' => 'list',
							'label'   => __( 'Layout Type', 'framework' ),
							'options' => array(
								'list' => __( 'List View', 'framework' ),
								'grid'      => __( 'Grid View', 'framework' ),
								)
						),
						'grid_column' => array(
							'type' => 'select',
							'state_name' => 'grid',
							'prompt' => __( 'Choose Grid Column', 'framework' ),
							'options' => array(
								'6' => __( 'Two', 'framework' ),
								'4' => __( 'Three', 'framework' ),
								'3' => __( 'Four', 'framework' ),
							)
						),
					),
				)
			),
			plugin_dir_path(__FILE__)
		);
	}


	
	function get_template_variables( $instance, $args ) {
		$layout = $instance['listing_layout'];
		return array(
				'layout_type' => array(
					'column'  => (!empty($layout['grid_column']))? $layout['grid_column'] : 4
				)
			);
	}
	
	function get_template_name( $instance ) {
		return $instance['listing_layout']['layout_type'] == 'list' ? 'list-view' : 'grid-view';
	}

	function get_style_name($instance) {
		return false;
	}

	function get_less_variables($instance){
		return array();
	}
	function modify_instance($instance){
		return $instance;
	}


}

siteorigin_widget_register('posts-list-widget', __FILE__, 'Posts_List_Widget');