class Carousel {
    constructor(carousel) {
        // find elements
        this.carousel = carousel
        this.buttonPrevious = carousel.querySelector(
            '[data-carousel-button-previous]'
        )
        this.buttonNext = carousel.querySelector('[data-carousel-button-next]')
        this.slidesContainer = carousel.querySelector(
            '[data-carousel-slides-container]'
        )

        // state
        this.currentSlide = 0
        this.numSlides = this.slidesContainer.children.length

        // add events
        this.buttonPrevious.addEventListener(
            'click',
            this.handlePrevious.bind(this)
        )
        this.buttonNext.addEventListener('click', this.handleNext.bind(this))
    }

    handleNext() {
        this.currentSlide = modulo(this.currentSlide + 1, this.numSlides)
        this.carousel.style.setProperty('--current-slide', this.currentSlide)
    }

    handlePrevious() {
        this.currentSlide = modulo(this.currentSlide - 1, this.numSlides)
        this.carousel.style.setProperty('--current-slide', this.currentSlide)
    }
}

const carousels = document.querySelectorAll('[data-carousel]')
carousels.forEach((carousel) => new Carousel(carousel))
