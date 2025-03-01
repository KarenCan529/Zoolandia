<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOOLANDIA</title>
  <!-- 1. Cargar Bootstrap primero -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<!-- 2. Luego cargar tus estilos personalizados -->
<link rel="stylesheet" href="assets/css2/Global.css">
<link rel="stylesheet" href="assets/css2/NosotrosHome.css">
<link rel="stylesheet" href="assets/css2/galeria.css">
<link rel="stylesheet" href="assets/css2/animalesAd.css">
<link rel="stylesheet" href="assets/css2/cssTestimonios.css">
<link rel="stylesheet" href="assets/css2/cssBoletos.css">
<link rel="stylesheet" href="assets/css2/cssDonacionesHome.css">
<link rel="stylesheet" href="assets/css2/ActividadesHome.css">
<link rel="stylesheet" href="assets/css2/ContactoHome.css">
<link rel="stylesheet" href="assets/css2/PreguntasHome.css">
<link rel="stylesheet" href="assets/css2/footer.css">
<link rel="stylesheet" href="assets/css2/Slider.css">
<link rel="stylesheet" href="assets/css2/modalAnimales.css">

<!-- 3. Finalmente, cargar las librerías externas como iconos y fuentes -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
 <!-- NAVBAR-->
<nav>
    <div class="container">
        <div class="navbar">
            <a href="<?= base_url() ?>" class="logo">
                <img src="<?= base_url('assets/imagenes/Logo.webp') ?>" alt="Logo">
            </a>
            <span class="zoolandia-text">Zoolandia</span>
            <button class="nav-btn"></button>
            <ul class="main-menu">
                <li><a href="<?= base_url("animales") ?>">ANIMALES</a></li>
                <li><a href="<?= base_url("boletos") ?>">BOLETOS</a></li>
                <li><a href="<?= base_url("mapa") ?>">MAPA</a></li>
                <li><a href="<?= base_url("donaciones") ?>">DONACIONES</a></li>
                <li><a href="<?= base_url("nosotros") ?>">NOSOTROS</a></li>
            </ul>
        </div>
    </div>
</nav>
 <!-- HERO-->
 <div class="Slider-Hero">
    <div class="progress-bar-container">
        <div class="progress-bar"></div>
    </div>
    <div class="info-container">
        <h1>Zoolandia</h1>
        <p>"Vive una aventura y descubre increíbles especies. ¡Conéctate con la naturaleza hoy mismo!"</p>
        <a href="javascript:void(0)" class="button" onclick="window.location.href='<?= base_url('boletos') ?>'">
    <span class="button-text">Comprar boletos</span></a>
    </div>
    <div class="background-container">
        <div class="slider-container">
            <div class="slider">
                <img src="assets/imagenes/tortuga.webp" alt="Image 1" class="active">
                <img src="assets/imagenes/serpiente.webp" alt="Image 2">
                <img src="assets/imagenes/coati.webp" alt="Image 3">
                <img src="assets/imagenes/vendo.webp" alt="Image 4">
            </div>
        </div>
    </div>
</div>
<!-- Hero Movil-->
<div class="sliderMovil">
    <div class="background-container-movil">
        <div class="slider-container-movil">
            <div class="slider-movil">
                <img src="assets/imagenes/tortuga.webp" alt="Image 1" class="active">
                <img src="assets/imagenes/serpiente.webp" alt="Image 2">
                <img src="assets/imagenes/coati.webp" alt="Image 3">
                <img src="assets/imagenes/vendo.webp" alt="Image 4">
            </div>
        </div>
    </div>
    <div class="INFO-MOVIL">
        <p>"Ven y vive una aventura"</p>
        <a href="#" class="button-movil">
        <span class="button-movil-text">Comprar boletos</span>
        </a>
    </div>
