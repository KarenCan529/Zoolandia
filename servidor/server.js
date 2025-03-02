const express = require('express');
const cors = require('cors');
const dotenv = require('dotenv');

dotenv.config();

const app = express();


app.use(express.json()); 
app.use(cors()); 

app.use('/api/animales', require('./routes/animales'));
app.use('/api/donaciones', require('./routes/donaciones'));
app.use('/api/compras', require('./routes/compras'));

const PORT = process.env.PORT;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
