<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Zoolandia</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
       <link rel="stylesheet" href="<?= base_url('assets/css2/cssMapa.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/footer.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Navbar.css') ?>">

</head>

<body>
<?php include 'Navbar.php'; ?>
<div class="Mapa-Desktop">
    <div class="MapaContenedor">
                <img src="<?= base_url('assets/imagenes/mapa2.webp') ?>" alt="Mapa" class="ImagenMapa">
    </div>


    <div class="rutasMapa">
    <div class="container-fluid EliminarPading">          
            <div class="col-md-12 EliminarPading">
               <div class="rutas">
               <h1 class="rutasTitulo">Rutas</h1>
               <h4 class="parrafosRutas">1-Ruta maya (Jaguar, Mono aullador negro, Coati, Momoto cejaazul, Guacamayos, Tapir centroamericano)</h4>
               <h4 class="parrafosRutas">2-Ruta reptil (Boa, Cocodrilo, Tortuga casquito, Tortuga verde)</h4>
               <h4 class="parrafosRutas">3-Aventura tropical (Venado cola blanca, Tepezcuncle, Coati, Mono aullador)</h4>
               <h4 class="parrafosRutas">4-Aventura salvaje (Jaguar, Venado de cola blanca, Cocodrilo, Tepezcuncle)</h4>
               <h4 class="parrafosRutas">5-Aventura salvaje (Tortuga casquito, Venado de cola blanca, Tepezcuncle, Cocodrilo, Guacamayos)</h4>
               </div>
            </div>
        </div>
        <div class="botones">
        <button onclick="window.location.href='<?= base_url('boletos') ?>'" class="btn btn-primary">Comprar boletos</button>
        <button onclick="window.location.href='<?= base_url('donaciones') ?>'" class="btn btn-secondary">Haz una donación</button>
        </div>
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
</div>


<div class="Mapa-Movil">
    <div class="MapaContenedor-Movil">
        <div class="EliminarPading">          
            <div class="EliminarPading">
            <img src="<?= base_url('assets/imagenes/mapamobil2.webp') ?>" alt="Mapa" class="ImagenMapa">
            </div>
        </div>
    </div>

    <div class="direcciones-container">
    <button id="toggle-direcciones" class="vertical-button">DIRECCIONES</button>
    <div id="direcciones-panel" class="direcciones-panel">
        <button id="close-direcciones" class="close-btn">X</button>
        <h2>RUTAS</h2>
        <p>1: <strong>-Ruta maya (Jaguar, Mono aullador negro, Coati, Momoto cejaazul, Guacamayos, Tapir centroamericano)</strong></p>
        <p>2:  <strong>-Ruta reptil (Boa, Cocodrilo, Tortuga casquito, Tortuga verde)</strong></p>
        <p>3: <strong>-Aventura tropical (Venado cola blanca, Tepezcuncle, Coati, Mono aullador)</strong></p>
        <p>4: <strong>-Aventura salvaje (Jaguar, Venado de cola blanca, Cocodrilo, Tepezcuncle)</strong></p>
        <p>5: <strong>-Aventura salvaje (Tortuga casquito, Venado de cola blanca, Tepezcuncle, Cocodrilo, Guacamayos)</strong></p>
    </div>
    </div>

    <div class="botones">
        <button onclick="window.location.href='<?= base_url('boletos') ?>'" class="btn btn-primary">COMPRA BOLETOS</button>
        <button onclick="window.location.href='<?= base_url('donaciones') ?>'" class="btn btn-secondary">HAZ UNA DONACION</button>
    </div>
  </div>
  <script src="assets/script/Mapa.js"></script>
</body>
</html>
