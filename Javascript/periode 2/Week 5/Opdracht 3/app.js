// auteur damien, gebruik gemaakt van Tekenene_met_canvas.pdf in de opdracht
// Start functie 



window.addEventListener("load", function () {

    // canvas defenieren
    let canvas = document.querySelector(".canvas");
    let ctx = canvas.getContext("2d");
    // canvas de hoogte en lengte geven van de browser
    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;
    canvas.addEventListener("mousedown", startPosition);
    canvas.addEventListener("mouseup", endPosition);




    // drie vierkanten, blauw rood en geel


    let painting = false;

    function startPosition() {
        painting = true;
        console.log("i'm painting");
        canvas.addEventListener("mousemove", draw);
    };

    function endPosition() {
        painting = false;
        ctx.beginPath();
    };



    function draw(e) {
        if (painting) {
            ctx.linWidth = 10;
            ctx.lineCap = "round";
            ctx.lineTo(e.clientX, e.clientY);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(e.clientX, e.clientY);
            return
        }
    }
});
