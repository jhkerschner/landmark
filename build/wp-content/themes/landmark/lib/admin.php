<?php
/**
 * Remove WP admin nav items that are not needed.
 * Admins will be able to see everything.
 */
function remove_menus(){
	remove_menu_page( 'edit.php' );                   //Posts
}
add_action( 'admin_menu', 'remove_menus' );