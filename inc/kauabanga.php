<?php
  /**
   * Extensão do arquivo functions.php, deve-se carregar
   * conteúdos relacionados ao tema
   *
   * @package Kauabanga
   * @subpackage handel.php
   * @since 0.1.0
   * @copyright Copyright (c) 2021, ProtoCodesign
   * @link https://protocodesign.com
   */

  // Hook registra os estilos do tema
  add_action( 'init', 'ka_register_styles' );

  // Hook inicializa os estilos do tema
  add_action( 'wp_enqueue_scripts', 'ka_enqueue_styles' );

  /**
   * Registra estilos
   *
   * @since 0.1.0
   * @return void
   */
  function ka_register_styles() {
    global $ka_uri, $ka_version;

    // Registra o estilo padrão
    wp_register_style( 'ka-style' , $ka_uri . 'style.css', [], $ka_version );
  }

  /**
   * Carrega estilos do tema
   *
   * @since 0.1.0
   * @return void
   */
  function ka_enqueue_styles() {
    // Carrega o estilo padrão
    wp_enqueue_style( 'ka-style');
  }

  require_once( $ka_dir . 'inc/wc-functions.php' );
?>
