<?php
  get_header();
?>

<?php if( is_cart() ) : ?>
<section class="title-section">
  <h2 class="ka-title" id="next-element"><?php _e( 'Carrinho', 'kauabanga' ); ?></h2>
</section>
<?php wc_get_template( 'cart/cart.php' ); ?>
<?php elseif( is_checkout() && have_posts() ) : while ( have_posts() ) : ?>
<?php the_post(); ?>
<section class="title-section">
  <h2 class="ka-title" id="next-element">
    <?php the_title(); ?>
  </h2>
</section>
<?php the_content(); ?>
<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
