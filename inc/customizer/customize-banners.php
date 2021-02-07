<?php
  function customize_banners( $wp_customize ) {
    $wp_customize->add_panel( 'banners', array(
        'title'            => __( 'Banners', 'kauabanga' ),
        'priority'         => 30,
        'description'      => __( 'Área de configurações dos banners da loja', 'kauabanga' ),
        'active_callback'  => 'is_front_page'
      )
    );

    // Banner home top
    $wp_customize->add_section( 'banner-home-top', array(
      'title'     => __( 'Topo', 'kauabanga' ),
      'priority'  => 0,
      'panel'     => 'banners'
      )
    );
    $wp_customize->add_setting( 'banner-home-top-active', array(
        'default'    => 1,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'banner-home-top-active', array(
        'type'      => 'checkbox',
        'label'     => __( 'Ativar/Desativar', 'kauabanga' ),
        'section'   => 'banner-home-top',
        'priority'  => 0
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-top-active', array(
        'fallback_refresh'  => true,
      )
    );
    $wp_customize->add_setting( 'banner-home-top-background', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
      'banner-home-top-background', array(
          'label'     => __( 'Imagem do anúncio', 'kauabanga' ),
          'section'   => 'banner-home-top',
          'priority'  => 10
        )
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-top-background', array(
        'fallback_refresh'  => true,
      )
    );
    $wp_customize->add_setting( 'banner-home-top-title', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'banner-home-top-title', array(
        'type'      => 'text',
        'label'     => __( 'Título', 'kauabanga' ),
        'section'   => 'banner-home-top',
        'priority'  => 15
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-top-title', array(
        'selector' => array( '.banner-home div h1' )
      )
    );
    $wp_customize->add_setting( 'banner-home-top-description', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'banner-home-top-description', array(
        'type'      => 'textarea',
        'label'     => __( 'Descrição', 'kauabanga' ),
        'section'   => 'banner-home-top',
        'priority'  => 20
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-top-description', array(
        'selector'  => array( '.banner-home div h4' )
      )
    );
    $wp_customize->add_setting( 'banner-home-top-button-title', array(
        'default'    => __( 'Ver Mais', 'kauabanga' ),
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'banner-home-top-button-title', array(
        'type'      => 'text',
        'label'     => __( 'Botão título', 'kauabanga' ),
        'section'   => 'banner-home-top',
        'priority'  => 25
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-top-button-title', array(
        'selector' => array( '.banner-home div a' )
      )
    );
    $wp_customize->add_setting( 'banner-home-top-button-url', array(
        'default'            => null,
        'transport'          => 'postMessage',
        'sanitize_callback'  => 'esc_url'
      )
    );
    $wp_customize->add_control( 'banner-home-top-button-url', array(
        'type'      => 'url',
        'label'     => __( 'Link', 'kauabanga' ),
        'section'   => 'banner-home-top',
        'priority'  => 30
      )
    );

    // Banner régua
    $wp_customize->add_section( 'banner-home-regua', array(
      'title'     => __( 'Régua', 'kauabanga' ),
      'priority'  => 5,
      'panel'     => 'banners'
      )
    );
    $wp_customize->add_setting( 'banner-home-regua-active', array(
        'default'    => 1,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'banner-home-regua-active', array(
        'type'      => 'checkbox',
        'label'     => __( 'Ativar/Desativar', 'kauabanga' ),
        'section'   => 'banner-home-regua',
        'priority'  => 0,
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-regua-active', array(
        'fallback_refresh'  => true,
      )
    );
    $wp_customize->add_setting( 'banner-home-regua-plots', array(
        'default'    => null,
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'banner-home-regua-plots', array(
        'type'      => 'text',
        'label'     => __( 'Quantas parcelas serão aceitas?', 'kauabanga' ),
        'section'   => 'banner-home-regua',
        'priority'  => 5,
      )
    );
    $wp_customize->selective_refresh->add_partial( 'banner-home-regua-plots', array(
        'selector'  => array( '.banner-ruler .jq-banner-plots' ),
      )
    );
  }

  add_action( 'customize_register', 'customize_banners', 15 );
?>
