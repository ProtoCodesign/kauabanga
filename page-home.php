<?php
  // Template Name: Home

  get_header();

  global $ka_uri;

  $data = array();
  $data['featured'] = sanitize_products( wc_get_products( array(
        'limit'     => 12,
        'orderby'   => 'date',
        'featured'  => true
      )
    )
  );
  $data['sales'] = sanitize_products( wc_get_products( array(
        'limit'     => 12,
        'order'     => 'DESC',
        'orderby'   => 'meta_value_num',
        'meta_key'  => 'total_sales'
      )
    )
  );
?>

<?php if( get_theme_mod( 'banner-home-top-active' ) ) { ?>
<main class="banner-home" id="next-element"
  style="background-image: url('<?= get_theme_mod( 'banner-home-top-background' ); ?>');">
  <div class="banner-content col l8 xl8 l1-offset xl1-offset">
    <h1><?= get_theme_mod( 'banner-home-top-title' ); ?></h1>

    <h4><?= get_theme_mod( 'banner-home-top-description' ); ?></h4>

    <a href="<?= get_theme_mod( 'banner-home-top-button-url' ); ?>" class="btn-primary">
      <?= get_theme_mod( 'banner-home-top-button-title' ); ?>
    </a>
  </div>
</main>
<?php } ?>

<?php if( get_theme_mod( 'banner-home-regua-active' ) ) { ?>
<section class="banner-ruler">
  <span>
    <img src="<?= $ka_uri; ?>assets/svgs/icons/safe.svg" alt="<?php esc_attr_e( 'Compra segura', 'kauabanga' ); ?>"
      draggable="false" />
    <?php _e( 'Sua compra é 100% segura', 'kauabanga' ); ?>
  </span>
  <span>
    <img src="<?= $ka_uri; ?>assets/svgs/icons/credit-card.svg"
      alt="<?php esc_attr_e( 'Compre parcelado', 'kauabanga' ); ?>" draggable="false" />
    <?php _e( 'Parcele em até 12x sem juros', 'kauabanga' ); ?>
  </span>
  <span>
    <img src="<?= $ka_uri; ?>assets/svgs/icons/truck.svg"
      alt="<?php esc_attr_e( 'Entrega por todo o Brasil', 'kauabanga' ); ?>" draggable="false" />
    <?php _e( 'Entrega por todo o Brasil', 'kauabanga' ); ?>
  </span>
</section>
<?php } ?>

<section class="ka-highlights container">
  <h2 class="ka-title"><?php _e( 'Destaques', 'kauabanga' ); ?></h2>
  <?php ka_product_list( $data['featured'] ); ?>
</section>

<section class="ka-highlights container">
  <h2 class="ka-title"><?php _e( 'Mais vendidos', 'kauabanga' ); ?></h2>
  <?php ka_product_list( $data['sales'] ); ?>
</section>

<?php if( get_theme_mod( 'newsletter-active' ) ) { ?>
<section class="newsletter">
  <div class="row container col l12 xl12">
    <h4><?= get_theme_mod( 'newsletter-description' ); ?></h4>
    <form class="input-with-button">
      <input type="email" class="bg-dark" placeholder="Email">
      <button type="submit" class="btn-secondary"><?= get_theme_mod( 'newsletter-button-title' ); ?></button>
    </form>
  </div>
</section>
<?php } ?>

<?php get_footer(); ?>
