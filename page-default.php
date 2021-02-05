<?php
  // Template Name: Padrão

  get_header();
  if( have_posts() ) : while( have_posts() ) : the_post();
?>

<section class="title-section">
  <h2 class="ka-title"><?php the_title(); ?></h2>
</section>

<main class="container-text row container col s12 m12 l8 xl8 s0-offset m0-offset l2-offset xl2-offset">
  <?php the_content(); ?>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
