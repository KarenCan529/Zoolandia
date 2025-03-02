<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de boletos</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css ') ?>">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/sideBar.css') ?>">
</head>
<body>
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
                <h2>Base de boletos</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Id compra</th>
                            <th>Boletos adultos</th>
                            <th>Boletos niños</th>
                            <th>Boletos niños menores de 3</th>
                            <th>Boleto total adultos</th>
                            <th>Boleto total niños</th>
                            <th>Boleto total niños menor de 3</th>
                            <th>Boletos totales</th>
                            <th>id_reserva</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($boletos)) { ?>
                            <?php foreach ($boletos as $fila) { ?>
                                <tr>
                                    <td><?php echo $fila['id_boleto']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['id_compra']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boletos_adulto']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boletos_nino']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boletos_nino_menor_3']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boleto_total_adulto']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boleto_total_nino']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boleto_total_nino_menor_3']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['boleto_total_general']; ?></td>
                                    <td contenteditable="false"><?php echo $fila['id_reserva']; ?></td>
                                    <td>
                                        <button class="btn btn-primary" onclick="editarFila(this)">Editar</button>
                                        <button class="btn btn-success d-none" onclick="guardarFila(this, <?php echo $fila['id_boleto']; ?>)">Guardar</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="11" style="text-align: center;">No hay boletos registrados</td>
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
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('content');
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
    }

    function editarFila(btn) {
        var fila = btn.closest('tr');
        var celdas = fila.querySelectorAll('td[contenteditable]');
        celdas.forEach(function(celda) {
            celda.setAttribute('contenteditable', 'true');
            celda.style.backgroundColor = '#f0f0f0';
        });
        btn.classList.add('d-none');
        fila.querySelector('.btn-success').classList.remove('d-none');
    }

    function guardarFila(btn, id) {
        var fila = btn.closest('tr');
        var celdas = fila.querySelectorAll('td[contenteditable]');
        var datos = {};
        var columnas = ['id_compra', 'boletos_adulto', 'boletos_nino', 'boletos_nino_menor_3', 'boleto_total_adulto', 'boleto_total_nino', 'boleto_total_nino_menor_3', 'boleto_total_general', 'id_reserva'];
        
        celdas.forEach(function(celda, index) {
            datos[columnas[index]] = celda.textContent;
            celda.setAttribute('contenteditable', 'false');
            celda.style.backgroundColor = '';
        });
        
        fetch('<?= base_url("interfazAdministrativo/actualizarBaseBoletos") ?>/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Registro actualizado correctamente');
            } else {
                alert('Error al actualizar');
            }
        })
        .catch(error => console.error('Error:', error));
        
        btn.classList.add('d-none');
        fila.querySelector('.btn-primary').classList.remove('d-none');
    }
</script>

</body>
</html>
