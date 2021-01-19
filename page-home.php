<?php
  // Template Name: Home

  get_header();

  global $ka_uri;
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
    <img src="<?= $ka_uri; ?>assets/svgs/icons/safe.svg" alt="<?php esc_attr_e( 'Compra segura', 'kauabanga' ); ?>" />
    <?php _e( 'Sua compra é 100% segura', 'kauabanga' ); ?>
  </span>
  <span>
    <img src="<?= $ka_uri; ?>assets/svgs/icons/credit-card.svg"
      alt="<?php esc_attr_e( 'Compre parcelado', 'kauabanga' ); ?>" />
    <?php _e( 'Parcele em até 12x sem juros', 'kauabanga' ); ?>
  </span>
  <span>
    <img src="<?= $ka_uri; ?>assets/svgs/icons/truck.svg"
      alt="<?php esc_attr_e( 'Entrega por todo o Brasil', 'kauabanga' ); ?>" />
    <?php _e( 'Entrega por todo o Brasil', 'kauabanga' ); ?>
  </span>
</section>
<?php } ?>

<?php get_footer(); ?>
