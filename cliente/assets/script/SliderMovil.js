document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.slider-movil');
  const images = document.querySelectorAll('.slider-movil img');
  const background = document.querySelector('.sliderMovil');

  const backgrounds = [
      "url('assets/imagenes/img-movil/Slider1.webp')",
      "url('assets/imagenes/img-movil/Slider2.webp')",
      "url('assets/imagenes/img-movil/Slider3.webp')",
      "url('assets/imagenes/img-movil/Slider4.webp')"
  ];

  let currentIndex = 0; 
  let autoSlideInterval;

  function updateSlider() {
      images.forEach((img, index) => {
          img.classList.remove('active');

          if (index === currentIndex) {
              img.classList.add('active');
          }
      });

      const containerWidth = slider.parentElement.offsetWidth;
      const imageWidth = images[currentIndex].offsetWidth;
      const offset = -(currentIndex * (imageWidth + 20)) + (containerWidth / 2 - imageWidth / 2);
      slider.style.transform = `translateX(${offset}px)`; 

      setTimeout(() => {
          background.style.backgroundImage = backgrounds[currentIndex];
      }, 100);
  }

  function autoSlide() {
      currentIndex = (currentIndex + 1) % images.length;
      updateSlider();
  }

  function resetAutoSlide() {
      clearInterval(autoSlideInterval); 
      autoSlideInterval = setInterval(autoSlide, 5000);
  }

  images.forEach((img, index) => {
      img.addEventListener('click', () => {
          if (index === currentIndex) {
              currentIndex = (currentIndex - 1 + images.length) % images.length; 
          } else {
              currentIndex = index; 
          }
          updateSlider(); 
          resetAutoSlide();
      });
  });

  updateSlider();
  autoSlideInterval = setInterval(autoSlide, 5000); 
});

function toggleMenu() {
  const navLinks = document.getElementById('navLinks');
  const hamburgerIcon = document.querySelector('.hamburger-icon');

  navLinks.classList.toggle('open');
  hamburgerIcon.classList.toggle('open');
}