</div>
 <!-- Nosotros-->
    <div class="SeparadorSeccion">
        <div class="SeccionNosotros">
            <div class="row seccionArriba">
                <div class="col-md-5"> 
                    <img class="LogoSeccionNosotros" src="assets/imagenes/logo.webp" alt="">
                </div>
                <div class="col-md-7 centrarElementos">        
                     <div class="informacionAcercaDe">
                        <h2 class="titulo">NOSOTROS</h2>
                        <h3 class="parrafo">Zoolandia es un espacio dedicado a la conservación y el aprendizaje, donde puedes descubrir la diversidad de la vida silvestre en un entorno educativo y recreativo. Nuestra misión es inspirar a los visitantes a cuidar de la biodiversidad, mientras disfrutan de un contacto cercano con especies fascinantes.</h3>
                    </div>
                </div>
            </div>
            <div class="row imagenesEntre"> 
                    <div class="seccionAbajo">
                        <div class="col-md-8 mx-auto">
                        <div class="row Colaboradores">
                            <div class="col-4 imagenesEntre">
                            <h3 class="Patrocinadores">Nuestros Patrocinadores</h3>
                            </div>
                            <div class="col imagenesEntre">
                                <img class="colab1" src="assets/imagenes/patrocinador1.webp" alt="Patrocinador 1">
                            </div>
                            <div class="col imagenesEntre">
                                <img class="colab2" src= "assets/imagenes/patrocinador2.webp" alt="Patrocinador 2">
                            </div>
                            <div class="col imagenesEntre">
                                <img class="colab3" src="assets/imagenes/patrocinador3.webp" alt="Patrocinador 3">
                            </div>
                            <div class="col imagenesEntre">
                                <img class="colab4" src="assets/imagenes/patrocinador4.webp" alt="Patrocinador 4">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>  
    </div>
 <!-- Boletos Seccion -->
  
 <div class="SeparadorSeccion">
    <div class="tituloboletos">
        <h2 class="titulopaquete">¡PAQUETES INCREIBLES EN ZOOLANDIA!</h2>
        <h3 class="subpaquete">Ven y vive experiencias inolvidables a precios accesibles.</h3>
    </div>
    <div class="row g-4">

        <div class="col-12 col-md-4">
            <article class="card_content">
                <div class="card_logo">
                    <img src="assets/imagenes/zoo.png" alt="">
                </div>
                <div class="card_price-box">
                    <h2 class="card_title">ZOOMAX</h2>
                    <h3 class="card_price">Adultos: $150</h3>
                    <h3 class="card_price">Niños: $80</h3>
                </div>
                <div class="card_benefits-box">
                    <ul class="card_list">
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos"> Acceso a atracciones principales</h4>
                        </li>
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Precios accesibles</h4>
                        </li>
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Opción económica</h4>
                        </li>
                    </ul>
                    
                    <button class="card_button"><a class="boletoshome"href="<?= base_url("boletos") ?>">COMPRAR ENTRADAS</a></button>
                </div>
            </article>
        </div>

        <div class="col-12 col-md-4">
            <article class="card_content">
                <div class="card_logo">
                    <img src="assets/imagenes/jaguarBoo.png" alt="">
                </div>
                <div class="card_price-box">
                    <h2 class="card_title">BESTIAL</h2>
                    <h3 class="card_price">Adultos: $250</h3>
                    <h3 class="card_price">Niños $130</h3>
                </div>
                <div class="card_benefits-box">
                    <ul class="card_list">
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Acceso completo a atracciones</h4>
                        </li>
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Descuentos y promociones</h4>
                        </li>
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Show y eventos</h4>
                        </li>
                    </ul>
                    <button class="card_button"><a class="boletoshome"href="<?= base_url("boletos") ?>">COMPRAR ENTRADAS</a></button>
                </div>
            </article>
        </div>

        <div class="col-12 col-md-4">
            <article class="card_content">
                <div class="card_logo">
                    <img src="assets/imagenes/vipp.webp" alt="">
                </div>
                <div class="card_price-box">
                    <h2 class="card_title">VIP</h2>
                    <h3 class="card_price">Adultos: $350</h3>
                    <h3 class="card_price">Niños: $200</h3>
                </div>
                <div class="card_benefits-box">
                    <ul class="card_list">
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Interacción exclusiva con animales</h4>
                        </li>
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Recorrido guiado personalizado</h4>
                        </li>
                        <li>
                            <i class='bx bxs-check-circle'></i>
                            <h4 class="puntos">Fotos profesionales</h4>
                        </li>
                    </ul>
                    <button class="card_button"><a  class="boletoshome"href="<?= base_url("boletos") ?>">COMPRAR ENTRADAS</a></button>
                </div>
            </article>
        </div>
    </div>
    <h4 class="subsubtitulo">¡Compra tus boletos ahora y asegura tu lugar en esta increíble aventura!</h4>

</div>

<!-- Animales destacados -->

    <!-- Modal para Animales -->
    <div class="overlay" id="overlay"></div>
    <div class=" modalAbierto" id="modal">
        <img class="imagenModal" id="modalImagenAnimal" src="https://via.placeholder.com/250" alt="Imagen de Ejemplo">
        <div class="modal-content">
            <h2 id="nombre_animal">Nombre: Cobrix</h2>
                        <p><strong>Nombre Común:</strong> <span class="espacio" id="nombre_comun_animal"> Boa Constrictora</span></p>
                        <p><strong>Nombre Científico:</strong> <span class="espacio" id="nombre_cientifico_animal"> Boa constrictor</span></p>
                        <p><strong>Familia y Orden:</strong> <span class="espacio" id="familia_orden_animal"> Boidae, Squamata</span></p>
                        <p><strong>Hábitat Natural:</strong> <span class="espacio" id="habitat_animal"> Selvas tropicales</span></p>
                        <p><strong>Alimentación:</strong> <span class="espacio" id="alimentacion_animal"> Carnívora</span></p>
                        <p><strong>Esperanza de Vida:</strong> <span class="espacio" id="esperanza_vida_animal"> 20 a 30 años</span></p>
                        <p><strong>Estado de Conservación:</strong> <span class="espacio" id="estado_conservacion"> Preocupación menor</span></p>
            <div class="button-container">
            <a class="quitarLinea" href="<?= base_url('boletos') ?>">   <button class="botonModal"> Boletos</button></a>
            </div>
        </div>
        <button class="close-button" id="closeModalButton">&times;</button>
    </div>

     <!--ESCRITORIO-->
