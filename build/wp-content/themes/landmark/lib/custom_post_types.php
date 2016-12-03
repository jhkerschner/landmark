<?php
add_action( 'init', 'create_post_types' );
function create_post_types() {
  	$feature_labels = array(
		'name'               => __( 'Home Page Features' ),
		'singular_name'      => __( 'Home Page Feature' ),
		'menu_name'          => __( 'Home Page Features' ),
		'add_new'            => __( 'Add Feature'),
		'add_new_item'       => __( 'Add New Feature' ),
		'new_item'           => __( 'New Feature' ),
		'edit_item'          => __( 'Edit Feature' ),
		'view_item'          => __( 'View Feature' ),
		'all_items'          => __( 'All Features' ),
		'search_items'       => __( 'Search Features' ),
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

	register_post_type( 'home_features', $feature_args );
}