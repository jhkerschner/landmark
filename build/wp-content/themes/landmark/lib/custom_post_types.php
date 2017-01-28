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

	$ctas_labels = array(
		'name'               => __( 'CTAs' ),
		'singular_name'      => __( 'CTA' ),
		'menu_name'          => __( 'CTAs' ),
		'add_new'            => __( 'Add CTA'),
		'add_new_item'       => __( 'Add New CTA' ),
		'new_item'           => __( 'New CTA' ),
		'edit_item'          => __( 'Edit CTA' ),
		'view_item'          => __( 'View CTA' ),
		'all_items'          => __( 'All CTAs' ),
		'search_items'       => __( 'Search CTAs' ),
		'not_found'          => __( 'No CTAs found.' ),
		'not_found_in_trash' => __( 'No CTAs found in Trash.' )
	);

	$ctas_args = array(
		'labels'             => $ctas_labels,
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

	register_post_type( 'ctas', $ctas_args );

	$team_labels = array(
		'name'               => __( 'Team Members' ),
		'singular_name'      => __( 'Team Memeber' ),
		'menu_name'          => __( 'Team' ),
		'add_new'            => __( 'Add Team Member'),
		'add_new_item'       => __( 'Add New Team Memeber' ),
		'new_item'           => __( 'New Team Memeber' ),
		'edit_item'          => __( 'Edit Team Memeber' ),
		'view_item'          => __( 'View Team Memeber' ),
		'all_items'          => __( 'All Team Memebers' ),
		'search_items'       => __( 'Search Team Memebers' ),
		'not_found'          => __( 'No Team Memebers found.' ),
		'not_found_in_trash' => __( 'No Team Memebers found in Trash.' )
	);

	$team_args = array(
		'labels'             => $team_labels,
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

	register_post_type( 'team', $team_args );

	$team_tax_args = array(
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_admin_column'     => true
	);

	register_taxonomy( 'team_categories', 'team', $team_tax_args );
}