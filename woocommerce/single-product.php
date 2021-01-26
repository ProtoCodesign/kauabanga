<?php
  defined( 'ABSPATH' ) || exit;

  get_header();
?>

<?php
  $state = array();
  $state['product']    = ka_sanitize_single_product( get_the_ID() );
  $state['brands']     = get_the_terms( get_the_ID(), 'pwb-brand' );
  $state['categories'] = get_the_terms( get_the_ID(), 'product_cat' );
?>

<section id="next-element" class="breadcrumb">
  <div class="row container"><?php woocommerce_breadcrumb( array( 'delimiter' => ' ↣ ') ); ?></div>
</section>

<main class="single-product row container">
  <div class="gallery col s12 m6 l6 xl6" data-gallery="gallery">
    <img class="image-main" src="<?= $state['product']['img']; ?>" alt="<?= $state['product']['name']; ?>"
      data-gallery="main" />

    <ul class="gallery-images" data-gallery="list">
      <li>
        <img src="<?= $state['product']['img']; ?>" alt="<?= $state['product']['name']; ?>" data-gallery="list" />
      </li>

      <?php foreach( $state['product']['gallery'] as $img ) { ?>
      <li>
        <img src="<?= $img ?>" alt="<?= $state['product']['name']; ?>" data-gallery="list" />
      </li>
      <?php } ?>
    </ul>
  </div>

  <div class="product-infos col s12 m6 l6 xl6">
    <?php if( have_posts() ) { while( have_posts() ) { the_post(); ?>
    <div class="product-tags">
      <span class="product-brand">
        Marca:
        <?php foreach( $state['brands'] as $brand ) { ?>
        <a href="<?= get_term_link( $brand, 'pwb-brands' ); ?>"><?= $brand->name; ?></a>
        <?php } ?>
      </span>

      <span class="product-categories">
        Categorias:
        <?php foreach( $state['categories'] as $category ) { ?>
        <a href="<?= get_term_link( $category, 'product_cat' ); ?>"><?= $category->name; ?></a>
        <?php } ?>
      </span>
    </div>

    <div class="product-head">
      <small>Ref: <?= $state['product']['sku']; ?></small>

      <h3><?= $state['product']['name']; ?></h3>

      <div class="price">
        <?php woocommerce_get_template( 'single-product/price.php' ); ?>
      </div>
    </div>

    <?php woocommerce_template_single_add_to_cart(); ?>

  </div>
  <?php } } ?>
</main>

<?php get_footer(); ?>
