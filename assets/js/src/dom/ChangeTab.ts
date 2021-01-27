interface ChangeTabOptions {
  descriptionData: string;
  descriptionContent: string;
  reviewsData: string;
  reviewsContent: string;
}

class ChangeTab {
  private _description: HTMLElement;

  private _descriptionContent: HTMLElement;

  private _review: HTMLElement;

  private _reviewContent: HTMLElement;

  constructor(elements: ChangeTabOptions) {
    this._description = document.querySelector(elements.descriptionData);
    this._descriptionContent = document.querySelector(
      elements.descriptionContent
    );
    this._review = document.querySelector(elements.reviewsData);
    this._reviewContent = document.querySelector(elements.reviewsContent);

    if (!this._description) {
      return;
    }

    this._addEvent();
  }

  private _addEvent() {
    this._description.addEventListener('click', () => {
      if (this._review.classList.contains('active')) {
        this._review.classList.remove('active');
        this._reviewContent.classList.add('hidden');

        this._description.classList.add('active');
        this._descriptionContent.classList.remove('hidden');
      }
    });

    this._review.addEventListener('click', () => {
      if (this._description.classList.contains('active')) {
        this._description.classList.remove('active');
        this._descriptionContent.classList.add('hidden');

        this._review.classList.add('active');
        this._reviewContent.classList.remove('hidden');
      }
    });
  }
}

export default ChangeTab;