<div class="seccion-escritorio">
<div class="SeparadorSeccion">
        <div class="container-fluid ">
            <div class="row dentroDiv">
                <div class="LadoIzquierdo">
                    <h2 class="SeccionADTitulo">ANIMALES DESTACADOS</h2>
                    <h3 class="SeccionADParrafo">¿Quieres conocerlos?</h3>
                    <button class="BotonCuadro" onclick="window.location.href='<?= base_url('animales') ?>'">
                        <h3 class="ParrafoBoton">Pulsa aquí</h3></button>
                </div>
                <div class="img-box">
                    <div class="SeccionArriba"> 
                        <h4 class="parrafoSeccionArriba">El mono aullador negro o saraguato, es un primate tropical de la familia Atelidae..</h4>                  
                    </div>  
                    <h2 class="tituloAnimales">Mono <span class="break-line">aullador</span></h2>
                    
                    <button class="bottonAnimales" data-id="2">
                        <h3 class="infoBoton">Ver más</h3>
                    </button>
                </div>

                <div class="img-box">
                    <div class="SeccionArriba"> 
                        <h4 class="parrafoSeccionArriba">El jaguar, yaguar, yaguareté, jaguareté, tigre o tecuán  ​ (Panthera onca)....</h4>                  
                    </div>  
                    <h2 class="tituloAnimales"><br><span class="break-line">Jaguar</span></h2>
                    
                        <button class="bottonAnimales"  data-id="1">
                            <h3 class="infoBoton">Ver más</h3>
                        </button>
                         
                </div>

                <div class="img-box">
                    <div class="SeccionArriba"> 
                        <h4 class="parrafoSeccionArriba">El torogoz, guardabarranco, tolobojo ceja-turquesa, pájaro toh ​o momoto cejiazul...</h4>                  
                    </div>  
                    <h2 class="tituloAnimales">Momoto <span class="break-line">cejiazul</span></h2>                
                        <button class="bottonAnimales"  data-id="8">
                            <h3 class="infoBoton">Ver más</h3>
                        </button>    
                </div>

                <div class="img-box">
                    <div class="SeccionArriba"> 
                        <h4 class="parrafoSeccionArriba">El tapir centroamericano, norteño o de Baird (Tapirus bairdii) es una especie de mamífero...</h4>                  
                    </div>  
                    <h2 class="tituloAnimales">Tapir <span class="break-line">centroamericano</span></h2>
                        <button class="bottonAnimales"  data-id="3">
                            <h3 class="infoBoton">Ver más</h3>
                        </button>     
                </div>

                <div class="img-box">
                    <div class="SeccionArriba"> 
                        <h4 class="parrafoSeccionArriba">La paca común, guagua, lapa o tepezcuintle (Cuniculus paca) ​ ​ es una especie de roedor histricomorfo...</h4>                  
                    </div>  
                    <h2 class="tituloAnimales"><br><span class="break-line">Tepezcuintle</span></h2>
                        <button class="bottonAnimales"  data-id="4">
                            <h3 class="infoBoton">Ver más</h3>
                        </button>   
                </div>
         
            </div>   
         </div>
        </div>
    </div>



