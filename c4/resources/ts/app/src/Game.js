var Game = (function () {
    function Game() {
    }
    Game.prototype.get = function () {
        console.log("this is a game");
    };
    return Game;
})();
exports.Game = Game;
