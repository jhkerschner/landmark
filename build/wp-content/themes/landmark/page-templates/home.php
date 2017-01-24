<?php 
/*
Template Name: Homepage
*/

get_header();
?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="container">
    <div class="home-features">
      <?php get_template_part('template-parts/tp-cta'); ?>
    </div>
  </div>
<?php endwhile; endif; ?>



<?php get_footer(); ?>