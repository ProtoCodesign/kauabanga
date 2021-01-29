<?php
  add_filter( 'loop_shop_per_page', 'ka_products_per_page' );

  add_filter( 'woocommerce_account_menu_items', 'ka_remove_link_account' );

  add_action( 'woocommerce_add_to_cart', 'refresh_function' );
?>