</div>
<!--MOVIL-->
<div class="seccion-movil">
    <div class="SeparadorSeccion">
        <div class="SeccionArribaAd">
            <h2 class="SeccionADTitulo">ANIMALES DESTACADOS</h2>
            <h3 class="SeccionADParrafo">¿Quieres conocerlos?</h3>
            <button class="BotonCuadro" onclick="window.location.href='<?= base_url('animales') ?>'">
                        <h3 class="ParrafoBoton">Pulsa aquí</h3></button>
        </div>

        <div class="img-box" id="cambioImagen">
            <h2 class="tituloAnimales" id="nombreAnimal">Mono aullador</h2>
            
                <button class="bottonAnimales" data-id="2">
                    <h3 class="infoBoton" id="infoBoton">Ver más</h3>
                </button>
            </a>
            <div class="botonesDivFlechas">
                <a id="cambioAtras">    
                    <svg class="botonFlechaIzquierda" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <path d="M22.0997 25.883L16.233 19.9997L22.0997 14.1163M36.6663 19.9997C36.6663 29.2044 29.2044 36.6663 19.9997 36.6663C10.7949 36.6663 3.33301 29.2044 3.33301 19.9997C3.33301 10.7949 10.7949 3.33301 19.9997 3.33301C29.2044 3.33301 36.6663 10.7949 36.6663 19.9997Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <svg id="cambioFrente" class="botonFlechaDerecha" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path d="M17.8997 25.883L23.7663 19.9997L17.8997 14.1163M36.6663 19.9997C36.6663 29.2044 29.2044 36.6663 19.9997 36.6663C10.7949 36.6663 3.33301 29.2044 3.33301 19.9997C3.33301 10.7949 10.7949 3.33301 19.9997 3.33301C29.2044 3.33301 36.6663 10.7949 36.6663 19.9997Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function () {
    // Datos de los animales
    const animales = [
      {
        id: 2,
        imagen: "assets/imagenes/MonoAullador.webp",
        nombre1: "Mono <br> aullador",
        info: "Ver más",
        clasificacion: "Mamíferos"
      },
      {
        id: 1,
        imagen: "assets/imagenes/Jaguar.webp",
        nombre1: "Jaguar",
        info: "Ver más",
        clasificacion: "Mamíferos"
      },
      {
        id: 8,
        imagen: "assets/imagenes/Momoto.webp",
        nombre1: "Momoto <br> cejiazul",
        info: "Ver más",
        clasificacion: "Psitácidos"
      },
      {
        id: 3,
        imagen: "assets/imagenes/TapirCentroamericano.webp",
        nombre1: "Tapir <br> centroamericano",
        info: "Ver más",
        clasificacion: "Mamíferos"
      },
      {
        id: 4,
        imagen: "assets/imagenes/paca.webp",
        nombre1: "Tepezcuintle",
        info: "Ver más",
        clasificacion: "Mamíferos"
      },
    ];

    // Elementos comunes
    const modal = document.getElementById("modal");
    const overlay = document.getElementById("overlay");
    const closeModalButton = document.getElementById("closeModalButton");

    // Función para abrir el modal
    function abrirModal(id) {
      $.post("<?= base_url('animales') ?>", { id: id }, function (response) {
        try {
          const animal = JSON.parse(response);
          if (animal.error) {
            alert(animal.error);
            return;
          }

          // Asignar datos al modal
          $("#nombre_animal").text("Nombre: " + animal.nombre_animal);
          $("#nombre_comun_animal").text(animal.nombre_comun_animal);
          $("#nombre_cientifico_animal").text(animal.nombre_cientifico_animal);
          $("#familia_orden_animal").text(animal.familia_orden_animal);
          $("#habitat_animal").text(animal.habitat_animal);
          $("#alimentacion_animal").text(animal.alimentacion_animal);
          $("#esperanza_vida_animal").text(animal.esperanza_vida_animal);
          $("#estado_conservacion").text(animal.estado_conservacion);
          $("#modalImagenAnimal").attr("src", animal.imagen_animal);

          // Cambiar la clase del modal según la clasificación
          modal.className = ""; // Resetear clases previas
          if (animal.nombre_clasificacion === "Mamíferos") {
            modal.classList.add("modalAbierto");
          } else if (animal.nombre_clasificacion === "Reptiles") {
            modal.classList.add("modalAbierto2");
          } else if (animal.nombre_clasificacion === "Psitácidos") {
            modal.classList.add("modalAbierto3");
          }

          // Mostrar modal
          modal.style.display = "flex";
          overlay.style.display = "block";
        } catch (error) {
          alert("Error al cargar los detalles del animal.");
        }
      });
    }

    // Funcionalidad de escritorio
    const botonesEscritorio = document.querySelectorAll(".seccion-escritorio .bottonAnimales");
    botonesEscritorio.forEach((button) => {
      button.addEventListener("click", function () {
        const id = $(this).data("id");
        abrirModal(id);
      });
    });

    // Funcionalidad de móvil
    let currentAnimalIndex = 0;

    const cambioAtras = document.getElementById("cambioAtras");
    const cambioFrente = document.getElementById("cambioFrente");
    const cambioImagen = document.getElementById("cambioImagen");
    const nombreAnimal = document.getElementById("nombreAnimal");
    const infoBoton = document.getElementById("infoBoton");

    function actualizarContenido() {
      const animalActual = animales[currentAnimalIndex];
      cambioImagen.style.backgroundImage = `url('${animalActual.imagen}')`;
      nombreAnimal.innerHTML = animalActual.nombre1;
      infoBoton.setAttribute("data-id", animalActual.id);

      $(infoBoton).off("click").on("click", function () {
        abrirModal(animalActual.id);
      });
    }

    cambioAtras.onclick = function () {
      currentAnimalIndex = (currentAnimalIndex === 0) ? animales.length - 1 : currentAnimalIndex - 1;
      actualizarContenido();
    };

    cambioFrente.onclick = function () {
      currentAnimalIndex = (currentAnimalIndex === animales.length - 1) ? 0 : currentAnimalIndex + 1;
      actualizarContenido();
    };

    // Inicializar contenido móvil
    actualizarContenido();

    // Cerrar modal
    closeModalButton.addEventListener("click", () => {
      modal.style.display = "none";
      overlay.style.display = "none";
    });

    overlay.addEventListener("click", () => {
      modal.style.display = "none";
      overlay.style.display = "none";
    });
  });

