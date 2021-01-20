<?php
  /**
   * Função pega apenas dados especificos dos produtos
   *
   * @param array $products
   * @since 0.4.3
   * @return array
   */
  function sanitize_products( $products ) {
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
?>

<?php
/**
 * Função retorna lista de produtos
 *
 * @param array $products
 * @since 0.4.3
 * @return void
 */
function ka_product_list( $products ) { ?>
<div class="showcase row">

  <?php foreach( $products as $product ) { ?>
  <div class="col l3 xl3">
    <a href="<?= $product['link']; ?>" class="product">
      <div class="image-product">
        <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" draggable="false" />

        <small class="tag-discount"><?= 100 - (100 * $product['sale_price']) / $product['regular_price']; ?>%</small>

        <small class="tag-category"><?= $product['category']; ?></small>
      </div>

      <div class="product-info">
        <p class="product-name"><?= $product['name']; ?></p>

        <span class="price">
          <?php if( $product['price'] != $product['regular_price'] ) { ?>
          <p class="discount-price"><?php _e( 'R$', 'kauabanga' ); ?>
            <?=  number_format( $product['regular_price'], 2, ",", "." ); ?></p>
          <?php } ?>

          <h4 class="current-price"><?php _e( 'R$', 'kauabanga' ); ?>
            <?=  number_format(  $product['price'], 2, ",", "." ); ?></h4>
        </span>
      </div>
    </a>
  </div>
  <?php } ?>

</div>
<?php } ?>
