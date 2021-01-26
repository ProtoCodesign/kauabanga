import './Glider';

import ClickButton from './ClickButton';
import Gallery from './Gallery';
import HeaderSpace from './HeaderSpace';

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

new HeaderSpace('#next-element');

new Gallery({
  gallery: '[data-gallery="gallery"]',
  galleryMain: '[data-gallery="main"]',
  galleryList: '[data-gallery="list"]',
});
