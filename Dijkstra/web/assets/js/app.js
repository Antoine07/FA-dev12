let canvas = document.getElementById("graph");
let context = canvas.getContext("2d");
let radius = 3;
let someArray = [
    [0, 1, 0],
    [1, 0, 1],
    [0, 1, 0],
];
let d = 0;
class DrawCircle {
    render(ctX, ctY, radius) {
        console.log(context);
        context.beginPath();
        context.arc(ctX, ctY, radius, 0, 2 * Math.PI, false);
        context.fillStyle = 'green';
        context.fill();
        context.lineWidth = 5;
        context.strokeStyle = '#003300';
        context.stroke();
    }
    set dNumber(d) {
        this._d = d;
    }
    get dbNumber() {
        return this._d;
    }
}
let draw = new DrawCircle;
for (let entry of someArray) {
    for (let o of entry) {
        if (o == 1) {
            draw.render(radius + this._d, radius + this._d, radius);
        }
        this._d = this._d + 10;
    }
}
