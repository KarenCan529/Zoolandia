let pasoActual = 1;

function nextStep(step) {
  if (step > pasoActual) {
    const campos = document.querySelectorAll(`#form-step-${pasoActual} input[required]`);
    let camposCompletos = true;

    campos.forEach(campo => {
      if (campo.value.trim() === "") {
        camposCompletos = false;
        campo.style.borderColor = "red";
      } else {
        campo.style.borderColor = "";
      }
    });

    if (!camposCompletos) {
      alert("Por favor, llena todos los campos antes de continuar.");
      return;
    }
  }

  // Cambiar de paso
  document.getElementById('form-step-' + pasoActual).style.display = 'none';
  document.getElementById('step-' + pasoActual).classList.remove('active');

  pasoActual = step;

  document.getElementById('form-step-' + pasoActual).style.display = 'block';
  document.getElementById('step-' + pasoActual).classList.add('active');
}

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('formulario');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      showLoading();
      console.log('Formulario enviado'); // Agrega este log para depuración
      setTimeout(() => {
        form.submit();
      }, 2000);
    });
  } else {
    console.error('El formulario no se encontró'); // Agrega este log para depuración
  }
});

function showLoading() {
  document.getElementById('loading').style.display = 'block';
}



/*function showLoading() {
  // Mostrar el mensaje de carga
  document.getElementById('loading').style.display = 'block';

  // Asegúrate de que el formulario se envíe después de que el mensaje de carga sea visible
  setTimeout(function () {
    document.getElementById('loading').style.display = 'none';  // Esconde el mensaje de carga
  }, 2000); // Tiempo de espera antes de ocultar el mensaje de carga
}*/


const preciosPaquete = {
  'Zoomax': { adulto: 150, nino: 80 },
  'Bestial': { adulto: 250, nino: 130 },
  'VIP': { adulto: 350, nino: 200 }
};

const adultosInput = document.getElementById('adultos');
const ninosInput = document.getElementById('ninos');
const bebesInput = document.getElementById('bebes');
const rutaInputs = document.getElementsByName('rutaGuiada');
const rutaSelect = document.getElementById('ruta');
const totalSpan = document.getElementById('total');
const opcionesRuta = document.getElementById('opcionesRuta');
const fechaInput = document.getElementById('fecha');
const horarioSelect = document.getElementById('horario');
const rutaPregunta = document.getElementById('rutaPregunta');


function actualizarLabels() {
  if (preciosPaquete[paqueteSeleccionado]) {
    const precios = preciosPaquete[paqueteSeleccionado];
    document.getElementById('labelAdulto').textContent = `Adulto: $${precios.adulto}`;
    document.getElementById('labelNino').textContent = `Niño: $${precios.nino}`;
  }
}
function actualizarTotal() {
  const adultos = parseInt(adultosInput.value) || 0;
  const ninos = parseInt(ninosInput.value) || 0;
  const rutaSeleccionada = parseInt(rutaSelect.value) || 0;
  const precioAdulto = preciosPaquete[paqueteSeleccionado].adulto;
  const precioNino = preciosPaquete[paqueteSeleccionado].nino;
  

  let rutaModificada = rutaSeleccionada !== 0 ? 100 : 0;

  let total; // Declarar la variable fuera del bloque if-else

  if (paqueteSeleccionado == 'VIP' ) {
    total = (adultos * precioAdulto) + (ninos * precioNino);
  } else {
    total = (adultos * precioAdulto) + (ninos * precioNino) + rutaModificada;
  }

  totalSpan.textContent = total;
}

adultosInput.addEventListener('input', actualizarTotal);
ninosInput.addEventListener('input', actualizarTotal);
rutaSelect.addEventListener('change', actualizarTotal);



// Al cargar la página, dependiendo del paquete seleccionado
window.onload = function () {
  if (paqueteSeleccionado === 'VIP') {
    // Ocultar la pregunta de ruta y seleccionar "Sí" automáticamente
    rutaPregunta.classList.add('d-none'); // Ocultar la pregunta de ruta
    opcionesRuta.classList.remove('d-none'); // Mostrar las opciones de ruta
    document.getElementById('rutaSi').checked = true; // Seleccionar automáticamente "Sí"
  } else {
    rutaPregunta.classList.remove('d-none'); // Mostrar la pregunta de ruta
    opcionesRuta.classList.add('d-none'); // Ocultar las opciones de ruta
  }
};

// Evento de cambio para mostrar u ocultar las opciones de ruta dependiendo de la respuesta
rutaInputs.forEach(radio => radio.addEventListener('change', function () {
  if (paqueteSeleccionado === 'VIP') {
    // Si es VIP, no mostrar la pregunta, solo las opciones de ruta
    rutaPregunta.classList.add('d-none');
    opcionesRuta.classList.remove('d-none');
    document.getElementById('rutaSi').checked = true; // Asegurarse de que "Sí" esté seleccionado
  } else {
    // Si no es VIP, mostrar la pregunta y manejar la selección
    rutaPregunta.classList.remove('d-none');
    if (document.getElementById('rutaSi').checked) {
      opcionesRuta.classList.remove('d-none'); // Mostrar las opciones de ruta si "Sí" es seleccionado
    } else {
      opcionesRuta.classList.add('d-none'); // Ocultar las opciones de ruta si "No" es seleccionado
      rutaSelect.value = 0; // Restablecer el valor de la ruta seleccionada
    }
  }
  actualizarTotal(); // Llamar a la función para actualizar el total después del cambio
}));

document.querySelectorAll('.elegir-paquete').forEach(link => {
  link.addEventListener('click', function (event) {
    event.preventDefault();
    paqueteSeleccionado = this.getAttribute('data-paquete');
    actualizarLabels();

    adultosInput.value = 0;
    ninosInput.value = 0;
    bebesInput.value = 0;
    rutaSelect.value = 0;
    document.getElementById('rutaNo').checked = true;
    opcionesRuta.classList.add('d-none');

    totalSpan.textContent = 0;
    actualizarTotal();
  });
});

function confirmarSalir() {
  const confirmar = confirm("¿Estás seguro de que deseas abandonar todo el progreso?");
  if (confirmar) {
    window.location.href = 'boletos';
  }
}