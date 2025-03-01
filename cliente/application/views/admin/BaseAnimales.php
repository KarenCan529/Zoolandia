<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de administradores</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css ') ?> ">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    background: #FEFAE0;
}

/* Sidebar */
.sidebar {
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    background-color: rgba(139, 119, 87, 10); /* Transparente con fondo marrón */
    color: white;
    padding-top: 30px;
    transition: all 0.3s ease;
    border-right: 10px solid;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

.sidebar.collapsed {
    width: 60px;
    padding-top: 10px;
}

.sidebar.collapsed a {
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease-in-out;
}

.sidebar.collapsed .logo {
    visibility: hidden;
}

.sidebar.collapsed h2 {
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease-in-out;
}

.sidebar.collapsed .dropdown {
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s linear 0.2s, opacity 0.2s ease-in-out;
}

.sidebar.collapsed .dropdown-toggle {
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s ease-in-out;
}

.sidebar a {
    color: white;
    padding: 15px 20px;
    text-decoration: none;
    display: block;
    margin: 10px 0;
    border-radius: 5px;
    transition: 0.3s;
}

.sidebar a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: scale(1.05);
}

/* Botón del menú */
.menu-toggle {
    top: 20px;
    left: 20px;
    font-size: 30px;
    cursor: pointer;
    color: #ffffff;
    z-index: 9999;
    position: fixed;
}

/* Contenido */
.content {
    margin-left: 270px;
    padding: 20px;
    transition: all 0.3s ease;

}

.content.collapsed {
    margin-left: 60px;
}

/* Dropdown personalizado */
.dropdown-menu {
    min-width: 200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: none;
    border-radius: 8px;
}

.dropdown-menu .dropdown-item {
    padding: 10px 20px;
    color: #8B7757;
    transition: background-color 0.2s ease;
}

/* Dropdown toggle con opacidad 0 */
.dropdown-toggle {
    background-color: rgba(139, 119, 87, 0); /* Transparente */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    transition: background-color 0.3s ease, opacity 0.3s ease;
}

.dropdown-toggle:hover {
    background-color: rgba(139, 119, 87, 0.2); /* Suave color al pasar el ratón */
}

/* Tabla */
.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;  /* Espacio entre tablas */
    width: 100%;  /* Asegura que cada tabla ocupe el 100% de su contenedor */
}
.table-container h2 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
}

.table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
    background: #FEFAE0;
}

.table th, .table td {
    text-align: left;
    padding: 10px;
    border: 1px solid #dee2e6;
}

.table th {
    background-color: #8B7757;
    color: white;
}

.botonMandar {
    border: 2px solid #8B7757;
}

.botonMandar:hover {
    background-color: #8B7757;
    cursor: pointer;
}

.logo-container {
    margin-top: 20px;
}

.logo {
    width: 60px;
    height: 50px;
    border-radius: 50%;
}

.sidebar h4 {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
    padding: 0;
}


.table {
    table-layout: fixed;
    width: 100%;
    word-wrap: break-word;
}


/* Modificación en la tabla */
.table td, .table th {
    text-overflow: ellipsis; /* Muestra '...' cuando el texto se desborda */
    max-height: 20px; /* Limita el alto de las filas */
    overflow: hidden; /* Oculta cualquier contenido que sobrepase el límite */
    transition: all 0.3s ease; /* Transición suave para el cambio de altura */
}

.table tr:hover td, .table tr:hover th {
    max-height: none; /* Elimina el límite de altura al pasar el ratón */
    padding-top: 15px;  /* Agrega algo de espacio al pasar el ratón */
    padding-bottom: 15px;
}


