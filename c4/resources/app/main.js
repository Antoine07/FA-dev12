/**
 * Created by Antoine on 14/09/2016.
 */
require.config({
    shim: {
        'jQuery': {
            exports: '$'
        }
    }
});
require(['app', 'src/Game', 'jQuery'], function (app, Game, $) {

    let app = new App
    let Game = new Game

    App

});