
const express = require('express');
const router = express.Router();
const animalController = require('../controllers/animalController');

// Definir rutas
router.get('/', animalController.getAnimales);
router.get('/clasificaciones', animalController.getClasificaciones);
router.get('/estado-conservacion', animalController.getEstadosConservacion);
router.get('/:id', animalController.getAnimalById);
router.post('/', animalController.createAnimal);
router.put('/:id', animalController.updateAnimal);
router.delete('/:id', animalController.deleteAnimal);

module.exports = router;