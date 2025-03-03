const connection = require('../config/db');

// Obtener todos los administradores
exports.getAdministradores = (req, res) => {
    const query = `SELECT id_administrador, nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador FROM administrador`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Crear un nuevo administrador
exports.createAdministrador = (req, res) => {
    const { nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador } = req.body;

    // Validar que todos los campos estén presentes
    if (!nombre_administrador || !apellido_paterno_administrador || !apellido_materno_administrador || !correo_administrador || !password_administrador) {
        return res.status(400).json({ error: 'Todos los campos son obligatorios' });
    }

    const query = `
        INSERT INTO administrador (nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador)
        VALUES (?, ?, ?, ?, ?)`;
    
    connection.query(query, [nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Administrador creado', id: results.insertId });
    });
}

// Actualizar un administrador
exports.updateAdministrador = (req, res) => {
    const { id } = req.params;
    const { nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador } = req.body;
    
    const query = `
        UPDATE administrador 
        SET nombre_administrador=?, apellido_paterno_administrador=?, apellido_materno_administrador=?, correo_administrador=?, password_administrador=?
        WHERE id_administrador=?`;
    
    connection.query(query, [nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador, id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Administrador actualizado' });
    });
};

// Eliminar un administrador
exports.deleteAdministrador = (req, res) => {
    const { id } = req.params;
    connection.query('DELETE FROM administrador WHERE id_administrador = ?', [id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Administrador eliminado' });
    });
};