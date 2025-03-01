<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de animales</title>
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
                    <h2>Registro de animales</h2>
                </div>
                <div class="row g-5">
                    <div class="col-md-12">
                    <form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                      <div class="row g-3">
                          <div class="col-md-6">
                              <label for="nombre_animal" class="form-label">Nombre del animal</label>
                              <input type="text" class="form-control" id="nombre_animal" name="nombre_animal" placeholder="Ingresa el nombre del animal" required>
                              <div class="invalid-feedback">Ingresar nombre del animal.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="nombre_comun_animal" class="form-label">Nombre Común</label>
                              <input type="text" class="form-control" id="nombre_comun_animal" name="nombre_comun_animal" placeholder="Ingresa el nombre común del animal" required>
                              <div class="invalid-feedback">Ingresar nombre común.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="nombre_cientifico_animal" class="form-label">Nombre Científico</label>
                              <input type="text" class="form-control" id="nombre_cientifico_animal" name="nombre_cientifico_animal" placeholder="Ingresa el nombre científico" required>
                              <div class="invalid-feedback">Ingresar nombre científico.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="id_clasificacion" class="form-label">Clasificación</label>
                              <select class="form-select" id="id_clasificacion" name="id_clasificacion" required>
                                  <option value="" selected disabled>Seleccione la clasificación</option>
                                  <option value="1">Reptiles</option>
                                  <option value="2">Mamíferos</option>
                                  <option value="3">Psitácidos</option>
                              </select>
                              <div class="invalid-feedback">Seleccione una clasificación.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="id_estado" class="form-label">Estado de Conservación</label>
                              <select class="form-select" id="id_estado" name="id_estado" required>
                                  <option value="" selected disabled>Seleccione el estado</option>
                                  <option value="1">Bajo riesgo</option>
                                  <option value="2">Vulnerable</option>
                                  <option value="3">En peligro de extinción</option>
                              </select>
                              <div class="invalid-feedback">Seleccione un estado de conservación.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="habitat_animal" class="form-label">Hábitat Natural</label>
                              <input type="text" class="form-control" id="habitat_animal" name="habitat_animal" placeholder="Ingresa el hábitat" required>
                              <div class="invalid-feedback">Ingresar hábitat natural.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="descripcion_animal" class="form-label">Descripción</label>
                              <input type="text" class="form-control" id="descripcion_animal" name="descripcion_animal" placeholder="Ingresa la descripción" required>
                              <div class="invalid-feedback">Ingresar descripción.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="familia_orden_animal" class="form-label">Familia y Orden</label>
                              <input type="text" class="form-control" id="familia_orden_animal" name="familia_orden_animal" placeholder="Ingresa familia y orden taxonómica" required>
                              <div class="invalid-feedback">Ingresar familia y orden.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="alimentacion_animal" class="form-label">Alimentación</label>
                              <input type="text" class="form-control" id="alimentacion_animal" name="alimentacion_animal" placeholder="Ingresa la alimentación" required>
                              <div class="invalid-feedback">Ingresar alimentación.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="esperanza_vida_animal" class="form-label">Esperanza de Vida</label>
                              <input type="text" class="form-control" id="esperanza_vida_animal" name="esperanza_vida_animal" placeholder="Ingresa la esperanza de vida" required>
                              <div class="invalid-feedback">Ingresar esperanza de vida.</div>
                          </div>
                          <div class="col-md-6">
                              <label for="imagen_animal" class="form-label">Imagen</label>
                              <input type="file" class="form-control" id="imagen_animal" name="imagen_animal" required>
                              <div class="invalid-feedback">Subir una imagen.</div>
                          </div>
                          <hr class="my-4">
                          <button class="btn w-100 botonMandar">
                                Registrar
                            </button>                      </div>
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