<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interfaz administrativo</title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css ') ?> ">
	<link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css2/sideBar.css') ?> ">

</head>

<body>
	<style>
		.card {
			border: none;
			box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
			border-radius: 12px;
			margin-bottom: 20px;
			background: #ffffff;
			transition: transform 0.3s ease;
		}

		.card:hover {
			transform: translateY(-5px);
		}

		.card-header {
			background-color: #8B7757;
			color: white;
			border-radius: 12px 12px 0 0;
			padding: 15px;
			font-size: 18px;
			font-weight: bold;
		}

		.card-body {
			padding: 20px;
		}


		.stat-icon {
			font-size: 40px;
			margin-right: 10px;
		}

		.chart-container {
			height: 250px;
			margin-top: 20px;
		}

		.table th,
		.table td {
			vertical-align: middle;
		}

		.table thead {
			background-color: #f8f9fa;
		}

		.card-body .table {
			margin-top: 10px;
		}


		.fa-bars {
			z-index: 9999;
		}

		@media (max-width: 768px) {
			.sidebar {
				width: 200px;
			}

			.content {
				margin-left: 0;
			}

			.card-body .table {
				font-size: 12px;
			}
		}
	</style>
	</head>

	<body>

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
					<li><a class="dropdown-item"
							href="<?= base_url('interfazAdministrativo/FormularioAdministradores') ?>">Nuevo
							administrador</a></li>
					<li><a class="dropdown-item"
							href="<?= base_url('interfazAdministrativo/baseAdministradores') ?>">Base
							administradores</a></li>
				</ul>
			</div>
			<div class="dropdown my-2">
				<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Boletos
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseBoletos') ?>">Base
							boletos</a></li>
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseComprador') ?>">Base
							informacion de comprador</a></li>
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseReservas') ?>">Base
							reservas</a></li>
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/basePaquetes') ?>">Base
							paquetes</a></li>
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseGuias') ?>">Base
							guías</a></li>
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseRutas') ?>">Base
							rutas</a></li>
				</ul>
			</div>
			<div class="dropdown my-2">
				<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Animales
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item"
							href="<?= base_url('interfazAdministrativo/FormularioAnimales') ?>">Nuevo Animal</a></li>
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseAnimales') ?>">Base
							animales</a></li>
				</ul>
			</div>
			<div class="dropdown my-2">
				<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Donaciones
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?= base_url('interfazAdministrativo/baseDonaciones') ?>">Base
							donaciones</a></li>
				</ul>
			</div>
			<a href="<?= base_url('Zoolandia/cerrarSesion') ?>" class="text-dark">Cerrar Sesión</a>
		</div>



		<?php

// 1. Consulta para boletos vendidos globalmente
$resultado_boletos_global = $this->Reporte_model->getBoletosVendidosGlobal();

// Verificar si hay un error
if (isset($resultado_boletos_global['error'])) {
    // Mostrar el error y detener la ejecución
    die("Error: " . $resultado_boletos_global['error']);
}

// Guardar los datos en variables con los mismos nombres
$adultos_global = $resultado_boletos_global['total_boletos_adultos'] ?? 0;
$niños_global = $resultado_boletos_global['total_boletos_ninos'] ?? 0;
$bebes_global = $resultado_boletos_global['total_boletos_ninos_menores_3'] ?? 0;
$total_boletos_global = $resultado_boletos_global['total_boletos_vendidos'] ?? 0;


// 2. Consulta de ingresos totales
$resultado_ingresos = $this->Reporte_model->getIngresosTotales();
if (isset($resultado_ingresos['error'])) {
    die("Error: " . $resultado_ingresos['error']);
}
$total_ingresos = $resultado_ingresos['total_ingresos'] ?? 0;
//se hizo un cambio en el html quitar el number converse a  echo $total_ingresos; 

// 3. Consulta de donaciones realizadas
$resultado_donaciones_realizadas = $this->Reporte_model->getDonacionesRealizadas();
if (isset($resultado_donaciones_realizadas['error'])) {
    die("Error: " . $resultado_donaciones_realizadas['error']);
}
$total_donaciones_realizadas = $resultado_donaciones_realizadas['total_donaciones'] ?? 0;


