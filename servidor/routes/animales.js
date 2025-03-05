const express = require('express');
const router = express.Router();
const animalController = require('../controllers/animalController');
const verificarJWT = require('../middlewares/verificarJWT');
// Definir rutas
router.get('/', animalController.getAnimales);
router.get('/clasificaciones', animalController.getClasificaciones);
router.get('/estado-conservacion', animalController.getEstadosConservacion);
router.get('/:id', animalController.getAnimalById);

router.use((req, res, next) => {
    if (req.method === 'GET') {
        return next();
    }
    verificarJWT(req, res, next); 
});

router.post('/', animalController.createAnimal);
router.put('/:id', animalController.updateAnimal);
router.delete('/:id', animalController.deleteAnimal);

module.exports = router;
