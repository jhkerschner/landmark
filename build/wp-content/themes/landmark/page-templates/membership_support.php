<?php 
/*
Template Name: Membership & Support
*/

get_header();

$args = array(
	'post_type' => 'product',
	'posts_per_page' => -1,
	'product_cat' => 'memberships'
);
$memberships = get_posts($args);
?>

<?php foreach($memberships as $post) : setup_postdata($post); ?>
	<?php wc_get_template_part( 'content', 'product' ); ?>

<?php endforeach; wp_reset_postdata();?>



<?php get_footer(); ?>u