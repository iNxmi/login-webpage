var canvas, context,
    width, height;

window.onload = function () {
    canvas = document.getElementById("canvas");
    context = canvas.getContext("2d");

    setCanvasSize();

    var baseRadius = 500,
        offset = 400,
        speed = .01,
        t = 0;

    render();
};

window.onresize = function () {
    setCanvasSize();
};

function setCanvasSize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
}