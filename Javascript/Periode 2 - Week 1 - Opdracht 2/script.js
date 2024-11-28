//Opdracht 1 array aanmaken met behulp van een const, wat een constante is, dus het kan niet aangepast worden,
// Winkelmandje.
//We beginnen met het maken van het definieren van de Array:
const Winkelmandje = ["Bananen", "Whiskey", "Chips", "Bonen", "Drop" ];

// Vervolgens is de opdracht op het aantal op te tellen, we zullen dat doen door de lengte op te vragen.
const aantal = Winkelmandje.length;
document.getElementById('Opdracht1').innerHTML=
    "Aantal producten in het winkelmandje is: " + aantal;


    //Opdracht 2 moeten we alle producten naar het scherm schijven. Dus de output. Het element zal worden
    //aangeroepen, waarna er met .join ze op het scherm worden getoond naar de div van opdracht 2:
    document.getElementById('Opdracht2').innerHTML = Winkelmandje.join();

    //join moet altijd() hebben anders is de output : function join() { [native code] }
    // Ook mogelijk is ('-') waarbij de output met een - tussen elk product is


    //opdracht 3 : toon het 4de product van de array. 
    // In de uitleg van de docent wordt uitlegt dat array's nulbased zijn, dus 0,1,2,3,4 etc.
    // + voegt resultaat toe, en met winkelmandje[3] wordt het 4de resultaat aangeroepen
        document.getElementById('Opdracht3').innerHTML =
    'Het 4de product is '+ Winkelmandje[3];

    //opdracht 4 moeten we whiskey vervangen door Bier. We roepen whiskey aan met [1], om vervolgens met innerHTML de waarde te vervangen
    Winkelmandje[1] = 'Bier';
    document.getElementById('Opdracht4').innerHTML = 
    'Whiskey is vervangen door Buer: ' + Winkelmandje.join(',');


    // opdracht 5 moeten we een product in het mandje toevoegen, we roepen de functie aan en zorgen dat met Winkelmandje.jon(',') de toevoeging getoond wordt

    function addProduct(){
        //userpromt, gebruiker kan x invoeren,
        const nieuwProduct = prompt ("voer hier wat in" );
        Winkelmandje.push(nieuwProduct);
        //met push  kan er, de x, worden toegevoegd aan de array, wat met join zal worden opgeroepen. 
        document.getElementById('Opdracht5').innerHTML = Winkelmandje.join(', ');
    }

    /* We gaan nu met opdracht 6 met een if-else funcite kijken of er meer dan 1 product in het mandje zit
    */
if (aantal  >= 1) {
    document.getElementById("Opdracht6").innerHTML =
"Aantal producten in het winkelmandje is: " + Winkelmandje.join();
}
else {
    document.getElementById("Opdracht6").innerHTML =
    "U heeft niet genoeg producten om te tonen";
}

//opdracht 7  we controleren of drop het 5de prroduct is het winkelmandje
if (Winkelmandje[4] == "Drop"){
    document.getElementById("Opdracht7").innerHTML =
    "U heeft drop in uw winkelmandje, gefeliciteerd." ;
}
else{
    document.getElementById("Opdracht7").innerHTML =
    "Gatsie, u heeft geen drop.";
}
// opdracht 8 er moet een spatie komen tussen de arrayitems:
document.getElementById("Opdracht8").innerHTML = Winkelmandje.join(' ');

//opdracht 9 Met splice functie moeten we de eerste en tweede product uit het winkelmandje verwijderen
 
Winkelmandje.splice(0, 2);
document.getElementById("Opdracht9.1").innerHTML = Winkelmandje;
Winkelmandje.splice(0,0, "Bananen", "Whiskey");
document.getElementById('Opdracht9.2').innerHTML = Winkelmandje.join();

//Opdracht op alfabetische volgorde sorteren, de laatste opdracht
Winkelmandje.sort();
document.getElementById("Opdracht10").innerHTML = Winkelmandje;