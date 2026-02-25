<?php
add_action( 'init', 'register_posts' );
	function register_posts() {
				
        register_post_type( 'tours_post',
			array(
				'labels' => array(
					'name' => __( "Tours","um_lang"),
					'singular_name' => __( "Tour" ,"um_lang")
				),
				'public' => true,
				'has_archive' => true,			
				'rewrite' => array('slug' => "tours_post", 'with_front' => TRUE),
				'supports' => array('title','editor','comments','thumbnail','page-attributes')				
			)
		);

		register_taxonomy('tour_category',array (
		  0 => 'tours_post',
		),array( 'hierarchical' => true, 'label' => __('Tour Category',"um_lang"),'show_ui' => true,'query_var' => true,'singular_label' => __('Tour Category',"um_lang")) );
        
	}
?>