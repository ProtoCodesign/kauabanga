<?php get_header(); ?>

<main class="container-404 row container col s12 m8 l6 xl6 s0-offset m2-offset l3-offset xl3-offset">
  <h1><?php _e( '404', 'kauabanga' ); ?></h1>
  <h4><?php _e( 'Página não encontrada', 'kauabanga' ); ?></h4>
  <p>
    <?php _e( 'A página não existe ou foi apagada, confira se você digitou o link corretamente, dúvidas entre em contato pelo nosso email:', 'kauabanga' ); ?>
    <strong><?= sanitize_email( get_theme_mod( 'title-tagline-kauabanga-email' ) ); ?></strong>
  </p>
  <a href="<?= esc_url( get_site_url() ); ?>" class="btn-primary"><?php _e( 'Voltar para a loja', 'kauabanga' ); ?></a>
</main>

<?php get_footer(); ?>
