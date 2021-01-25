import Glider from 'glider-js';

const element: HTMLElement = document.getElementById('brands-slider');

export default element &&
  new Glider(element, {
    slidesToScroll: 1,
    slidesToShow: 'auto',
    draggable: true,
    duration: 0.25,
    arrows: {
      prev: '.prev',
      next: '.next',
    },
    responsive: [
      {
        breakpoint: 360,
        settings: {
          slidesToScroll: 1,
          slidesToShow: 'auto',
          draggable: true,
          duration: 0.25,
          itemWidth: 150,
        },
      },
      {
        breakpoint: 775,
        settings: {
          slidesToScroll: 1,
          slidesToShow: 'auto',
          draggable: true,
          itemWidth: 150,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToScroll: 1,
          slidesToShow: 'auto',
          draggable: true,
          itemWidth: 150,
        },
      },
    ],
  });
