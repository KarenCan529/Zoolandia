const express = require('express');
const router = express.Router();
const adminController = require('../controllers/adminController');
const verificarJWT = require('../middlewares/verificarJWT'); 

// Definir las rutas para administradores
router.get('/', adminController.getAdministradores); // Obtener todos los administradores



router.use((req, res, next) => {
    if (req.method === 'GET') {
        return next();
    }
    verificarJWT(req, res, next); 
});


router.post('/', adminController.createAdministrador); // Crear un nuevo administrador
router.put('/:id', adminController.updateAdministrador); // Actualizar un administrador
router.delete('/:id', adminController.deleteAdministrador); // Eliminar un administrador


module.exports = router;