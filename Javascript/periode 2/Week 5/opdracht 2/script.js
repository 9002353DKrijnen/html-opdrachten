window.onload = function () {
    let computerChoise = document.getElementById("computerChoice");
    let playerChoise = document.getElementById("playerChoice");
    let result = document.getElementById("result")
    // alle buttons onder een class:
    let possibleChoices = document.querySelectorAll("button");

possibleChoices.forEach(button => button.addEventListener('click', (event) => {
    player = event.target.id;
    playerChoise.innerHTML = player;
    generateComputerChoice();
}));

generateComputerChoice() = function(){
Math.floor(Math.random() * 3 + 1);


}









}