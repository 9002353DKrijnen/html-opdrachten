let boxes = document.querySelectorAll(".box");
let resetbutton = document.getElementById("reset");
let turn0= true;
let newGameBtn = document.getElementById("newGame");
resetbutton.addEventListener("click", reset);
newGameBtn.addEventListener("click", reset);
let winPatterns = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];
boxes.forEach(box => {
    box.addEventListener("click", () => {
        if(turn0){
            box.innerText = "O";
            box.style.color = "yellow";
            turn0 = false;
            box.diasbled = true;
            checkWin();
        }else{
            box.innerText = "X";
            box.style.color = "blue";
            turn0 = true;
            box.diasbled = true;
            checkWin();
        }
    });
});


// bron: https://www.geeksforgeeks.org/simple-tic-tac-toe-game-using-javascript/