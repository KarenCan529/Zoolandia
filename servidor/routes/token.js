const express = require('express');
const router = express.Router();
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const db = require('../config/db'); 

/**
 * @swagger
 * /api/token/login:
 *   post:
 *     summary: Iniciar sesión y obtener un token JWT
 *     tags: [Autenticación]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               correo_administrador:
 *                 type: string
 *                 example: "admin@example.com"
 *               password_administrador:
 *                 type: string
 *                 example: "admin123"
 *     responses:
 *       200:
 *         description: Token JWT obtenido con éxito
 *         content:
 *           application/json:
 *             schema:
 *               type: object
 *               properties:
 *                 token:
 *                   type: string
 *                   description: El token JWT para autenticación
 *       401:
 *         description: Credenciales incorrectas
 *       500:
 *         description: Error del servidor
 */

// Ruta de inicio de sesión
router.post('/login', (req, res) => {
    const { correo_administrador, password_administrador } = req.body;

    db.query(
        'SELECT * FROM administrador WHERE correo_administrador = ?',
        [correo_administrador],
        (err, results) => {
            if (err) {
                console.error("Error en MySQL:", err); // Veremos el error exacto en la terminal
                return res.status(500).json({ 
                    error: 'Error en el servidor', 
                    detalle: err.message 
                });
            }

            if (results.length === 0) return res.status(401).json({ error: 'Credenciales incorrectas' });

            const admin = results[0];

            // Verificar la contraseña
            bcrypt.compare(password_administrador, admin.password_administrador, (err, isMatch) => {
                if (err) return res.status(500).json({ error: 'Error al verificar la contraseña' });
                if (!isMatch) return res.status(401).json({ error: 'Credenciales incorrectas' });

                // Generar el JWT
                const token = jwt.sign(
                    { id_administrador: admin.id_administrador },
                    process.env.JWT_SECRET,
                    { expiresIn: '1h' }
                );

                res.json({ token });
            });
        }
    );
});

module.exports = router;
