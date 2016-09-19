let sqlite3 = require('sqlite3').verbose(),
    db = new sqlite3.Database('../game.db')

exports.db = db