const connection = require('../config/db');

// Obtener datos para el agradecimiento
exports.getAgradecimientos = (req, res) => {
    // Paso 1: Obtener el último ID de boleto
    const queryUltimoBoleto = `SELECT MAX(id_boleto) AS ultimo_id FROM boleto`;

    connection.query(queryUltimoBoleto, (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }

        const ultimoIdBoleto = result[0].ultimo_id; // Obtenemos el último ID de boleto

        if (!ultimoIdBoleto) {
            return res.status(404).json({ error: 'No se encontraron boletos' });
        }

        // Paso 2: Ejecutar la consulta SQL para obtener los datos del agradecimiento
        const sql = `
            SELECT 
                b.id_boleto, 
                b.boletos_adulto, 
                b.boletos_nino, 
                b.boletos_nino_menor_3, 
                r.fecha_reserva, 
                r.hora_reserva, 
                p.nombre_paquete, 
                r.incluye_tour,   -- Aquí se está tomando de la tabla Reserva
                rt.nombre_ruta,
                c.nombre_comprador, 
                c.apellido_paterno_comprador, 
                c.apellido_materno_comprador,
                c.fecha_compra,  -- Fecha de la compra
                c.correo_comprador,  -- Correo del comprador
                p.precio_adulto,  -- Precio del boleto adulto
                p.precio_nino,  -- Precio del boleto niño
                b.boleto_total_adulto,  -- Total del costo de los boletos adultos
                b.boleto_total_nino,  -- Total del costo de los boletos niños
                b.boleto_total_general  -- Total general de los boletos
            FROM 
                boleto b
            JOIN reserva r ON b.id_reserva = r.id_reserva
            JOIN paquete p ON r.id_paquete = p.id_paquete
            LEFT JOIN Ruta rt ON r.id_ruta = rt.id_ruta
            JOIN compra c ON b.id_compra = c.id_compra
            WHERE b.id_boleto = ?;
        `;

        connection.query(sql, [ultimoIdBoleto], (err, results) => {
            if (err) {
                return res.status(500).json({ error: err.message });
            }

            if (results.length === 0) {
                return res.status(404).json({ error: 'No se encontraron datos para el agradecimiento' });
            }

            // Paso 3: Devolver los datos en formato JSON
            res.json(results[0]);
        });
    });
};

// Obtener todas las reservas
exports.getReservas = (req, res) => {
    const query = `SELECT * FROM Reserva`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Crear una nueva reserva
exports.createReserva = (req, res) => {
    const { fecha_reserva, hora_reserva, id_ruta, id_paquete, incluye_tour } = req.body;

    const query = `
        INSERT INTO Reserva (fecha_reserva, hora_reserva, id_ruta, id_paquete, incluye_tour)
        VALUES (?, ?, ?, ?, ?)
    `;

    connection.query(query, [fecha_reserva, hora_reserva, id_ruta, id_paquete, incluye_tour], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Reserva creada', id_reserva: result.insertId });
    });
};

// Obtener todas las compras
exports.getCompras = (req, res) => {
    const query = `SELECT * FROM Compra`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Crear una nueva compra
exports.createCompra = (req, res) => {
    const { correo_comprador, nombre_comprador, apellido_paterno_comprador, apellido_materno_comprador } = req.body;

    const query = `
        INSERT INTO Compra (correo_comprador, nombre_comprador, apellido_paterno_comprador, apellido_materno_comprador, fecha_compra)
        VALUES (?, ?, ?, ?, NOW())
    `;

    connection.query(query, [correo_comprador, nombre_comprador, apellido_paterno_comprador, apellido_materno_comprador], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Compra creada', id_compra: result.insertId });
    });
};

// Obtener todos los boletos
exports.getBoletos = (req, res) => {
    const query = `SELECT * FROM Boleto`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Crear un nuevo boleto
exports.createBoleto = (req, res) => {
    const { id_compra, boletos_adulto, boletos_nino, boletos_nino_menor_3, id_reserva } = req.body;

    const query = `
        INSERT INTO Boleto (id_compra, boletos_adulto, boletos_nino, boletos_nino_menor_3, id_reserva)
        VALUES (?, ?, ?, ?, ?)
    `;

    connection.query(query, [id_compra, boletos_adulto, boletos_nino, boletos_nino_menor_3, id_reserva], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Boleto creado', id_boleto: result.insertId });
    });
};

//---------------------------------------------------------------------Lo nuevo
// Obtener todos los paquetes
exports.getPaquetes = (req, res) => {
    const query = `SELECT * FROM Paquete`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Actualizar un paquete
exports.updatePaquete = (req, res) => {
    const { id_paquete } = req.params;
    const { nombre_paquete, precio_adulto, precio_nino } = req.body;

    const query = `
        UPDATE Paquete 
        SET nombre_paquete = ?, precio_adulto = ?, precio_nino = ?
        WHERE id_paquete = ?
    `;

    connection.query(query, [nombre_paquete, precio_adulto, precio_nino, id_paquete], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Paquete actualizado', id_paquete: id_paquete });
    });
};
//------guia:
// Obtener todos los guías
exports.getGuias = (req, res) => {
    const query = `SELECT * FROM Guia`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Crear un nuevo guía
exports.createGuia = (req, res) => {
    const { nombre_guia, disponibilidad_guia } = req.body;

    const query = `
        INSERT INTO Guia (nombre_guia, disponibilidad_guia)
        VALUES (?, ?)
    `;

    connection.query(query, [nombre_guia, disponibilidad_guia], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(201).json({ message: 'Guía creado', id_guia: result.insertId });
    });
};

// Actualizar un guía
exports.updateGuia = (req, res) => {
    const { id_guia } = req.params;
    const { nombre_guia, disponibilidad_guia } = req.body;

    const query = `
        UPDATE Guia 
        SET nombre_guia = ?, disponibilidad_guia = ?
        WHERE id_guia = ?
    `;

    connection.query(query, [nombre_guia, disponibilidad_guia, id_guia], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Guía actualizado', id_guia: id_guia });
    });
};

// Eliminar un guía
exports.deleteGuia = (req, res) => {
    const { id_guia } = req.params;

    const query = `DELETE FROM Guia WHERE id_guia = ?`;

    connection.query(query, [id_guia], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Guía eliminado', id_guia: id_guia });
    });
};


//-----ruta:
// Obtener todas las rutas
exports.getRutas = (req, res) => {
    const query = `SELECT * FROM Ruta`;

    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// Actualizar una ruta
exports.updateRuta = (req, res) => {
    const { id_ruta } = req.params;
    const { nombre_ruta, descripcion_ruta } = req.body;

    const query = `
        UPDATE Ruta 
        SET nombre_ruta = ?, descripcion_ruta = ?
        WHERE id_ruta = ?
    `;

    connection.query(query, [nombre_ruta, descripcion_ruta, id_ruta], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json({ message: 'Ruta actualizada', id_ruta: id_ruta });
    });
};