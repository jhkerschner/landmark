<?php
//add_filter( 'woocommerce_cart_needs_shipping', '__return_true' );


/* CREATE the new function, with SKU added */
function landmark_woocommerce_template_loop_product_title() {
	echo '<div><h3 class="loop-title">' . get_the_title() . '</h3></div>';
}

/*REMOVE old loop-title action             */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

/* ADD new loop-title-with sku action      */
add_action( 'woocommerce_shop_loop_item_title', 'landmark_woocommerce_template_loop_product_title', 10 );

/** Remove short description if product tabs are not displayed */
function dot_reorder_product_page() {
    if ( get_option('woocommerce_product_tabs') == false ) {
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    }
}
add_action( 'woocommerce_before_main_content', 'dot_reorder_product_page' );

/** Display product description the_content */
function dot_do_product_desc() {

    global $woocommerce, $post;

    if ( $post->post_content ) : ?>
        <div itemprop="description" class="item-description">
            <?php $heading = apply_filters('woocommerce_product_description_heading', __('Product Description', 'woocommerce')); ?>

            <!-- <h2><?php echo $heading; ?></h2> -->
            <?php the_content(); ?>

        </div>
    <?php endif;
}
add_action( 'woocommerce_single_product_summary', 'dot_do_product_desc', 20 );


/**
 * Remove product short description meta box
 */
add_action( 'add_meta_boxes' , 'remove_wc_metaboxes', 50 );
function remove_wc_metaboxes() {
     remove_meta_box( 'postcustom' , 'product' , 'normal' );
     remove_meta_box( 'postexcerpt' , 'product' , 'normal' );
     remove_meta_box( 'commentsdiv' , 'product' , 'normal' );
     remove_meta_box( 'tagsdiv-product_tag' , 'product' , 'side' );
     remove_meta_box( 'woocommerce-product-images' , 'product' , 'side' );
}