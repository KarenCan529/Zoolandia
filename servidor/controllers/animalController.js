const connection = require('../config/db');


exports.getAnimales = (req, res) => {
    connection.query('SELECT * FROM animal', (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

exports.getAnimalById = (req, res) => {
    const { id } = req.params;
    connection.query('SELECT * FROM animal WHERE id_animal = ?', [id], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        if (results.length === 0) {
            return res.status(404).json({ message: 'Animal no encontrado' });
        }
        res.json(results[0]);
    });
};

exports.createAnimal = (req, res) => {
    const { nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal } = req.body;
    const query = 'INSERT INTO animal (nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
    connection.query(query, [nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Animal creado', id: result.insertId });
    });
};


exports.updateAnimal = (req, res) => {
    const { id } = req.params;
    const { nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal } = req.body;
    const query = 'UPDATE animal SET nombre_animal=?, nombre_comun_animal=?, nombre_cientifico_animal=?, familia_orden_animal=?, habitat_animal=?, alimentacion_animal=?, esperanza_vida_animal=?, id_estado=?, id_clasificacion=?, descripcion_animal=?, imagen_animal=? WHERE id_animal=?';
    
    connection.query(query, [nombre_animal, nombre_comun_animal, nombre_cientifico_animal, familia_orden_animal, habitat_animal, alimentacion_animal, esperanza_vida_animal, id_estado, id_clasificacion, descripcion_animal, imagen_animal, id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Animal actualizado' });
    });
};

exports.deleteAnimal = (req, res) => {
    const { id } = req.params;
    connection.query('DELETE FROM animal WHERE id_animal = ?', [id], (err) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Animal eliminado' });
    });
};
