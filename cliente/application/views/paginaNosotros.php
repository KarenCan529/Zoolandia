<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>

    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/SeccionNosotros.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/footer.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Navbar.css') ?>">

</head>
<body>
<?php include 'Navbar.php'; ?>
    <header class="bg-image">
        <div class="donar">
            <h1 class="titulo-dona">"EXPLORA NUESTRO MUNDO"</h1>
            <h2 class="sub-dona">En Zoolandia, nos dedicamos a la conservación de la fauna y la educación ambiental, creando
            experiencias inolvidables para conectar a las personas con la naturaleza.</h2>
        </div>
    </header>

    <div class="SeparadorSeccion">
        <section class="about-us-section">
            <div class="container">
                <h2>¿Quiénes somos?</h2>
                <div class="about-us-content">
                    <div class="about-us-text">

                        <p>En Zoolandía, somos un equipo apasionado y comprometido con la conservación, el bienestar animal
                            y la educación ambiental. Hemos trabajado incansablemente para crear un lugar donde las personas 
                            puedan aprender sobre la vida salvaje, la naturaleza y comprender la importancia de proteger nuestro planeta.</p>
    
                        <p> Nuestro equipo está compuesto por biólogos, veterinarios, cuidadores de animales, educadores y
                            expertos en conservación, todos unidos por una causa común: cuidar de los animales y su
                            hábitat. Cada miembro de nuestro zoológico trabaja con dedicación para ofrecer a nuestros visitantes una
                            experiencia única.</p>
    
                        <p>Nos enorgullece ser más que un zoológico. Somos un centro de conservación, donde nuestras
                            acciones están orientadas a la protección de especies en peligro de extinción, la rehabilitación
                            de animales rescatados y la educación para promover un futuro sostenible.
                            A través de programas educativos, actividades e investigaciones buscamos inspirar a nuestra
                            comunidad a tomar acción por el medio ambiente.</p>
                    </div>
                    <div class="about-us-img">
                        <img class="Animal-Pantera" src="<?= base_url('assets/imagenes/puma.webp') ?>" alt="Sobre Nosotros">
                        <img class="Animal-Chita" src="<?= base_url('assets/imagenes/Chita.webp') ?>" alt="Sobre Nosotros">
                    </div>
                </div>
            </div>
        </section>

        <section class="mission-vision-section">
            <div class="container">
                <h3>Nuestra Misión y Visión</h3>
                <div class="mission-vision-content">
                    <div>
                        <h4>Misión</h4>
                        <p>Nuestra misión es proteger y conservar la biodiversidad mediante la creación de un espacio donde los visitantes puedan aprender, interactuar y conectarse con la vida salvaje. Nos dedicamos al bienestar de los animales, el rescate de especies en peligro y la promoción de la educación ambiental para inspirar a las futuras generaciones a cuidar del planeta y sus habitantes.</p>
                    </div>
                    <div>
                        <h4>Visión</h4>
                        <p>Ser un referente global en la conservación de la fauna y la educación ambiental, promoviendo un futuro donde los ecosistemas prosperen y las especies vivan en armonía con la humanidad. Aspiramos a ser un zoológico líder en innovación, cuidado animal y sostenibilidad, creando un impacto positivo en la vida de los animales y las personas alrededor del mundo.</p>
                    </div>
                </div>
            </div>
        </section>

    <div class="container2">
        <div class="card">
        <img src="<?= base_url('assets/imagenes/serpi.webp') ?>" alt="Sobre Nosotros">
            <div class="overlay">
                <h3>! Una educación ambiental¡</h3>
                <p> Fomentamos el respeto y la comprensión del equilibrio natural.</p>
            </div>
        </div>
        <div class="card">
        <img src="<?= base_url('assets/imagenes/guacamayo.webp') ?>" alt="Sobre Nosotros">
            <div class="overlay">
                <h3>! Los coolores de la naturaleza¡</h3>
                <p> Nos inspiramos a conservar la biodiversidad y crear un futuro sostenible para todas las especies.</p>
            </div>
        </div>
        <div class="card">
        <img src="<?= base_url('assets/imagenes/tortugaa.webp') ?>" alt="Sobre Nosotros">
            <div class="overlay">
                <h3>!Conservación a largo plazo¡</h3>
                <p>Trabajamos para asegurar la supervivencia de las especies y preservar nuestros ecosistemas.</p>
            </div>
        </div>
        <div class="card">
        <img src="<?= base_url('assets/imagenes/venado.webp') ?>" alt="Sobre Nosotros">
            <div class="overlay">
                <h3>!Un refugio natural¡</h3>
                <p> Creemos en brindar un hábitat seguro que promueva el bienestar y la conservación.</p>
            </div>
        </div>
    </div>

</div>

        <section class="seccion">
            <div class="container-Ayudar">
                <h2>Apoya el Futuro de la Fauna</h2>
                <p>Tu visita y tu apoyo son vitales para que podamos seguir protegiendo las especies en peligro y educando a las futuras generaciones. ¡Compra tus boletos o haz una donación ahora!</p>
                <div class="botones">
                <button onclick="window.location.href='<?= base_url('boletos') ?>'" class="btn btn-primary">Compra boletos</button>
                 <button onclick="window.location.href='<?= base_url('donaciones') ?>'" class="btn btn-secondary">Haz una donación</button>
                </div>
                </div>
        </section>
  
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
<script src="assets/script/Carrucel-Nosotros.js"> </script>
<script src="assets/script/Donaciones.js"> </script>
</body>
</html>
