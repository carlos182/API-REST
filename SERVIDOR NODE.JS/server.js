const express = require('express');
const bodyParser = require('body-parser');

// create express app
const app = express();

// parse requests of content-type - application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }))

// parse requests of content-type - application/json
app.use(bodyParser.json())

// Configuring the database
const dbConfig = require('./config/database.config.js');
const mongoose = require('mongoose');

mongoose.Promise = global.Promise;

// Connecting to the database
mongoose.connect(dbConfig.url, {
    useNewUrlParser: true
}).then(() => {
    console.log("conexion a la base de datos satisfactoria");    
}).catch(err => {
    console.log('No se pudo conectar a la base de datos', err);
    process.exit();
});

// define a simple route
app.get('/', (req, res) => {
    res.json({"Mensaje": "Bienvenido al servicio Web REST de Prueba para el log de Mensajes WEB."});
});

// Require error routes
require('./app/routes/error.routes.js')(app);

// listen for requests
app.listen(3000, () => {
    console.log("Servidor esta escuchando en el puerto 3000");
});