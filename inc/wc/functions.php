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
        'id'             => $product->get_id(),
        'name'           => $product->get_name(),
        'price'          => $product->get_price(),
        'sale_price'     => $product->get_sale_price(),
        'regular_price'  => $product->get_regular_price(),
        'image'          => wp_get_attachment_image_src( $product->get_image_id() )[0],
        'link'           => $product->get_permalink(),
        'category'       => get_the_category_by_ID( $product->get_category_ids()[0] ),
        'attributes'     => $product->get_attributes()
      );
    }

    return $products_formated;
  }

  /**
   * Função pega apenas dados especificos do produto
   *
   * @param integer $id
   * @since 0.6.8
   * @return array
   */
  function ka_sanitize_single_product( $id ) {
    $state['product'] = wc_get_product( $id );

    return array(
      'id'             => $id,
      'name'           => $state['product']->get_name(),
      'price'          => $state['product']->get_price(),
      'sale_price'     => $state['product']->get_sale_price(),
      'regular_price'  => $state['product']->get_regular_price(),
      'link'           => $state['product']->get_permalink(),
      'sku'            => $state['product']->get_sku(),
      'description'    => $state['product']->get_description(),
      'img'            => wp_get_attachment_image_src( $state['product']->get_image_id(), 'high' )[0],
      'gallery'        => ka_get_gallery_images_link( $id, 'high' ),
    );
  }

  /**
   * Retorna o link das imagens da galeria
   *
   * @param $product_id
   * @param $size
   * @since 0.6.8
   * @return array número de produtos
   */
  function ka_get_gallery_images_link( $product_id, $size = 'medium' ) {
    $state = array();
    $state['link'] = array();
    $state['ids'] = wc_get_product( $product_id )->get_gallery_attachment_ids();

    if( !is_array( $state['ids'] ) ) {
      return;
    }

    foreach( $state['ids'] as $id ) {
      $state['link'][] = wp_get_attachment_image_src( $id, $size )[0];
    }

    return $state['link'];
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
