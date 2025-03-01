<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donaciones</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/SeccionDonaciones.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/footer.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Navbar.css') ?>">
</head>
<body>
<?php include 'Navbar.php'; ?>
  <header class="header">
    <div class="overlay"></div>
    <div class="content">
      <h1 class="TituloDonacion">¡DONA A LOS ANIMALES, SALVA VIDAS!</h1>
      <h2 class="Descripcion-Donacion">Tu aporte ayuda a proteger y cuidar a nuestros animales, garantizando su bienestar y conservación.</h2>
    </div>
  </header>

  <section class="donations-section">
  <div class="SeparadorSeccion">
    <div class="donations-content">
      <h2>Las donaciones marcan la diferencia</h2>
      <p>Somos un zoológico que salvaguarda la vida de animales en peligro de extinción, aquellos en malas condiciones y afectados por la pérdida de su hábitat. Por ello, una donación de los amables amantes de la naturaleza y los animales es siempre bien recibida.<br><br>
Lee más para entender lo que hacemos por los animales silvestres en peligro de extinción y amenazados en ZOOLANDIA, y descubre a dónde van tus donaciones de vida silvestre, además de cómo donar a nuestro santuario de vida silvestre en línea ahora. Tu apoyo nos permite continuar con nuestra labor de conservación, asegurando que más especies reciban atención, cuidados y la oportunidad de sobrevivir.<br><br>
Además, al hacer tu donación, te conviertes en un aliado fundamental en la protección de la biodiversidad. Cada contribución, por pequeña que sea, tiene un impacto directo en los programas de rehabilitación y conservación de especies. Gracias a tu generosidad, podemos seguir adelante con nuestro compromiso de ofrecer un futuro más seguro para los animales que más lo necesitan.


      </p>
    </div>
    </div>
  </section>

  <section class="donations-info">
  <div class="SeparadorSeccion">
    <div class="content">
        <div class="text">
            <h2>¿A dónde van a parar sus donaciones?</h2>
            <p>
                La inmensa mayoría de sus donaciones se destinan a alimentar a nuestros animales y a proporcionarles 
                atención veterinaria de urgencia. La otra parte en mantener sus espacios de estar en las mejores 
                condiciones posibles.<br><br>
                Además, tus donaciones nos permiten desarrollar programas educativos y actividades para concienciar 
                a la comunidad, inspirando a las personas a cuidar y respetar la vida silvestre.
            </p>
        </div>
        <div class="image">
            <img src="<?= base_url('assets/imagenes/imagen1.webp') ?>" alt="Frasco de donaciones">
        </div>
    </div>
    </div>
    </section>

    <section class="wildlife-section">
    <div class="SeparadorSeccion">
      <div class="images-container">
            <div class="card">
                <img src="<?= base_url('assets/imagenes/Curando.webp') ?>" alt="Veterinario atendiendo a un ocelote">
            </div>
            <div class="card">
                <img src="<?= base_url('assets/imagenes/Protegiendo.webp') ?>" alt="Rescate de un mono">
            </div>
            <div class="card">
                <img src="<?= base_url('assets/imagenes/Liberando.webp') ?>" alt="Cuidando animales">
            </div>
            <div class="card">
                <img src="<?= base_url('assets/imagenes/Salvando.webp') ?>" alt="Salvando especies">
            </div>
            <div class="card">
                <img src="<?= base_url('assets/imagenes/Conociendo.webp') ?>" alt="Conociendo animales">
            </div>
            <div class="card">
                <img src="<?= base_url('assets/imagenes/Alimentando.webp') ?>" alt="Alimentando animales">
            </div>
        </div>       
        <div class="text-container">
          <p>
            "Los animales salvajes enfrentan enormes desafíos cada día, desde lesiones provocadas por la caza furtiva 
            hasta la destrucción de sus hábitats. Sin embargo, con tu ayuda, podemos ofrecerles una segunda oportunidad. 
            Cada donación que realizas va directamente a programas de rehabilitación y cuidado, ayudando a sanar a aquellos 
            que necesitan tratamiento urgente. Tu generosidad no solo contribuye a la recuperación de estos animales, 
            sino que también juega un papel fundamental en la conservación de nuestras especies más vulnerables. Con tu apoyo, 
            estamos más cerca de devolverles la libertad y la salud que merecen. ¡Haz la diferencia hoy y ayuda a sanar a los 
            animales salvajes que tanto lo necesitan!"
          </p>
          </div>
          </div>
      </section>

<div class="donation-container">
    
<section class="donation-form">
      <!-- Cambié el formulario para usar el método POST y acción 'procesar_donacion' -->
      <form id="donationForm" method="POST" action="<?php echo site_url('Zoolandia/procesar_donacion'); ?>">
      <fieldset class="form-section">
          <legend>Información personal</legend>
          <input type="text" name="nombre" placeholder="Nombre" required>
          <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" required>
          <input type="text" name="apellido_materno" placeholder="Apellido Materno" required>
          <input type="email" name="correo" placeholder="Correo Electrónico" required>
        </fieldset>

        <fieldset class="form-section">
          <legend>Monto de la donación</legend>
          <select name="monto" required>
            <option value="50">$50</option>
            <option value="100">$100</option>
            <option value="200">$200</option>
            <option value="500">$500</option>
            <option value="1000">$1000</option>
          </select>
        </fieldset>

        <fieldset class="form-section">
          <legend>Datos de la tarjeta</legend>
          <input type="text" name="numero_tarjeta" placeholder="Número de la tarjeta" required>
          <select name="tipo_tarjeta" required>
            <option value="credito">Crédito</option>
            <option value="debito">Débito</option>
          </select>
          <div class="card-details">
            <select name="mes" required>
              <option value="">Mes</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <select name="anio" required>
              <option value="">Año</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
            </select>
            <input type="text" name="cvv" placeholder="CVV" maxlength="4" required>
          </div>
        </fieldset>
        <button type="submit">Donar ahora</button>
      </form>
    </section>
</div> 

<div id="loading"
        style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 20px; border-radius: 5px;">
        Un momento, se esta procesando su pago.
</div>

<div class="botones">
    <button onclick="window.location.href='<?= base_url('nosotros') ?>'" class="btn btn-primary">Sobre Nosotros</button>
</div>

  
<div class="Footer-Desktop">
<footer class="custom-footer">
    <div class="SeparadorSeccion">
      <div class="row align-items-center">
        <!-- Información de contacto -->
        <div class="Contactos col-md-4 mb-4 mb-md-0">
          <h5>Información de Contacto:</h5>
          <p>
            <i class="fas fa-phone"></i>+52 984 434 9461
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
<script src="assets/script/jsDonaciones.js"> </script>

</body>
</html>
