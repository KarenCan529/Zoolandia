const connection = require('../config/db');

// Obtener todas las donaciones
exports.getDonaciones = (req, res) => {
    const query = `SELECT * FROM donacion`;
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

exports.getDonacionesLastId = (req, res) => {
    const query = `SELECT * FROM donacion ORDER BY id_donacion DESC LIMIT 1`;
    connection.query(query, (err, results, fields) => {
        if (err) {
            console.error('Error en la consulta SQL:', err.message); // Depuración
            return res.status(500).json({ error: err.message });
        }

        // Verifica si results es un array y tiene al menos un elemento
        if (!Array.isArray(results) || results.length === 0) {
            console.log('No hay donaciones registradass'); // Depuración
            return res.status(404).json({ message: 'No hay donaciones registradas' });
        }

        res.json(results[0]); // Devuelve la última donación
    });
};

// Obtener una donación por ID
exports.getDonacionById = (req, res) => {
    const { id } = req.params;
    const query = `SELECT * FROM donacion WHERE id_donacion = ?`;
    connection.query(query, [id], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        if (results.length === 0) {
            return res.status(404).json({ message: 'Donación no encontrada' });
        }
        res.json(results[0]);
    });
};

//// Crear una nueva donación
exports.createDonacion = (req, res) => {
    // Extraer los datos del cuerpo de la solicitud
    const { 
        nombre_donante, 
        apellido_paterno_donante, 
        apellido_materno_donante, 
        correo_donante, 
        monto_donacion, 
        fecha_donacion // Asegúrate de recibir la fecha
    } = req.body;

    // Consulta SQL para insertar la donación
    const query = `
        INSERT INTO donacion 
        (nombre_donante, apellido_paterno_donante, apellido_materno_donante, correo_donante, monto_donacion, fecha_donacion) 
        VALUES (?, ?, ?, ?, ?, ?)`;

    // Ejecutar la consulta con los datos recibidos
    connection.query(query, [
        nombre_donante, 
        apellido_paterno_donante, 
        apellido_materno_donante, 
        correo_donante, 
        monto_donacion, 
        fecha_donacion // Usar la fecha recibida
    ], (err, result) => {
        if (err) {
            // Si hay un error, devolver un mensaje de error
            return res.status(500).json({ error: err.message });
        }
        // Si todo sale bien, devolver un mensaje de éxito
        res.status(201).json({ message: 'Donación creada', id: result.insertId });
    });
};


// Eliminar una donación
exports.deleteDonacion = (req, res) => {
    const { id } = req.params;
    const query = 'DELETE FROM donacion WHERE id_donacion = ?';
    connection.query(query, [id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Donación eliminada' });
    });
};
