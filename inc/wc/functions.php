<?php
  /**
   * Função pega apenas dados especificos dos produtos
   *
   * @param array $products
   * @since 0.4.3
   * @return array
   */
  function ka_sanitize_products( $products ) {
    $products_formated = array();

    foreach( $products as $product ) {
      $products_formated[] = array(
        'name'           => $product->get_name(),
        'price'          => $product->get_price(),
        'sale_price'     => $product->get_sale_price(),
        'regular_price'  => $product->get_regular_price(),
        'image'          => wp_get_attachment_image_src( $product->get_image_id() )[0],
        'link'           => $product->get_permalink(),
        'category'       => get_the_category_by_ID( $product->get_category_ids()[0] )
      );
    }

    return $products_formated;
  }

  /**
   * Retorna o número de produtos por pagina
   * @since 0.6.0
   * @return integer número de produtos
   */
  function ka_products_per_page() {
    return intval( apply_filters( 'ka_products_per_page', 12 ) );
  }
?>
