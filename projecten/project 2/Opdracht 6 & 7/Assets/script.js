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

/* OPDRACHT 3 + 4 */
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
            listItem.innerHTML = `${transaction.type
                } - ${transaction.datum} - ${transaction.bedrag.toFixed(2)}`;
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
/* 
Opdracht 6 en 7 : Product: Functionaliteit voor het kopen en verkopen van aandelen of crypto.
Taken:
- Ontwerp een interface waarmee                 gebruikers beleggingen kunnen doen.
- Zorg voor een dynamische weergave van (fictieve) prijsveranderingen.
- Voeg waarschuwingen of validaties toe, bijvoorbeeld bij onvoldoende saldo.
*/
// check of de huidige pagina de beleggingspagina is
if (currentPage.includes("beleggingen.html")) {
    // dropdownmenu interactief maken, we hebben in de html de "value", zodat we niet 5-6 dropdown
    //menu's hoeven te verwerken doen we dat interactief via Javascript met een array:
    let productOptions = {
        shares: [
            { value: "ing", text: "ING" },
            { value: "rabo", text: "Rabo" },
            { value: "apple", text: "Apple" },
            { value: "samsung", text: "Samsung" },
        ],
        crypto: [
            { value: "bitcoin", text: "Bitcoin" },
            { value: "litecoin", text: "Litecoin" },
            { value: "monero", text: "Monero" },
            { value: "ethereum", text: "Ethereum" },
        ],
        property: [
            { value: "goldman", text: "Goldman-sachs" },
            { value: "home", text: "Huis" },
            { value: "garden", text: "Tuin" },
        ],
        foundations: [
            { value: "green-tech", text: "GroeneTech" },
            { value: "panda", text: "WWF" },
        ],

    }
    // lijsten importeren
    let investmentDropdown = document.getElementById("investment");
    let categoryInvestment = document.getElementById("category-product");

    function updateProductOptions() {
        // lijst leeg maken

        //open functie

        let investmentOption = investmentDropdown.value;
        if (investmentOption == "") {
            alert("Geen investeeroptie opgegeven");
            return;
        } if (productOptions[investmentOption]) {
            categoryInvestment.innerHTML = "";
            productOptions[investmentOption].forEach(option => {
                // geselecteerde waarde instellen
                let newOption = document.createElement("option");
                //value instellen, waar newOption de zojuist gecreërde variable is.
                newOption.value = option.value;
                // textContext  
                newOption.textContent = option.text;
                // catogorie toepassen met apppenchild
                categoryInvestment.appendChild(newOption);
            });


        }
        else {
            alert("Geen cat gekozen");
        }

    }
    document.getElementById("investment").addEventListener("change", updateProductOptions);
    categoryInvestment.addEventListener("change", Options)



    let infoboxInvesment = document.querySelector(".info-box-investment");
    let availableBalance = document.createElement("p");
    let randomBalance = Math.floor(Math.random() * 10000 + 1000);
    availableBalance.textContent = `Beschikbaar balans is ${randomBalance}`;
    infoboxInvesment.appendChild(availableBalance);
    // waarde declareren
    let amountCurrentOSA = 0;


    investmentDropdown.addEventListener("change", function () {
        if (investmentDropdown.value === "crypto") {
            addNew();
            Options();
        } else {
            removeSection();
        }
    });

    function addNew() {
        let newSection = document.getElementById("info-box-crypto");
        if (!newSection) {
            let main = document.querySelector(".main");
            newSection = document.createElement("section");
            newSection.id = "info-box-crypto";
            main.appendChild(newSection);

        }




        newSection.innerHTML = `
        <h2>Crypto-informatie</h2>
        <p>Dit is informatie over </p>
        <ul>
             <li id="bitcoinPrice">Huidige prijs van bitcoin wacht...</li>
            <li id="litecoinPrice">Huidige prijs van litecoin is wacht...</li>
            <li id="moneroPrice">Huidige prijs van monero is wacht...</li>
            <li id="ethereumPrice">Huidige prijs van ethereum is wacht...</li>
        </ul>
        <button onclick="buyCrypto()" id="buy">Koop crypto</button>
        <button onclick="sellCrypto()" id="sell">Verkoop crypto</button>`;
    }

    // Functie om de sectie te verwijderen als de gebruiker een andere optie kiest
    function removeSection() {
        let newSection = document.getElementById("info-box-crypto");
        if (newSection) {
            newSection.remove();
        }
    }

    function Options() {
        let cryptoPrices = {
            bitcoin: updateCryptoPrices('bitcoin', 5000),
            litecoin: updateCryptoPrices('litecoin', 10000),
            monero: updateCryptoPrices('monero' , 15000),
            ethereum: updateCryptoPrices('ethereum', 20000),
        }


        function updateCryptoPrices(cryptoID, interval) {
            setInterval(function () {
                // nieuwe prijs genereren zodat alle munten hun eigen waarde hebben.
               cryptoPrices[cryptoID] = Math.floor(Math.random() * 5000 + 1000); 

                // html element bijwerken
                let priceElement = document.getElementById(`${cryptoID}Price`);
                if (priceElement) {
                    priceElement.innerHTML = `Huidige prijs van ${cryptoID} is € ${cryptoPrices[cryptoID]}`;
                }

                if (callback) {
                    callback(cryptoPrices[cryptoID]); 
                }
            }, interval);
        }
    


        if (investmentDropdown.value === "crypto" || investmentDropdown.value === "property" || investmentDropdown.value === "foundations" || investmentDropdown.value === "shares") {
            let selectedProduct = categoryInvestment.value;
            let sellButton = document.getElementById("sell");
            let buyButton = document.getElementById("buy");
            let value;
            if  (investmentDropdown.value === "crypto") {
                let selectedProduct = categoryInvestment.value;
                value = `${cryptoPrices[selectedProduct]}`;
            } else {
                value = Math.floor(Math.random() * 5000 + 1000);
            }
            let presentValue = document.getElementById("currentPrice");
            presentValue.innerHTML = `Huidige prijs van ${selectedProduct} is €  ${value}`;
            sellButton.addEventListener("click", sellOption);
            buyButton.addEventListener("click", buyOption);
            function buyOption() {
                let purchasedSucces = false;
                let amount = document.getElementById("amountInput").value;
                let amountPost = document.getElementById("amountInput").value * value;
                let outputInvestment = document.getElementById("outputInvestment");
                aboutToBuy = selectedProduct;



                if (amount === "0" || amount === "" || /[^0-9]/.test(amount)) {
                    outputInvestment.textContent = `${amount} € is nul of de waarde daarvan is 0 en dat kan niet.`;
                    purchasedSucces = false;
                    return;
                }

                if (randomBalance <= amountPost) {
                    outputInvestment.innerHTML = `U heeft niet genoeg balans om ${aboutToBuy} te kopen.`;
                    purchasedSucces = false;
                    return;
                } else {
                    randomBalance -= amountPost;
                    outputInvestment.innerHTML = `Je hebt ${aboutToBuy} gekocht met de prijs € ${amountPost} met de waarde van € ${value}`;
                    let purchasedAmount = randomBalance - amountPost;
                    availableBalance.textContent = `U heeft nog € ${purchasedAmount} over.`;
                    amountCurrentOSA += parseInt(amount);
                    purchasedSucces = true;
                }

                if (purchasedSucces === true) {
                    let currentOSA = document.getElementById("OSA");
                    currentOSA.innerHTML = `In bezit : ${amountCurrentOSA}`;
                    alert('Uw actie was succesvol');
                    currentOSA.innerHTML = `Uw huidig bezit is ${amountCurrentOSA} `;
                } else {
                    alert("Uw actie was niet succesvol, probeer het opnieuw.");
                }
            }

            function sellOption() {
                let amount = document.getElementById("amountInput").value;
                let amountPost = document.getElementById("amountInput").value * value;
                let outputInvestment = document.getElementById("outputInvestment");
                aboutToSell = selectedProduct;
                if (amount === "0" || amount === "" || /[^0-9]/.test(amount)) {
                    outputInvestment.textContent = `${amount} is nul en dat kan niet.`;
                    soldSucces = false;
                    return;
                }


                if (amountCurrentOSA >= "1") {
                    outputInvestment.innerHTML = `Je hebt ${aboutToSell} verkocht met de prijs € ${amountPost} met de waarde van € ${value}`;
                    let purchasedAmount = randomBalance += parseInt(amountPost);
                    availableBalance.textContent = `U heeft nog ${purchasedAmount} over.`;
                    soldSucces = true;
                    // bron https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat
                }
                if (soldSucces === true && amountCurrentOSA >= "1") {

                    let currentOSA = document.getElementById("OSA");
                    currentOSA.innerHTML = `In bezit : ${amountCurrentOSA}`;
                    alert('Uw actie was succesvol');
                    amountCurrentOSA -= parseInt(amount);
                    currentOSA.innerHTML = `Uw huidig bezit is ${amountCurrentOSA} `;
                } else {
                    alert("Uw actie was niet succesvol, probeer het opnieuw.")
                }
            }



        }
    }

}





