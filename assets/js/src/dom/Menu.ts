interface MenuElements {
  dropDown: string;
  dropDownBtn: string;

  menuMobile: string;
  menuMobileAnim: string;
  menuMobileBtn: string;
}

class Menu {
  private _menuOpen: boolean;

  private _dropDown: HTMLElement;

  private _dropDownBtn: HTMLElement;

  private _menuMobile: HTMLElement;

  private _menuMobileAnim: HTMLElement;

  private _menuMobileBtn: HTMLElement;

  constructor(elements: MenuElements) {
    this._menuOpen = false;

    this._dropDown = document.querySelector(elements.dropDown);
    this._dropDownBtn = document.querySelector(elements.dropDownBtn);

    this._menuMobile = document.querySelector(elements.menuMobile);
    this._menuMobileAnim = document.querySelector(elements.menuMobileAnim);
    this._menuMobileBtn = document.querySelector(elements.menuMobileBtn);

    this._onRemoveClickOut = this._onRemoveClickOut.bind(this);
    this._onRemoveScroll = this._onRemoveScroll.bind(this);

    this._addEvents();
  }

  /**
   * Adiciona os eventos relacionados ao menu
   *
   * @private
   * @returns {void}
   */
  private _addEvents() {
    const eventTypes = ['touchmove', 'click'];

    eventTypes.forEach(eventType => {
      this._menuMobileBtn.addEventListener(eventType, () => {
        if (this._menuOpen) {
          this._menuOpen = false;

          this._menuMobile.classList.remove('active');
          this._menuMobileAnim.classList.remove('open');
        } else {
          this._menuOpen = true;

          this._menuMobile.classList.add('active');
          this._menuMobileAnim.classList.add('open');

          window.addEventListener('scroll', this._onRemoveScroll);
        }
      });
    });

    this._dropDownBtn.addEventListener('click', () => {
      if (this._menuOpen) {
        this._menuOpen = false;

        this._dropDown.classList.remove('active');
      } else {
        this._menuOpen = true;

        this._dropDown.classList.add('active');
        window.addEventListener('scroll', this._onRemoveScroll);
      }
    });
  }

  /**
   * Desativa o menu, se o usuario de scroll
   *
   * @private
   * @returns {void}
   */
  private _onRemoveScroll() {
    this._menuOpen = false;

    this._dropDown.classList.remove('active');

    this._menuMobile.classList.remove('active');
    this._menuMobileAnim.classList.remove('open');

    window.removeEventListener('scroll', this._onRemoveScroll);
  }

  /**
   * Desativa o menu se o usuario clicar fora dos links de
   * navegação
   *
   * @private
   * @param {Event} e
   * @returns {void}
   */
  private _onRemoveClickOut(e: Event) {
    if (e.target === e.currentTarget && this._menuOpen) {
      this._menuOpen = false;

      this._dropDown.classList.remove('active');

      this._menuMobile.classList.remove('active');
      this._menuMobileAnim.classList.remove('open');
    }
  }
}

export default Menu;
