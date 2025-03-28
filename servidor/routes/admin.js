const express = require('express');
const router = express.Router();
const adminController = require('../controllers/adminController');
const verificarJWT = require('../middlewares/verificarJWT'); 

router.use((req, res, next) => {
   
    verificarJWT(req, res, next); 
});


/**
 * @swagger
 * /api/admin:
 *   get:
 *     summary: Obtener todos los administradores
 *     tags: [Administradores]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de administradores
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_administrador:
 *                     type: integer
 *                   nombre_administrador:
 *                     type: string
 *                   apellido_paterno_administrador:
 *                     type: string
 *                   apellido_materno_administrador:
 *                     type: string
 *                   correo_administrador:
 *                     type: string
 *                   password_administrador:
 *                     type: string
 *       500:
 *         description: Error del servidor
 */
router.get('/', verificarJWT,adminController.getAdministradores); 

/**
 * @swagger
 * /api/admin:
 *   post:
 *     summary: Crear un nuevo administrador
 *     tags: [Administradores]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - nombre_administrador
 *               - apellido_paterno_administrador
 *               - apellido_materno_administrador
 *               - correo_administrador
 *               - password_administrador
 *             properties:
 *               nombre_administrador:
 *                 type: string
 *               apellido_paterno_administrador:
 *                 type: string
 *               apellido_materno_administrador:
 *                 type: string
 *               correo_administrador:
 *                 type: string
 *               password_administrador:
 *                 type: string
 *     responses:
 *       201:
 *         description: Administrador creado
 *       400:
 *         description: Administrador no creado
 */
router.post('/', verificarJWT,adminController.createAdministrador); 


/**
 * @swagger
 * /api/admin/{id}:
 *   put:
 *     summary: Actualizar un administrador
 *     tags: [Administradores]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID del administrador
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - nombre_administrador
 *               - apellido_paterno_administrador
 *               - apellido_materno_administrador
 *               - correo_administrador
 *               - password_administrador
 *             properties:
 *               nombre_administrador:
 *                 type: string
 *               apellido_paterno_administrador:
 *                 type: string
 *               apellido_materno_administrador:
 *                 type: string
 *               correo_administrador:
 *                 type: string
 *               password_administrador:
 *                 type: string
 *     responses:
 *       200:
 *         description: Administrador actualizado
 *       400:
 *         description: Administrador no encontrado
 */
router.put('/:id', verificarJWT,adminController.updateAdministrador);


/**
 * @swagger
 * /api/admin/{id}:
 *   delete:
 *     summary: Eliminar un administrador
 *     tags: [Administradores]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID del administrador
 *     responses:
 *       200:
 *         description: Administrador eliminado
 *       404:
 *         description: Administrador no encontrado
 */
router.delete('/:id', verificarJWT,adminController.deleteAdministrador);


module.exports = router;