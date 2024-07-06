const slider = document.querySelector('.slider');
let slideIndex = 0;
function showSlides() {
    const slides = document.querySelectorAll('.slide');
    slideIndex++;

    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }

    const offset = -slideIndex * 100;
    slider.style.transform = `translateX(${offset}%)`;
}
setInterval(showSlides, 3000); // Change slide every 3 seconds
