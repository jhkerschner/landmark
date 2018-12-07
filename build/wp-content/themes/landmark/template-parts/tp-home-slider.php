<div class="home-slider">
  <ul class="bxslider">
    <?php 
    if(have_rows('slides')) :
      while(have_rows('slides')) : the_row();
        $slide_id = get_sub_field('slide');
        $slide_image = get_field('slide_image', $slide_id);
        $datetime = get_field('start_date', $slide_id);

        if(get_field('date_type', $slide_id) === 'Date Range') :
          $datetime .= ' &ndash; '.get_field('end_date', $slide_id);
        endif;

        if(get_field('time', $slide_id) != '') :
          $datetime .= ' &ndash; '.get_field('time', $slide_id);
        endif;
     ?>
    <li>
      <div class="slide-content-wrapper">
        <div class="slide-content">
          <p class="date"><?php echo $datetime; ?></p>
          <h2><?php the_field('slide_heading', $slide_id); ?></h2>
          <h3><?php the_field('slide_sub_heading', $slide_id); ?></h3>
          <?php 
          if(get_field('include_cta', $slide_id) === 'Yes') :
            if(get_field('link_type', $slide_id) == 'link_to_event') :
              $slide_url = get_field('link_to_event', $slide_id);
            elseif(get_field('link_type', $slide_id) == 'page_link') :
              $slide_url = get_field('page_link', $slide_id);
            else :
              //nothing to do here
            endif;
          ?>
          <a href="<?php echo $slide_url; ?>" class="cta-button" data-event-category="In-Page Nav" data-event-action="Nav Click" data-event-label="Home Slider | <?php echo filter_var(get_field('slide_heading', $slide_id), FILTER_SANITIZE_STRING); ?> | <?php the_field('button_text', $slide_id); ?>"><?php the_field('button_text', $slide_id); ?></a>
          <?php endif; ?>
        </div>
        <img class="slide" src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_image['alt']; ?>">
      </div>
    </li>
    <?php endwhile; endif; ?>

  </ul>
  <img class="header-mask" src="<?php echo get_bloginfo('template_url').'/assets/images/header-mask.png'; ?>" alt="">
  <div id="bx-next" class="slider-control slider-control-right"><?php include (get_template_directory().'/assets/images/arrow-right.svg'); ?></div>
  <div id="bx-prev" class="slider-control slider-control-left"><?php include (get_template_directory().'/assets/images/arrow-left.svg'); ?></div>
</div>