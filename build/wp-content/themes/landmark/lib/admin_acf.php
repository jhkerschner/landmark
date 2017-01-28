<?php
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'Site-settings',
		'capability'	=> 'edit_posts',
		'position' 		=> 4.5,
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Team Member Ordering',
		'menu_title'	=> 'Team Member Ordering',
		'menu_slug' 	=> 'team-member-ordering',
		'parent_slug'	=> 'edit.php?post_type=team',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function acf_load_landmark_events( $field ) {
    $field['choices'] = array();
    $landmark_events = get_landmark_events();
	foreach( $landmark_events as $id=>$event ) :
	    $field['choices'][ $id ] = $event['title'];
	endforeach;

    return $field;
}

add_filter('acf/load_field/name=link_to_event', 'acf_load_landmark_events');