<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de paquetes</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/sideBar.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <!-- Contenido principal -->
    <div class="content" id="content">
        <div class="container-fluid">
            <div class="table-container">
                <h2>Base de paquetes</h2>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre del paquete</th>
                          <th scope="col">Precio adulto</th>
                          <th scope="col">Precio niño</th>
                          <th scope="col">Incluye tour</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($paquete)) { ?>
                            <?php foreach ($paquete as $fila) { ?>
                                <tr>
                                    <td><?php echo $fila['id_paquete']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_paquete']; ?>" data-field="nombre_paquete"><?php echo $fila['nombre_paquete']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_paquete']; ?>" data-field="precio_adulto"><?php echo $fila['precio_adulto']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_paquete']; ?>" data-field="precio_nino"><?php echo $fila['precio_nino']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_paquete']; ?>" data-field="incluye_tour"><?php echo $fila['incluye_tour']; ?></td>
                                    <td>
                                        <button class="btn btn-primary edit-btn" data-id="<?= $fila['id_paquete']; ?>">Editar</button>
                                        <button class="btn btn-success save-btn" data-id="<?= $fila['id_paquete']; ?>" style="display: none;">Guardar</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay paquetes disponibles</td>
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
    $(document).ready(function () {
        $('.edit-btn').click(function() {
            var row = $(this).closest('tr');
            row.find('td.editable').attr('contenteditable', 'true').addClass('editando');
            $(this).hide();
            row.find('.save-btn').show();
        });

        $('.save-btn').click(function() {
            var id_paquete = $(this).data('id');
            var row = $(this).closest('tr');

            var data = {
                id_paquete: id_paquete,
                nombre_paquete: row.find('[data-field="nombre_paquete"]').text(),
                precio_adulto: row.find('[data-field="precio_adulto"]').text(),
                precio_nino: row.find('[data-field="precio_nino"]').text(),
                incluye_tour: row.find('[data-field="incluye_tour"]').text()
            };

            $.ajax({
                url: '<?= base_url('interfazAdministrativo/actualizarPaquete') ?>',
                method: 'POST',
                data: data,
                success: function(response) {
                    alert('Datos actualizados correctamente');

                    // Bloquear la edición y restablecer botones
                    row.find('td.editable').attr('contenteditable', 'false').removeClass('editando');
                    row.find('.save-btn').hide();
                    row.find('.edit-btn').show();
                },
                error: function() {
                    alert('Error al actualizar los datos');
                }
            });
        });
    });

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('content');
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
    }
</script>

</body>
</html>
