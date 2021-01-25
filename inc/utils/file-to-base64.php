<?php
  if( !function_exists( 'get_file_to_base64' ) ) {
    /**
     * Pega arquivos e retorna um data uri em base64.
     *
     * @param string $file_format Tipo da formatação de arquivo que será transformado em uri.
     * @param string $path Caminho do arquivo, por padrão será usado a pasta assets.
     * @param bool $custom Permite que seja modificado o diretorio padrão.
     * @since 0.6.6
     * @return string
     */
    function get_file_to_base64( $file_format, $path, $custom = false ) {
      return "data:$file_format;base64," . base64_encode( file_get_contents( $custom ? $path : trailingslashit( get_template_directory() ) . "assets/$path") );
    }
  }

  if( !function_exists( 'file_to_base64' ) ) {
    /**
     * Pega arquivos e devolve um data uri em base64.
     *
     * @param string $file_format Tipo da formatação de arquivo que será transformado em uri.
     * @param string $path Caminho do arquivo, por padrão será usado a pasta assets.
     * @param bool $custom Permite que seja modificado o diretorio padrão.
     * @since 0.6.6
     * @return void
     */
    function file_to_base64( $file_format, $path, $custom = false ) {
      echo "data:$file_format;base64," . base64_encode( file_get_contents( $custom ? $path : trailingslashit( get_template_directory() ) . "assets/$path") );
    }
  }
?>
