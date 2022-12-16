const slider = document.querySelector('.slides')
const slides = document.querySelectorAll('.slide')
const button = document.querySelectorAll('.carousel-button')

let slideIndex = 0
let prev = 4
let next = 1
showSlides(slideIndex)

function plusSlides() {
    showSlides((slideIndex += n))
}

function currentSlide(n) {
    showSlides((slideIndex = n))
}

function showSlides(n) {
    let i
    let slides = document.getElementsByClassName('slides')
    slides[0].style.display = 'block'
    // if (n > slides.length) {
    //     slideIndex = 1
    // }
    // if (n < 1) {
    //     slideIndex = slides.length
    // }
    // for (i = 0; i < slides.length; i++) {
    //     slides[i].style.display = 'none'
    // }

    // if (slides.length > slideIndex) {
    //     slides[slideIndex - 1].style.display = 'block'
    // }
}

// for (let i = 0; i < button.length; i++) {
//     button[i].addEventListener('click', () =>
//         i == 0 ? gotoPrev() : gotoNext()
//     )
// }

// const gotoPrev = () =>
//     current > 0 ? gotoNum(current - 1) : gotoNum(slides.length - 1)

// const gotoNext = () => (current < 4 ? gotoNum(current + 1) : gotoNum(0))

// const gotoNum = (number) => {
//     current = number
//     prev = current - 1
//     next = current + 1

//     for (let i = 0; i < slides.length; i++) {
//         slides[i].classList.remove('active')
//         slides[i].classList.remove('prev')
//         slides[i].classList.remove('next')
//     }

//     if (next == 5) {
//         next = 0
//     }

//     if (prev == -1) {
//         prev = 4
//     }

//     slides[current].classList.add('active')
//     slides[prev].classList.add('prev')
//     slides[next].classList.add('next')
// }
