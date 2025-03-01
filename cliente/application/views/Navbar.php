<!doctype html>
<html lang="es">

<head>
    <title>Listado de Usuarios</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link href="/assets/jquery/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Navbar.css') ?>">


</head>
<body>

<nav>
    <div class="container">
        <div class="navbar">
            <a href="<?= base_url() ?>" class="logo">
                <img src="<?= base_url('assets/imagenes/logo.webp') ?>" alt="Logo">
            </a>
            <span class="zoolandia-text">Zoolandia</span>
            <button class="nav-btn"></button>
            <ul class="main-menu">
                <li><a href="<?= base_url("animales") ?>" class="<?= (current_url() == base_url('animales')) ? 'active' : '' ?>">ANIMALES</a></li>
                <li><a href="<?= base_url("boletos") ?>" class="<?= (current_url() == base_url('boletos')) ? 'active' : '' ?>">BOLETOS</a></li>
                <li><a href="<?= base_url("mapa") ?>" class="<?= (current_url() == base_url('mapa')) ? 'active' : '' ?>">MAPA</a></li>
                <li><a href="<?= base_url("donaciones") ?>" class="<?= (current_url() == base_url('donaciones')) ? 'active' : '' ?>">DONACIONES</a></li>
                <li><a href="<?= base_url("nosotros") ?>" class="<?= (current_url() == base_url('nosotros')) ? 'active' : '' ?>">NOSOTROS</a></li>
            </ul>
        </div>
    </div>
</nav>



    <script src="assets/script/Navbar.js"></script>

</body>
</html>