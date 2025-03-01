<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario administradores</title>
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
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php elseif ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

        <div class="container-fluid main-content">
            <div class="form-container">
                <div class="py-5 text-center">
                    <h2>Registro de Administradores</h2>
                </div>
                <div class="row g-5">
                    <div class="col-md-12">
                        <form class="needs-validation" method="POST" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre_administrador" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre_administrador" id="nombre_administrador" placeholder="Ingrese el nombre" required>
                                    <div class="invalid-feedback">Por favor, ingrese un nombre válido.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido_paterno_administrador" class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="apellido_paterno_administrador" id="apellido_paterno_administrador" placeholder="Ingrese el apellido paterno" required>
                                    <div class="invalid-feedback">Por favor, ingrese un apellido paterno válido.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido_materno_administrador" class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="apellido_materno_administrador" id="apellido_materno_administrador" placeholder="Ingrese el apellido materno" required>
                                    <div class="invalid-feedback">Por favor, ingrese un apellido materno válido.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="correo_administrador" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="correo_administrador" id="correo_administrador" placeholder="Ingrese el correo" required>
                                    <div class="invalid-feedback">Por favor, ingrese un correo válido.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_administrador" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password_administrador" id="password_administrador" placeholder="Ingrese una contraseña" required>
                                    <div class="invalid-feedback">Por favor, ingrese una contraseña.</div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="btn w-100 botonMandar">
                                Registrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<script>
(function () {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})();
</script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('content');
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        }
    </script>

</body>
</html>




