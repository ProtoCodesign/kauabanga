<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= get_bloginfo( 'name' ); wp_title( '|' ); ?></title>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;0,700;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <?php wp_head(); ?>
</head>

<?php
  global $ka_uri;
  $cart_count = WC()->cart->get_cart_contents_count();
?>

<body <?php body_class(); ?>>
  <header id="header" class="row">
    <div class="container">
      <div class="logo col s4 m2 l2 xl2">
        <a href="<?= get_site_url(); ?>">
          <img src="<?= $ka_uri; ?>assets/svgs/logo-black-colored.svg" alt="Kauabanga" />
        </a>
      </div>

      <div class="search col s8 m5 l5 xl5">
        <form action="<?= wc_get_page_permalink( 'shop' ); ?>" method="GET">
          <input type="text" name="s" id="s" placeholder="<?php esc_attr_e( 'Pesquisar', 'kauabanga' ); ?>"
            value="<?php the_search_query(); ?>" />

          <input type="text" name="post_type" value="product" class="hidden" />

          <button type="submit" id="searchbutton">
            <img src="<?= $ka_uri; ?>assets/svgs/icons/search.svg"
              alt="<?php esc_attr_e( 'Pesquisar', 'kauabanga' ); ?>" />
          </button>
        </form>
      </div>

      <span class="btn-menu-mobile">
        <span class="btn-menu">
          <div class="menu-btn-burger"></div>
        </span>
        <nav>
          <span class="nav-dropdown">
            <ul class="container-dropdown">
              <?php
                $args = array(
                  'menu'       => 'categories',
                  'container'       => false,
                  'echo'            => true,
                  'items_wrap'      => '%3$s',
                  'depth'           => 0,
                );

                wp_nav_menu( $args );
              ?>
            </ul>
          </span>

          <a href="<?= wc_get_page_permalink( 'myaccount' ); ?>" class="link-account">
            <img src="<?= $ka_uri; ?>assets/svgs/icons/person.svg"
              alt="<?php esc_attr_e( 'Minha conta', 'kauabanga' ); ?>" />
            <?php _e( 'Minha conta', 'kauabanga' ); ?>
          </a>

          <a href="<?= wc_get_page_permalink( 'cart' ); ?>" class="link-cart">
            <img src="<?= $ka_uri; ?>assets/svgs/icons/cart.svg"
              alt="<?php esc_attr_e( 'Carrinho', 'kauabanga' ); ?>" />

            <?php if($cart_count) { ?>
            <span class="count-itens-cart"><?= $cart_count; ?></span>
            <?php } ?>

            <?php _e( 'Carrinho', 'kauabanga' ); ?>
          </a>
        </nav>
      </span>

      <nav class="navigation-header">

        <span class="nav-dropdown">
          <?php _e( 'Categorias', 'kauabanga' ); ?>

          <img src="<?= $ka_uri; ?>assets/svgs/icons/arrow-down.svg" alt="seta do dropdown" />

          <ul class="container-dropdown">
            <?php print_r(wp_nav_menu( $args ) ); ?>

            <!-- <li class="category">
              <a href="#">
                <img src="assets/img/svg/icon-chair.svg" alt="ìcone de cadeira" />
                Variados
              </a>
            </li> -->
          </ul>
        </span>

        <a href="<?= wc_get_page_permalink( 'myaccount' ); ?>" class="link-account">
          <img src="<?= $ka_uri; ?>assets/svgs/icons/person.svg"
            alt="<?php esc_attr_e( 'Minha conta', 'kauabanga' ); ?>" />
          <?php _e( 'Minha conta', 'kauabanga' ); ?>
        </a>

        <a href="<?= wc_get_page_permalink( 'cart' ); ?>" class="link-cart">
          <img src="<?= $ka_uri; ?>assets/svgs/icons/cart.svg" alt="<?php esc_attr_e( 'Carrinho', 'kauabanga' ); ?>" />

          <?php if($cart_count) { ?>
          <span class="count-itens-cart"><?= $cart_count; ?></span>
          <?php } ?>

          <?php _e( 'Carrinho', 'kauabanga' ); ?>
        </a>
      </nav>
    </div>
  </header>
