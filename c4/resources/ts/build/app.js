/// <reference path="./lib/jquery.d.ts" />
/// <reference path='./lib/jqueryui.d.ts' />
"use strict";
var Game_1 = require('./src/Game');
$(function () {
    // Finally, we kick things off by creating the **App**.
    var game = new Game_1.Game();
    game.get();
});
