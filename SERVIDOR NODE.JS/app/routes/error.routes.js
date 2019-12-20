module.exports = (app) => {
    const error = require('../controllers/error.controller.js');

    // Create a new Note
    app.post('/error', error.create);

    // Retrieve all Notes
    app.get('/error', error.findAll);

    // Retrieve a single Note with noteId
    app.get('/error/:Id', error.findOne);

    // Update a Note with noteId
    app.put('/error/:Id', error.update);

    // Delete a Note with noteId
    app.delete('/error/:Id', error.delete);
}