</script>



 <!--ACTIVIDADES-->
 <div class="SeparadorSeccion">
    <div class="videos-home">
        <div class="row videosinicio">
            <div class="tituloVideoHome">
                <h2 class="tituloSeccionVideo">ACTIVIDADES  DE  ZOOLANDIA</h2>
                <h3 class="parrafoSeccionVideo">¡Nuestras actividades son perfectas para que toda la familia disfrute, aprenda y se conecte con la naturaleza!.</h3>
                <p class="parrafoMobile">Disfruta,  aprende y conecta con la naturaleza.</p>
            </div>
            <div class="col-md-3">
                <div class="video-content">
                    <video class="video-control" muted>
                        <source src="assets/imagenes/videos/1.mp4" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                    <h3 class="tituloVideo">Tours Guiados</h3>
                    <h4 class="parrafoVideo">Participa en los tours guiados donde se puede aprender información sobre los animales y su hábitat.</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="video-content">
                    <video class="video-control" muted>
                        <source src="assets/imagenes/videos/2.mp4" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                    <h3 class="tituloVideo">Alimenta</h3>
                    <h4 class="parrafoVideo">Únete a las diversas actividades como el cuidado de animales o la alimentación de ciertas especies.</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="video-content">
                    <video class="video-control" muted>
                        <source src="assets/imagenes/videos/5.mp4" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                    <h3 class="tituloVideo">Platicas</h3>
                    <h4 class="parrafoVideo">Asististe a las charlas que dan los cuidadores sobre los animales y las diversas áreas del zoológico.</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="video-content">
                    <video class="video-control" muted>
                        <source src="assets/imagenes/videos/4.mp4" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                    <h3 class="tituloVideo">Explora</h3>
                    <h4 class="parrafoVideo">Recorre las diferentes áreas del zoológico y observar a los diversos animales en sus hábitats.</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!--DONACIONES-->
<div class="Donacion-Home">
  <div class="separadorDonaciones">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 eliminarPYM">
                <div class="fondoDonacion">
                    <img src="assets/imagenes/Fondoleon.webp" alt="León" class="ImagenLeon"> 
                    <img src="assets/imagenes/FondoAve.webp" alt="Ave" class="ImagenAve">
                    <div class="difuminacion">
                        <div class="eclipse1"></div>
                        <div class="eclipse2"></div>
                    </div>
                    <div class="texDonacion">
                        <h2 class="tituloDonacionesHome">Ayúdanos a Proteger la Vida Silvestre</h2>
                        <h3 class="parrafoDonacionesHome">Con tus donaciones, cuidamos y protegemos a cada especie.</h3>
                        <button class="botonDonacion" onclick="window.location.href='<?= base_url('donaciones') ?>';">
                                <h3 class="textoBotonDonacion">Quiero ayudar</h3></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="Donacion-Home-mobile">
    <div class="separadorDonaciones">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 eliminarPYM">
                    <div class="fondoDonacion">
                        <img src="assets/imagenes/img-movil/Ave-Dona.webp" alt="León" class="ImagenAve"> 
                        <div class="difuminacion">
                            <div class="eclipse1"></div>
                        </div>
                        <div class="texDonacion">
                            <h2 class="tituloDonacionesHome">Ayúdanos a Proteger la Vida Silvestre</h2>
                            <h3 class="parrafoDonacionesHome">Con tus donaciones, cuidamos y protegemos a cada especie.</h3>
                            <button class="botonDonacion" onclick="window.location.href='<?= base_url('donaciones') ?>';">
                                <h3 class="textoBotonDonacion">Quiero ayudar</h3></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--TESTIMONIOS-->
 <div class="SeparadorSeccion">
<div class="tituloTesti text-center">
    <h2>EXPERIENCIAS QUE INSPIRAN</h2>
    <h3>Voces de Zoolandia</h3>
</div>


