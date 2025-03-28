const express = require('express');
const router = express.Router();
const reporteController = require('../controllers/reporteController');
const verificarJWT = require('../middlewares/verificarJWT'); 

// Definir rutas
router.use((req, res, next) => {
    verificarJWT(req, res, next); 
});

/**
 * @swagger
 * /api/reportes/boletos-vendidos:
 *   get:
 *     summary: Obtener la cantidad de boletos vendidos globalmente
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Cantidad total de boletos vendidos por categoría
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 total_boletos_adultos:
 *                   type: integer
 *                   description: Total de boletos vendidos para adultos
 *                 total_boletos_ninos:
 *                   type: integer
 *                   description: Total de boletos vendidos para niños
 *                 total_boletos_ninos_menores_3:
 *                   type: integer
 *                   description: Total de boletos vendidos para niños menores de 3 años
 *                 total_boletos_vendidos:
 *                   type: integer
 *                   description: Total general de boletos vendidos
 *       500:
 *         description: Error en la base de datos
 */
router.get('/boletos-vendidos',verificarJWT, reporteController.getBoletosVendidosGlobal);


/**
 * @swagger
 * /api/reportes/ingresos-totales:
 *   get:
 *     summary: Obtener los ingresos totales
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de ingresos totales
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   total_ingresos:
 *                     type: number
 *                     format: float
 *       500:
 *         description: No hay ingresos
 */
router.get('/ingresos-totales',verificarJWT, reporteController.getIngresosTotales);

/**
 * @swagger
 * /api/reportes/donaciones-realizadas:
 *   get:
 *     summary: Obtener las donaciones realizadas
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de donaciones realizadas
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   total_donaciones_realizadas:
 *                     type: number
 *                     format: float
 *       500:
 *         description: No hay Donaciones
 */
router.get('/donaciones-realizadas',verificarJWT, reporteController.getDonacionesRealizadas);

/**
 * @swagger
 * /api/reportes/total-donaciones:
 *   get:
 *     summary: Obtener el total de donaciones
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista del total de donaciones
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   total_donaciones:
 *                     type: number
 *                     format: float
 *       500:
 *         description: No hay Donaciones
 */
router.get('/total-donaciones',verificarJWT, reporteController.getTotalDonaciones);

/**
 * @swagger
 * /api/reportes/recorridos-mas-reservados:
 *   get:
 *     summary: Obtener el reccorido mas reservado
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista del recorrido mas reservado
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   nombre_ruta:
 *                     type: string
 *                     format: float
 *                   total_reservas:
 *                     type: number
 *                     format: float
 *       500:
 *         description: No hay recorridos
 */
router.get('/recorridos-mas-reservados',verificarJWT, reporteController.getRecorridosMasReservados);

/**
 * @swagger
 * /api/reportes/paquetes-mas-elegidos:
 *   get:
 *     summary: Obtener paquetes mas elegidos
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista del los paquetes mas comprados 
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   nombre_paquete:
 *                     type: string
 *                     format: float
 *                   total_compras:
 *                     type: number
 *                     format: float
 *       500:
 *         description: No hay paquetes elegidos
 */
router.get('/paquetes-mas-elegidos',verificarJWT, reporteController.getPaquetesMasElegidos);

/**
 * @swagger
 * /api/reportes/paquetes-mas-elegidos:
 *   get:
 *     summary: Obtener promedio de donaciones
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de promedio de donaciones 
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   promedio_general_donaciones:
 *                     type: number
 *                     format: float
 *       500:
 *         description: No hay Donaciones
 */
router.get('/promedio-donaciones',verificarJWT, reporteController.getPromedioDonaciones);

/**
 * @swagger
 * /api/reportes/boletos-vendidos-por-fecha/{fecha}:
 *   get:
 *     summary: Obtener la cantidad de boletos vendidos en una fecha específica
 *     tags: [Reportes]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: fecha
 *         required: true
 *         schema:
 *           type: string
 *           format: date
 *         description: Fecha en formato YYYY-MM-DD para filtrar los boletos vendidos
 *     responses:
 *       200:
 *         description: Cantidad total de boletos vendidos en la fecha indicada
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 total_boletos_adultos:
 *                   type: integer
 *                   description: Total de boletos vendidos para adultos en la fecha indicada
 *                 total_boletos_ninos:
 *                   type: integer
 *                   description: Total de boletos vendidos para niños en la fecha indicada
 *                 total_boletos_ninos_menores_3:
 *                   type: integer
 *                   description: Total de boletos vendidos para niños menores de 3 años en la fecha indicada
 *                 total_boletos_vendidos:
 *                   type: integer
 *                   description: Total general de boletos vendidos en la fecha indicada
 *       400:
 *         description: Fecha no proporcionada o en formato incorrecto
 *       500:
 *         description: Error en la base de datos
 */
router.get('/boletos-vendidos-por-fecha/:fecha',verificarJWT, reporteController.getBoletosVendidosPorFecha);

module.exports = router;