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

      // Identidade do site
      $wp_customize->add_setting( 'title-tagline-kauabanga-email', array(
          'default'    => null,
          'transport'  => 'postMessage'
        )
      );
      $wp_customize->add_control( 'title-tagline-kauabanga-email', array(
          'type'      => 'email',
          'label'     => __( 'Email da kauabanga', 'kauabanga' ),
          'section'   => 'title_tagline',
          'priority'  => 60
        )
      );
      $wp_customize->selective_refresh->add_partial( 'title-tagline-kauabanga-email', array(
          'selector'  => array( '.container-404 p strong' )
        )
      );
      $wp_customize->add_setting( 'title-tagline-business-info', array(
          'default'    => null,
          'transport'  => 'postMessage'
        )
      );
      $wp_customize->add_control( 'title-tagline-business-info', array(
          'type'      => 'text',
          'label'     => __( 'Informações da empresa', 'kauabanga' ),
          'section'   => 'title_tagline',
          'priority'  => 60
        )
      );
      $wp_customize->selective_refresh->add_partial( 'title-tagline-business-info', array(
          'selector'  => array( '.business-info' )
        )
      );
    }
    add_action( 'customize_register', 'remove_customize', 10 );

    require_once( $ka_dir . 'inc/customizer/customize-banners.php' );
    require_once( $ka_dir . 'inc/customizer/customize-newsletter.php' );
    require_once( $ka_dir . 'inc/customizer/customize-footer.php' );
  }
?>
