
      </div><!-- End Body -->    
      <?php //get_template_part('template-parts/tp-google-map'); ?>
      <footer class="site-footer">
        <div class="container">
          <div class="footer-left-col">
            <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" data-event-category="In-Page Nav" data-event-action="Nav Click" data-event-label="Footer Logo"><?php include (get_template_directory().'/assets/images/footer-logo.svg'); ?></a>
          </div>
          <div class="footer-right-col">
            <div class="affiliate-logos">
              <a href="https://cnyarts.org/" target="_blank"><img src="<?php echo get_bloginfo('template_url').'/assets/images/cny-arts-logo.png'; ?>" alt="CNY Arts Logo"></a>
              <a href="http://ongov.net/" target="_blank"><img src="<?php echo get_bloginfo('template_url').'/assets/images/onondaga-county-logo.png'; ?>" alt="Onondaga County Logo"></a>
            </div>
            <?php if(have_rows('social_media_links', 'option')) : ?>
            <div class="social-icons">
            <?php while(have_rows('social_media_links', 'option')) : the_row(); 
                  $platform = get_sub_field('social_media_platform');?>
                    <a href="<?php the_sub_field('url'); ?>" target="_blank" class="social-icon icon-<?php echo $platform['value']; ?>" data-event-category="External Link" data-event-action="Click" data-event-label="<?php echo $platform['label'] ?>"><?php include (get_template_directory().'/assets/images/'.$platform['value'].'.svg'); ?></a>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <p class="copyright">&copy; Landmark Theatre 362 S. Salina Street, Syracuse, NY 13202</p>
          </div>
        </div>  
      </footer>
    </div><!-- End Wrapper -->
  </div><!-- End site-wrapper -->
  <?php wp_footer(); ?>
</body>
</html>