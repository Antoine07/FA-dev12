/**
 * @author: Tony
 * @description: power 4
 */

let express = require('express'),
    app = express(),
    session = require('cookie-session'),
    bodyParser = require('body-parser'),
    urlencoder = bodyParser.urlencoded({extended: false}),
    db = require('./src/db').db

app.set('view engine', 'ejs')

app.use(express.static('public'))

app.get('/game', (request, response)=> {
    response.render('game/index', {test: "hello"})
})

app.get('/', (request, response)=> {
    response.render('home/index', {test: "hello"})
})

app.post('/inscription', (request, response)=> {

    response.redirect('/game');

})

app.listen(8888)