<?php
  // Template Name: Home

  get_header();
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


<?php get_footer(); ?>