<div class="row testimonios">
    <div class="col-12 col-md-4 testimonio">
        <div class="testi_logo">
            <img src="assets/imagenes/sofia2.webp" alt="Sofía Jiménez">
        </div>
        <h3>Sofía Jiménez</h3>
        <h4>Testimonio</h4>
        <p>Me sorprendió la variedad de especies y la calidad de todas las instalaciones. Zoolandia es un lugar donde la educación y la diversión van de la mano, y cada rincón está diseñado para ofrecer una mejor experiencia enriquecedora.</p>
        <div class="estrellas">★★★★★</div>
    </div>
    <div class="col-12 col-md-4 testimonio">
        <div class="testi_logo">
            <img src="assets/imagenes/luis2.webp" alt="Luis García">
        </div>
        <h3>Luis García</h3>
        <h4>Testimonio</h4>
        <p>Salí de allí con una nueva perspectiva sobre la vida silvestre. La forma en que integran la educación ambiental con las actividades interactivas hace que sea accesible para toda la familia y aún más emocionante explorar todo el lugar.</p>
        <div class="estrellas">★★★★★</div>
    </div>
    <div class="col-12 col-md-4 testimonio">
        <div class="testi_logo">
            <img src="assets/imagenes/ana2.webp" alt="Ana Torres">
        </div>
        <h3>Ana Torres</h3>
        <h4>Testimonio</h4>
        <p>Me encantó la variedad de animales, aunque faltan algunas actividades interactivas. Sin embargo, el conocimiento del personal compensa cualquier área por mejorar, gracias a su atención y ayuda constante ante cualquier duda.</p>
        <div class="estrellas">★★★★☆</div>
    </div>
    <div class="col-12 col-md-4 testimonio">
        <div class="testi_logo">
            <img src="assets/imagenes/laura2.webp" alt="Laura Ramírez">
        </div>
        <h3>Laura Ramírez</h3>
        <h4>Testimonio</h4>
        <p>Mis hijos quedaron maravillados con cada rincón de Zoolandia. Cada zona está diseñada para despertar la curiosidad de los niños y la admiración por los animales, creando una experiencia única y memorable para todos los visitantes.</p>
        <div class="estrellas">★★★★★</div>
    </div>
    <div class="col-12 col-md-4 testimonio">
        <div class="testi_logo">
            <img src="assets/imagenes/paula2.webp" alt="Paula Castro">
        </div>
        <h3>Paula Castro</h3>
        <h4>Testimonio</h4>
        <p>Zoolandia no solo educa, si no que también inspira y enseña a cuidar el ambiente. Implementando prácticas sostenibles que refuerzan el mensaje de respeto, responsabilidad e importancia ambiental que buscan transmitir a otras personas.</p>
        <div class="estrellas">★★★★☆</div>
    </div>
    <div class="col-12 col-md-4 testimonio">
        <div class="testi_logo">
         <img src="assets/imagenes/andrees.webp" alt="Andrés Ruiz">
        </div>
        <h3>Andrés Ruiz</h3>
        <h4>Testimonio</h4>
        <p>Zoolandia es más que un zoologico, es un refugio para todos los animales; es un lugar donde la comunidad aprende y explora sobre conservación, convirtiéndolo en un espacio de aprendizaje constante para las personas.</p>
        <div class="estrellas">★★★★★</div>
    </div>
</div>

<div class="indicadores text-center">
    <span class="indicador" onclick="moverA(0)"></span>
    <span class="indicador" onclick="moverA(1)"></span>
   
</div>
</div>



 <!-- Galeria -->
 <div class="Galeria-Desktop">
    <div class="SeparadorSeccion">
        <div class="EliminarPading">
        <div class="col-md-12 ">
            <div class="GaleriaDeImagenes">

                <div class="titulogaleria">
                    <h2 class="tituloSeccionGaleria">ZOOLANDIA A TRAVÉS DE  IMÁGENES</h2>
                    <h3 class="parrafoSeccionGaleria">Momentos únicos y cercanos con nuestros animales y rincones de Zoolandia.</h3>
                </div>
                <div class="galeria-img">

                    <div class="imagen-container">
                        <img src="assets/imagenes/im1.webp" alt="Imagen 1">
                        <h4>Conocer más,proteger más.</h4>
                    </div>

                    <div class="imagen-container">
                        <img src="assets/imagenes/img 2.webp" alt="Imagen 2">
                        <h4>Donde cada rincón guarda una historia.</h4>
                    </div>

                    <div class="imagen-container" >
                        <img src="assets/imagenes/im3.webp" alt="Imagen 3">
                        <h4>Aprende mientras te diviertes.</h4>
                    </div>

                    <div class="imagen-container " >
                        <img src="assets/imagenes/im4.webp" class="img-4" alt="Imagen 4">
                        <h4>Creando recuerdos inolvidables en familia.</h4>
                    </div>

                    <div class="imagen-container" >
                        <img src="assets/imagenes/im5.webp" class="img-5" alt="Imagen 5">
                        <h4>El mundo natural al alcance de tu mano.</h4>
                    </div>

                    <div class="imagen-container" >
                        <img src="assets/imagenes/im6.webp" class="img-6" alt="Imagen 6">
                        <h4>Camino de la biodiversidad.</h4>
                    </div>

                    <div class="imagen-container" >
                        <img src="assets/imagenes/im7.webp" class="img-7" alt="Imagen 7">
                        <h4>Un encuentro cercano a través del alimento.</h4>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="Galeria-Movil">
    <div class="SeparadorSeccion">
        <div class="galeria-movil">
                <div class="titulogaleria-Movil">
                    <h2 class="tituloSeccionGaleria-Movil">ZOOLANDIA A TRAVÉS DE  IMÁGENES</h2>
                    <h3 class="parrafoSeccionGaleria-Mvil">Momentos únicos y cercanos con nuestros animales y rincones de Zoolandia.</h3>
                </div>
            <div class="Imagen-Conteiner-Movil">       
                <div class="imagen-movil">
                        <img id="imagen-activa" src="assets/imagenes/img-movil/Galeria1.webp" alt="Imagen actual">
                    <div class="texto-sobre-imagen">
                        <h4 id="texto-activo">Conocer más, proteger más.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Preguntas Frecuentes -->

