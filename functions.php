<?php
  /**
   * Funções principais do tema da kauabanga
   *
   * @package Kauabanga
   * @subpackage Functions
   * @since 0.1.0
   * @copyright Copyright (c) 2021 ProtoCodesign
   * @link https://protocodesign.com
   */

  // Variavel contém a versão atual do tema
  $ka_version = wp_get_theme()->get( 'Version' );

  // Variavel que contém o diretorio do tema, já possui a barra no final
  $ka_dir = trailingslashit( get_template_directory() );

  // Variavel que contém o link relativo ao tema, já possui a barra no final
  $ka_uri = trailingslashit( get_template_directory_uri() );

  // Hook executa as configurações do tema
  add_action( 'after_setup_theme', 'ka_setup_init', 0 );

  // Hook executa as configurações do tema
  add_action( 'after_setup_theme', 'ka_customizer_init', 5 );

  // Hook remove estilos do wordpress
  add_action( 'wp_enqueue_scripts', 'deregister_styles' );

  // Hook remove scripts que estão no footer
  add_action( 'wp_footer', 'deregister_scripts' );

  if( !is_admin() ) {
    // Remove os links da postagem proximo e anterior
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    // Remove os links de feed do rss (certifique-se de adicioná-los você mesmo se estiver usando o feedblitz ou um serviço de rss)
    remove_action( 'wp_head', 'feed_links', 2 );

    // Remove todos os links de feed rss extras
    remove_action( 'wp_head', 'feed_links_extra', 3 );

    // Remove script de emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

    // Remove o link de descoberta simples
    remove_action( 'wp_head', 'rsd_link' );

    // Remove link de postagem aleatória
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

    // Remove wlwmanifest.xml (necessário para oferecer suporte ao gravador do Windows Live)
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Remove a versão wordpress
    remove_action( 'wp_head', 'wp_generator' );

    // Remove rel=shortlink no cabeçalho se um link curto for definido para a página atual.
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

    // Remove a tag de link da API REST no cabeçalho da página
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

    // Remove estilos do emoji
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
  }

  if( !function_exists( 'ka_setup_init' ) ) {
    /**
     * Carrega as configurações do tema
     *
     * @since 0.1.0
     * @return void
     */
    function ka_setup_init() {
      global $ka_dir;

      // Inicializa o arquivo de internacionalização
      load_theme_textdomain( 'kauabanga', $ka_dir . 'languages' );

      // Adiciona suporte a atualização em tempo real
      add_theme_support( 'customize-selective-refresh-widgets' );

      // Importa as outras configurações do tema
      require_once( $ka_dir . 'inc/kauabanga.php' );
    }
  }

  /**
   * Função responsavel por remover estilos
   *
   * @since 0.1.0
   * @return void
   */
  function deregister_styles() {
    if( !is_admin() ) {
      // Remove o editor antigo
      wp_dequeue_style( 'wp-block-library' );
    }
  }

  /**
   * Função responsavel por remover scripts
   *
   * @since 0.1.0
   * @return void
   */
  function deregister_scripts() {
    if( !is_admin() ) {
      // Remove o script de embutimento do wordpress
      wp_dequeue_script( 'wp-embed' );
    }
  }

  /**
   * Função verifica se WooCommerce
   *
   * @since 0.5.9
   * @return boolean
   */
  if( !function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
      return class_exists( 'woocommerce' );
    }
  }

  // Importa as configurações do custom preview
  require_once( $ka_dir . 'inc/customizer/customizer.php' );

  if( is_woocommerce_activated() ) {
    // Adiciona suporte ao WooCommerce
    add_theme_support( 'woocommerce' );

    // Importa funções criadas para o WooCommerce
    require_once( $ka_dir . 'inc/wc/functions.php' );

    // Importa funções que retornam html para o WooCommerce
    require_once( $ka_dir . 'inc/wc/template-tags.php' );
  }

?>
