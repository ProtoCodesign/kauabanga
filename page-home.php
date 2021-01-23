<?php
  // Template Name: Home

  get_header();

  global $ka_uri;

  $data = array();
  $data['featured'] = ka_sanitize_products( wc_get_products( array(
        'limit'     => 12,
        'orderby'   => 'date',
        'featured'  => true
      )
    )
  );
  $data['sales'] = ka_sanitize_products( wc_get_products( array(
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
  <div class="row container">
    <div class="banner-content col s12 m11 l8 xl8 m0-offset l1-offset xl1-offset">
      <h1><?= get_theme_mod( 'banner-home-top-title' ); ?></h1>

      <h4><?= get_theme_mod( 'banner-home-top-description' ); ?></h4>

      <a href="<?= get_theme_mod( 'banner-home-top-button-url' ); ?>" class="btn-primary">
        <?= get_theme_mod( 'banner-home-top-button-title' ); ?>
      </a>
    </div>
  </div>
</main>
<?php } ?>

<?php if( get_theme_mod( 'banner-home-regua-active' ) ) { ?>
<section class="banner-ruler">
  <div class="row container col s12 m10 l12 xl12">
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
  </div>
</section>
<?php } ?>

<section class="ka-highlights container">
  <h2 class="ka-title"><?php _e( 'Destaques', 'kauabanga' ); ?></h2>
  <?php ka_product_list( $data['featured'], 'col s12 m4 l3 xl3' ); ?>
</section>

<section class="ka-categories row container">
  <?php
    $terms = get_terms( array (
        'order'      => 'ASC',
        'orderby'    => 'rand',
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
      )
    );

    foreach( $terms as $term ) :
      $image = wp_get_attachment_url( get_term_meta( $term->term_id, 'thumbnail_id', true ) );
      $link = get_term_link( $term, 'product_cat' );
  ?>
  <div class="col s4 m3 l2 xl2">
    <div class="square-container">
      <a href="<?= $link; ?>" class="square-content">
        <div>
          <img src="<?= $image ?>" alt="<?= $term->name; ?>">
          <p><?= $term->name; ?></p>
        </div>
      </a>
    </div>
  </div>
  <?php endforeach; ?>

</section>

<section class="ka-highlights container">
  <h2 class="ka-title"><?php _e( 'Mais vendidos', 'kauabanga' ); ?></h2>
  <?php ka_product_list( $data['sales'], 'col s12 m4 l3 xl3' ); ?>
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
