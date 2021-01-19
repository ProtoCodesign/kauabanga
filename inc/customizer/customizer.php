<?php
  if( is_customize_preview() ) {
    global $ka_dir;

    /**
     * Remove seções do customizador
     *
     * @since 0.3.2
     * @return void
     */
    function remove_customize( $wp_customize ) {
      $wp_customize->remove_section( 'static_front_page' ); // Remove a área de titulos padrao
      $wp_customize->remove_section( 'custom_css' ); // Remove a customização de css
    }
    add_action( 'customize_register', 'remove_customize', 10 );

    require_once( $ka_dir . 'inc/customizer/customize-banners.php'  );
  }
?>
