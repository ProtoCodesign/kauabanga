class NextElement {
  private _mainElement: HTMLElement;

  private _mainElementHeight: number;

  constructor(element: string) {
    this._mainElement = document.querySelector(element);

    this._mainElementHeight = this._mainElement.offsetHeight;

    this._applyMargin(this._mainElement.nextElementSibling as HTMLElement);
  }

  private _applyMargin(element: HTMLElement) {
    element.style.marginTop = `${this._mainElementHeight}px`;
  }
}

export default NextElement;
