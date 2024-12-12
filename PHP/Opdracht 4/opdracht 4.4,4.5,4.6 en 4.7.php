<?php

// Auteur damien krijnen
// Open variabele
$i = 0;
// While wordt gebruikt om een limiet op te maken met een if else
while( $i < 10){
    if($i % 2 == 0)
    echo "$i is even <br>" ;

else {
    echo "$i is oneven <br>";
}
// eentje erbij
$i++;
}

// opdracht 4.6
//Opdracht 4.6:  Maak een script voor een airco op een school met 3 variabelen: 
// het huidige uur(date), temperatuur(zelf invoeren), luchtvochtigheid(zelf invoeren).  De airco moet uit om 17:00 uur of als de temperatuur zakt onder de 20 graden en de luchtvochtigheid is onder de 85%
echo "<br>";
echo "<hr>";


$uur = date('H');
$luchtVochtigheid = "80";
$temp = "26";

if ($uur <= 7 && $uur >= 17 || $luchtVochtigheid < 85 && $temp >= 20) {
    echo " Het is $uur uur,  of gewoon te heet, airco uit.";
}
    elseif ($temp <= 23 && $luchtVochtigheid <= 35) {  
        echo "Het is te koud om te runnen, airco uit";
     }
     else {
        echo "Airco aan. Dokken gap!" ;
     }


echo "<br>";
echo "<hr>";


// opdracht 4.7
/* 
Opdracht 4.7: Maak een script waarmee je kunt bepalen of je een telefoon kan kopen van 1000 euro.
Je hebt een variabele spaargeld nodig waarin staat hoeveel geld je hebt. 
Bij meer dan 250 euro te kort komt te melding dat je beter een baantje kunt zoeken. Laat ook het tekort zien.
Bij minder dan 250 tekort geef je aan dat je er bijna bent.
Als er genoeg spaargeld is geef je aan hoeveel er over is voor een hoesje.
*/


// definieer spaargeld
$spaargeld = 1250;
$telefoonprijs = 1000;

// bereken het overschot of tekort

$verschil = $spaargeld - $telefoonprijs;

$resultaat = match (true) {
     $verschil >= 0 =>  "Gefeliciteerd je hebt genoeg spaargeld." . $verschil .  " Gefeliciteerd, je hebt" . " " . $verschil . " " . "over voor een hoesje" ,
      abs($verschil) <= 250 => "Je bent er bijna je komt nog" . abs($verschil) .  "tekort!" ,
    abs($verschil) > 250 =>  "Je zit in een hopeloze situatie en zult een bijbaan moeten zoeken. Je komt" . abs($verschil) .  "tekort",
     default =>  "Daar ging iets fout" 
};

echo $resultaat;

// opdracht 4.8
/*Opdracht 4.8: Maak een script dat met een if/else bepaalt of iemand een scooter rijbewijs mag halen. 
Minimale leefttijd is 16 jaar. Maak ook een if/else wanneer iemand mag stemmen.
 (18 jaar of ouder) Voeg daarna een variabel toe met een true/false of iemand al een stempas heeft.
  Laat het zo zijn als iemand geen stempas heeft ontvangen en ouder dan 18 is het niet mag stemmen. */


  $leeftijdScooter = 16;
  $leeftijd = 20; 
  
  if ($leeftijd >= $leeftijdScooter) {
      echo "Gefeliciteerd! Je mag een scooter rijbewijs halen.";
  } else {
      echo "Helaas, je bent nog te jong om een scooter rijbewijs te halen.";
  }
  
 
  $leeftijdStemmen = 18;
  $stempasOntvangen = false; 
  
  if ($leeftijd >= $leeftijdStemmen) {
      if ($stempasOntvangen) {
          echo "Je mag stemmen.";
      } else {
          echo "Je bent ouder dan 18, maar je hebt geen stempas ontvangen, dus je mag niet stemmen.";
      }
  } else {
      echo "Je bent nog geen 18 jaar oud, dus je mag nog niet stemmen.";
  }












?>