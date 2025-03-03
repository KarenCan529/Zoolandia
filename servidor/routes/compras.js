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


// Rutas para Paquete
router.get('/paquetes', compraController.getPaquetes);  
router.put('/paquetes/:id_paquete', compraController.updatePaquete);  

// Rutas para Guía
router.get('/guias', compraController.getGuias);  
router.post('/guias', compraController.createGuia); 
router.put('/guias/:id_guia', compraController.updateGuia); 
router.delete('/guias/:id_guia', compraController.deleteGuia);  

// Rutas para Ruta
router.get('/rutas', compraController.getRutas);  
router.put('/rutas/:id_ruta', compraController.updateRuta); 



module.exports = router;