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

  // Adiciona favicon no head
  add_action( 'wp_head', 'ka_favicon_register', 0 );

  /* Carrega os scripts do tema */
  add_action( 'wp_enqueue_scripts', 'ka_enqueue_scripts', 1 );

  function ka_favicon_register() {
    printf( "<link rel='shortcut icon' href='%s' type='image/x-icon' />", get_file_to_base64( 'image/x-icon', 'images/favicon.ico' ) );
    printf( "<link rel='icon' size='32' href='%s' />", get_file_to_base64( 'image/png', 'images/favicon-32x.png' ) );
    printf( "<link rel='icon' size='48' href='%s' />", get_file_to_base64( 'image/png', 'images/favicon-48x.png' ) );
    printf( "<link rel='icon' size='96' href='%s' />", get_file_to_base64( 'image/png', 'images/favicon-96x.png' ) );
    printf( "<link rel='icon' size='144' href='%s' />", get_file_to_base64( 'image/png', 'images/favicon-144x.png' ) );
  }

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
  wp_enqueue_style( 'ka-style' );
  }

  /**
  * Inicia os scripts do tema
  *
  * @since 0.5.6
  * @return void
  */
  function ka_enqueue_scripts() {

  /* Adiciona o script principal do tema */
  wp_enqueue_script( 'main', get_bundle_file( 'assets/js/dist/', 'index.*.js' ) , null, null, true );
  }

  // Importa funções que serão usadas globalmente
  require_once( $ka_dir . 'inc/utils/index.php' );
?>
