<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de administradores</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css ') ?>">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/sideBar.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<style>
 .mi-boton-eliminar  {
    background-color:rgb(206, 67, 29);
    color: white;
    margin-top:10px;
    padding: 7px 6px;
    border-radius: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>

<main class="d-flex flex-nowrap">
<div class="menu-toggle" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="logo-container text-center">
            <img src="<?= base_url('/assets/imagenes/logo.webp') ?>" alt="Logo Zoolandia" class="logo">
            <h2 class="text-white mt-2">Zoolandia</h2>
        </div>
        <a href="<?= base_url('interfazAdministrativo') ?>">Inicio</a>
        <a href="<?= base_url('Zoolandia/cerrarSesion') ?>" class="text-dark">Cerrar Sesión</a>
    </div>

    <div class="content" id="content">
        <div class="container-fluid">
            <div class="table-container">
                <h2>Base de Administradores</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido paterno</th>
                            <th scope="col">Apellido materno</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($administradores)) { ?>
                            <?php foreach ($administradores as $fila) { ?>
                                <tr>
                                    <td><?php echo $fila['id_administrador']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_administrador']; ?>" data-field="nombre_administrador"><?php echo $fila['nombre_administrador']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_administrador']; ?>" data-field="apellido_paterno_administrador"><?php echo $fila['apellido_paterno_administrador']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_administrador']; ?>" data-field="apellido_materno_administrador"><?php echo $fila['apellido_materno_administrador']; ?></td>
                                    <td contenteditable="false" class="editable" data-id="<?= $fila['id_administrador']; ?>" data-field="correo_administrador"><?php echo $fila['correo_administrador']; ?></td>
                                    <td><?php echo $fila['password_administrador']; ?></td>
                                    <td>
                                        <button class="btn btn-primary edit-btn" data-id="<?= $fila['id_administrador']; ?>">Editar</button>
                                        <button class="btn btn-success save-btn" data-id="<?= $fila['id_administrador']; ?>" style="display: none;">Guardar</button>
                                        <a class="mi-boton-eliminar" href="<?= base_url('interfazAdministrativo/EliminarAdministrador/'. $fila['id_administrador']) ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este administrador?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">No hay administradores registrados.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <button class="btn w-100 botonMandar" onclick="window.location.href='<?= base_url('interfazAdministrativo/FormularioAdministradores') ?>';">
                    Añadir nuevo administrador
                </button>
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
            var id_administrador = $(this).data('id');
            var row = $(this).closest('tr');

            var data = {
                id_administrador: id_administrador,
                nombre_administrador: row.find('[data-field="nombre_administrador"]').text(),
                apellido_paterno_administrador: row.find('[data-field="apellido_paterno_administrador"]').text(),
                apellido_materno_administrador: row.find('[data-field="apellido_materno_administrador"]').text(),
                correo_administrador: row.find('[data-field="correo_administrador"]').text(),
                password_administrador: row.find('td').eq(5).text()
            };

            $.ajax({
                url: '<?= base_url('interfazAdministrativo/actualizarAdministrador') ?>',
                method: 'POST',
                data: data,
                success: function(response) {
                    alert('Datos actualizados correctamente');

                    // Bloquea la edición y restablece botones
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