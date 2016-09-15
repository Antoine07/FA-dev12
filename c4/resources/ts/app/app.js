/// <reference path="./lib/jquery.d.ts" />
/// <reference path='./lib/jqueryui.d.ts' />

import {Game} from './src/Game'

$(() => {
    // Finally, we kick things off by creating the **App**.
    let game = new Game();
    game.get()

});