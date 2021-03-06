<?php
  // Template Name: Home

use function PHPSTORM_META\type;

get_header();

  $state = array();
  $state['featured'] = ka_sanitize_products( wc_get_products( array(
        'limit'     => 12,
        'orderby'   => 'rand',
        'featured'  => true
      )
    )
  );
  $state['sales'] = ka_sanitize_products( wc_get_products( array(
        'limit'     => 12,
        'order'     => 'rand',
        'orderby'   => 'meta_value_num',
        'meta_key'  => 'total_sales'
      )
    )
  );

  if( taxonomy_exists( 'pwb-brand' ) ) {
    $state['brands'] = get_terms( array (
        'order'      => 'ASC',
        'orderby'    => 'rand',
        'taxonomy'   => 'pwb-brand',
        'hide_empty' => true
      )
    );
  }
?>

<?php if( get_theme_mod( 'banner-home-top-active' ) ) { ?>
<main class="banner-home"
  style="background-image: url('<?= wp_get_attachment_image_url( get_theme_mod( 'banner-home-top-background' ), 'full' ); ?>');">
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
      <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/safe.svg' ); ?>"
        alt="<?php esc_attr_e( 'Compra segura', 'kauabanga' ); ?>" draggable="false" />
      <?php _e( 'Sua compra é 100% segura', 'kauabanga' ); ?>
    </span>

    <?php if( !empty( get_theme_mod( 'banner-home-regua-plots' ) ) ) : ?>
    <span class="jq-banner-plots">
      <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/credit-card.svg' ); ?>"
        alt="<?php esc_attr_e( 'Compre parcelado', 'kauabanga' ); ?>" draggable="false" />
      <?= get_theme_mod( 'banner-home-regua-plots' ); ?>
    </span>
    <?php endif; ?>
    <span>
      <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/truck.svg' ); ?>"
        alt="<?php esc_attr_e( 'Entrega por todo o Brasil', 'kauabanga' ); ?>" draggable="false" />
      <?php _e( 'Entrega por todo o Brasil', 'kauabanga' ); ?>
    </span>
  </div>
</section>
<?php } ?>

<?php if( is_array( $state['brands'] ) && sizeof( $state['brands'] )  >= 5 ) { ?>
<section class="slider-brands">
  <div class="row container">
    <button aria-label="Previous" class="prev">
      <span>
        <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/arrow-left.svg' ); ?>"
          alt="<?php esc_attr_e( 'Anterior', 'kauabanga' ); ?>" draggable="false" />
      </span>
    </button>

    <ul id="brands-slider" class="col s8 m9 l10 xl10">
      <?php foreach( $state['brands'] as $brand ) { ?>
      <li>
        <a href="<?= get_term_link( $brand, 'pwb-brands' ); ?>">
          <img src="<?= wp_get_attachment_url( get_term_meta( $brand->term_id, 'pwb_brand_image', true ) ); ?>"
            alt="<?= $brand->name ?>" draggable="false" />
        </a>
      </li>
      <?php } ?>
    </ul>

    <button aria-label="Next" class="next">
      <span>
        <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/arrow-right.svg' ); ?>"
          alt="<?php esc_attr_e( 'Próximo', 'kauabanga' ); ?>" draggable="false" />
      </span>
    </button>
  </div>
</section>
<?php } ?>

<section class="ka-highlights container">
  <h2 class="ka-title"><?php _e( 'Destaques', 'kauabanga' ); ?></h2>
  <?php ka_product_list( $state['featured'], 'col s12 m4 l3 xl3' ); ?>
</section>

<?php if( intval( get_theme_mod( 'vitrine-categories-limit' ) ) > 0 ) : ?>
<section class="ka-categories row container">
  <?php
    $terms = get_categories( array (
        'order'      => 'ASC',
        'orderby'    => get_theme_mod( 'vitrine-categories-ordeby' ),
        'number'     => intval( get_theme_mod( 'vitrine-categories-limit' ) ),
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
<?php endif; ?>

<section class="ka-highlights container">
  <h2 class="ka-title"><?php _e( 'Mais vendidos', 'kauabanga' ); ?></h2>
  <?php ka_product_list( $state['sales'], 'col s12 m4 l3 xl3' ); ?>
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
