<?php
  /**
   * Função pega todos os arquivos de uma determinada extensão, é retorna a
   * url do arquivo
   *
   * @since 0.5.6
   * @param string $distPath Caminho da pasta para listar.
   * @param string $extRegExp Nome do arquivo e a extensão.
   * @return string
   */
  function get_bundle_file( $distPath, $extRegExp = '*.js' ) {
    global $ka_dir, $ka_uri;

    $dist = $ka_dir . $distPath;
    $times = array();
    $files = glob( $dist . $extRegExp );

    foreach( $files as $file ) {
      $times[] = filemtime( $dist . basename( $file ));
    }

    $recentFileTime = +max( $times );
    $index = array_search( $recentFileTime, $times );

    return $ka_uri . $distPath . basename( $files[$index] );
  }
?>
