<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/animales.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/modalAnimales.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="<?= base_url('assets/css2/footer.css') ?>">


<body>
<?php include 'Navbar.php'; ?>
    <div class="hero"> 
        <div class="fondo"></div> 
        <div class="heroContenido">
            <h1 class="TituloSeccion">NUESTROS ANIMALES</h1>
            <h2 class="parrafoSeccion">En nuestro zoológico, albergamos una fascinante variedad de especies. Conoce a nuestros majestuosos mamíferos, coloridas aves, reptiles exóticos, y especies en peligro de extinción.</h2>
            <button class="botonGlobal" onclick="window.location.href='<?= base_url('boletos') ?>'">
    <h2 class="TextoBotonGlobal">COMPRAR BOLETOS</h2>
</button>
        </div>
    </div>

    <div class="seccionBusqueda"> 
    <div class="container h-100 eliminarpadding">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="" placeholder="Buscar">
          <a href="" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
    </div>

        <div class="BotonesCategorias">
        <button class="botonesDentro"><h4 class="infoBotonDentro">TODOS</h4></button>
        <button class="botonesDentro"><h4 class="infoBotonDentro">REPTILES</h4></button>
        <button class="botonesDentro"><h4 class="infoBotonDentro">MAMÍFEROS</h4></button>
        <button class="botonesDentro"><h4 class="infoBotonDentro">PSITÁCIDOS</h4></button>

        </div>
    </div>

    <div class="seccionAnimal1">
            <?php 
            if (!empty($animales)) {
                $contador = 0;
                foreach ($animales as $animal) {
                    

                
                    $id_animal = $animal['id_animal'];
                    $nombre_animal = $animal['nombre_animal'];
                    $nombre_comun_animal = $animal['nombre_comun_animal'];
                    $nombre_cientifico = $animal['nombre_cientifico_animal'];
                    $familia_orden_animal= $animal['familia_orden_animal'];
                    $habitat_animal= $animal['habitat_animal'];
                    $alimentacion_animal= $animal['alimentacion_animal'];
                    $esperanza_vida_animal= $animal['esperanza_vida_animal'];
                    $descripcion = $animal['descripcion_animal'];
                    $imagen = base_url($animal['imagen_animal']); 
                    $clasificacion = $animal['nombre_clasificacion'];

                  
                    $claseCarta = 'animalCarta';
                    $botonClase = 'bottonCarta';
                    $clasificacionCarta = 'ClasificacionCarta';
                    $clasificacionModal = 'modalAbierto1';

                    if ($clasificacion == 'Mamíferos') {
                        $claseCarta = 'animalCarta';
                        $botonClase = 'bottonCarta';
                        $clasificacionCarta = 'ClasificacionCarta';
                        $clasificacionModal = 'modalAbierto1';
                    } elseif ($clasificacion == 'Reptiles') {
                        $claseCarta = 'animalCarta2';
                        $botonClase = 'bottonCarta2';
                        $clasificacionCarta = 'ClasificacionCarta2';
                        $clasificacionModal = 'modalAbierto2';
                    } elseif ($clasificacion == 'Psitácidos') {
                        $claseCarta = 'animalCarta3';
                        $botonClase = 'bottonCarta3';
                        $clasificacionCarta = 'ClasificacionCarta3';
                        $clasificacionModal = 'modalAbierto3';
                    }

                    
                    echo '<div class="' . $claseCarta . '">';
                    echo '  <div class="seccionAnimalInfo">';
                    echo '      <div class="seccionAnimalInfoAdentro">';
                    echo '          <img src="' . $imagen . '" alt="' . $nombre_comun_animal . '" class="imgSeccionAnimalCarta">';
                    echo '          <div class="infoTextoCarta">';
                    echo '              <h3 class="' . $clasificacionCarta . '">' . $clasificacion . '</h3>';
                    echo '              <h2 class="tituloCarta">' . $nombre_comun_animal . '</h2>';
                    echo '              <p class="descripcionCarta">' . $descripcion . '</p>';
                    echo '          </div>';
                    echo '          <div class="linea"></div>';
                    echo '          <button class="' . $botonClase . '" data-id="' . $id_animal . '"><h3 class="ContenidoBoton">Leer más</h3></button>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';

                    $contador++;
                }
                echo '</div>';
            } else {
                echo "No se encontraron animales.";
            }
            ?>
</div>



    <div class="botonFinal">           
    <button class="botonGlobal" onclick="window.location.href='<?= base_url('boletos') ?>'">
    <h2 class="TextoBotonGlobal">COMPRAR BOLETOS</h2>