<div class="SeparadorSeccion">
<div class="PreguntasFrecuentes">
    <div  class="TituloPregunta">
    <h1 class="TItuloPreguntas">PREGUNTAS FRECUENTES</h1>
    <p class="ParrafoPreguntas">Encuentra respuestas a las dudas más comunes sobre tu visita a Zoolandia.</p>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="faq-item">
          <div class="faq-question">
            ¿Está permitido comer dentro del zoológico? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">Sí, puedes traer tu propio almuerzo o merienda, pero te pedimos que respetes las áreas designadas para ello. También tenemos varias opciones de comida dentro del zoológico, como cafeterías y restaurantes. a más cercanos.</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            ¿Cómo puedo llegar a Zoolandia? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">Zoolandia se encuentra en XY. Si vienes en coche, contamos con estacionamiento en el lugar. Para más detalles, visita nuestro apartado de  'Contáctanos' y recibirás toda la información que necesitas.</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            ¿Zoolandia ofrece visitas nocturnas? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">Actualmente, no ofrecemos visitas nocturnas. Sin embargo, durante el día podrás disfrutar de una amplia variedad de actividades y observar el comportamiento de nuestros animales en su ambiente natural. </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            ¿Puedo traer un coche o silla de ruedas para mi hijo? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">       Sí, puedes traer tu propio cochecito para niños o silla de ruedas al zoológico. También ofrecemos sillas de ruedas sin costo adicional en la entrada, sujetas a disponibilidad. Si necesitas asistencia especial, no dudes en comunicarte con nuestro personal.</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="faq-item">
          <div class="faq-question">
            ¿Qué hago si necesito ayuda durante mi visita? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer"> Si necesitas ayuda en cualquier momento durante tu visita, puedes acercarte a cualquiera de  personal capacitado que está siempre dispuesto a ayudarte. Si tienes una pregunta urgente, no dudes en acercarte a nuestro equipo de seguridad.</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            ¿Hacen un recorrido guiado por el zoológico? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">Sí, ofrecemos recorridos guiados en varios horarios durante el día. Nuestros guías expertos te llevarán a través de las exhibiciones y te proporcionarán información interesante sobre los animales.</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            ¿Hay Wi-Fi disponible en el zoológico? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">Sí, Zoolandia ofrece Wi-Fi gratuito en varias áreas comunes, como las zonas de descanso, entre otras.  ¡Así podrás compartir tus fotos de los animales en tiempo real!</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            ¿Puedo tomar fotos/videos dentro del zoológico? 
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">Sí, puedes tomar fotos y videos para uso personal, siempre y cuando no interfieras con la experiencia de otros visitantes o pongas en riesgo la seguridad de los animales. Recuerda que el uso de drones está prohibido.</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Forms Contacto -->

<div class="SeparadorSeccion">
      <div class="row align-items-center h-100">
        <div class="col-md-8">
          <div class="contact-form-container">
            <div class="contact-header">
              <h2>¡Contáctanos!</h2>
              <p>Tu mensaje es importante para nosotros. ¡Hablemos!</p>
              <img src="assets/imagenes/logo.webp" alt="Logo">
            </div>
            <div class="p-4 contact-form">
              <form>
                <div class="row mb-3">
                  <div class="col">
                    <input type="text" id="nombreCompleto" class="form-control" placeholder="Escribe tu nombre completo" required>
                  </div>
                  <div class="col">
                    <input type="email" id="correoElectronico" class="form-control" placeholder="Escribe tu correo" required>
                  </div>
                </div>
                <div class="mb-3">
                  <select id="motivoContacto" class="form-select" required>
                    <option selected>Selecciona una opción</option>
                    <option value="1">Consulta general</option>
                    <option value="2">Información sobre visitas y horarios</option>
                    <option value="3">Reservación de Grupos y Escuelas</option>
                  </select>
                </div>
                <div class="mb-3">
                  <textarea id="mensajeContacto" class="form-control" rows="2" placeholder="Escribe tu mensaje" required></textarea>
                </div>
                <button type="submit" class="btn contact-button w-100">Enviar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-image">
            <img src="assets/imagenes/imagencontacto.webp" alt="Imagen relacionada">
          </div>
        </div>
      </div>
