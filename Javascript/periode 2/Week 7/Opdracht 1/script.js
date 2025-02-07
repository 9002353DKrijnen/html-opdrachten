// elementen importeren
let game = document.querySelector(".container");
let status = document.querySelector(".status");
let resetButton = document.querySelector(".reset");
resetButton.addEventListener("click", () => {
    window.location.reload();
});
// variabelen voor de speler en compute
let currentPlayer = "X";
let board = ["", "", "", "", "", "", "", "", ""];
let selectedCell = "0";
let winPatterns = [

    0, 1, 2,
    3, 4, 5,
    6, 7, 8,
    0, 3, 6,
    1, 4, 7,
    2, 5, 8,
    0, 4, 8,
    2, 4, 6
];

//spellrooster maken
