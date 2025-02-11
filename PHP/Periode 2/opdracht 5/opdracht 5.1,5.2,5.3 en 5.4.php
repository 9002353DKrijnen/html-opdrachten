<?php

/* 
Student: Damien 9002353 
Dit zijn de 4 opdrachten die voor deze week gemaakt worden ik heb ze te laat gemaakt.
Hoofdstuk 6 gaat over de verdiepeing van PHP. We gaan aan de slag met gegevens op slaan en werken met cookies. 
*/






// opdracht 1: vertel gebruiker hoevaak hij of zei op de pagina is geweest.
// sessie opstarten
// bron https://www.geeksforgeeks.org/php-program-count-page-views/
session_start();
// 
// hier geven we met een isset en session een waarde
if (isset($_SESSION['kijkers']) ){
    $_SESSION['kijkers'] =  $_SESSION['kijkers']+1;
}else{
    $_SESSION['kijkers'] =1;
}



echo "Gebruiker heeft pagina zoveel x aantal bekeken " . $_SESSION['kijkers'];
echo "<br>";


// opdracht 2 is opdracht 1 maar met een cookie 

// setcookie(naam, waarde , verlopen, pat, domaein, veiligheid, httponly) de naam is
// vereist, alle andere zijn optioneel. 

// instellen van cookie-naam en waarden
$cookieName = "viewedUser";
$cookieExpire = time() +3600; // verloopt over 1 uur

if(isset($_COOKIE[$cookieName])){
    $viewCount = $_COOKIE[$cookieName] + 1;
} else {
    $viewCount = 1;
}
// Cookie bijwerken met de nioeuwe waarden
setcookie($cookieName, $viewCount, $cookieExpire);

// Aantal keer dat de pagina is bekeken:
echo "je hebt deze pagina $viewCount bekeken.";
echo "<br>";


/* 
Opdracht 6.3: 
Laat een willekeurige postcode op het scherm tonen. (mt_rand)
*/

$cijfers =  (mt_rand(1000,9999));

// willekeurige cijfers genereren (hoofdletters) met chr

$letter1 = chr(mt_rand(65,90));
$letter2 = chr(mt_rand(65,90));
// Combineer de cijfers met de 2 gegenereerde letters met een nieuwe variabele.

$postcode = $cijfers . $letter1 . $letter2;

// Nu de postcode tonen 

echo "Uw postcodekanjer is: " . $postcode;
echo "<br>";
/*
Opdracht 6.4: maak een functie waarmee de oppervlakte en de omtrek van een cirkel berekend kan worden. 
Pi = 3,14. Omtrek 2 x PI x straal en oppervlakte is PI x straal in het kwadraat.
*/

// pi is standaardwaarde dus die geven we een variabele
$pie = "3.14159";
//  functie openen en een naam geven met variabelen die we later gaan gebruiken
function berekenOmtrek($pie, $diameter){
    // variabele aanroepen met een variabele die variabel is, in dit geval $diameter
$omtrek = $pie * $diameter;
// afronden op 2 decimalen
$omtrek = round($omtrek,2);
// afronding function
return $omtrek;
}
// echo, waar $pie al een standaardwaarde heeft en $diameter niet, en hier 10 is.(5 straal)
echo "De omtrek van een cirkel met straal 5 is" . " " .berekenOmtrek($pie, 10);
// hetzelfde maar nu met Oppervlakte
function berekenOppervlakte($pie, $straal){
 $oppervlakte = $pie * $straal** 2;
 $oppervlakte = round($oppervlakte,2);
return $oppervlakte;
}
// output met ruimte
echo "<br>";
echo "De oppervlakte van een cirkel met straal van 5 is" . " ".  berekenOppervlakte($pie,5);

?>