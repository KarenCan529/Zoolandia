const express = require('express');
const router = express.Router();
const reporteController = require('../controllers/reporteController');
const verificarJWT = require('../middlewares/verificarJWT'); 

// Definir rutas
router.use((req, res, next) => {
    verificarJWT(req, res, next); 
});

router.get('/boletos-vendidos-global', reporteController.getBoletosVendidosGlobal);
router.get('/ingresos-totales', reporteController.getIngresosTotales);
router.get('/donaciones-realizadas', reporteController.getDonacionesRealizadas);
router.get('/total-donaciones', reporteController.getTotalDonaciones);
router.get('/recorridos-mas-reservados', reporteController.getRecorridosMasReservados);
router.get('/paquetes-mas-elegidos', reporteController.getPaquetesMasElegidos);
router.get('/promedio-donaciones', reporteController.getPromedioDonaciones);
router.get('/boletos-vendidos-por-fecha/:fecha', reporteController.getBoletosVendidosPorFecha);

module.exports = router;