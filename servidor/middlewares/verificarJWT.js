// verifyJWT.js
const jwt = require('jsonwebtoken');

const verificarJWT = (req, res, next) => {
    const token = req.header('Authorization')?.replace('Bearer ', ''); // Obtenemos el token desde el header 'Authorization'

    if (!token) return res.status(401).json({ error: 'Acceso denegado' });

    try {
        const decoded = jwt.verify(token, process.env.JWT_SECRET); // Verificamos el token
        req.user = decoded; // Añadimos la información del usuario al objeto de la solicitud
        next(); // Llamamos a la siguiente función si la verificación es exitosa
    } catch (err) {
        return res.status(401).json({ error: 'Token no válido' });
    }
};

module.exports = verificarJWT;
