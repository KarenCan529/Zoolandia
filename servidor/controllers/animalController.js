const connection = require('../config/db');


// Obtener todos los animales con su clasificación
exports.getAnimales = (req, res) => {
    const query = `
        SELECT a.*, c.nombre_clasificacion 
        FROM animal a
        JOIN clasificacion c ON a.id_clasificacion = c.id_clasificacion
        ORDER BY a.id_animal ASC`; // Aquí ordenamos por id_animal de menor a mayor
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};


exports.getClasificaciones = (req, res) => {
    const query = `SELECT id_clasificacion, nombre_clasificacion FROM clasificacion`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

exports.getEstadosConservacion = (req, res) => {
    const query = `SELECT id_estado, nombre_estado FROM estado_conservacion`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};


// Obtener un animal por ID con su clasificación
exports.getAnimalById = (req, res) => {
    const { id } = req.params;
    const query = `
        SELECT a.*, c.nombre_clasificacion 
        FROM animal a
        JOIN clasificacion c ON a.id_clasificacion = c.id_clasificacion
        WHERE a.id_animal = ?`;
    
    connection.query(query, [id], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        if (results.length === 0) {
            return res.status(404).json({ message: 'Animal no encontrado' });
        }
        res.json(results[0]);
    });
};

// Crear un nuevo animal
exports.createAnimal = (req, res) => {
    const { nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal } = req.body;
    const query = `
        INSERT INTO animal (nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;
    
    connection.query(query, [nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Animal creado', id: result.insertId });
    });
};

// Actualizar un animal
exports.updateAnimal = (req, res) => {
    const { id } = req.params;
    const { nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal } = req.body;
    const query = `
        UPDATE animal 
        SET nombre_animal=?, nombre_comun_animal=?, nombre_cientifico_animal=?, familia_orden_animal=?, habitat_animal=?, alimentacion_animal=?, esperanza_vida_animal=?, id_estado=?, id_clasificacion=?, descripcion_animal=?, imagen_animal=?
        WHERE id_animal=?`;
    
    connection.query(query, [nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal, id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Animal actualizado' });
    });
};

// Eliminar un animal
exports.deleteAnimal = (req, res) => {
    const { id } = req.params;
    connection.query('DELETE FROM animal WHERE id_animal = ?', [id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Animal eliminado' });
    });
};
