<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de boletos</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css ') ?> ">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/sideBar.css') ?> ">

</head>
<body>

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
                <h2>Base de boletos</h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Id compra</th>
                        <th scope="col">Boletos adultos</th>
                        <th scope="col">Boletos niños</th>
                        <th scope="col">Boletos niños menores de 3</th>
                        <th scope="col">Boleto total adultos</th>
                        <th scope="col">Boleto total niños</th>
                        <th scope="col">Boleto total niños menor  de 3</th>
                        <th scope="col">Boletos totales</th>
                        <th scope="col">id_reserva</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if (!empty($boletos)) { ?>
        <?php foreach ($boletos as $fila) { ?>
            <tr>
                <th scope="row">
                    <?php echo isset($fila['id_boleto']) ? $fila['id_boleto'] : 'No disponible'; ?>
                </th>
                <td><?php echo isset($fila['id_compra']) ? $fila['id_compra'] : 'No disponible'; ?></td>
                <td><?php echo isset($fila['boletos_adulto']) ? $fila['boletos_adulto'] : '0'; ?></td>
                <td><?php echo isset($fila['boletos_nino']) ? $fila['boletos_nino'] : '0'; ?></td>
                <td><?php echo isset($fila['boletos_nino_menor_3']) ? $fila['boletos_nino_menor_3'] : '0'; ?></td>
                <td><?php echo isset($fila['boleto_total_adulto']) ? $fila['boleto_total_adulto'] : '0'; ?></td>
                <td><?php echo isset($fila['boleto_total_nino']) ? $fila['boleto_total_nino'] : '0'; ?></td>
                <td><?php echo isset($fila['boleto_total_nino_menor_3']) ? $fila['boleto_total_nino_menor_3'] : '0'; ?></td>
                <td><?php echo isset($fila['boleto_total_general']) ? $fila['boleto_total_general'] : '0'; ?></td>
                <td><?php echo isset($fila['id_reserva']) ? $fila['id_reserva'] : 'No disponible'; ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="10" style="text-align: center;">No hay boletos registrados</td>
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
