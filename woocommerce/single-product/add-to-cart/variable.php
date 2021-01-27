<?php
defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart"
  action="<?= esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
  method="post" enctype='multipart/form-data' data-product_id="<?= absint( $product->get_id() ); ?>"
  data-product_variations="<?= $variations_attr; ?>">
  <?php do_action( 'woocommerce_before_variations_form' ); ?>

  <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
  <p class="stock out-of-stock">
    <?= esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?>
  </p>
  <?php else : ?>
  <div class="variations" cellspacing="0">
    <div>
      <?php foreach ( $attributes as $attribute_name => $options ) : ?>
      <div class="variation-form">
        <label
          for="<?= esc_attr( sanitize_title( $attribute_name ) ); ?>"><?= wc_attribute_label( $attribute_name ); ?></label>
        <div class="value">
          <?php
            wc_dropdown_variation_attribute_options(
              array(
                'options'   => $options,
                'attribute' => $attribute_name,
                'product'   => $product,
              )
            );
					?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="single_variation_wrap">
    <?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );
			?>
  </div>
  <?php endif; ?>

  <?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
