 <?php 
 if(have_rows('ctas')) :
  while(have_rows('ctas')) : the_row(); 
  $cta_id = get_sub_field('cta');
  $image = get_field('image', $cta_id);
  ?>
    <div class="cta">
      <h3 class="cta-title"><?php echo get_the_title($cta_id); ?></h3>
      <?php if($image) : ?>
      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="cta-image">
      <?php endif; ?>
      <div class="cta-text"><?php the_field('short_description', $cta_id); ?></div>
      <a href="<?php the_field('page_link', $cta_id); ?>" class="cta-button" data-event-category="CTA" data-event-action="Click" data-event-label="<?php echo the_ancestors_for_analytics().the_analytics_title(); ?> | <?php the_field('button_text', $cta_id); ?>"><?php the_field('button_text', $cta_id); ?></a>
    </div>
<?php endwhile; endif; ?>