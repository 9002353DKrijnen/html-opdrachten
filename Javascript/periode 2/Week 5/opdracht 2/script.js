window.onload = function () {
    let computerChoise = document.getElementById("computerChoice");
    let playerChoise = document.getElementById("playerChoice");
    let result = document.getElementById("result");
    // alle buttons onder een class:
    let possibleChoices = document.querySelectorAll("button");

    possibleChoices.forEach(button => button.addEventListener('click', (event) => {
        player = event.target.id;
        playerChoise.innerHTML = player;
        generateComputerChoice();
        }));

 function generateComputerChoice() {
        let randomNumber = Math.floor(Math.random() * 3 + 1);
        if (randomNumber == 1) {
            computerChoise.innerHTML = "rock";
            getResult();

        }
        else if (randomNumber == 2) {
            computerChoise.innerHTML = "paper";
            getResult();
        }
        else {
            computerChoise.innerHTML = "scissors";
            getResult();
        }
    }
function getResult(){
    // je vergelijkt innetHTML, dus directe keuzes vergelijken werkt niet. Ook weer wat geleerd. 

    let computerChoice = computerChoise.innerHTML;
    let playerChoice = playerChoise.innerHTML;
    if(computerChoice === playerChoice){
        result.innerHTML = "Gelijkspel";
    }
    if(computerChoice == "rock" && playerChoice == "scissors"){
        result.innerHTML = "Je hebt verloren!";
    }
    if(computerChoice == "rock" && playerChoice == "paper"){
        result.innerHTML = "U heeft gewonnen!";
    }
    if(computerChoice == "paper" && playerChoice == "scissors"){
        result.innerHTML = "U heeft gewonnen";
    }
    if(computerChoice == "paper" && playerChoice == "rock"){
        result.innerHTML = "U heeft verloren";
    }
    if(computerChoice == "scissors" && playerChoice == "rock"){
        result.innerHTML = "U heeft gewonnen!";
    }
    if (computerChoice == "rock" && playerChoice == "scissors"){
        result.innerHTML = "U heeft verloren";
    }
}









}