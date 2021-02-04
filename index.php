<?php
  get_header();
?>

<?php if( is_cart() && have_posts() ) : while( have_posts() ) : the_post(); ?>
<section class="title-section">
  <h2 class="ka-title"><?php the_title(); ?></h2>
</section>

<?php the_content(); ?>
<?php endwhile; ?>

<?php elseif( is_checkout() && have_posts() ) : while ( have_posts() ) :
  the_post();
?>
<section class="title-section">
  <h2 class="ka-title">
    <?php the_title(); ?>
  </h2>
</section>
<?php the_content(); endwhile; ?>

<?php elseif( is_account_page() && !is_user_logged_in() && have_posts() ) :
  while( have_posts() ) : the_post();
?>
<section class="title-section">
  <h2 class="ka-title">
    <?php the_title(); ?>
  </h2>
</section>
<main class="login-register">
  <?php the_content(); ?>
</main>
<?php endwhile; ?>

<?php elseif( have_posts() ) :
  while( have_posts() ) : the_post();
?>
<section class="title-section">
  <h2 class="ka-title">
    <?php the_title(); ?>
  </h2>
</section>
<main class="login-register row container">
  <?php the_content(); ?>
</main>
<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
