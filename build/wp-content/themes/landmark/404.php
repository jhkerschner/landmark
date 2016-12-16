<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="left-col">
      <h1 class="entry-title"><?php _e( 'Not Found', 'blankslate' ); ?></h1>
      <p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?></p>
      <?php get_search_form(); ?>
    </div>
    <div class="right-col">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>