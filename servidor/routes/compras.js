const express = require('express');
const router = express.Router();
const compraController = require('../controllers/compraController');
const verificarJWT = require('../middlewares/verificarJWT'); 



router.use((req, res, next) => {
    verificarJWT(req, res, next); 
});

/**
 * @swagger
 * /api/compras/reservas:
 *   get:
 *     summary: Obtener todas las reservas
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de Reservas
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_reserva:
 *                     type: integer
 *                   fecha_reserva:
 *                     format: date
 *                     example: "2024-11-25"
 *                   hora_reserva:
 *                     format: date-time
 *                     example: "15:00:00"
 *                   id_guia:
 *                     type: integer
 *                   id_ruta:
 *                     type: integer
 *                   id_paquete:
 *                     type: integer
 *                   incluye_tour:
 *                     type: integer
 *       500:
 *         description: No hay reservas
 */
router.get('/reservas', verificarJWT,compraController.getReservas);

/**
 * @swagger
 * /api/compras:
 *   get:
 *     summary: Obtener todas las Compras
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de Compras
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_compra:
 *                     type: integer
 *                   correo_comprador:
 *                     type: string
 *                   apellido_paterno_comprador:
 *                     type: string
 *                   apellido_materno_comprador:
 *                     type: string
 *                   fecha_compra:
 *                     format: date-time
 *                     example: "2024-11-25"
 *       500:
 *         description: No hay Compras
 */
router.get('/',verificarJWT, compraController.getCompras);

/**
 * @swagger
 * /api/compras/boletos:
 *   get:
 *     summary: Obtener todas las Compras de boletos
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de Compras de boletos
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_boleto:
 *                     type: integer
 *                   id_compra:
 *                     type: integer
 *                   boletos_adulto:
 *                     type: integer
 *                   boletos_nino:
 *                     type: integer
 *                   boletos_nino_menor_3:
 *                     type: integer
 *                   boletos_total_adulto:
 *                     type: number
 *                     format: double
 *                     example: 99.99
 *                   boletos_total_nino:
 *                     type: number
 *                     format: double
 *                     example: 99.99
 *                   boletos_total_nino_menor_3:
 *                     type: number
 *                     format: double
 *                     example: 99.99
 *                   boletos_total_general:
 *                     type: number
 *                     format: double
 *                     example: 99.99
 *                   id_reserva:
 *                     type: integer
 *       500:
 *         description: No hay Compras de boletos
 */
router.get('/boletos',verificarJWT, compraController.getBoletos);

/**
 * @swagger
 * /api/compras/paquetes:
 *   get:
 *     summary: Obtener todas los paquetes
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de paquetes
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_paquete:
 *                     type: integer
 *                   nombre_paquete:
 *                     type: string
 *                   precio_adulto:
 *                     type: number
 *                     format: double
 *                     example: 99.99
 *                   precio_nino:
 *                     type: number
 *                     format: double
 *                     example: 99.99
 *       500:
 *         description: No hay Paquetes
 */
router.get('/paquetes',verificarJWT, compraController.getPaquetes); 
router.get('/agradecimientos',verificarJWT, compraController.getAgradecimientos);

/**
 * @swagger
 * /api/compras/guias:
 *   get:
 *     summary: Obtener todos los guias
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de Guias
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_guia:
 *                     type: integer
 *                   nombre_guia:
 *                     type: string
 *                   disponibilidad_guia:
 *                     type: integer
 *       500:
 *         description: No hay guias disponibles
 */
router.get('/guias',verificarJWT, compraController.getGuias); 


/**
 * @swagger
 * /api/compras/rutas:
 *   get:
 *     summary: Obtener todas las rutas
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de Rutas
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_ruta:
 *                     type: integer
 *                   nombre_ruta:
 *                     type: string
 *                   descripcion_ruta:
 *                     type: string
 *       500:
 *         description: No hay rutas disponibles
 */
router.get('/rutas',verificarJWT, compraController.getRutas);  

/**
 * @swagger
 * /api/compras/reservas:
 *   post:
 *     summary: Crear una nueva Reserva
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - fecha_reserva
 *               - hora_reserva
 *               - id_guia
 *               - id_ruta
 *               - id_paquete
 *               - incluye_tour
 *             properties:
 *                  fecha_reserva:
 *                     type: string
 *                     format: date
 *                     example: "2024-11-25"
 *                  hora_reserva:
 *                     type: string
 *                     format: time
 *                     example: "15:00:00"
 *                  id_guia:
 *                     type: integer
 *                     example: 1
 *                  id_ruta:
 *                     type: integer
 *                     example: 1
 *                  id_paquete:
 *                     type: integer
 *                     example: 1
 *                  incluye_tour:
 *                     type: integer
 *                     example: 1
 *     responses:
 *       201:
 *         description: Reserva creada
 *       400:
 *         description: Error al crear la reserva
 */

router.post('/reservas',verificarJWT, compraController.createReserva);



/**
 * @swagger
 * /api/compras:
 *   post:
 *     summary: Crear una nueva Compra
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - correo_comprador
 *               - nombre_comprador
 *               - apellido_paterno_comprador
 *               - apellido_materno_comprador
 *               - fecha_compra
 *             properties:
 *               correo_comprador:
 *                 type: string
 *                 example: "comprador@email.com"
 *               nombre_comprador:
 *                 typr: string
 *                 example: "Angel"
 *               apellido_paterno_comprador:
 *                 type: string
 *                 example: "González"
 *               apellido_materno_comprador:
 *                 type: string
 *                 example: "Martínez"
 *               fecha_compra:
 *                 type: string
 *                 format: date-time
 *                 example: "2024-11-25T15:00:00"
 *     responses:
 *       201:
 *         description: Compra creada exitosamente
 *       400:
 *         description: Error en los datos de la solicitud
 */
