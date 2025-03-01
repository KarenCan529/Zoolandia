document.addEventListener("DOMContentLoaded", function() {
    const carouselContent = document.querySelector('.carousel-content');
    const totalImages = document.querySelectorAll('.carousel-image').length;
    let currentIndex = 0; // Índice inicial del carrusel (empieza desde la serpiente)

    // Función para mover el carrusel a la siguiente imagen
    function moveToNextSlide() {
        if (currentIndex < totalImages - 1) {
            currentIndex++;
        } else {
            currentIndex = totalImages - 1; // Detener en la última imagen, sin volver a la primera
        }
        updateCarouselPosition();
    }

    // Función para actualizar la posición del carrusel
    function updateCarouselPosition() {
        // Ajustamos el 12px de gap para las imágenes y hacemos el movimiento más pequeño
        const newTransformValue = `translateX(-${currentIndex * (200 + 12)}px)`; 
        carouselContent.style.transform = newTransformValue;
    }

    // Función para el deslizamiento automático solo en dispositivos móviles
    function autoSlide() {
        if (window.innerWidth <= 768) {
            setInterval(moveToNextSlide, 4000); // Cambia cada 4 segundos para hacerlo más lento
        }
    }

    // Iniciar el deslizamiento automático
    autoSlide();

    // Listener para reajustar si la ventana cambia de tamaño
    window.addEventListener('resize', function() {
        autoSlide();
    });
});
