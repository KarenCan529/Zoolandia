
const express = require('express');
const router = express.Router();
const donacionController = require('../controllers/donacionController');
const verificarJWT = require('../middlewares/verificarJWT'); 

// Rutas de donaciones

/**
 * @swagger
 * /api/donaciones/ultima:
 *   get:
 *     summary: Obtener la última donación
 *     tags: [Donaciones]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Última donación registrada
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 id_donacion:
 *                   type: integer
 *                 nombre_donante:
 *                   type: string
 *                 apellido_paterno_donante:
 *                   type: string
 *                 apellido_materno_donante:
 *                   type: string
 *                 correo_donante:
 *                   type: string
 *                 fecha_donacion:
 *                   type: string
 *                   format: date
 *                 monto_donacion:
 *                   type: number
 *                   format: float
 *       404:
 *         description: No hay donaciones registradas
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: No hay donaciones registradas
 *       500:
 *         description: Error en la consulta SQL
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error en la consulta SQL
 */

router.get('/ultima', donacionController.getDonacionesLastId);


/**
 * @swagger
 * /api/donaciones:
 *   post:
 *     summary: Crear una nueva donación
 *     tags: [Donaciones]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_donante:
 *                 type: string
 *                 example: Juan
 *               apellido_paterno_donante:
 *                 type: string
 *                 example: Pérez
 *               apellido_materno_donante:
 *                 type: string
 *                 example: García
 *               correo_donante:
 *                 type: string
 *                 example: juan.perez@gmail.com
 *               monto_donacion:
 *                 type: number
 *                 format: float
 *                 example: 100.50
 *               fecha_donacion:
 *                 type: string
 *                 format: date
 *                 example: 2025-03-11
 *     responses:
 *       201:
 *         description: Donación creada exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Donación creada
 *                 id:
 *                   type: integer
 *       500:
 *         description: Error en la creación de la donación
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error en la creación de la donación
 */
router.post('/', donacionController.createDonacion);

router.use((req, res, next) => {
    verificarJWT(req, res, next); 
});

/**
 * @swagger
 * /api/donaciones:
 *   get:
 *     summary: Obtener todas las donaciones
 *     tags: [Donaciones]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de todas las donaciones
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_donacion:
 *                     type: integer
 *                   nombre_donante:
 *                     type: string
 *                   apellido_paterno_donante:
 *                     type: string
 *                   apellido_materno_donante:
 *                     type: string
 *                   correo_donante:
 *                     type: string
 *                   fecha_donacion:
 *                     type: string
 *                     format: date
 *                   monto_donacion:
 *                     type: number
 *                     format: float
 *       500:
 *         description: Error en la consulta SQL
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error en la consulta SQL
 */
router.get('/',verificarJWT, donacionController.getDonaciones);




/**
 * @swagger
 * /api/donaciones/{id}:
 *   get:
 *     summary: Obtener una donación por ID
 *     tags: [Donaciones]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID de la donación a obtener
 *     responses:
 *       200:
 *         description: Donación obtenida por ID
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 id_donacion:
 *                   type: integer
 *                 nombre_donante:
 *                   type: string
 *                 apellido_paterno_donante:
 *                   type: string
 *                 apellido_materno_donante:
 *                   type: string
 *                 correo_donante:
 *                   type: string
 *                 monto_donacion:
 *                   type: number
 *                   format: float
 *                 fecha_donacion:
 *                   type: string
 *                   format: date
 *       404:
 *         description: Donación no encontrada
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Donación no encontrada
 *       500:
 *         description: Error en la consulta SQL
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error en la consulta SQL
 */
router.get('/:id',verificarJWT, donacionController.getDonacionById);

/**
 * @swagger
 * /api/donaciones:
 *   post:
 *     summary: Crear una nueva donación
 *     tags: [Donaciones]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_donante:
 *                 type: string
 *                 example: Juan
 *               apellido_paterno_donante:
 *                 type: string
 *                 example: Pérez
 *               apellido_materno_donante:
 *                 type: string
 *                 example: García
 *               correo_donante:
 *                 type: string
 *                 example: juan.perez@gmail.com
 *               monto_donacion:
 *                 type: number
 *                 format: float
 *                 example: 100.50
 *               fecha_donacion:
 *                 type: string
 *                 format: date
 *                 example: 2025-03-11
 *     responses:
 *       201:
 *         description: Donación creada exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Donación creada
 *                 id:
 *                   type: integer
 *       500:
 *         description: Error en la creación de la donación
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error en la creación de la donación
 */
router.post('/', donacionController.createDonacion);


/**
 * @swagger
 * /api/donaciones/{id}:
 *   delete:
 *     summary: Eliminar una donación
 *     tags: [Donaciones]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID de la donación a eliminar
 *     responses:
 *       200:
 *         description: Donación eliminada exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Donación eliminada
 *       404:
 *         description: Donación no encontrada
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Donación no encontrada
 *       500:
 *         description: Error en la eliminación de la donación
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error en la eliminación de la donación
 */
router.delete('/:id',verificarJWT,  donacionController.deleteDonacion);
// Obtener la última donación



module.exports = router;