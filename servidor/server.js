const express = require('express');
const cors = require('cors');
const dotenv = require('dotenv');

dotenv.config();

const app = express(); 

app.use(express.json()); 
app.use(cors()); 


require("./swagger")(app); 

app.use('/api/token', require('./routes/token'));
app.use('/api/animales', require('./routes/animales'));
app.use('/api/donaciones', require('./routes/donaciones'));
app.use('/api/compras', require('./routes/compras'));
app.use('/api/reportes', require('./routes/reportes'));
app.use('/api/admin', require('./routes/admin'));

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
    console.log(`Swagger disponible en http://localhost:${PORT}/api-docs`);
});

