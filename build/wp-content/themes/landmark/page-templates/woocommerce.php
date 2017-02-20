<?php 
/*
Template Name: WooCommerce
Description: This template is only used for the WooCommerce pages so they can be full width.
*/

get_header(); ?>
<div class="container">
  <div class="row">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
      <?php the_content(); ?>        
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>
