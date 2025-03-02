
const express = require('express');
const router = express.Router();
const donacionController = require('../controllers/donacionController');

// Rutas de donaciones
router.get('/', donacionController.getDonaciones);
router.get('/ultima', donacionController.getDonacionesLastId);
router.get('/:id', donacionController.getDonacionById);
router.post('/', donacionController.createDonacion);
router.delete('/:id', donacionController.deleteDonacion);
// Obtener la última donación



module.exports = router;