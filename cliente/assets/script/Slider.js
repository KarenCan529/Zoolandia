const slider = document.querySelector('.slider');
const images = document.querySelectorAll('.slider img'); 
const background = document.querySelector('.Slider-Hero'); 

const backgrounds = [
    "url('assets/imagenes/parrot2.webp')",
    "url('assets/imagenes/pumaa.webp')",
    "url('assets/imagenes/coli.webp')",
    "url('assets/imagenes/camaleon.webp')"
];

let currentIndex = 0;
let autoSlideInterval; 
const progressBar = document.querySelector('.progress-bar'); 
const progressBarContainer = document.querySelector('.progress-bar-container'); 

function isSliderInView() {
    const sliderRect = slider.getBoundingClientRect();
    return sliderRect.top >= 0 && sliderRect.bottom <= window.innerHeight;
}

function updateSlider() {
    images.forEach((img, index) => {
        img.classList.remove('active');
        if (index === currentIndex) {
            img.classList.add('active');
        }
    });

    const containerWidth = slider.parentElement.offsetWidth;
    const imageWidth = images[currentIndex].offsetWidth;
    const offset = -(currentIndex * (imageWidth + 70)) + (containerWidth / 2 - imageWidth / 2);
    slider.style.transform = `translateX(${offset}px)`;

    setTimeout(() => {
        background.style.backgroundImage = backgrounds[currentIndex];
    }, 100);

    if (isSliderInView()) {
        progressBarContainer.style.display = 'block'; 
        progressBar.style.transition = 'none'; 
        progressBar.style.width = '0%'; 
        setTimeout(() => {
            progressBar.style.transition = 'width 5s linear';
            progressBar.style.width = '100%'; 
        }, 50);  
    } else {
        progressBarContainer.style.display = 'none'; 
    }
}

function handleClickOnImage(index) {
    if (index === currentIndex) {
        currentIndex = (currentIndex - 1 + images.length) % images.length; 
    } else {
        currentIndex = index;
    }
    updateSlider();
    resetAutoSlide();
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length; 
        updateSlider();
    }, 5000);
}

window.addEventListener('load', () => {
    updateSlider();
    resetAutoSlide(); 
});

images.forEach((img, index) => {
    img.addEventListener('click', () => handleClickOnImage(index));
});

window.addEventListener('load', () => {
    const infoContainer = document.querySelector('.info-container');
    setTimeout(() => {
        infoContainer.classList.add('show');
    }, 100); 
});

window.addEventListener('scroll', () => {
    if (isSliderInView()) {
        progressBarContainer.style.display = 'block';
    } else {
        progressBarContainer.style.display = 'none'; 
    }
});

document.getElementById("scrollTop").addEventListener("click", function(e) {
    e.preventDefault(); 
    window.scrollTo({
      top: 0, 
      behavior: "smooth" 
    });
  });
