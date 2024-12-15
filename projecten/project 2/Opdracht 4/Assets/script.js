window.onload = function(){
    var currentPage = window.location.pathname;



    // laden van index.html, zodat de uitvoer correct is
   
if (currentPage.includes("index.html")){
var btn = document.getElementById("btn");
var form = document.querySelector(".loginForm");
btn.onclick = function(){
    event.preventDefault();
    var username = form.userid.value;
    var password = form.pwd.value;
    if (username === "admin" && password === "admin") {
        window.location.href = "./HTML/overzicht.html"; 
            return true; 

         


        } 
        
        else if (username === "Mario" && password === "Mario2") {
                window.location.href = "./HTML/rekening_mario.html"; 
                    return true; 
                }
                
    else {
                    alert("Onjuiste gebruikersnaam of wachtwoord");
                    return false; 
                }

        }
            
    }
// ophalen locatie en dan pas functie uitvoeren
    // ophalen en nieuwe rekening toevoegen (opdracht 3) met een simpele onClick:
    if (currentPage.includes("overzicht.html") || currentPage.includes("rekening_mario.html")) { {
var rekeningToevoegenbtn = document.getElementById("rekeningToevoegen");
rekeningToevoegenbtn.onclick = function(){
var rekeningNaam = prompt("Voer de naam in van je nieuwe rekening");
var rekeningBedrag = (Math.random() * 1000).toFixed(2);

if (rekeningNaam){ 
 // div zoeken van de element, simpelweg een nieuwe header en  paragraph
 //dit realiseren door appenchild te gebruiken
 var infoBox = document.getElementById("info-box");

 // hier de nieuwe header 
 var nieuweHeader = document.createElement("h2");
 //context invoegen(zie oproep if rekeningnaam)
 nieuweHeader.textContent = rekeningNaam;

 // hetzelfde doen voor de p tag
 
 var doekoeparagraaf = document.createElement("p")
 doekoeparagraaf.textContent = "€" + rekeningBedrag;
 
 //nu nog toevoegen
 infoBox.appendChild(nieuweHeader);
 infoBox.appendChild(doekoeparagraaf);
    }
  else {
    alert("Ge moet wat toevoegen eh!")
  }
 }




}


}
var overschrijving = document.getElementById("overschrijving");
overschrijving.onclick = function() {
    // Hoeveel geld zal er versuurt worden?
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
        alert("helaas is uw saldo niet toereikend of is uw ingevoerde bedrag te laag.");
    } else {
        var OKnotificatie = document.getElementById("overschrijvingResultaat");
        // schrijft variabel(spaar/betaal) + overschijvingsbedrag naar een .innertekst 
        OKnotificatie.innerText = `U heeft €${overschrijvingBedrag} overgeschreven van ${rekeningVan} naar ${rekeningNaar}.`;
    }
}

}





