const express = require('express');
const router = express.Router();
const reporteController = require('../controllers/reporteController');

// Definir rutas
router.get('/boletos-vendidos-global', reporteController.getBoletosVendidosGlobal);
router.get('/ingresos-totales', reporteController.getIngresosTotales);
router.get('/donaciones-realizadas', reporteController.getDonacionesRealizadas);
router.get('/total-donaciones', reporteController.getTotalDonaciones);
router.get('/recorridos-mas-reservados', reporteController.getRecorridosMasReservados);
router.get('/paquetes-mas-elegidos', reporteController.getPaquetesMasElegidos);
router.get('/promedio-donaciones', reporteController.getPromedioDonaciones);
router.get('/boletos-vendidos-por-fecha/:fecha', reporteController.getBoletosVendidosPorFecha);

module.exports = router;