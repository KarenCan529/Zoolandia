document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".about-us-img img");
    let currentIndex = 0;

    function toggleImages() {
        images[currentIndex].classList.remove("active"); // Oculta la imagen actual
        currentIndex = (currentIndex + 1) % images.length; // Cambia al siguiente índice
        images[currentIndex].classList.add("active"); // Muestra la nueva imagen
    }

    // Inicializa la primera imagen como activa
    images[currentIndex].classList.add("active");

    // Cambia las imágenes cada 3 segundos
    setInterval(toggleImages, 3000);
});
