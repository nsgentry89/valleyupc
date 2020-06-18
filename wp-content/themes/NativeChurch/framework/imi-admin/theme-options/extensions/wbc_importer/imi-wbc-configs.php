<?php
// Way to set menu, import revolution slider, set blog page and set home page
if ( !function_exists( 'imi_wbc_extended' ) ) :
	
	add_action( 'wbc_importer_after_content_import', 'imi_wbc_extended', 10, 4 );

	function imi_wbc_extended( $demo_active_import , $demo_directory_path, $import_sliders, $import_theme_opts ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) ) :

			


			/**
			 * Import theme options
			 *
			 * @since 1.0.0
			 */
			if ( $import_theme_opts ) :
				// Get file contents and decode
				$file = $demo_directory_path . 'theme-options.txt';
				$data = file_get_contents( $file );
				$data = json_decode( $data, true );
				$data = maybe_unserialize( $data );
				update_option( 'imic_options', $data );
				//Update Widgets Switch to On
				$all_widgets_on = 'a:40:{s:6:"button";b:1;s:10:"google-map";b:1;s:5:"image";b:1;s:6:"slider";b:1;s:13:"post-carousel";b:1;s:6:"editor";b:1;s:12:"alert-widget";b:1;s:14:"counter-widget";b:1;s:21:"featured-block-widget";b:1;s:19:"gallery-grid-widget";b:1;s:4:"icon";b:1;s:15:"carousel-widget";b:1;s:17:"posts-list-widget";b:1;s:18:"progressbar-widget";b:1;s:19:"sermons-list-widget";b:1;s:21:"sermons-albums-widget";b:1;s:17:"staff-grid-widget";b:1;s:13:"spacer-widget";b:1;s:11:"tabs-widget";b:1;s:8:"taxonomy";b:1;s:13:"toggle-widget";b:1;s:11:"testimonial";b:1;s:30:"upcoming-events-listing-widget";b:1;s:5:"video";b:1;s:14:"simple-masonry";b:1;s:20:"social-media-buttons";b:1;s:11:"price-table";b:1;s:13:"layout-slider";b:1;s:10:"image-grid";b:1;s:4:"hero";b:1;s:8:"headline";b:1;s:8:"features";b:1;s:7:"contact";b:1;s:3:"cta";b:1;s:20:"blog-timeline-widget";b:1;s:12:"cause-widget";b:1;s:31:"event-grid-minimal-style-widget";b:1;s:32:"event-listing-with-filter-widget";b:1;s:28:"posts-full-width-list-widget";b:1;s:26:"event-grid-timeline-widget";b:1;}';
				$all_widgets_on = unserialize($all_widgets_on);
				update_option('siteorigin_widgets_active', $all_widgets_on);
			endif;


			$top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
			$main_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			if ( isset( $main_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
					'top-menu' => $top_menu->term_id,
					'primary-menu' => $main_menu->term_id,
					'footer-menu' => $footer_menu->term_id
				));
			}
		
			
		
			/**
			 * Set HomePage
			 *
			 * @since 1.0.0
			 */
			$wbc_home_pages = array(
				// folder name
				'demo1'			=> 'Home',
				'demo2'			=> 'Home',
			);

			if ( array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) :
				$home_page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
				if ( isset( $home_page->ID ) ) :
					update_option( 'page_on_front', $home_page->ID );
					update_option( 'show_on_front', 'page' );
				endif;
			endif;



			/**
			 * Set BlogPage
			 *
			 * @since 1.0.0
			 */
			$wbc_blog_pages = array(
				// folder name
				'demo1'		=> 'Blog',
				'demo2'		=> 'Blog',
			);

			
			if ( array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_blog_pages ) ) :
				$bpage = get_page_by_title( $wbc_blog_pages[$demo_active_import[$current_key]['directory']] );
				if ( isset( $bpage->ID ) ) :
					update_option( 'page_for_posts', $bpage->ID );
				endif;
			endif;
		
		
			/**
			 * Import slider(s) for the current demo being imported
			 *
			 * @since 1.0.0
			 */
			if ( $import_sliders && class_exists( 'RevSlider' ) ) :

				// Set sliders zip name
				$wbc_sliders_array = array(
					// folder name
					'demo1'			=> array( 'newslider2014.zip' ),
					'demo2'			=> array( 'newslider2014.zip' ),
				);

				if ( array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) :
					$wbc_slider_imports = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
					if ( is_array( $wbc_slider_imports ) ) :
						foreach( $wbc_slider_imports as $wbc_slider_import ) :
							if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) :
								$slider = new RevSlider();
								$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
							endif;
						endforeach;
					endif;
				endif;

			endif; // end Import slider(s)


		endif;

		/**
		 * Update Woocommerce Image Size
		 *
		 * @version 1.0.0  
		*/
		if ( class_exists( 'Woocommerce' ) ) {
			update_option( 'woocommerce_thumbnail_cropping', 'uncropped' );
			update_option( 'woocommerce_thumbnail_image_width', '300' );
			update_option( 'woocommerce_single_image_width', '300' );
		}

	} // end imi_wbc_extended function

endif;

// required plugins
function imi_demo_plugins( $demo_id ) {

	$main_plugins = array(
		'revslider',
		'breadcrumb-navxt',
		'contact-form-7',
		'pojo-sidebars',
		'woocommerce',
		'Payment-Imithemes',
		'ipray',
		'social-media-icons-widget'
	);

	$plugins_array = array(
		// Page Templates
		'wbc-import-1'  => array_merge( $main_plugins, array(  ) ),
		// Page Builder
		'wbc-import-2'  => array_merge( $main_plugins, array( 'siteorigin-panels' , 'so-widgets-bundle' , 'black-studio-tinymce-widget' ) ),
	);

	return $plugins_array[ $demo_id ];
}
