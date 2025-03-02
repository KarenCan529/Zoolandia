const express = require('express');
const router = express.Router();
const animalController = require('../controllers/animalController');

router.get('/', animalController.getAnimales);
router.get('/:id', animalController.getAnimalById);
router.post('/', animalController.createAnimal);
router.put('/:id', animalController.updateAnimal);
router.delete('/:id', animalController.deleteAnimal);

module.exports = routaser;
