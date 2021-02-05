import './Glider';

import ChangeTab from './ChangeTab';
import ClickButton from './ClickButton';
import DynamicPrice from './DynamicPrice';
import Gallery from './Gallery';
import NextElement from './NextElement';

new ChangeTab({
  descriptionData: '[data-tab="description"]',
  descriptionContent: '[data-tab="description-content"]',
  reviewsData: '[data-tab="reviews"]',
  reviewsContent: '[data-tab="reviews-content"]',
});

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

new DynamicPrice({
  mainSalePrice: '.product-head .price .current-price',
  mainRegularPrice: '.product-head .price .older-price',
  price: '.woocommerce-variation .woocommerce-variation-price .price bdi',
  salePrice:
    '.woocommerce-variation .woocommerce-variation-price .price ins bdi',
  regularPrice:
    '.woocommerce-variation .woocommerce-variation-price .price del bdi',
});

new NextElement('header');

new Gallery({
  gallery: '[data-gallery="gallery"]',
  galleryMain: '[data-gallery="main"]',
  galleryList: '[data-gallery="list"]',
});
