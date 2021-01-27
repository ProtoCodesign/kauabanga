<?php
  add_filter( 'loop_shop_per_page', 'ka_products_per_page' );

  add_action( 'woocommerce_add_to_cart', 'refresh_function' );
?>
