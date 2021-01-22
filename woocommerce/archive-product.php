<?php
  global $ka_uri;

  $data = array();
  $products = array();

  if( have_posts() ) : while( have_posts() ) : the_post();
    $products[] = wc_get_product( get_the_ID() );
  endwhile; endif;

  $data['products'] = ka_sanitize_products( $products );
?>

<?php get_header(); ?>

<section id="next-element" class="breadcrumb">
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

  <section class="showcase-archive col l9 xl9">
    <section class="order-archive">
      <?php woocommerce_catalog_ordering(); ?>
    </section>

    <div class="row">
      <?php if( is_array( $data['products'] ) ) : ?>
      <?php ka_product_list( $data['products'], 'col l4 xl4', array( 'container' => false ) ); ?>
      <?php the_posts_pagination( array(
            'prev_text' => __( 'Anterior', 'kauabanga' ),
            'next_text' => __( 'Próxima', 'kauabanga' ),
          )
        );
      ?>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
