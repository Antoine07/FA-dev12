/**
 * @author: Tony
 * @description: power 4
 */

let express = require('express')
let app = express()

app.set('view engine', 'ejs')

app.use(express.static('public'))

app.get('/', (request, response)=>{
    response.render('home/index',{test: "hello"})
})

app.listen(8888)