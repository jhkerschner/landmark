
    </div><!-- End Body -->    
    <?php get_template_part('template-parts/tp-google-map'); ?>
    <footer class="site-footer">
      <div class="container">
        <div class="footer-left-col">
          <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php include (get_template_directory().'/assets/images/footer-logo.svg'); ?></a>
        </div>
        <div class="footer-right-col">
          <div class="social-icons">
            <a href="#" class="social-icon icon-facebook"><?php include (get_template_directory().'/assets/images/facebook.svg'); ?></a>
            <a href="#" class="social-icon icon-twitter"><?php include (get_template_directory().'/assets/images/twitter.svg'); ?></a>
            <a href="#" class="social-icon icon-linkedin"><?php include (get_template_directory().'/assets/images/linkedin2.svg'); ?></a>
            <a href="#" class="social-icon icon-foursquare"><?php include (get_template_directory().'/assets/images/foursquare.svg'); ?></a>
            <a href="#" class="social-icon icon-yelp"><?php include (get_template_directory().'/assets/images/yelp.svg'); ?></a>
            <a href="#" class="social-icon icon-instagram"><?php include (get_template_directory().'/assets/images/instagram.svg'); ?></a>
            <a href="#" class="social-icon icon-youtube"><?php include (get_template_directory().'/assets/images/youtube.svg'); ?></a>
          </div>
          <p class="copyright">&copy; Landmark Theatre 362 S. Salina Street, Syracuse, NY 13202</p>
        </div>
      </div>  
    </footer>
  </div><!-- End Wrapper -->
  <?php wp_footer(); ?>
</body>
</html>