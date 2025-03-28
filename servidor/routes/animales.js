const express = require('express');
const router = express.Router();
const animalController = require('../controllers/animalController');
const verificarJWT = require('../middlewares/verificarJWT');

router.use((req, res, next) => {
    verificarJWT(req, res, next); 
});

/**
 * @swagger
 * /api/animales:
 *   get:
 *     summary: Obtiene todos los animales
 *     tags: [Animales]
 *     responses:
 *       200:
 *         description: Lista de animales.
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_animal:
 *                     type: integer
 *                   nombre_animal:
 *                     type: string
 *                   nombre_comun_animal:
 *                     type: string
 *                   nombre_cientifico_animal:
 *                     type: string
 *                   familia_orden_animal:
 *                     type: string
 *                   habitat_animal:
 *                     type: string
 *                   alimentacion_animal:
 *                     type: string
 *                   esperanza_vida_animal:
 *                     type: string
 *                   id_estado:
 *                     type: integer
 *                   id_clasificacion:
 *                     type: integer
 *                   descripcion_animal:
 *                     type: string
 *                   imagen_animal:
 *                     type: string
 */
router.get('/', animalController.getAnimales);

/**
 * @swagger
 * /api/animales/clasificaciones:
 *   get:
 *     summary: Obtiene las clasificaciones de los animales
 *     tags: [Animales]
 *     responses:
 *       200:
 *         description: Lista de clasificaciones.
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_clasificacion:
 *                     type: integer
 *                   nombre_clasificacion:
 *                     type: string
 */
router.get('/clasificaciones', verificarJWT, animalController.getClasificaciones);

/**
 * @swagger
 * /api/animales/estado-conservacion:
 *   get:
 *     summary: Obtiene los estados de conservación de los animales
 *     tags: [Animales]
 *     responses:
 *       200:
 *         description: Lista de estados de conservación.
 *         content:
 *           application/json:
 *             schema:
 *               type: array
 *               items:
 *                 type: object
 *                 properties:
 *                   id_estado_conservacion:
 *                     type: integer
 *                   estado_conservacion:
 *                     type: string
 */
router.get('/estado-conservacion', verificarJWT, animalController.getEstadosConservacion);

/**
 * @swagger
 * /api/animales/{id}:
 *   get:
 *     summary: Obtiene un animal por su ID
 *     tags: [Animales]
 *     parameters:
 *       - in: path
 *         name: id
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID del animal
 *     responses:
 *       200:
 *         description: Información del animal.
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 id_animal:
 *                   type: integer
 *                 nombre_animal:
 *                   type: string
 *                 nombre_comun_animal:
 *                   type: string
 *                 nombre_cientifico_animal:
 *                   type: string
 *                 familia_orden_animal:
 *                   type: string
 *                 habitat_animal:
 *                   type: string
 *                 alimentacion_animal:
 *                   type: string
 *                 esperanza_vida_animal:
 *                   type: string
 *                 id_estado:
 *                   type: integer
 *                 id_clasificacion:
 *                   type: integer
 *                 descripcion_animal:
 *                   type: string
 *                 imagen_animal:
 *                   type: string
 *       404:
 *         description: Animal no encontrado
 */
router.get('/:id', verificarJWT, animalController.getAnimalById);

// Las rutas protegidas deben pasar por el middleware de JWT

/**
  * @swagger
 * /api/animales:
 *   post:
 *     summary: Crea un nuevo animal
 *     tags: [Animales]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_animal:
 *                 type: string
 *               nombre_comun_animal:
 *                 type: string
 *               nombre_cientifico_animal:
 *                 type: string
 *               familia_orden_animal:
 *                 type: string
 *               habitat_animal:
 *                 type: string
 *               alimentacion_animal:
 *                 type: string
 *               esperanza_vida_animal:
 *                 type: string
 *               id_estado:
 *                 type: integer
 *               id_clasificacion:
 *                 type: integer
 *               descripcion_animal:
 *                 type: string
 *               imagen_animal:
 *                 type: string
 *     responses:
 *       201:
 *         description: Animal creado correctamente
 *       400:
 *         description: Error en la creación del animal
 */
router.post('/', verificarJWT, animalController.createAnimal);

/**
 * @swagger
 * /api/animales/{id}:
 *   put:
 *     summary: Actualiza un animal existente
 *     tags: [Animales]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID del animal
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               nombre_animal:
 *                 type: string
 *               nombre_comun_animal:
 *                 type: string
 *               nombre_cientifico_animal:
 *                 type: string
 *               familia_orden_animal:
 *                 type: string
 *               habitat_animal:
 *                 type: string
 *               alimentacion_animal:
 *                 type: string
 *               esperanza_vida_animal:
 *                 type: string
 *               id_estado:
 *                 type: integer
 *               id_clasificacion:
 *                 type: integer
 *               descripcion_animal:
 *                 type: string
 *               imagen_animal:
 *                 type: string
 *     responses:
 *       200:
 *         description: Animal actualizado correctamente
 *       404:
 *         description: Animal no encontrado
 */
router.put('/:id', verificarJWT, animalController.updateAnimal);

/**
 * @swagger
 * /api/animales/{id}:
 *   delete:
 *     summary: Elimina un animal por su ID
 *     tags: [Animales]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         schema:
 *           type: integer
 *         required: true
 *         description: ID del animal
 *     responses:
 *       200:
 *         description: Animal eliminado correctamente
 *       404:
 *         description: Animal no encontrado
 */
router.delete('/:id', verificarJWT, animalController.deleteAnimal);

module.exports = router;