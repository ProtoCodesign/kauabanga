<?php get_header(); ?>

<section class="breadcrumb" style="margin-top: 100px;">
  <div class="row container"><?php woocommerce_breadcrumb( array( 'delimiter' => ' ↣ ') ); ?></div>
</section>

<main class="section-main row container">
  <section class="filters col l3 xl3">
    <h3 class="ka-title"><?php _e( 'Filtrar', 'kauabanga' ); ?></h3>

    <form class="form-price">
      <h4><?php _e( 'Preço', 'kauabanga' );?></h4>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=0&max_price=100">
          <?php _e( 'Até R$100', 'kauabanga' );?>
        </a>
      </span>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=100&max_price=300">
          <?php _e( 'R$100 a R$300', 'kauabanga' );?>
        </a>
      </span>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=300&max_price=700">
          <?php _e( 'R$300 a R$700', 'kauabanga' );?>
        </a>
      </span>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=700&max_price=1200">
          <?php _e( 'R$700 a R$1200', 'kauabanga' );?>
        </a>
      </span>

      <span>
        <input required="true" type="text" name="min_price" id="min_price" value="<?= $_GET['min_price']; ?>"
          placeholder="<?php esc_attr_e( 'Mínimo', 'kauabanga' ); ?>" />
        -
        <input required="true" type="text" name="max_price" id="max_price" value="<?= $_GET['max_price']; ?>"
          placeholder="<?php esc_attr_e( 'Máximo', 'kauabanga' ); ?>" />
      </span>
      <button type="submit" class="hidden"></button>
    </form>
  </section>
</main>

<?php get_footer(); ?>
