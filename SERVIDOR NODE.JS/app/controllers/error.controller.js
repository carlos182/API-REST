const Error = require('../models/error.model.js');

// Create and Save a new error
exports.create = (req, res) => {
    // Validate request
    if(!req.body.Id) {
        return res.status(400).send({
            message: "El contenido no debe estar vacio"
        });
    }

    // Create a Note
    const error = new Error({
        Id: req.body.Id || 0, 
        CodigoError: req.body.CodigoError,
        FechaRegistro: req.body.FechaRegistro,
        Usuario: req.body.Usuario,
        Comentario: req.body.Comentario
    });

    // Save Note in the database
    error.save()
    .then(data => {
        res.send(data);
    }).catch(err => {
        res.status(500).send({
            message: err.message || "A ocurrido un error al insertar el registro."
        });
    });
};

// Retrieve and return all notes from the database.
exports.findAll = (req, res) => {
    Error.find()
    .then(error => {
        res.send(error);
    }).catch(err => {
        res.status(500).send({
            message: err.message || "A ocurrido un error al recuperar los registros."
        });
    });
};

// Find a single note with a noteId
exports.findOne = (req, res) => {
    Error.findById(req.params.Id)
    .then(error => {
        if(!error) {
            return res.status(404).send({
                message: "Se encontro un error con el ID: " + req.params.Id
            });            
        }
        res.send(error);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
            return res.status(404).send({
                message: "Se encontro un error con el ID: " + req.params.Id
            });                
        }
        return res.status(500).send({
            message: "Ocurrio un error al recuperar el registro de ID " + req.params.Id
        });
    });
};

// Update a note identified by the noteId in the request
exports.update = (req, res) => {
    // Validate Request
    if(!req.body.Id) {
        return res.status(400).send({
            message: "El contenido no debe estar vacio"
        });
    }

    // Find note and update it with the request body
    Error.findByIdAndUpdate(req.params.Id, {
        Id: req.body.Id || 0, 
        CodigoError: req.body.CodigoError,
        FechaRegistro: req.body.FechaRegistro,
        Usuario: req.body.Usuario,
        Comentario: req.body.Comentario
    }, {new: true})
    .then(error => {
        if(!error) {
            return res.status(404).send({
                message: "No se encontro un registro con el ID: " + req.params.Id
            });
        }
        res.send(error);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
            return res.status(404).send({
                message: "No se encontro un registro con el ID: " + req.params.Id
            });                
        }
        return res.status(500).send({
            message: "Ocurrio un error al actualizar el registro " + req.params.Id
        });
    });
};

// Delete a note with the specified noteId in the request
exports.delete = (req, res) => {
    Error.findByIdAndRemove(req.params.Id)
    .then(error => {
        if(!error) {
            return res.status(404).send({
                message: "No se encontro un registro con el ID:" + req.params.Id
            });
        }
        res.send({message: "Se elimino el registro con exito"});
    }).catch(err => {
        if(err.kind === 'ObjectId' || err.name === 'No Encontrado') {
            return res.status(404).send({
                message: "No se encontro un registro con el ID: " + req.params.Id
            });                
        }
        return res.status(500).send({
            message: "No se pudo eliminar el registro " + req.params.Id
        });
    });
};