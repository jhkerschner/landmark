<?php
add_action( 'init', 'create_post_types' );
function create_post_types() {
  	$feature_labels = array(
		'name'               => __( 'Home Page Slides' ),
		'singular_name'      => __( 'Home Page Slide' ),
		'menu_name'          => __( 'Home Page Slides' ),
		'add_new'            => __( 'Add Slide'),
		'add_new_item'       => __( 'Add New Slide' ),
		'new_item'           => __( 'New Slide' ),
		'edit_item'          => __( 'Edit Slide' ),
		'view_item'          => __( 'View Slides' ),
		'all_items'          => __( 'All Slides' ),
		'search_items'       => __( 'Search Slides' ),
		'not_found'          => __( 'No features found.' ),
		'not_found_in_trash' => __( 'No features found in Trash.' )
	);

	$feature_args = array(
		'labels'             => $feature_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'home_slides', $feature_args );
}