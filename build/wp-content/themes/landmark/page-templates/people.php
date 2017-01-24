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

        <div class="wysiwyg"><?php the_field('team_copy'); ?></div>
        <div class="people">
          <?php
          if(have_rows('team')) : 
            while(have_rows('team')) : the_row(); ?>
              <div class="person">
                <h2 class="name"><?php the_sub_field('name'); ?></h2>
                <p class="title"><?php the_sub_field('title'); ?></p>
                <div class="wysiwyg">
                  <?php the_sub_field('bio'); ?>
                </div>
              </div>
          <?php endwhile; endif; ?>
        </div>

        <div class="wysiwyg"><?php the_field('volunteer_copy'); ?></div>

        <div class="wysiwyg"><?php the_field('board_of_directors_copy'); ?></div>
        <div class="people">
          <?php
          if(have_rows('board_of_directors')) : 
            while(have_rows('board_of_directors')) : the_row(); ?>
              <div class="person">
                <h2 class="name"><?php the_sub_field('name'); ?></h2>
                <p class="title"><?php the_sub_field('title_on_board'); ?></p>
                <p class="title"><?php the_sub_field('titlecurrent_company'); ?></p>
                <div class="wysiwyg">
                  <?php the_sub_field('short_description'); ?>
                </div>
              </div>
          <?php endwhile; endif; ?>
        </div>


      <?php endwhile; endif; ?>
    </div>
    <div class="right-col">
      <?php get_template_part('template-parts/tp-cta'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
