const express = require('express');
const router = express.Router();
const compraController = require('../controllers/compraController');
const verificarJWT = require('../middlewares/verificarJWT'); 



router.get('/reservas', compraController.getReservas);
router.get('/', compraController.getCompras);
router.get('/boletos', compraController.getBoletos);
router.get('/paquetes', compraController.getPaquetes); 
router.get('/agradecimientos', compraController.getAgradecimientos);
router.get('/guias', compraController.getGuias); 
router.get('/rutas', compraController.getRutas);  

router.use((req, res, next) => {
    if (req.method === 'GET') {
        return next();
    }
    verificarJWT(req, res, next); 
});


router.post('/reservas', compraController.createReserva);
router.post('/', compraController.createCompra);
router.post('/boletos', compraController.createBoleto); 
router.put('/paquetes/:id_paquete', compraController.updatePaquete);  
router.post('/guias', compraController.createGuia); 
router.put('/guias/:id_guia', compraController.updateGuia); 
router.delete('/guias/:id_guia', compraController.deleteGuia);  
router.put('/rutas/:id_ruta', compraController.updateRuta); 



module.exports = router;