// 4. Consulta del total de dinero en donaciones
$resultado_total_donaciones = $this->Reporte_model->getTotalDonaciones();
if (isset($resultado_total_donaciones['error'])) {
    die("Error: " . $resultado_total_donaciones['error']);
}
$total_donaciones = $resultado_total_donaciones['total_donaciones'] ?? 0;


// 5. Consulta de recorridos más reservados
$resultado_recorridos = $this->Reporte_model->getRecorridosMasReservados();
if (isset($resultado_recorridos['error'])) {
    die("Error: " . $resultado_recorridos['error']);
}
$recorridos_reservados = $resultado_recorridos;


// 6. Consulta de paquetes más elegidos
$resultado_paquetes = $this->Reporte_model->getPaquetesMasElegidos();
if (isset($resultado_paquetes['error'])) {
    die("Error: " . $resultado_paquetes['error']);
}
$paquetes_comprados = $resultado_paquetes;


// 7. Consulta de promedio de donaciones
$resultado_promedio_donaciones = $this->Reporte_model->getPromedioDonaciones();
if (isset($resultado_promedio_donaciones['error'])) {
    die("Error: " . $resultado_promedio_donaciones['error']);
}
$promedio_donaciones = $resultado_promedio_donaciones['promedio_general_donaciones'] ?? 0;


