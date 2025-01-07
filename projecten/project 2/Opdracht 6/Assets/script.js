var currentPage = window.location.pathname;

// Laden van index.html, zodat de uitvoer correct is
/* OPDRACHT 1 */
if (currentPage.includes("index.html")) {
    var btn = document.getElementById("btn");
    var form = document.querySelector(".loginForm");

    btn.onclick = function () {
        event.preventDefault();
        var username = form.userid.value;
        var password = form.pwd.value;

        if (username === "admin" && password === "admin") {
            window.location.href = "./HTML/overzicht.html";
            return true;
        } else if (username === "Mario" && password === "Mario2") {
            window.location.href = "./HTML/rekening_mario.html";
            return true;
        } else {
            alert("Onjuiste gebruikersnaam of wachtwoord");
            return false;
        }
    }
}

/* OPDRACHT 2 */
// Ophalen locatie en dan pas functie uitvoeren
// Ophalen en nieuwe rekening toevoegen (opdracht 3) met een simpele onClick:
if (currentPage.includes("overzicht.html") || currentPage.includes("rekening_mario.html")) {
    var rekeningToevoegenbtn = document.getElementById("rekeningToevoegen");

    rekeningToevoegenbtn.onclick = function () {
        var rekeningNaam = prompt("Voer de naam in van je nieuwe rekening");
        var rekeningBedrag = (Math.random() * 1000).toFixed(2);

        if (rekeningNaam) {
            // Div zoeken van de element, simpelweg een nieuwe header en paragraph
            // Dit realiseren door appendChild te gebruiken
            var infoBox = document.getElementById("info-box");

            // Hier de nieuwe header
            var nieuweHeader = document.createElement("h2");
            // Context invoegen (zie oproep if rekeningnaam)
            nieuweHeader.textContent = rekeningNaam;

            // Hetzelfde doen voor de p tag
            var doekoeparagraaf = document.createElement("p");
            doekoeparagraaf.textContent = "€" + rekeningBedrag;

            // Nu nog toevoegen
            infoBox.appendChild(nieuweHeader);
            infoBox.appendChild(doekoeparagraaf);
        } else {
            alert("Ge moet wat toevoegen eh!");
        }
    }
}

/* OPDRACHT 3 */
if (currentPage.includes("overschrijvingen.html")) {
    var overschrijving = document.getElementById("overschrijving");

    overschrijving.onclick = function () {
        // Hoeveel geld zal er verzonden worden?
        var overschrijvingBedrag = document.getElementById("bedragWaarde").value;

        // Controleer of de ingevoerde waarde alleen cijfers bevat
        if (!/^\d+$/.test(overschrijvingBedrag)) {
            alert('Alleen cijfers zijn toegestaan.');
            return;
        }

        // Welke rekening
        var rekeningVan = document.getElementById("rekeningVan").value;
        var rekeningNaar = document.getElementById("rekeningNaar").value;

        if (overschrijvingBedrag > 5879.95 || overschrijvingBedrag <= 0) {
            alert("Helaas is uw saldo niet toereikend of is uw ingevoerde bedrag te laag.");
        } else {
            var OKnotificatie = document.getElementById("overschrijvingResultaat");
            // Schrijft variabel (spaar/betaal) + overschijvingsbedrag naar een .innerText
            OKnotificatie.innerText = `U heeft €${overschrijvingBedrag} overgeschreven van ${rekeningVan} naar ${rekeningNaar}.`;
        }
    }
}

/* OPDRACHT 5 */
if (currentPage.includes("overzicht.html") || currentPage.includes("rekening_mario.html")) {
    const transactions = [
        { id: 1, type: 'inkomend', datum: '2024-11-01', bedrag: 1.70 },
        { id: 2, type: 'uitgaand', datum: '2024-11-03', bedrag: -5.00 },
        { id: 3, type: 'inkomend', datum: '2024-11-05', bedrag: 2000.00 },
        { id: 4, type: 'uitgaand', datum: '2024-11-10', bedrag: -30.00 },
        { id: 5, type: 'inkomend', datum: '2024-11-01', bedrag: 10.00 },
        { id: 6, type: 'inkomend', datum: '2024-11-03', bedrag: -5.00 },
        { id: 7, type: 'inkomend', datum: '2024-11-05', bedrag: 20.00 },
        { id: 8, type: 'uitgaand', datum: '2025-11-10', bedrag: -130.00 }
    ];

    // Tonen
    const transactielijst = document.getElementById("transactiesUL");

    transactions.forEach(transaction => {
        const listItem = document.createElement("li");
        listItem.innerHTML = `${transaction.type} - ${transaction.datum} - ${transaction.bedrag.toFixed(2)}`;
        transactielijst.appendChild(listItem);
    });

    var filter = document.getElementById("Filter");

    filter.onclick = function () {
        var selectedDatum = document.getElementById("datum-select").value;
        var selectedType = document.getElementById("sort-type").value;

        // Nu je de value's hebt opgehaald gaan we er natuurlijk wat mee doen
        var filteredTransactions = transactions.filter(transaction => {
            var matchDatum = !selectedDatum || transaction.datum === selectedDatum;
            var matchType = selectedType === "alle" || transaction.type === selectedType;
            return matchDatum && matchType;
        });

        // Lijst legen, zodat de gesorteerde lijst er in kan
        transactielijst.innerHTML = '';

        // Toon de gesorteerde lijst
        filteredTransactions.forEach(transaction => {
            var listItem = document.createElement("li");
            listItem.innerHTML = `${transaction.type} - ${transaction.datum} - ${transaction.bedrag.toFixed(2)}`;
            transactielijst.appendChild(listItem);
        });

        // Als er geen transacties zijn wordt er een melding weergegeven
        if (filteredTransactions.length === 0) {
            var listItem = document.createElement("li");
            listItem.innerHTML = "Geen transacties gevonden";
            transactielijst.appendChild(listItem);
        }
    }
}
