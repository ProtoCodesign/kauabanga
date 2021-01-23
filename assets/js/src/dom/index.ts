import HeaderSpace from './HeaderSpace';
import Menu from './Menu';

new HeaderSpace('#next-element');

new Menu({
  menuMobile: '.container-dropdown',
  menuMobileBtn: '.btn-menu',
  menuMobileAnim: '.btn-menu-mobile',
  dropDown: '.navigation-header .nav-dropdown .container-dropdown',
  dropDownBtn: '.navigation-header .nav-dropdown',
});
