function checkIfCanBuy() {
    const productPrice = 50;
    let userMoney = prompt("Hoeveel geld heb je?");

    if (userMoney !== null) {  
        userMoney = parseFloat(userMoney);

        if (isNaN(userMoney)) {
            document.getElementById("result").innerHTML = "Voer een geldig getal in.";
        } else if (userMoney >= productPrice) {
            document.getElementById("result").innerHTML = "Je hebt genoeg geld om het product te kopen!";
        } else {
            document.getElementById("result").innerHTML = "Helaas, je hebt niet genoeg geld.";
        }
    } else {
        document.getElementById("result").innerHTML = "Voer een bedrag in om door te gaan.";
    }
}
