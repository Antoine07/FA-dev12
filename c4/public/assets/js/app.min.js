(function ($) {

    $(function () {
        let p = []
        let preloader = 0
        let nbLeds = 6

        $('.btn-led').each(function (index) {
            p.push(new Promise((resolve, reject) => {
                let elem = $(this)
                let animate = function (e) {
                    $(e).css('backgroundColor', '#ffd600');
                    preloader++
                    $('.determinate').css('width', (preloader / nbLeds) * 100 + '%')
                }

                setTimeout(function () {
                    resolve(animate(elem))
                }, (index * 500) + 500);
            }))
        })

        Promise.all(p).then(() => {
            $('.play').removeClass('hide')
        }, (raison) => {
            console.log(raison)
        });

        let parentPosY = $('.play').offset().top;

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

                console.log(max)

                $('.btn-led').each(function (index) {
                    if (index <= max) {
                        p.push(new Promise((resolve, reject) => {
                            let elem = $(this)
                            let animate = function (e) {
                                $(e).css('backgroundColor', 'red');
                            }

                            setTimeout(function () {
                                resolve(animate(elem))
                            }, (index *  500) + 500);
                        }))
                        p.push(new Promise((resolve, reject) => {

                            if(max != index){
                                let elem = $(this)
                                let animate = function (e) {
                                    $(e).css('backgroundColor', '#ffd600');
                                }

                                setTimeout(function () {
                                    resolve(animate(elem))
                                }, (index *  500) + 1000);
                            }
                            
                        }))


                    }
                })

                Promise.all(p).then(() => {
                }, (raison) => {
                    console.log(raison)
                });
            }
        })


    })

})(jQuery)