</style>
<main class="d-flex flex-nowrap">

    <!-- Botón de menú -->
    <div class="menu-toggle" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo-container text-center">
            <img src="<?= base_url('/assets/imagenes/logo.webp') ?>" alt="Logo Zoolandia" class="logo">
            <h2 class="text-white mt-2">Zoolandia</h2>
        </div>
        <a href="<?= base_url('interfazAdministrativo') ?>">Inicio</a>
        <div class="dropdown my-2">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Administradores
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/FormularioAdministradores') ?>">Nuevo administrador</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseAdministradores') ?>">Base administradores</a></li>
            </ul>
        </div>
        <div class="dropdown my-2">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Boletos
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseBoletos') ?>">Base boletos</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseComprador') ?>">Base informacion de comprador</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseReservas') ?>">Base reservas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/basePaquetes') ?>">Base paquetes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseGuias') ?>">Base guías</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseRutas') ?>">Base rutas</a></li>
            </ul>
        </div>
        <div class="dropdown my-2">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Animales
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/FormularioAnimales') ?>">Nuevo Animal</a></li>
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseAnimales') ?>">Base animales</a></li>
            </ul>
        </div>
        <div class="dropdown my-2">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Donaciones
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseDonaciones') ?>">Base donaciones</a></li>
            </ul>
        </div>
        <a href="<?= base_url('Zoolandia/cerrarSesion') ?>" class="text-dark">Cerrar Sesión</a> 
    </div>

<div class="content" id="content">
        <div class="container-fluid">
            <div class="table-container">
                <h2>Base de animales</h2>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Nombre común</th>
                          <th scope="col">Nombre científico</th>
                          <th scope="col">Id clasificación</th>
                          <th scope="col">Id estado</th>
                          <th scope="col">Habitad natural</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Familia y orden</th>
                          <th scope="col">Alimentación</th>
                          <th scope="col">Esperazana de vida</th>
                          <th scope="col">Ruta imágen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($animal)) { ?>
                            <?php foreach ($animal as $fila) { ?>
                                <tr>
                                  <th scope="row"><?php echo $fila['id_animal']; ?></th>
                                  <td><?php echo $fila['nombre_animal']; ?></td>
                                  <td><?php echo $fila['nombre_comun_animal']; ?></td>
                                  <td><?php echo $fila['nombre_cientifico_animal']; ?></td>
                                  <td><?php echo $fila['id_clasificacion']; ?></td>
                                  <td><?php echo $fila['id_estado']; ?></td>
                                  <td><?php echo $fila['habitat_animal']; ?></td>
                                  <td><?php echo $fila['descripcion_animal']; ?></td>
                                  <td><?php echo $fila['familia_orden_animal']; ?></td>
                                  <td><?php echo $fila['alimentacion_animal']; ?></td>
                                  <td><?php echo $fila['esperanza_vida_animal']; ?></td>
                                  <td><?php echo $fila['imagen_animal']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay animales registrados.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
             
                <button class="btn w-100 botonMandar" onclick="window.location.href='<?= base_url('interfazAdministrativo/FormularioAdministradores') ?>';">
                    Añadir nuevo animal
                </button>

            </div>
        </div>
   


    

        <div class="container-fluid">
            <div class="table-container">
                <h2>Base clasificación</h2>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Taxionomía</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clasificacion)) { ?>
                            <?php foreach ($clasificacion as $fila2) { ?>
                                <tr>
                                  <th scope="row"><?php echo $fila2['id_clasificacion']; ?></th>
                                  <td><?php echo $fila2['nombre_clasificacion']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay clasificaciones.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    

    
        <div class="container-fluid">
            <div class="table-container">
                <h2>Base estados</h2>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Taxionomía</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($estado)) { ?>
                            <?php foreach ($estado as $fila3) { ?>
                                <tr>
                                  <th scope="row"><?php echo $fila3['id_estado']; ?></th>
                                  <td><?php echo $fila3['nombre_estado']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay estados.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>

    <?php if (isset($error)) { ?>
        <p style="color: red; text-align: center;"><?php echo $error; ?></p>
    <?php } ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Función para abrir y cerrar el sidebar
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('content');
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
    }
</script>

</body>
</html>
