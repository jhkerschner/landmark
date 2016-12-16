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
<div class="container">
  <div class="row">
    <div class="left-col">
      <?php foreach($memberships as $post) : setup_postdata($post); ?>
      	<?php wc_get_template_part( 'content', 'product' ); ?>
      <?php endforeach; wp_reset_postdata();?>
    </div>
    <div class="right-col">
      
    </div>
  </div>
</div>
<?php get_footer(); ?>
