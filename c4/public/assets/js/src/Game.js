define(['jquery', 'src/Config'], function ($, Config) {

    class Game {

        start() {
            let preloader = 0
            let p = []

            let color = Config.color
            let nbLeds = Config.nbLeds

            let classBtn = Config.classBtnLed
            let self = this

            $(classBtn).each(function (index) {
                let elem = $(this)
                p.push(new Promise((resolve, reject) => {
                    setTimeout(function () {
                        resolve(
                            $(elem).css('backgroundColor', color)
                        )
                    }, (index * 500) + 500);
                }))
            })

            Promise.all(p).then(() => {
                $('.play').removeClass('hide')
            }, (raison) => {
                console.log(raison)
            });
        }
        drag()
        {

        }

    }

    return new Game

})