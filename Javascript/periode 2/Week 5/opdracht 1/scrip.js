window.onload = function () {
    let timerButton = document.getElementById("goTime");
    timerButton.onclick = function () {
        timerButton.onclick = null;
        timerButton.innerHTML = "";
        document.body.style.backgroundColor = "red";
        let randomDelay = Math.floor(Math.random() * 10 + 1) * 1000; // het is in milliseconden deze waarden roepen we zo op omdat setTimeout in milliseconden werkt

        setTimeout(function () {
            document.body.style.backgroundColor = "green";
            timerButton.innerHTML = `Duur: ${randomDelay} ms`;
            let startTime = Date.now();



            // function voor een vergelijking. Wanneer gebruiker op het groene body klik wordt de output geregistreerd.
            document.body.onclick = function () {
                if (document.body.style.backgroundColor === "green") {
                    let reactionTime = Date.now() - startTime;
                    timerButton.innerHTML = `Reactietijd is ${reactionTime} in milliseconden`;
                    let averageReactionTime = 200;

                    if (reactionTime <= averageReactionTime) {
                        alert(`${averageReactionTime} is de gemiddelde duur, uw duur is${reactionTime}, gefeliciteerd.`);

                    }
                    else {
                        alert(`${averageReactionTime} is de gemiddelde duur, uw reactietijd is ${reactionTime}`);

                    }
                    document.body.onclick = null;
                    document.body.style.backgroundColor = "white";
                }
            }
        }, randomDelay);


    }
}



