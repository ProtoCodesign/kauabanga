<?php
  function customize_footer( $wp_customize ) {
    $wp_customize->add_panel( 'footer', array(
        'title'            => __( 'Rodapé', 'kauabanga' ),
        'priority'         => 40,
        'description'      => __( 'Área de configurações do rodapé', 'kauabanga' ),
      )
    );

    // Navegação
    $wp_customize->add_section( 'footer-navigation', array(
      'title'     => __( 'Navegação', 'kauabanga' ),
      'priority'  => 0,
      'panel'     => 'footer'
      )
    );
    $wp_customize->add_setting( 'footer-navigation-page-one', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-navigation-page-one', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 1', 'kauabanga' ),
        'section'   => 'footer-navigation',
        'priority'  => 0
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-navigation-page-one', array(
        'selector'  => array( '.jq-navigation-page-one' )
      )
    );
    $wp_customize->add_setting( 'footer-navigation-page-two', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-navigation-page-two', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 2', 'kauabanga' ),
        'section'   => 'footer-navigation',
        'priority'  => 5
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-navigation-page-two', array(
        'selector'  => array( '.jq-navigation-page-two' )
      )
    );
    $wp_customize->add_setting( 'footer-navigation-page-three', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-navigation-page-three', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 3', 'kauabanga' ),
        'section'   => 'footer-navigation',
        'priority'  => 10
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-navigation-page-three', array(
        'selector'  => array( '.jq-navigation-page-three' )
      )
    );
    $wp_customize->add_setting( 'footer-navigation-page-four', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-navigation-page-four', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 4', 'kauabanga' ),
        'section'   => 'footer-navigation',
        'priority'  => 15
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-navigation-page-four', array(
        'selector'  => array( '.jq-navigation-page-four' )
      )
    );
    $wp_customize->add_setting( 'footer-navigation-page-five', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-navigation-page-five', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 5', 'kauabanga' ),
        'section'   => 'footer-navigation',
        'priority'  => 20
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-navigation-page-five', array(
        'selector'  => array( '.jq-navigation-page-five' )
      )
    );

    // Institucional
    $wp_customize->add_section( 'footer-institutional', array(
      'title'     => __( 'Institucional', 'kauabanga' ),
      'priority'  => 5,
      'panel'     => 'footer'
      )
    );
    $wp_customize->add_setting( 'footer-institutional-page-one', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-institutional-page-one', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 1', 'kauabanga' ),
        'section'   => 'footer-institutional',
        'priority'  => 0
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-institutional-page-one', array(
        'selector'  => array( '.jq-institutional-page-one' )
      )
    );
    $wp_customize->add_setting( 'footer-institutional-page-two', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-institutional-page-two', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 2', 'kauabanga' ),
        'section'   => 'footer-institutional',
        'priority'  => 5
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-institutional-page-two', array(
        'selector'  => array( '.jq-institutional-page-two' )
      )
    );
    $wp_customize->add_setting( 'footer-institutional-page-three', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-institutional-page-three', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 3', 'kauabanga' ),
        'section'   => 'footer-institutional',
        'priority'  => 10
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-institutional-page-three', array(
        'selector'  => array( '.jq-institutional-page-three' )
      )
    );
    $wp_customize->add_setting( 'footer-institutional-page-four', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-institutional-page-four', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 4', 'kauabanga' ),
        'section'   => 'footer-institutional',
        'priority'  => 15
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-institutional-page-four', array(
        'selector'  => array( '.jq-institutional-page-four' )
      )
    );
    $wp_customize->add_setting( 'footer-institutional-page-five', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-institutional-page-five', array(
        'type'      => 'dropdown-pages',
        'label'     => __( 'Página 5', 'kauabanga' ),
        'section'   => 'footer-institutional',
        'priority'  => 20
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-institutional-page-five', array(
        'selector'  => array( '.jq-institutional-page-five' )
      )
    );

    // Social
    $wp_customize->add_section( 'footer-social', array(
      'title'     => __( 'Redes sociais', 'kauabanga' ),
      'priority'  => 10,
      'panel'     => 'footer'
      )
    );
    $wp_customize->add_setting( 'footer-social-facebook-active', array(
        'default'     => '0',
        'transport'   => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-social-facebook-active', array(
        'type'      => 'checkbox',
        'label'     => __( 'Ativar/Desativar', 'kauabanga' ),
        'section'   => 'footer-social',
        'priority'  => 0
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-social-facebook-active', array(
        'fallback_refresh'  => true,
      )
    );
    $wp_customize->add_setting( 'footer-social-facebook-url', array(
        'default'    => __( 'https://facebook.com/', 'kauabanga' ),
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-social-facebook-url', array(
        'type'      => 'url',
        'label'     => __( 'Link(Facebook)', 'kauabanga' ),
        'section'   => 'footer-social',
        'priority'  => 5
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-social-facebook-url', array(
        'selector'  => array( '.footer-socials .jq-footer-social-facebook' )
      )
    );
    $wp_customize->add_setting( 'footer-social-instagram-active', array(
        'default'    => '0',
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-social-instagram-active', array(
        'type'      => 'checkbox',
        'label'     => __( 'Ativar/Desativar', 'kauabanga' ),
        'section'   => 'footer-social',
        'priority'  => 10
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-social-instagram-active', array(
        'fallback_refresh'  => true,
      )
    );
    $wp_customize->add_setting( 'footer-social-instagram-url', array(
        'default'    => __( 'https://www.instagram.com/', 'kauabanga' ),
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-social-instagram-url', array(
        'type'      => 'url',
        'label'     => __( 'Link(Instagram)', 'kauabanga' ),
        'section'   => 'footer-social',
        'priority'  => 15
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-social-instagram-url', array(
        'selector'  => array( '.footer-socials .jq-footer-social-instagram' )
      )
    );
    $wp_customize->add_setting( 'footer-social-whatsapp-active', array(
        'default'    => '1',
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-social-whatsapp-active', array(
        'type'      => 'checkbox',
        'label'     => __( 'Ativar/Desativar', 'kauabanga' ),
        'section'   => 'footer-social',
        'priority'  => 20
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-social-whatsapp-active', array(
        'fallback_refresh'  => true,
      )
    );
    $wp_customize->add_setting( 'footer-social-whatsapp-number', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'footer-social-whatsapp-number', array(
        'type'      => 'number',
        'label'     => __( 'Número(Whatsapp)', 'kauabanga' ),
        'section'   => 'footer-social',
        'priority'  => 25
      )
    );
    $wp_customize->selective_refresh->add_partial( 'footer-social-whatsapp-number', array(
        'selector'  => array( '.footer-socials .jq-footer-social-whatsapp' )
      )
    );
  }

  add_action( 'customize_register',  'customize_footer', 25 );
?>
