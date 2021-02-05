interface DynamicPriceElements {
  mainSalePrice: string;
  mainRegularPrice: string;
  price: string;
  salePrice: string;
  regularPrice: string;
}

class DynamicPrice {
  private _mainSalePrice: HTMLElement;

  private _mainRegularPrice: HTMLElement;

  private _price: HTMLElement;

  private _salePrice: HTMLElement;

  private _regularPrice: HTMLElement;

  constructor(elements: DynamicPriceElements) {
    this._mainSalePrice = document.querySelector(elements.mainSalePrice);
    this._mainRegularPrice = document.querySelector(elements.mainRegularPrice);

    setInterval(() => {
      this._price = document.querySelector(elements.price);

      this._salePrice = document.querySelector(elements.salePrice);
      this._regularPrice = document.querySelector(elements.regularPrice);

      if (this._price) {
        this._switchPrices();
      }
    }, 550);
  }

  private _switchPrices() {
    if (this._price) {
      this._mainRegularPrice.innerText = '';
      this._mainSalePrice.innerText = this._price.innerText;
    }

    if (this._regularPrice) {
      this._mainRegularPrice.innerText = this._regularPrice.innerText;
      this._mainSalePrice.innerText = this._salePrice.innerText;
    }
  }
}

export default DynamicPrice;
