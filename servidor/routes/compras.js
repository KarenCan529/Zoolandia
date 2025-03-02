const express = require('express');
const router = express.Router();
const compraController = require('../controllers/compraController');

// Rutas para Reserva
router.get('/reservas', compraController.getReservas);
router.post('/reservas', compraController.createReserva);
// Rutas para Compra
router.get('/', compraController.getCompras);
router.post('/', compraController.createCompra);
// Rutas para Boleto
router.get('/boletos', compraController.getBoletos);
router.post('/boletos', compraController.createBoleto);
// Nueva ruta para agradecimientos
router.get('/agradecimientos', compraController.getAgradecimientos);


module.exports = router;