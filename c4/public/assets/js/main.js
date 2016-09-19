require.config({
    paths: {
        jquery: 'lib/jquery',
        jqueryui: 'lib/jqueryui.min'
    }
})


require(['jquery', 'src/Game'], function ($, Game) {

    $(()=> {
       Game.run()
    })

})