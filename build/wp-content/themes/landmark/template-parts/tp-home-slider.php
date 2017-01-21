<div class="home-slider">
  <img class="header-mask" src="<?php echo get_bloginfo('template_url').'/assets/images/header-mask.png'; ?>" alt="">
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
            if(get_field('internal_or_external_link', $slide_id) == 'External') :
              $target = ' target="_blank"';
              $url = get_field('external_link', $slide_id);
            else :
              $target = '';
              $url = get_field('internal_link', $slide_id);
            endif
          ?>
          <a href="<?php echo $url; ?>"<?php echo $target; ?> class="cta-button"><?php the_field('button_text', $slide_id); ?></a>
          <?php endif; ?>
        </div>
        <img class="slide" src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_image['alt']; ?>">
      </div>
    </li>
    <?php endwhile; endif; ?>

  </ul>
  <div class="controls">
    <div id="bx-next" class="slider-control slider-control-right"><?php include (get_template_directory().'/assets/images/arrow-right.svg'); ?></div>
    <div id="bx-prev" class="slider-control slider-control-left"><?php include (get_template_directory().'/assets/images/arrow-left.svg'); ?></div>
  </div>
</div>