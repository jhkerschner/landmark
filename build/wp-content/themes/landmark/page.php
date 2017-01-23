<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="left-col">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
        <?php the_content(); ?>        
      <?php endwhile; endif; ?>
    </div>
    <div class="right-col">
      <?php get_template_part('template-parts/tp-cta'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
