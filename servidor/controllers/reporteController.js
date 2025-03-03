const connection = require('../config/db');

// 1. Boletos vendidos globalmente
exports.getBoletosVendidosGlobal = (req, res) => {
    const query = `
        SELECT
            SUM(boletos_adulto) AS total_boletos_adultos,
            SUM(boletos_nino) AS total_boletos_ninos,
            SUM(boletos_nino_menor_3) AS total_boletos_ninos_menores_3,
            SUM(boletos_adulto + boletos_nino + boletos_nino_menor_3) AS total_boletos_vendidos
        FROM boleto`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
};

// 2. Ingresos totales
exports.getIngresosTotales = (req, res) => {
    const query = `SELECT * FROM total_ingresos`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
};

// 3. Donaciones realizadas
exports.getDonacionesRealizadas = (req, res) => {
    const query = `SELECT * FROM total_donaciones_realizadas`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
};

// 4. Total de dinero en donaciones
exports.getTotalDonaciones = (req, res) => {
    const query = `SELECT * FROM total_donaciones`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
};

// 5. Recorridos más reservados
exports.getRecorridosMasReservados = (req, res) => {
    const query = `SELECT * FROM recorridos_mas_reservados`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// 6. Paquetes más elegidos
exports.getPaquetesMasElegidos = (req, res) => {
    const query = `SELECT * FROM vista_total_compras_paquete`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results);
    });
};

// 7. Promedio de donaciones
exports.getPromedioDonaciones = (req, res) => {
    const query = `SELECT * FROM vista_promedio_donaciones`;
    
    connection.query(query, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
};

// 8. Boletos vendidos por fecha (con parámetro)
exports.getBoletosVendidosPorFecha = (req, res) => {
    const { fecha } = req.params;
    const query = `
        SELECT
            SUM(boletos_adulto) AS total_boletos_adultos,
            SUM(boletos_nino) AS total_boletos_ninos,
            SUM(boletos_nino_menor_3) AS total_boletos_ninos_menores_3,
            SUM(boletos_adulto + boletos_nino + boletos_nino_menor_3) AS total_boletos_vendidos
        FROM boleto
        JOIN compra ON boleto.id_compra = compra.id_compra
        WHERE DATE(compra.fecha_compra) = ?`;
    
    connection.query(query, [fecha], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.json(results[0]);
    });
};