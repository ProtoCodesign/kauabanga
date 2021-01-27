interface GalleryOptions {
  gallery: string;
  galleryMain: string;
  galleryList: string;
}

class Gallery {
  private _gallery: HTMLDivElement;

  private _galleryMain: HTMLImageElement;

  private _galleryList: NodeListOf<HTMLImageElement>;

  constructor(elements: GalleryOptions) {
    this._gallery = document.querySelector(elements.gallery);
    this._galleryMain = document.querySelector(elements.galleryMain);
    this._galleryList = document.querySelectorAll<HTMLImageElement>(
      elements.galleryList
    );

    if (!this._gallery) return;

    this._changeImage = this._changeImage.bind(this);

    this._addEvents();
  }

  /**
   * Adiciona os eventos
   *
   * @private
   * @returns {void}
   */
  private _addEvents() {
    this._galleryList.forEach(img => {
      img.addEventListener('click', e => {
        this._changeImage(e);
      });
    });
  }

  /**
   * Adiciona o link da imagem selecionada na imagem principal
   *
   * @param {any} e
   * @private
   * @returns {void}
   */
  private _changeImage(e: any) {
    if (e.currentTarget.src) {
      this._galleryMain.src = e.currentTarget.src;
    }
  }
}

export default Gallery;