// 8. Consulta de boletos vendidos por fecha (si se recibe la fecha)
$fecha = $this->input->post('fecha'); // Obtener la fecha desde el formulario
if ($fecha) {
    $resultado_boletos_fecha = $this->Reporte_model->getBoletosVendidosPorFecha($fecha);
    if (isset($resultado_boletos_fecha['error'])) {
        die("Error: " . $resultado_boletos_fecha['error']);
    }
    $boletos_vendidos_fecha = $resultado_boletos_fecha;
} else {
    $boletos_vendidos_fecha = null;  // Si no se ha proporcionado fecha, asignar null
}
// Variables para Boletos por Fecha
$adultos_fecha = $boletos_vendidos_fecha['total_boletos_adultos'] ?? 0;
$niños_fecha = $boletos_vendidos_fecha['total_boletos_ninos'] ?? 0;
$bebes_fecha = $boletos_vendidos_fecha['total_boletos_ninos_menores_3'] ?? 0;
$total_boletos_fecha = $boletos_vendidos_fecha['total_boletos_vendidos'] ?? 0;
?>



		<!-- Main Content -->
		<div class="content" id="content">
			<div class="container-fluid">
				<div class="row">
					<!-- Estadísticas -->
					<div class="col-md-3">
						<div class="card text-white bg-primary">
							<div class="card-header">
								<i class="fa fa-users stat-icon"></i> Boletos vendidos
							</div>
							<div class="card-body">
								<table class="table table-bordered"
									style="font-size: 13px; margin-bottom: 0; border-collapse: collapse;">
									<thead>
										<tr>
											<th>Adulto</th>
											<th>Niño</th>
											<th>Bebé</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="background-color: transparent; padding: 5px;">
												<?php echo $adultos_global; ?>
											</td> <!-- Adulto -->
											<td style="background-color: transparent; padding: 5px;">
												<?php echo $niños_global; ?>
											</td> <!-- Niño -->
											<td style="background-color: transparent; padding: 5px;">
												<?php echo $bebes_global; ?>
											</td> <!-- Bebé -->
											<td style="background-color: transparent; padding: 5px;">
												<?php echo $total_boletos_global; ?>
											</td> <!-- Total -->
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card text-white bg-success">
							<div class="card-header">
								<i class="fa fa-dollar stat-icon"></i> Ingresos
							</div>
							<div class="card-body">
								<h3>$
									<?php echo $total_ingresos; ?>
								</h3> <!-- Ingresos -->
								<p>Ingresos netos</p>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card text-white bg-warning">
							<div class="card-header">
								<i class="fa fa-users stat-icon"></i> Donaciones
							</div>
							<div class="card-body">
								<h3>
									<?php echo  $total_donaciones_realizadas ?>
								</h3> <!-- Donaciones -->
								<p>Últimos 12 meses</p>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card text-white bg-danger">
							<div class="card-header">
								<i class="fa fa-dollar stat-icon"></i> Total de donaciones
							</div>
							<div class="card-body">
								<h3>$
									<?php echo $total_donaciones; ?>
								</h3> <!-- Total de donaciones -->
								<p>Últimos 12 meses</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Mis reportes -->
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header text-center">
								Reportes
							</div>
							<div class="card-body">
								<div class="row">
									<!-- Reporte 1: Recorridos más reservados -->
									<div class="col-12 mb-4">
										<div class="card">
											<div class="card-header">
												Recorridos más reservados
											</div>
											<div class="card-body">
												<table class="table table-bordered" style="font-size: 13px;">
													<thead>
														<tr>
															<th>Ruta</th>
															<th>Total de Reservas</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($recorridos_reservados as $recorrido) { ?>
														<tr>
															<td>
																<?php echo $recorrido['nombre_ruta']; ?>
															</td>
															<td>
																<?php echo $recorrido['total_reservas']; ?>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- Reporte 2: Paquetes más elegidos -->
									<div class="col-12 mb-4">
										<div class="card">
											<div class="card-header">
												Paquetes más elegidos
											</div>
											<div class="card-body">
												<table class="table table-bordered" style="font-size: 13px;">
													<thead>
														<tr>
															<th>Paquete</th>
															<th>Total de Compras</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($paquetes_comprados as $paquete) { ?>
														<tr>
															<td>
																<?php echo $paquete['nombre_paquete']; ?>
															</td>
															<td>
																<?php echo $paquete['total_compras']; ?>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!-- Reporte 3: Donación promedio -->
									<div class="col-12">
										<div class="card">
											<div class="card-header">
												Donación promedio
											</div>
											<div class="card-body">
												<table class="table table-bordered" style="font-size: 13px;">
													<thead>
														<tr>
															<th>Promedio de Donación</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<?php echo $promedio_donaciones; ?>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div> <!-- Fin del row para los reportes -->
							</div>
						</div>
					</div>

					<!-- AQUI LA FECHA QUE COLOQUE SE DEBE MANDAR AL CONTROLADOR PARA ACTUALIZAR LA TABLA -->
					<!-- AQUI LA FECHA QUE COLOQUE SE DEBE MANDAR AL CONTROLADOR PARA ACTUALIZAR LA TABLA -->
					<div class="col-md-4">
						<div class="card">
							<form action="" method="POST">
								<div class="card-header">
									Boletos vendidos el
									<!-- Aquí se muestra el campo de la fecha con el valor de la variable PHP -->
									<input type="date" class="form-control" id="fecha_venta" name="fecha"
										style="display: inline-block; width: auto; margin-left: 10px;"
										value="<?php echo $fecha; ?>">
								</div>
								<div class="text-center" style="margin-top: 10px;">
									<!-- Botón para enviar el formulario -->
									<input type="submit" value="Consultar" class="btn btn-primary">
								</div>
							</form>
							<div class="card-body">
								<!-- Tabla que muestra los boletos vendidos según la fecha seleccionada -->
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Adulto</th>
											<th>Niño</th>
											<th>Bebé</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<?php echo $adultos_fecha; ?>
											</td> <!-- Adulto -->
											<td>
												<?php echo $niños_fecha; ?>
											</td> <!-- Niño -->
											<td>
												<?php echo $bebes_fecha; ?>
											</td> <!-- Bebé -->
											<td>
												<?php echo $total_boletos_fecha; ?>
											</td> <!-- Total -->
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




		<!-- Scripts de Bootstrap y FontAwesome -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script>
			// Función para abrir y cerrar el sidebar
			function toggleSidebar() {
				var sidebar = document.getElementById('sidebar');
				var content = document.getElementById('content');
				sidebar.classList.toggle('collapsed');
				content.classList.toggle('collapsed');
			}

			// Configuración del gráfico
			var ctx = document.getElementById('chart1').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
					datasets: [{
						label: 'Ingresos',
						data: [1000, 1500, 1200, 1800, 1300],
						borderColor: 'rgba(0, 123, 255, 1)',
						backgroundColor: 'rgba(0, 123, 255, 0.2)',
						fill: true,
					}]
				}
			});
		</script>
	</body>

</html>