<?php
/**
 * Função retorna lista de produtos
 *
 * @param array $products
 * @param string $product_class
 * @param array $args
 * @since 0.4.3
 * @return void
 */
function ka_product_list( $products, $product_class = '', $args = array(
      'container' => true
    )
  )
{ ?>
<?php if( $args['container'] ) : ?>
<div class="showcase row">
  <?php endif; ?>

  <?php foreach( $products as $product ) : ?>
  <div class="<?= $product_class; ?>">
    <a href="<?= $product['link']; ?>" class="product">
      <div class="image-product">
        <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" draggable="false" />

        <?php if( !$product['is_variable'] && !empty( $product['sale_price'] ) ) { ?>
        <small class="tag-discount"><?= $product['discount']; ?>%</small>
        <?php } ?>

        <small class="tag-category"><?= $product['category']; ?></small>
      </div>

      <div class="product-info">
        <p class="product-name"><?= $product['name']; ?></p>

        <span class="price">
          <?php if( $product['is_variable'] ) : ?>
          <span>
            <?php _e( 'A partir de:' ); ?>
          </span>
          <?php else : ?>

          <?php if( $product['price'] != $product['regular_price'] ) { ?>
          <p class="discount-price"><?php _e( 'R$', 'kauabanga' ); ?>
            <?= number_format( $product['regular_price'], 2, ",", "." ); ?>
          </p>
          <?php } ?>

          <?php endif; ?>

          <h4 class="current-price"><?php _e( 'R$', 'kauabanga' ); ?>
            <?= number_format(  $product['price'], 2, ",", "." ); ?></h4>
        </span>
      </div>
    </a>
  </div>
  <?php endforeach; ?>

  <?php if( $args['container'] ) : ?>
</div>
<?php endif; ?>

<?php }