</div>

<!-- Footer -->
<div class="Footer-Desktop">
<footer class="custom-footer">
    <div class="SeparadorSeccion">
      <div class="row align-items-center">
        <!-- Información de contacto -->
        <div class="Contactos col-md-4 mb-4 mb-md-0">
          <h5>Información de Contacto:</h5>
          <p>
            <i class="fas fa-phone"></i> +52 984 434 9461
          </p>
          <p>
            <i class="fas fa-envelope"></i> contacto@zoolandia.com
          </p>
          <p>
            <i class="fas fa-map-marker-alt"></i> Carr. Cancún - Tulum km 30, 77519 Cancún, Q.R.
          </p>
        </div>

        <div class="col-md-4 text-center">
          <img src="assets/imagenes/logo.webp" alt="Logo" class="footer-logo">
        </div>

        <div class="Horarios col-md-4">
          <h5>Horarios de atención:</h5>
          <p>Lunes - Viernes: 9:00 a.m - 5:00 p.m</p>
          <p>Sábados: 9:00 a.m - 6:00 p.m</p>
          <p>Domingos: 10:00 a.m - 4:00 p.m</p>
        </div>
      </div>

      <div class="custom-divider-container">
        <div class="custom-divider small-divider"></div>
        <div class="custom-divider large-divider"></div>
    </div>



    <div class="content-divider">
        <p class="footer-text">Todo el contenido del sitio web es propiedad de Zoolandia y/o sus filiales, salvo que se indique lo contrario. Todos los derechos reservados.</p>
    <div class="social-icons">
    <a href="https://www.facebook.com/profile.php?id=61569813421688" class="social-icon"><i class="fab fa-facebook"></i></a>
    <a href="https://www.instagram.com/zoolandia_cancun?igsh=cnhhN3A5MGlpemhs" class="social-icon"><i class="fab fa-instagram"></i></a>
    <a href="http://tiktok.com/@zolandia_cancn" class="social-icon"><i class="fab fa-tiktok"></i></a>
  </div>
</div>

</footer>
</div>

<div class="footer">
<footer>
    <div class="SeparadorSeccion">
  <div class="footer-container">
    <!-- Logo -->
    <div class="footer-logo">
      <img src="assets/imagenes/logo.webp" alt="Logo Zoolandia">
    </div>

    <!-- Horarios -->
    <div class="footer-hours">
      <h3>Horarios de atención:</h3>
      <p>Lunes - Viernes: 9:00 a.m - 5:00 p.m</p>
      <p>Sábados: 9:00 a.m - 6:00 p.m</p>
      <p>Domingos: 10:00 a.m - 4:00 p.m</p>
    </div>

    <!-- Información de Contacto -->
    <div class="footer-contact">
      <h3>Información de Contacto:</h3>
      <p><i class="fas fa-phone"></i> +52 984 434 9461</p>
      <p><i class="fas fa-envelope"></i> contacto@zoolandia.com</p>
      <p><i class="fas fa-map-marker-alt"></i> Carr. Cancún - Tulum km 30, 77519 Cancún, Q.R.</p>
    </div>

    <!-- Redes Sociales -->
    <div class="footer-social">
      <a href="https://www.facebook.com/profile.php?id=61569813421688"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.instagram.com/zoolandia_cancun?igsh=cnhhN3A5MGlpemhs"><i class="fab fa-instagram"></i></a>
      <a href="http://tiktok.com/@zolandia_cancn"><i class="fab fa-tiktok"></i></a>
    </div>

    <hr>
    <!-- Derechos Reservados -->
    <div class="footer-copyright">
      <p>Todo el contenido del sitio web es propiedad de Zoolandia y/o sus filiales, salvo que se indique lo contrario. Todos los derechos reservados.</p>
    </div>
  </div>
  </div>
  </footer>
</div>

<script src="assets/script/galeria.js"></script>
<script src="assets/script/jsTestimonios.js"></script>
<script src="assets/script/ActividaesHome.js"></script>
<script src="assets/script/Preguntas.js"></script>
<script src="assets/script/Slider.js"></script>
<script src="assets/script/SliderMovil.js"></script>
<script src="assets/script/Galeria-Movil.js"></script>
<script src="assets/script/Navbar.js"></script>
</body>
</html>