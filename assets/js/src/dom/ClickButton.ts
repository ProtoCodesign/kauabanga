interface Options {
  dropDownMenu: string;
  dropDownMenuBtn: string;
  menuMobile: string;
  menuMobileAnim: string;
  menuMobileBtn: string;
  filter?: string;
  filterBtn?: string;
  filterCloseBtn?: string;
}

class ClickButton {
  private _menuOpen: boolean;

  private _dropDownMenu: HTMLElement;

  private _dropDownMenuBtn: HTMLElement;

  private _menuMobile: HTMLElement;

  private _menuMobileAnim: HTMLElement;

  private _menuMobileBtn: HTMLElement;

  private _filter: HTMLElement;

  private _filterBtn: HTMLElement;

  private _filterCloseBtn: HTMLElement;

  constructor(elements: Options) {
    this._menuOpen = false;

    this._dropDownMenu = document.querySelector(elements.dropDownMenu);
    this._dropDownMenuBtn = document.querySelector(elements.dropDownMenuBtn);

    this._menuMobile = document.querySelector(elements.menuMobile);
    this._menuMobileAnim = document.querySelector(elements.menuMobileAnim);
    this._menuMobileBtn = document.querySelector(elements.menuMobileBtn);

    this._filter = document.querySelector(elements.filter);
    this._filterBtn = document.querySelector(elements.filterBtn);
    this._filterCloseBtn = document.querySelector(elements.filterCloseBtn);

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

    this._dropDownMenuBtn.addEventListener('click', () => {
      if (this._menuOpen) {
        this._menuOpen = false;

        this._dropDownMenu.classList.remove('active');
      } else {
        this._menuOpen = true;

        this._dropDownMenu.classList.add('active');
        window.addEventListener('scroll', this._onRemoveScroll);
      }
    });

    if (this._filterBtn) {
      this._filterBtn.addEventListener('click', () => {
        this._menuOpen = true;

        this._filter.classList.add('active');
        window.addEventListener('scroll', this._onRemoveScroll);
      });

      this._filterCloseBtn.addEventListener('click', () => {
        if (this._menuOpen) {
          this._menuOpen = false;
          this._filter.classList.remove('active');
        }
      });
    }
  }

  /**
   * Desativa o menu, se o usuario de scroll
   *
   * @private
   * @returns {void}
   */
  private _onRemoveScroll() {
    this._menuOpen = false;

    this._dropDownMenu.classList.remove('active');

    this._menuMobile.classList.remove('active');
    this._menuMobileAnim.classList.remove('open');

    this._filter.classList.remove('active');

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

      this._dropDownMenu.classList.remove('active');

      this._menuMobile.classList.remove('active');
      this._menuMobileAnim.classList.remove('open');

      this._filter.classList.remove('active');
    }
  }
}

export default ClickButton;
