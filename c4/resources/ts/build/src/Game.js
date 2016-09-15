"use strict";
var Game = (function () {
    function Game() {
    }
    Game.prototype.get = function () {
        console.log("this is a game hello");
    };
    return Game;
}());
exports.Game = Game;
