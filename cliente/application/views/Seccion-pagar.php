<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/cssSeccionPagar.css') ?>">
</head>

<body>
    <?php
    // Obtener el paquete seleccionado desde la URL
    $paqueteSeleccionado = isset($_GET['paquete']) ? $_GET['paquete'] : 'Zoomax';  // Por defecto 'Zoomax'
    $preciosPaquete = [
        'Zoomax' => ['adulto' => 150, 'nino' => 80],
        'Bestial' => ['adulto' => 250, 'nino' => 130],
        'VIP' => ['adulto' => 350, 'nino' => 200]
    ];
    $precioAdulto = $preciosPaquete[$paqueteSeleccionado]['adulto'];
    $precioNino = $preciosPaquete[$paqueteSeleccionado]['nino'];
    ?>

    <div class="SeparadorSeccion">
        <div class="form-container">
            <legend>Formulario de Reserva</legend>
            <fieldset class="marco">
                <!-- Indicadores de los pasos -->
                <div class="steps-container">
                    <div class="step active" id="step-1">1</div>
                    <div class="step" id="step-2">2</div>
                    <div class="step" id="step-3">3</div>
                </div>
                <div class="section-separator"></div> <!-- Separador visual -->

                <!-- Cambié el formulario para usar el método POST -->
                <form id="formulario" method="POST" action="<?php echo site_url('Zoolandia/procesar_pago'); ?>">
                    <input type="hidden" name="paquete" value="<?php echo $paqueteSeleccionado; ?>">

                    <!-- Paso 1 -->

                    <div id="form-step-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="fecha" class="form-label">Fecha:</label>
                                    <input type="date" id="fecha" name="fecha" required onchange="actualizarHorario()">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="horario" class="form-label">Horario:</label>
                                    <select id="horario" name="horario" required>
                                        <option value="">Seleccione un horario</option>
                                        <!-- Aquí se agregarán las opciones dinámicamente -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <script>
                            function actualizarHorario() {
                                const fechaSeleccionada = document.getElementById('fecha').value;  // Formato YYYY-MM-DD
                                const horarioSelect = document.getElementById('horario');
                                horarioSelect.innerHTML = '<option value="">Seleccione un horario</option>';  // Limpiar opciones previas

                                if (fechaSeleccionada) {
                                    const fecha = new Date(fechaSeleccionada);  // Convertir al formato Date
                                    const diaSemana = fecha.getDay(); // 0 = Lunes, 1 = Martes, ..., 6 = Domingo
                                    console.log(diaSemana);  // Esto es solo para ver qué valor está tomando (ver en la consola)
                                    let horariosDisponibles = [];

                                    // Lunes a Viernes (días de la semana 0-4)
                                    if (diaSemana >= 0 && diaSemana <= 4) {
                                        horariosDisponibles = [
                                            '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM',
                                            '12:00 PM - 1:00 PM', '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM',
                                            '3:00 PM - 4:00 PM', '4:00 PM - 5:00 PM'
                                        ];
                                    } else if (diaSemana == 5) { // Sábado (día de la semana 5)
                                        horariosDisponibles = [
                                            '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM',
                                            '12:00 PM - 1:00 PM', '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM',
                                            '3:00 PM - 4:00 PM', '4:00 PM - 5:00 PM', '5:00 PM - 6:00 PM'
                                        ];
                                    } else if (diaSemana == 6) { // Domingo (día de la semana 6)
                                        horariosDisponibles = [
                                            '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 1:00 PM',
                                            '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM', '3:00 PM - 4:00 PM'
                                        ];
                                    }

                                    // Agregar los horarios al select
                                    horariosDisponibles.forEach(horario => {
                                        let option = document.createElement('option');
                                        option.value = horario;
                                        option.textContent = horario;
                                        horarioSelect.appendChild(option);
                                    });
                                }
                            }

                        </script>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label id="labelAdulto">Adulto: $
                                        <?php echo $precioAdulto; ?>
                                    </label>
                                    <input type="number" id="adultos" name="adultos" value="0" min="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label id="labelNino">Niño: $
                                        <?php echo $precioNino; ?>
                                    </label>
                                    <input type="number" id="ninos" name="ninos" value="0" min="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label>Niño(0-3 años) $0:</label>
                                    <input type="number" id="bebes" name="bebes" value="0" min="0">
                                </div>
                            </div>
                        </div>

                        <!-- nuevo -->
                        <div class="row align-items-center mb-3" id="rutaPregunta">
                            <div class="col-md-8">¿Desea agregar una de nuestras rutas guiadas?</div>
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rutaGuiada" id="rutaSi"
                                        value="si" />
                                    <label class="form-check-label" for="rutaSi">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rutaGuiada" id="rutaNo"
                                        value="no" checked />
                                    <label class="form-check-label" for="rutaNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 d-none" id="opcionesRuta">
                            <div class="col-md-12">
                                <label for="ruta" class="form-label">Elige una ruta:</label>
                                <select class="form-select" id="ruta" name="ruta">
                                    <option value="0">Seleccione una ruta</option>
                                    <option value="1">Ruta maya</option>
                                    <option value="2">Ruta reptil</option>
                                    <option value="3">Aventura tropical</option>
                                    <option value="4">Aventura salvaje</option>
                                    <option value="5">Ruta de reptiles y aves</option>
                                </select>
                            </div>
                        </div>

                        <div class="total-container">
                            TOTAL: $<span id="total">0</span>
                        </div>

                        <div class="button-container">
                            <button type="button" class="back" onclick="confirmarSalir()">Regresar</button>
                            <button type="button" class="next" onclick="nextStep(2)">Siguiente</button>
                        </div>
                    </div>

                    <!-- Paso 2 -->

                    <div id="form-step-2" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="nombre-reserva">Nombre:</label>
                                    <input type="text" placeholder="Ingrese su nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="apellidoPaterno">Apellido paterno:</label>
                                    <input type="text" placeholder="Ingrese su apellido paterno" name="apellidoPaterno"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="ApellidoMaterni">Apellido materno:</label>
                                    <input type="text" placeholder="Ingrese su apellido materno" name="apellidoMaterno"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="correo">Correo electrónico:</label>
                                    <input type="email" placeholder="ejemplo123@gmail.com" name="correo" required>
                                </div>
                            </div>
                        </div>
                        <div class="button-container">
                            <button type="button" class="back" onclick="nextStep(1)">Regresar</button>
                            <button type="button" class="next" onclick="nextStep(3)">Siguiente</button>
                        </div>
                    </div>

                    <!-- Paso 3 -->
                    <div id="form-step-3" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="numTarjeta">Número de trajeta:</label>
                                    <input type="text" placeholder="16 dígitos" name="numTarjeta" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="tipoTarjeta">Tipo de trajeta:</label>
                                    <select name="tipoTarjeta">
                                        <option>Crédito</option>
                                        <option>Débito</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="Expiración">Fecha de vencimiento:</label>
                                    <input type="text" placeholder="MM/AA" name="expiracion" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <label for="CVC">Código de validación</label>
                                    <input type="text" placeholder="CVC" name="cvc" required>
                                </div>
                            </div>
                        </div>

                        <!-- Cambié el botón para que sea de tipo submit -->
                        <div class="button-container">
                            <button type="button" class="back" onclick="nextStep(2)">Atrás</button>
                            <button type="submit" class="next">PAGAR AHORA</button>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
    <div id="loading"
        style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 20px; border-radius: 5px;">
        Se esta procesando su pago.Gracias por esperar
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var paqueteSeleccionado = "<?php echo $paqueteSeleccionado; ?>";
    </script>
    <script src="assets/script/JsSeccionPagar.js"> </script>

</body>

</html>