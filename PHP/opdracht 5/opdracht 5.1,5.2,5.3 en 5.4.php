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



