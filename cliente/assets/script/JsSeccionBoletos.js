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

//acao de agregar esto
var paqueteSeleccionado;
const params = new URLSearchParams(window.location.search);
const paqueteURL = params.get('paquete');
if (paqueteURL) {
  paqueteSeleccionado = paqueteURL;
}


function actualizarLabels() {
  const precios = preciosPaquete[paqueteSeleccionado];
  document.getElementById('labelAdulto').textContent = `Adulto: $${precios.adulto}`;
  document.getElementById('labelNino').textContent = `Niño: $${precios.nino}`;
}

function actualizarTotal() {
  const adultos = parseInt(adultosInput.value) || 0;
  const ninos = parseInt(ninosInput.value) || 0;
  const rutaSeleccionada = parseInt(rutaSelect.value) || 0;
  const precioAdulto = preciosPaquete[paqueteSeleccionado].adulto;
  const precioNino = preciosPaquete[paqueteSeleccionado].nino;
  const total = (adultos * precioAdulto) + (ninos * precioNino) + rutaSeleccionada;
  totalSpan.textContent = total;
}

adultosInput.addEventListener('input', actualizarTotal);
ninosInput.addEventListener('input', actualizarTotal);
rutaSelect.addEventListener('change', actualizarTotal);

rutaInputs.forEach(radio => radio.addEventListener('change', function() {
  if (document.getElementById('rutaSi').checked) {
      opcionesRuta.classList.remove('d-none');
  } else {
      opcionesRuta.classList.add('d-none');
      rutaSelect.value = 0;
  }
  actualizarTotal();
}));

document.querySelectorAll('.elegir-paquete').forEach(button => {
  button.addEventListener('click', function() {
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
