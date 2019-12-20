const mongoose = require('mongoose');

const ErrorSchema = mongoose.Schema({
    Id: Number,
    CodigoError: Number,
    FechaRegistro: String,
    Usuario: String,
    Comentario: String
}, {
    timestamps: true
});

module.exports = mongoose.model('error', ErrorSchema);