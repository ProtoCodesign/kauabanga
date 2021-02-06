<?php
  defined( 'ABSPATH' ) || exit;

  global $ka_uri;

  $data = array();
  $products = array();

  if( have_posts() ) : while( have_posts() ) : the_post();
    $products[] = wc_get_product( get_the_ID() );
  endwhile; endif;

  $data['products'] = ka_sanitize_products( $products );
?>

<?php get_header(); ?>

<section class="breadcrumb">
  <div class="row container"><?php woocommerce_breadcrumb( array( 'delimiter' => ' ↣ ') ); ?></div>
</section>

<main class="section-main row container">
  <section class="filters col s12 m3 l3 xl3">
    <h3 class="ka-title"><?php _e( 'Filtrar', 'kauabanga' ); ?></h3>
    <span class="btn-close"></span>

    <ul class="filter-categories">
      <h4><?php _e( 'Categorias', 'kauabanga' ); ?></h4>

      <?php
        $taxonomies = get_categories( array(
          'taxonomy'    => 'product_cat',
          'hide_empty'  => false,
          )
        );

        if ( !empty( $taxonomies ) ) :
          foreach( $taxonomies as $category ) :
            if( $category->parent == 0 ) :
             $category_link = get_category_link( $category->term_id );
      ?>
      <li>
        <a href="<?= esc_attr( $category_link ); ?>">
          <?= $category->name; ?>
          <span>(<?= $category->count; ?>)</span>
        </a>

        <?php foreach( $taxonomies as $subcategory ) :
          if( $subcategory->parent == $category->term_id ) :
            $subcategory_link = get_category_link( $subcategory->term_id );
        ?>
        <ul>
          <li>
            <a href="<?= esc_attr( $subcategory_link ); ?>">
              <?= $subcategory->name; ?>
              <span>(<?= $subcategory->count; ?>)</span>
            </a>
          </li>
        </ul>
        <?php endif; endforeach; ?>

      </li>
      <?php endif; endforeach; endif; ?>

    </ul>

    <?php
      $attribute_taxonomies = wc_get_attribute_taxonomies();
      foreach( $attribute_taxonomies as $attribute ) {
        the_widget( 'WC_Widget_Layered_Nav', array(
            'title'      => $attribute->attribute_label,
            'attribute'  => $attribute->attribute_name,
          )
        );
      }
    ?>

    <form class="form-price">
      <h4><?php _e( 'Preço', 'kauabanga' ); ?></h4>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=0&max_price=100">
          <?php _e( 'Até R$100', 'kauabanga' ); ?>
        </a>
      </span>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=100&max_price=300">
          <?php _e( 'R$100 a R$300', 'kauabanga' ); ?>
        </a>
      </span>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=300&max_price=700">
          <?php _e( 'R$300 a R$700', 'kauabanga' ); ?>
        </a>
      </span>

      <span>
        <a href="<?= remove_query_arg( array( 'min_price', 'max_price' ) ); ?>?min_price=700&max_price=1200">
          <?php _e( 'R$700 a R$1200', 'kauabanga' ); ?>
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

  <section class="showcase-archive col s12 m9 l9 xl9">
    <section class="order-archive">
      <span class="btn-filter"><img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/filter.svg' ); ?>"
          alt="<?php _e( 'Filtrar produtos', 'kauabanga' ); ?>"></span>
      <?php woocommerce_catalog_ordering(); ?>
    </section>

    <div class="row">
      <?php if( is_array( $data['products'] ) ) : ?>
      <?php ka_product_list( $data['products'], 'col s12 m6 l4 xl4', array( 'container' => false ) ); ?>
      <div class="col s12 m12 l12 xl12">
        <?php the_posts_pagination( array(
            'prev_text' => __( 'Anterior', 'kauabanga' ),
            'next_text' => __( 'Próxima', 'kauabanga' ),
          )
        );
      ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
