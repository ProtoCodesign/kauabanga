<?php
  if( class_exists( 'WC_Frenet_Shipping_Simulator' ) ) {
    remove_action( 'woocommerce_single_product_summary', array( new WC_Frenet_Shipping_Simulator(), 'simulator' ), 40 );

    add_action( 'woocommerce_before_add_to_cart_form', array( new WC_Frenet_Shipping_Simulator(), 'simulator' ) );
  }

  add_filter( 'loop_shop_per_page', 'ka_products_per_page' );

  add_filter( 'woocommerce_account_menu_items', 'ka_remove_link_account' );

  add_action( 'woocommerce_add_to_cart', 'refresh_function' );
?>