</button>
    </div>

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
          <img src="<?= base_url('assets/imagenes/logo.webp') ?>" alt="Logo" class="footer-logo">
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
      <img src="<?= base_url('assets/imagenes/logo.webp') ?>" alt="Logo Zoolandia">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
   $(document).ready(function () {
    const openModalButton = document.querySelectorAll('.bottonCarta, .bottonCarta2, .bottonCarta3');
    const closeModalButton = document.getElementById('closeModalButton');
    const modal = document.getElementById('modal');
    const overlay = document.getElementById('overlay');

    window.addEventListener('load', () => {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    });

    openModalButton.forEach(button => {
        button.addEventListener('click', function () {
            const id = $(this).data('id');
            if (!id) {
                alert("Error: ID del animal no encontrado.");
                return;
            }

            $.post("<?= base_url('animales') ?>", { id: id }, function (response) {
                try {
                    const animal = JSON.parse(response);
                    if (animal.error) {
                        alert(animal.error);
                        return;
                    }

                   
                    $("#nombre_animal").text("Nombre: " + animal.nombre_animal);
                    $("#nombre_comun_animal").text(animal.nombre_comun_animal);
                    $("#nombre_cientifico_animal").text(animal.nombre_cientifico_animal);
                    $("#familia_orden_animal").text(animal.familia_orden_animal);
                    $("#habitat_animal").text(animal.habitat_animal);
                    $("#alimentacion_animal").text(animal.alimentacion_animal);
                    $("#esperanza_vida_animal").text(animal.esperanza_vida_animal);
                    $("#estado_conservacion").text(animal.estado_conservacion);


                    
                    $("#modalImagenAnimal").attr("src", animal.imagen_animal);

                    
                    let modalClass = ''; 
                    
                    if (animal.nombre_clasificacion == 'Mamíferos') {
                        modalClass = 'modalAbierto'; 
                    } else if (animal.nombre_clasificacion == 'Reptiles') {
                        modalClass = 'modalAbierto2'; 
                    } else if (animal.nombre_clasificacion == 'Psitácidos') {
                        modalClass = 'modalAbierto3'; 
                    }

                    modal.className = modalClass;
                   
                    modal.style.display = 'flex';
                    overlay.style.display = 'block';
                } catch (error) {
                    alert("Error al cargar los detalles del animal.");
                }



                
            });
        });
    });

    
    closeModalButton.addEventListener('click', () => {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    });

  
    overlay.addEventListener('click', () => {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    });
});

$(".botonesDentro").on("click", function () {
    var clasificacion = $(this).text().toUpperCase().trim();

    $(".animalCarta, .animalCarta2, .animalCarta3").hide();

   
    if (clasificacion === "TODOS") {
        $(".animalCarta, .animalCarta2, .animalCarta3").show(); 
    } else {
        $(".animalCarta, .animalCarta2, .animalCarta3").each(function () {
            var animalClasificacion = $(this).find(".ClasificacionCarta, .ClasificacionCarta2, .ClasificacionCarta3").text().toUpperCase().trim();
            $(this).toggle(animalClasificacion === clasificacion); 
        });
    }

    
    $(".seccionAnimal1").removeClass('active'); 
    
    if (clasificacion === "TODOS") {
        $(".seccionAnimal1").addClass('active'); 
    } else {
       
        $("." + clasificacion).addClass('active');
    }
});


       
        $("#buscarInput").on("keyup", function () {
            var searchTerm = $(this).val().toLowerCase(); 
            $(".animalCarta, .animalCarta2, .animalCarta3").filter(function () {
                var nombreComun = $(this).find(".tituloCarta").text().toLowerCase();
                var descripcion = $(this).find(".descripcionCarta").text().toLowerCase();
                var clasificacion = $(this).find(".ClasificacionCarta, .ClasificacionCarta2, .ClasificacionCarta3").text().toLowerCase();
                $(this).toggle(
                    nombreComun.includes(searchTerm) ||
                    descripcion.includes(searchTerm) ||
                    clasificacion.includes(searchTerm)
                );
            });
        });

 
</script>

<script>
    $(document).ready(function () {
   
    $(".search_input").on("keyup", function () {
        var searchTerm = $(this).val().toLowerCase(); 

        $(".animalCarta, .animalCarta2, .animalCarta3").each(function () {
            var nombreComun = $(this).find(".tituloCarta").text().toLowerCase();
            var descripcion = $(this).find(".descripcionCarta").text().toLowerCase();
            var clasificacion = $(this).find(".ClasificacionCarta, .ClasificacionCarta2, .ClasificacionCarta3").text().toLowerCase();

           
            if (nombreComun.includes(searchTerm) || descripcion.includes(searchTerm) || clasificacion.includes(searchTerm)) {
                $(this).show(); 
            } else {
                $(this).hide(); 
            }
        });
    });

    $(".botonesDentro").on("click", function () {
        var clasificacion = $(this).text().toUpperCase().trim(); 

        $(".animalCarta, .animalCarta2, .animalCarta3").each(function () {
            var animalClasificacion = $(this).find(".ClasificacionCarta, .ClasificacionCarta2, .ClasificacionCarta3").text().toUpperCase().trim();
            if (clasificacion === "TODOS" || animalClasificacion === clasificacion) {
                $(this).show(); 
            } else {
                $(this).hide(); 
            }
        });
    });
});




</script>

</body>
</html>
