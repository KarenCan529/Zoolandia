<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de rutas</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/sideBar.css') ?>">
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
        <!-- Resto de las opciones del menú omitido para brevedad -->

        <a href="<?= base_url('Zoolandia/cerrarSesion') ?>" class="text-dark">Cerrar Sesión</a>
    </div>

    <!-- Contenido Principal -->
    <div class="content" id="content">
        <div class="container-fluid">
            <div class="table-container">
                <h2>Base de rutas</h2>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre de la ruta</th>
                          <th scope="col">Descripción ruta</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ruta)) { ?>
                            <?php foreach ($ruta as $fila) { ?>
                                <tr>
                                  <td><?php echo $fila['id_ruta']; ?></td>
                                  <td contenteditable="false"><?php echo $fila['nombre_ruta']; ?></td>
                                  <td contenteditable="false"><?php echo $fila['descripcion_ruta']; ?></td>
                                  <td>
                                      <button class="btn btn-primary" onclick="editarFila(this)">Editar</button>
                                      <button class="btn btn-success d-none" onclick="guardarFila(this, <?php echo $fila['id_ruta']; ?>)">Guardar</button>
                                  </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No hay rutas disponibles</td>
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

    // Habilitar edición de la fila
    function editarFila(btn) {
        var fila = btn.closest('tr');
        var celdas = fila.querySelectorAll('td[contenteditable]');
        celdas.forEach(function(celda) {
            celda.setAttribute('contenteditable', 'true');
            celda.style.backgroundColor = '#f0f0f0'; // Cambiar color de fondo para indicar que es editable
        });
        btn.classList.add('d-none'); // Ocultar botón de editar
        fila.querySelector('.btn-success').classList.remove('d-none'); // Mostrar botón de guardar
    }

    // Guardar cambios de la fila
    function guardarFila(btn, id_ruta) {
        var fila = btn.closest('tr');
        var nombre_ruta = fila.children[1].textContent;
        var descripcion_ruta = fila.children[2].textContent;

        // Enviar los datos a través de AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('interfazAdministrativo/actualizarRuta') ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('Ruta actualizada correctamente');
                fila.querySelectorAll('td[contenteditable]').forEach(function(celda) {
                    celda.setAttribute('contenteditable', 'false');
                    celda.style.backgroundColor = ''; // Restaurar el color de fondo original
                });
                btn.classList.add('d-none'); // Ocultar botón de guardar
                fila.querySelector('.btn-primary').classList.remove('d-none'); // Mostrar botón de editar
            }
        };
        xhr.send('id_ruta=' + id_ruta + '&nombre_ruta=' + encodeURIComponent(nombre_ruta) + '&descripcion_ruta=' + encodeURIComponent(descripcion_ruta));
    }
</script>

</body>
</html>
