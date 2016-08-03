'use strict';

function* generateName() {
    let id = 0;

    while (true) {
        id++;
        yield `./images/image${id}.jpg`;
    }
}
let i = 0;
let files = [];
let gen = generateName();
while (i < 10) {
    files.push(gen.next().value);
    i++
}

function load(fileName) {
    return new Promise(function (resolve, reject) {
        let image = new Image;

        image.onload = function () {
            resolve(image);
        };

        image.error = function () {
            reject(fileName)
        };

        image.src = fileName;
    });
}


let msg = {
    success: function (data) {
        console.log(data);
    },
    error: function (data) {
        console.log(data);
    }
};

 function run() {
    files.forEach(function (fileName) {

        let Image =  load(fileName);

        Image.then(image => {
            let $span = $("<spam></spam>").append(image).hide();

            $("#portfolio").append($span);
            $span.fadeIn(2000);

        }).catch(msg.error);
    });
}

run();
