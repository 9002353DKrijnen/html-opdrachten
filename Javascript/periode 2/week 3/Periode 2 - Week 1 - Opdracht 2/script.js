// bron : https://www.w3schools.com/js/tryit.asp?filename=tryjs_loop_for_om1

// Auteur: damien krijnen 
// Opdracht w3 2
// waardes van het mandje

// variabel definieren
let hallo = "hallo";
let text = "";
for ( let i = 0; i <= 100; i++)
    // text + winkelmandje 
text += hallo + "<br>";
{
   // waarde schrijven naar 
document.getElementById("winkelmandje").innerHTML =   text;

}
