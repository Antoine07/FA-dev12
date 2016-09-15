define(['jquery', 'jqueryui', 'src/Config'], function ($, ui, Config) {

    class Game {

        run() {
            this.start()
            this.drag()
        }

        start() {
            let color = Config.color
            let classBtnLed = Config.classBtnLed

            this.light(classBtnLed, color)
        }

        light(classBtn, color, dyn = false, max = 0) {
            let p = []
            let colorIni = '#ffd600'
            $(classBtn).each(function (index) {
                if (index <= max || !dyn) {
                    let elem = $(this)
                    p.push(new Promise((resolve, reject) => {
                            setTimeout(function () {
                                resolve(
                                    $(elem).css('backgroundColor', color)
                                )
                            }, (index * 500) + 500)
                            //reject('some matter with sitTime light, number light:' + index)
                        }
                        )
                    )
                }

                if (dyn && max != index) {
                    p.push(new Promise((resolve, reject) => {

                        let elem = $(this)

                        setTimeout(function () {
                            resolve($(elem).css('backgroundColor', colorIni))
                        }, (index * 500) + 1000);
                    }))
                }

            })

            Promise.all(p).then(() => {
                if($('.play').hasClass('hide'))
                    $('.play').removeClass('hide')

            }, (raison) => {
                console.log('raison: ' + raison)
            });
        }

        drag() {
            let parentPosY = $('.play').offset().top
            let color = Config.color
            let classBtnLed = Config.classBtnLed
            let self = this

            $('.play').draggable({
                axis: 'y',
                revert: true,
                containment: '.play',
                posY: 0,
                start: function (e, u) {
                    $('.btn-led').each(function (index) {
                        $(this).css('backgroundColor', '#ffd600')
                    })
                },
                drag: function () {
                    let offset = $(this).offset();
                    this.posY = offset.top - parentPosY;
                },
                stop: function (e, u) {

                    let max = 0

                    if (this.posY == 344) max = 5
                    if (this.posY < 344 && this.posY > 210) max = 4
                    if (this.posY < 210 && this.posY > 110) max = 3
                    if (this.posY < 110 && this.posY > 10) max = 2
                    if (this.posY < 10 && this.posY > 5) max = 1

                    self.light(classBtnLed, 'red', true, max)
                }
            })
        }

    }

    return new Game

})