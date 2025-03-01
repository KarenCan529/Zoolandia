
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SECCION BOLETOS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css2/Seccion_boletos.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css2/Navbar.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css2/Footer.css') ?>">


</head>
<body>
<?php include 'Navbar.php'; ?>
  <header class="header">
    <div class="overlay"></div>

    <div class="content">
      <h1>TUS ENTRADAS A LA EXPERIENCIA</h1>
      <h2>Explora los diferentes paquetes y elige el que más te convenga para disfrutar de una experiencia única.</h2>
    </div>
  </header>
  <div class="SeparadorSeccion">
    <div class="container">
      <h2 class="text-center">¡Haz que tu experiencia en Zoolandia sea aún más fácil!</h2>
      <h3 class="text-sub">¿Aún no decides el día perfecto para tu aventura? ¡No te preocupes! Podrás ajustar tu visita a Zoolandia sin cargos extras.</h3>

      <div class="row Paquetes">
       
        <div class="col-md-4">
          <div class="card paquete-card">
            <h2 class="card-title">ZOOMAX</h2>
            <img src="<?= base_url('assets/imagenes/zoomax2.webp') ?>" class="card-img-top" alt="Paquete A">
            <div class="card-body">
              <h5 class="card-text1">El Paquete Zoomax incluye acceso a las atracciones principales y con rutas guiadas (aunque tienen un costo adicional) </h5>
              <h5 class="card-text"><strong>Adultos:</strong> $150</h5>
              <h5 class="card-text"><strong>Niños(3-12):</strong> $80</h5>
              <h5 class="card-text"><strong>Menores de 3 años:</strong> Gratis</h5>
            </div>
            <a href="<?= base_url('reservas?paquete=Zoomax') ?>" class="elegir-paquete" data-paquete="Zoomax">Elegir</a>
            <p class="text-muted leyenda">Una ruta por paquete: costo adicional $100</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card paquete-card">
            <h2 class="card-title">BESTIAL</h2>
            <img src="<?= base_url('assets/imagenes/bestial2.webp') ?>" class="card-img-top" alt="Paquete B">
            <div class="card-body">
              <h5 class="card-text1">El Paquete Bestial incluye acceso a todas las atracciones y beneficios especiales,aunque las rutas guiadas tienen un costo adicional.</h5>
              <h5 class="card-text"><strong>Adultos:</strong> $250</h5>
              <h5 class="card-text"><strong>Niños(3-12):</strong> $130</h5>
              <h5 class="card-text"><strong>Menores de 3 años:</strong> Gratis</h5>
            </div>
            <a href="<?= base_url('reservas?paquete=Bestial') ?>" class="elegir-paquete" data-paquete="Bestial">Elegir</a>
            <p class="text-muted leyenda">Una ruta por paquete: costo adicional $100</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card paquete-card">
            <h2 class="card-title">VIP</h2>
            <img src="<?= base_url('assets/imagenes/vip2.webp') ?>" class="card-img-top" alt="Paquete C">
            <div class="card-body">
              <h5 class="card-text1">El paquete VIP incluye interacción exclusiva con los animales y recorrido guiado personalizado.¡Una experiencia inolvidable!</h5>
              <h5 class="card-text"><strong>Adultos:</strong> $350</h5>
              <h5 class="card-text"><strong>Niños(3-12):</strong> $200</h5>
              <h5 class="card-text"><strong>Menores de 3 años:</strong> Gratis</h5>
  
            </div>
            
              <a href="<?= base_url('reservas?paquete=VIP') ?>" class="elegir-paquete" data-paquete="VIP">Elegir</a>
              <p class="text-muted leyenda">Una ruta por paquete: costo adicional $0</p>
            </div>
          </div>
        </div>
      </div> 
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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src=" <?= base_url('assets/script/JsSeccionBoletos.css') ?>"></script>
  <script src="JsNav.js"></script>
</body>
</html>
