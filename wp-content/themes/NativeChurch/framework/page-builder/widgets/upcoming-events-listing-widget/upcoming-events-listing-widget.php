<?php

/*
Widget Name: Upcoming Events Listing widget
Description: A widget to show list of events in a compact way.
Author: imithemes
Author URI: http://imithemes.com
*/

class Upcoming_Events_Listing_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'upcoming-events-listing-widget',
			__('Upcoming Events Listing Widget', 'framework'),
			array(
				'description' => __('A widget to show list of upcoming events in a compact way.', 'framework'),
				'panels_icon' => 'dashicons dashicons-testimonial',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'categories' => array(
					'type' => 'text',
					'label' => __('Event Categories (Enter comma separated events category slugs)', 'framework'),
				),
				'widget_title' => array(
					'type' => 'text',
					'label' => __('Widget Title', 'framework'),
					'default' => 'More coming events'
				),

				'allpostsbtn' => array(
					'type' => 'text',
					'label' => __('All events button text', 'framework'),
					'default' => __('All Events', 'framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'framework'),
				),

				'allpostsurl' => array(
					'type' => 'link',
					'label' => __('All events button URL', 'framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'framework'),
				),
				'number_of_events' => array(
					'type' => 'slider',
					'label' => __( 'Number of Events to show', 'framework' ),
					'default' => 4,
					'min' => 1,
					'max' => 25,
					'integer' => true
				),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'events-listing-widget-template';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('upcoming-events-listing-widget', __FILE__, 'Upcoming_Events_Listing_Widget');