router.post('/', verificarJWT,compraController.createCompra);

/**
 * @swagger
 * /api/compras/boletos:
 *   post:
 *     summary: Crear un nuevo Boleto
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - id_compra
 *               - boletos_adulto
 *               - boletos_nino
 *               - boletos_nino_menor_3
 *               - id_reserva
 *             properties:
 *               id_compra:
 *                 type: integer
 *                 example: 1
 *               boletos_adulto:
 *                 type: integer
 *                 example: 2
 *               boletos_nino:
 *                 type: integer
 *                 example: 1
 *               boletos_nino_menor_3:
 *                 type: integer
 *                 example: 0
 *               id_reserva:
 *                 type: integer
 *                 example: 1
 *     responses:
 *       201:
 *         description: Boleto creado exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Boleto creado
 *                 id_boleto:
 *                   type: integer
 *                   example: 10
 *       400:
 *         description: Boleto no creado
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Boleto no creado
 *       500:
 *         description: Error al crear el boleto
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error al crear el boleto
 *                 details:
 *                   type: string
 *                   example: "Detalles específicos del error"
 */
router.post('/boletos',verificarJWT, compraController.createBoleto); 

/**
 * @swagger
 * /api/compras/paquetes/{id_paquete}:
 *   put:
 *     summary: Actualizar un Paquete existente
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id_paquete
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID del Paquete a actualizar
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_paquete:
 *                 type: string
 *               precio_adulto:
 *                 type: number
 *                 format: double
 *                 example: 99.99
 *               precio_nino:
 *                 type: number
 *                 format: double
 *                 example: 49.99
 *     responses:
 *       200:
 *         description: Paquete actualizado exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Paquete actualizado
 *                 id_paquete:
 *                   type: integer
 *                   example: 1
 *       400:
 *         description: Error en la solicitud de actualización
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Paquete no actualizado
 *       500:
 *         description: Error del servidor al actualizar el paquete
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error al actualizar el paquete
 */
router.put('/paquetes/:id_paquete',verificarJWT, compraController.updatePaquete);  

/**
 * @swagger
 * /api/compras/guias:
 *   post:
 *     summary: Crear un nuevo Guía
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - nombre_guia
 *               - disponibilidad_guia
 *             properties:
 *               nombre_guia:
 *                 type: string
 *                 example: "Juan Pérez"
 *               disponibilidad_guia:
 *                 type: integer
 *                 example: 1
 *     responses:
 *       201:
 *         description: Guía creado exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Guía creado
 *                 id_guia:
 *                   type: integer
 *                   example: 1
 *       400:
 *         description: Error en la solicitud
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Datos inválidos, Guía no creado
 *       500:
 *         description: Error en el servidor al crear el Guía
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error al crear el Guía
 */
router.post('/guias',verificarJWT, compraController.createGuia); 

/**
 * @swagger
 * /api/compras/guias/{id_guia}:
 *   put:
 *     summary: Actualizar un Guía existente
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id_guia
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID del guía a actualizar
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_guia:
 *                 type: string
 *                 example: "Juan Pérez"
 *               disponibilidad_guia:
 *                 type: integer
 *                 example: 1
 *     responses:
 *       200:
 *         description: Guía actualizado exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Guía actualizado
 *       400:
 *         description: Error en la solicitud
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Datos inválidos, Guía no actualizado
 *       404:
 *         description: Guía no encontrado
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Guía no encontrado
 *       500:
 *         description: Error en el servidor al actualizar el Guía
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error al actualizar el Guía
 */
router.put('/guias/:id_guia',verificarJWT, compraController.updateGuia); 

/**
 * @swagger
 * /api/compras/guias/{id_guia}:
 *   delete:
 *     summary: Eliminar un Guía existente
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id_guia
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID del guía a eliminar
 *     responses:
 *       200:
 *         description: Guía eliminado exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Guía eliminado
 *       404:
 *         description: Guía no encontrado
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Guía no encontrado
 *       500:
 *         description: Error en el servidor al eliminar el Guía
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error al eliminar el Guía
 */

router.delete('/guias/:id_guia',verificarJWT, compraController.deleteGuia);

/**
 * @swagger
 * /api/compras/rutas/{id_ruta}:
 *   put:
 *     summary: Actualizar una Ruta existente
 *     tags: [Compras]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id_ruta
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *         description: ID de la ruta a actualizar
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_ruta:
 *                 type: string
 *               descripcion_ruta:
 *                 type: string
 *             example:
 *               nombre_ruta: "Ruta de la Selva"
 *               descripcion_ruta: "Un recorrido por la selva tropical."
 *     responses:
 *       200:
 *         description: Ruta actualizada exitosamente
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 message:
 *                   type: string
 *                   example: Ruta actualizada
 *                 id_ruta:
 *                   type: integer
 *                   example: 1
 *       404:
 *         description: Ruta no encontrada
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Ruta no encontrada
 *       500:
 *         description: Error en el servidor al actualizar la Ruta
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 error:
 *                   type: string
 *                   example: Error al actualizar la Ruta
 */
router.put('/rutas/:id_ruta',verificarJWT, compraController.updateRuta); 


module.exports = router;