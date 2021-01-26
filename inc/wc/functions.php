<?php
  /**
   * Função pega apenas dados especificos dos produtos
   *
   * @param array $products
   * @since 0.4.3
   * @return array
   */
  function ka_sanitize_products( $products ) {
    $state = array();
    $state['products'] = array();

    foreach( $products as $product ) {
      if( $product->is_type( 'simple' ) ) {
        $sale_price    = $product->get_sale_price();
        $regular_price = $product->get_regular_price();
      }
      else if( $product->is_type('variable') ){
        $sale_price    = $product->get_variation_sale_price( 'min', true );
        $regular_price = $product->get_variation_regular_price( 'max', true );
      }

      $state['products'][] = array(
        'id'             => $product->get_id(),
        'name'           => $product->get_name(),
        'price'          => $product->get_price(),
        'sale_price'     => $sale_price,
        'regular_price'  => $regular_price,
        'discount'       => round( 100 - ( 100 *  $sale_price ) / $regular_price ),
        'is_variable'    => $product->is_type( 'variable' ),
        'image'          => wp_get_attachment_image_src( $product->get_image_id() )[0],
        'link'           => $product->get_permalink(),
        'category'       => get_the_category_by_ID( $product->get_category_ids()[0] ),
        'attributes'     => $product->get_attributes()
      );
    }

    return $state['products'];
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

    if( $state['product']->is_type( 'simple' ) ) {
      $sale_price    = $state['product']->get_sale_price();
      $regular_price = $state['product']->get_regular_price();
    }
    else if( $state['product']->is_type('variable') ){
      $sale_price    = $state['product']->get_variation_sale_price( 'min', true );
      $regular_price = $state['product']->get_variation_regular_price( 'max', true );
    }

    return array(
      'id'             => $id,
      'name'           => $state['product']->get_name(),
      'price'          => $state['product']->get_price(),
      'sale_price'     => $sale_price,
      'regular_price'  => $regular_price,
      'discount'       => round( 100 - ( 100 *  $sale_price ) / $regular_price ),
      'is_variable'    => $state['product']->is_type('variable'),
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
   * @return array Links das imagens
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
   *
   * @since 0.6.0
   * @return integer número de produtos
   */
  function ka_products_per_page() {
    return intval( apply_filters( 'ka_products_per_page', 12 ) );
  }

  /**
   * Função recarrega a página
   *
   * @since 0.7.0
   * @return void
   */
  function refresh_function(){
    header("Refresh:0");
  }
?>
