class HeaderSpace {
  private _headerElement: HTMLElement;

  private _nextElement: HTMLElement;

  private _headerHeight: number;

  constructor(elementName: string) {
    this._nextElement = document.querySelector(elementName);

    this._headerElement = document.querySelector('header');
    this._headerHeight = this._headerElement.offsetHeight;

    this._applyMargin(this._nextElement);
  }

  private _applyMargin(element: HTMLElement) {
    element.style.marginTop = `${this._headerHeight}px`;
  }
}

export default HeaderSpace;
