// elementen importeren
let game = document.querySelector(".container");
let status = document.querySelector(".status");
let resetButton = document.querySelector(".reset");
let gameButtons = document.querySelectorAll(".button");
let turn0 = true;
// als er per ongeluk op de reset knop wordt geklikt, wordt er eerst bevestigd of de daadwerkelijk speler opnieuw wilt spelen
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
            setInterval(() => {
                window.location.reload();
            }, 10000);
          
            return;
        }
    }
}






/*
https://dev.to/sfundomhlungu/javascript-tic-tac-toe-beginner-level-t24-46ef

*/