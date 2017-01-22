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