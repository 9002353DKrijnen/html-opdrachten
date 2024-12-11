// bron : https://www.w3schools.com/js/tryit.asp?filename=tryjs_loop_for_om1

// Auteur: damien krijnen 
// Opdracht w3 1
// waardes van het mandje
const winkelmandje = ["Appels","Boeken","Bananen","Gehakt"];
// kwantiteit definieren met .length 
let quantity = winkelmandje.length;
// variabel definieren
let i, len, text;
for (i = 0, len = winkelmandje.length, text = ""; i < len; i++)
    // text + winkelmandje 
{
    text += winkelmandje[i] + "<br>"
}
// waarde schrijven naar 
document.getElementById("winkelmandje").innerHTML =      "Er zitten " + quantity + " producten in uw winkelmand:<br>" + text;
