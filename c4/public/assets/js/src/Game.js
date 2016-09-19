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

        light(classBtn, color, dyn = false, max = 0, sens) {
            let p = []
            let colorIni = Config.color
            $.fn.reverse = [].reverse;
            let led = $(classBtn)
            if (sens < 0) led = led.reverse()

            led.each(function (index) {
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
                if ($('.play').hasClass('hide'))
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

            $('.play__btn').draggable({
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
                },
                stop: function (e, u) {
                    let max = self.getMax()

                    let classes = $(this).attr('class').split(" ")
                    let sens = 1

                    for (let c of classes) {
                        if (c == 'btn-right') {
                            sens = -1
                            break
                        }
                    }
                    self.light(classBtnLed, 'red', true, max, sens)
                }
            })
        }

        getMax() {
            return (Math.round(Math.random() * 10) % Config.nbLeds )
        }
    }

    return new Game

})