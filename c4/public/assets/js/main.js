require.config({

    paths: {
        jquery: 'lib/jquery'
    }
})


require(['jquery', 'src/Game'], function ($, Game) {

    $(()=> {
       Game.start()
    })

})