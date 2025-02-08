/* Opdracht lighthouse
auteur: damien 9002353
 */

// elementen importeren
window.onload = function()  {
    let main = document.querySelector(".main");
    let infobox = document.createElement("p");
    infobox.id = "infobox";
    infobox.innerHTML = "Je kan de arrow keys + enter gebruiken voor het spel, of je muis.";
    main.appendChild(infobox);
}
let game = document.querySelector(".container");
let status = document.querySelector(".status");
let resetButton = document.querySelector(".reset");
let gameButtons = document.querySelectorAll(".button");
// X begint
let turn0 = true;
let currentIndex = 0;
gameButtons[currentIndex].focus();
// als er per ongeluk op de reset knop wordt geklikt, wordt er eerst bevestigd of de  speler  daadwerkelijk opnieuw wilt spelen
resetButton.addEventListener("click", () => {
    if (confirm("Wilt u opnieuw spelen?")) {
        window.location.reload();
        return;
    }
    else {
        alert("Geannuleerd");
        return;
    }
});
// variabelen voor de speler 
let currentPlayer = "X";
let board = ["", "", "", "", "", "", "", "", ""];
let selectedCell = "0";
let winPatterns = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
];


// foreach, deze zorgt ervoor dat de knoppen worden geactiveerd zodat de speler kan spelen
gameButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
        if (board[index] === "") {
            statusBoard();
            if (turn0) {
                board[index] = "X";
            }
            else {
                board[index] = "O";
            }
            button.textContent = board[index];
            turn0 = !turn0;
            checkWin();
            return;
        }
    });
});

// arrowkey navigatie:
document.addEventListener("keydown", (event) => {
    if(event.key === "ArrowUp") {
        currentIndex = (currentIndex - 3 + gameButtons.length) % gameButtons.length;
        gameButtons[currentIndex].focus();
    }
    else if(event.key === "ArrowDown") {
        currentIndex = (currentIndex + 3) % gameButtons.length;
        gameButtons[currentIndex].focus();
    }
    else if(event.key === "ArrowLeft") {
        currentIndex = (currentIndex - 1 + gameButtons.length) % gameButtons.length;
        gameButtons[currentIndex].focus();
    }
    else if(event.key === "ArrowRight") {
        currentIndex = (currentIndex + 1) % gameButtons.length;
        gameButtons[currentIndex].focus();
    }
    else if (event.key === "Enter") {
        gameButtons[currentIndex].click();
    }
    gameButtons[currentIndex].focus();
});
// for-loop, deze checkt of de speler gewonnen heeft of niet, en zorgt ervoor dat de knoppen worden deactiverd zodat de speler niet meer kan spelen

function checkWin() {
    for (let i = 0; i < winPatterns.length; i++) {
        let [a, b, c] = winPatterns[i];
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
            status.innerHTML = `Speler ${board[a]} heeft gewonnen`;
            disableBoard();
            return;
        }
        else if (!board.includes("")) {
            status.innerHTML = "Gelijkspel";
            disableBoard();
            return;
        }
    }
}
/*
Optioneel, deze zorgt ervoor dat de knoppen worden deactiverd zodat de speler niet meer kan spelen, best vervelend als je door klikt terwijl de andere heeft gewonnen,
om het naar een gelijkspel te veranderen. 
*/
function disableBoard() {
    console.log(gameButtons);
    gameButtons.forEach((button) => {
        button.style.pointerEvents = "none";
        setInterval(function () {
            window.location.reload();
        }, 6000);

    });
    let main = document.querySelector(".main");
    let newInfo = document.createElement("p");
    newInfo.id = "info";
    newInfo.innerHTML = "Spel wordt opnieuw geladen";
    main.appendChild(newInfo);
}

function statusBoard() {

    if (turn0) {
        status.innerHTML = "Speler O is aan de beurt";
    }
    else {
        status.innerHTML = "Speler X is aan de beurt";
    }
}
// .disabled werkt alleen met knoppen, maar .style.pointerEvents werkt met divs dus ipv .disabled = true; heb ik .style.pointerEvents = "none"; gebruikt. 

/*
https://dev.to/sfundomhlungu/javascript-tic-tac-toe-beginner-level-t24-46ef

*/