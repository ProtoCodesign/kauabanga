<?php
  function customize_newsletter( $wp_customize ) {
    $wp_customize->add_section( 'newsletter', array(
      'title'        => __( 'Newsletter', 'kauabanga' ),
      'priority'     => 20,
      'description'  => __( 'Área de configurações da newsletter da loja' )
      )
    );

    $wp_customize->add_setting( 'newsletter-active', array(
        'default'    => '1',
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'newsletter-active', array(
        'type'      => 'checkbox',
        'label'     => __( 'Ativar/Desativar', 'kauabanga' ),
        'section'   => 'newsletter',
        'priority'  => 0
      )
    );
    $wp_customize->selective_refresh->add_partial( 'newsletter-active', array(
        'fallback_refresh'  => true
      )
    );
    $wp_customize->add_setting( 'newsletter-description', array(
        'default'    => __( 'Assine a nossa newsletter e receba promoções em primeira mão!', 'kauabanga' ),
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'newsletter-description', array(
        'type'      => 'textarea',
        'label'     => __( 'Descrição', 'kauabanga' ),
        'section'   => 'newsletter',
        'priority'  => 5
      )
    );
    $wp_customize->selective_refresh->add_partial( 'newsletter-description', array(
        'selector'  => array( '.newsletter div h4' )
      )
    );
    $wp_customize->add_setting( 'newsletter-button-title', array(
        'default'    => __( 'Enviar', 'kauabanga' ),
        'transport'  => 'postMessage'
      )
    );
    $wp_customize->add_control( 'newsletter-button-title', array(
        'type'      => 'text',
        'label'     => __( 'Botão', 'kauabanga' ),
        'section'   => 'newsletter',
        'priority'  => 10
      )
    );
    $wp_customize->selective_refresh->add_partial( 'newsletter-button-title', array(
        'fallback_refresh'  => true
      )
    );
  }

  add_action( 'customize_register', 'customize_newsletter', 15 );
?>
