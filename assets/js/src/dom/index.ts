import './Glider';
import HeaderSpace from './HeaderSpace';
import ClickButton from './ClickButton';

new HeaderSpace('#next-element');

new ClickButton({
  menuMobile: '.container-dropdown',
  menuMobileBtn: '.btn-menu',
  menuMobileAnim: '.btn-menu-mobile',
  dropDownMenu: '.navigation-header .nav-dropdown .container-dropdown',
  dropDownMenuBtn: '.navigation-header .nav-dropdown',
  filter: '.filters',
  filterBtn: '.btn-filter',
  filterCloseBtn: '.btn-close',
});
