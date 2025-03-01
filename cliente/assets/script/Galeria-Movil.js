const imagenes = [
    { src: "assets/imagenes/img-movil/Galeria1.webp", texto: "Conocer más, proteger más." },
    { src: "assets/imagenes/img-movil/Galeria2.webp", texto: "Donde cada rincón guarda una historia." },
    { src: "assets/imagenes/img-movil/Galeria3.webp", texto: "Aprende mientras te diviertes." },
    { src: "assets/imagenes/img-movil/Galeria4.webp", texto: "Creando recuerdos inolvidables en familia." },
    { src: "assets/imagenes/img-movil/Galeria5.webp", texto: "El mundo natural al alcance de tu mano." },
    { src: "assets/imagenes/img-movil/Galeria6.webp", texto: "Camino de la biodiversidad." },
    { src: "assets/imagenes/img-movil/Galeria7.webp", texto: "Un encuentro cercano a través del alimento." },
];

let indiceActual = 0;

const imagenActiva = document.getElementById("imagen-activa");
const textoActivo = document.getElementById("texto-activo");

function cambiarImagen() {
    indiceActual = (indiceActual + 1) % imagenes.length;
    imagenActiva.src = imagenes[indiceActual].src;
    textoActivo.textContent = imagenes[indiceActual].texto;
}
imagenActiva.addEventListener("click", cambiarImagen);
