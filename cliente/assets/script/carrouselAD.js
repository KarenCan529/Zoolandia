// Evitar duplicados de variables
let cambioAtras = document.getElementById("cambioAtras");
let cambioFrente = document.getElementById("cambioFrente");
let cambioImagen = document.getElementById("cambioImagen");
let nombreAnimal = document.getElementById("nombreAnimal");
let infoBoton = document.getElementById("infoBoton");

// Crear un arreglo de imágenes y texto para cambiar entre ellos
const animales = [
    {
        imagen: "assets/imagenes/MonoAullador.webp",
        nombre1: "Mono \n <br> aullador",
        info: "Ver más",
    },
    {
        imagen: "assets/imagenes/Jaguar.webp",
        nombre1: "Jaguar",
        info: "Ver más",
    },
    {
        imagen: "assets/imagenes/Momoto.webp",
        nombre1: "Momoto <br>  cejiazul",
        info: "Ver más",
    },
    {
        imagen: "assets/imagenes/TapirCentroamericano.webp",
        nombre1: "Tapir <br>  centroamericano",
        info: "Ver más",
    },
    {
        imagen: "assets/imagenes/paca.webp",
        nombre1: "Tepezcuintle",
        info: "Ver más",
    },
];

let currentAnimalIndex = 0;  // Índice del animal actual

// Función para actualizar la imagen y el texto del animal
function actualizarContenido() {
    cambioImagen.style.backgroundImage = `url('${animales[currentAnimalIndex].imagen}')`; // Cambia la imagen de fondo
    nombreAnimal.innerHTML = animales[currentAnimalIndex].nombre1; // Actualiza el nombre del animal
    infoBoton.innerHTML = animales[currentAnimalIndex].info; // Actualiza el texto del botón
}

// Inicializa el contenido al cargar la página
actualizarContenido();

// Función para cambiar la imagen cuando se hace clic en las flechas
cambioAtras.onclick = function() {
    currentAnimalIndex = (currentAnimalIndex === 0) ? animales.length - 1 : currentAnimalIndex - 1; // Mueve al anterior
    actualizarContenido(); // Actualiza la imagen y el texto
};

cambioFrente.onclick = function() {
    currentAnimalIndex = (currentAnimalIndex === animales.length - 1) ? 0 : currentAnimalIndex + 1; // Mueve al siguiente
    actualizarContenido(); // Actualiza la imagen y el texto
};

