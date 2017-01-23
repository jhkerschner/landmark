<?php 
/*
Template Name: Team
*/ 
get_header(); ?>
<div class="container">
  <div class="row">
    <div class="left-col">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="wysiwyg"><?php the_content(); ?></div>
        <?php
        if(have_rows('team')) : 
          while(have_rows('team')) : the_row(); ?>
            <div class="person">
              <p class="name"><?phvp the_sub_field('name'); ?></p>
              <p class="title"><?php the_sub_field('title'); ?></p>
              <div class="wysiwyg">
                <?php the_sub_field('bio'); ?>
              </div>
            </div>
        <?php endwhile; endif; ?>
      <?php endwhile; endif; ?>
    </div>
    <div class="right-col">
      <?php get_template_part('template-parts/tp-cta'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
