<?php get_header(); ?>

<?php
  $state = array();
  $state["product"] = ka_sanitize_single_product( get_the_ID() );
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
  <div class="product-infos col l6 xl6">

  </div>
</main>


<?php get_footer(); ?>
