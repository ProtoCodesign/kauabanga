  <?php
    global $ka_uri;

    $theme_mods = array(
      'facebook-active'          => get_theme_mod( 'footer-social-facebook-active' ),
      'facebook-url'             => get_theme_mod( 'footer-social-facebook-url' ),
      'instagram-active'         => get_theme_mod( 'footer-social-instagram-active' ),
      'instagram-url'            => get_theme_mod( 'footer-social-instagram-url' ),
      'whatsapp-active'          => get_theme_mod( 'footer-social-whatsapp-active' ),
      'whatsapp-number'          => get_theme_mod( 'footer-social-whatsapp-number' ),
      'navigation-page-one'      => get_theme_mod( 'footer-navigation-page-one' ),
      'navigation-page-two'      => get_theme_mod( 'footer-navigation-page-two' ),
      'navigation-page-three'    => get_theme_mod( 'footer-navigation-page-three' ),
      'navigation-page-four'     => get_theme_mod( 'footer-navigation-page-four' ),
      'navigation-page-five'     => get_theme_mod( 'footer-navigation-page-five' ),
      'institutional-page-one'   => get_theme_mod( 'footer-institutional-page-one' ),
      'institutional-page-two'   => get_theme_mod( 'footer-institutional-page-two' ),
      'institutional-page-three' => get_theme_mod( 'footer-institutional-page-three' ),
      'institutional-page-four'  => get_theme_mod( 'footer-institutional-page-four' ),
      'institutional-page-five'  => get_theme_mod( 'footer-institutional-page-five' ),
    );
  ?>

  <footer>
    <div class="main-content row container">
      <div class="logo col s12 m4 l3 xl3">
        <a href="<?= get_site_url(); ?>">
          <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/logo-white.svg' ); ?>"
            alt="<?php esc_attr_e( 'Kauabanga', 'kauabanga' )?>">
        </a>
        <p><?= ucfirst( preg_replace( '/(https?:\/\/)/', '', get_site_url() ) ); ?> -
          <?= Date('Y'); ?></p>
        <p><?php _e( 'Todos os direitos reservados &#169;', 'kauabanga' ); ?></p>
      </div>

      <?php if( !empty( $theme_mods['navigation-page-one'] ) ||
          !empty( $theme_mods['navigation-page-two'] ) ||
          !empty( $theme_mods['navigation-page-three'] ) ||
          !empty( $theme_mods['navigation-page-four'] ) ||
          !empty( $theme_mods['navigation-page-five'] )
        ) {
      ?>
      <div class="footer-navigation col s6 m4 l2 xl2">
        <h4><?php _e( 'Navegação', 'kauabanga' ); ?></h4>

        <?php if( !empty( $theme_mods['navigation-page-one'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['navigation-page-one'] ); ?>" class="jq-navigation-page-one">
          <?= get_the_title( $theme_mods['navigation-page-one'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['navigation-page-two'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['navigation-page-two'] ); ?>" class="jq-navigation-page-two">
          <?= get_the_title( $theme_mods['navigation-page-two'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['navigation-page-three'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['navigation-page-three'] ); ?>" class="jq-navigation-page-three">
          <?= get_the_title( $theme_mods['navigation-page-three'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['navigation-page-four'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['navigation-page-four'] ); ?>" class="jq-navigation-page-four">
          <?= get_the_title( $theme_mods['navigation-page-four'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['navigation-page-five'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['navigation-page-five'] ); ?>" class="jq-navigation-page-five">
          <?= get_the_title( $theme_mods['navigation-page-five'] ); ?>
        </a>
        <?php } ?>

      </div>
      <?php } ?>

      <?php if( !empty( $theme_mods['institutional-page-one'] ) ||
          !empty( $theme_mods['institutional-page-two'] ) ||
          !empty( $theme_mods['institutional-page-three'] ) ||
          !empty( $theme_mods['institutional-page-four'] ) ||
          !empty( $theme_mods['institutional-page-five'] )
        ) {
      ?>
      <div class="footer-institutional col s6 m4 l2 xl2">
        <h4><?php _e( 'Institucional', 'kauabanga' ); ?></h4>

        <?php if( !empty( $theme_mods['institutional-page-one'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['institutional-page-one'] ); ?>" class="jq-institutional-page-one">
          <?= get_the_title( $theme_mods['institutional-page-one'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['institutional-page-two'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['institutional-page-two'] ); ?>" class="jq-institutional-page-two">
          <?= get_the_title( $theme_mods['institutional-page-two'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['institutional-page-three'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['institutional-page-three'] ); ?>" class="jq-institutional-page-three">
          <?= get_the_title( $theme_mods['institutional-page-three'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['institutional-page-four'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['institutional-page-four'] ); ?>" class="jq-institutional-page-four">
          <?= get_the_title( $theme_mods['institutional-page-four'] ); ?>
        </a>
        <?php } ?>

        <?php if( !empty( $theme_mods['institutional-page-five'] ) ) { ?>
        <a href="<?= get_permalink( $theme_mods['institutional-page-five'] ); ?>" class="jq-institutional-page-five">
          <?= get_the_title( $theme_mods['institutional-page-five'] ); ?>
        </a>
        <?php } ?>

      </div>
      <?php } ?>

      <?php if ( $theme_mods['facebook-active'] || $theme_mods['instagram-active'] || $theme_mods['whatsapp-active'] ) { ?>
      <div class="footer-socials col s6 m4 l2 xl2">
        <h4><?php _e( 'Redes sociais', 'kauabanga' ); ?></h4>

        <?php if( $theme_mods['facebook-active'] ) { ?>
        <a href="<?= $theme_mods['facebook-url']; ?>" target="_blank" class="jq-footer-social-facebook">
          <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/facebook.svg' ); ?>"
            alt="<?php esc_attr_e( 'Facebook kauabanga', 'kauabanga' )?>" class="icon-socials" />
          <?php _e( 'Facebook', 'kauabanga' ); ?>
        </a>
        <?php } ?>

        <?php if( $theme_mods['instagram-active'] ) { ?>
        <a href="<?= $theme_mods['instagram-url']; ?>" target="_blank" class="jq-footer-social-instagram">
          <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/instagram.svg' ); ?>"
            alt="<?php esc_attr_e( 'Instagram kauabanga', 'kauabanga' )?>" class="icon-socials" />
          <?php _e( 'Instagram', 'kauabanga' ); ?>
        </a>
        <?php } ?>

        <?php if( $theme_mods['whatsapp-active'] ) { ?>
        <a href="https://api.whatsapp.com/send?phone=<?= $theme_mods['whatsapp-number']; ?>" target="_blank"
          class="jq-footer-social-whatsapp">
          <img src="<?php file_to_base64( 'image/svg+xml', 'svgs/icons/whatsapp.svg' ); ?>"
            alt="<?php esc_attr_e( 'Whatsapp kauabanga', 'kauabanga' )?>" class="icon-socials" />
          <?php _e( 'Whatsapp', 'kauabanga' ); ?>
        </a>
        <?php } ?>
      </div>
      <?php } ?>

      <div class="footer-payment-forms col s6 m4 l3 xl3">
        <h4><?php _e( 'Formas de pagamento', 'kauabanga' ); ?></h4>

        <p><?php _e( 'Cartão de crédito', 'kauabanga' ); ?></p>
        <p><?php _e( 'Débito em conta', 'kauabanga' ); ?></p>
        <p><?php _e( 'Boleto bancário', 'kauabanga' ); ?></p>
        <p><?php _e( 'Tranferência PIX', 'kauabanga' ); ?></p>
      </div>
    </div>

    <div class="business-info">
      <div class="row container col s9 m12 l12 xl12">
        <?= get_theme_mod( 'title-tagline-business-info' ); ?>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>

  </html>
