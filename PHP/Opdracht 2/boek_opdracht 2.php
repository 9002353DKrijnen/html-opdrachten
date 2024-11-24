<?php
date_default_timezone_set("Europe/Amsterdam");
$date = array();
$date[0] = date("j F Y"); 
$date[1] = date("H:i");   
$date[2] = date("F");
$date[3] = date("t");    
$date[4] = date("W");   
$date[5] = date("Y");
if (($date[5] % 4 == 0 && $date[5] % 100 != 0) || ($date[5] % 400 == 0)) {
    $date[6] = " $date[5] is WEL een schrikkeljaar.";
} else {
    $date[6] = " $date[5] is GEEN een schrikkeljaar.";
}
echo "Vandaag is het: $date[0]";
echo "<br>"; 
echo "Het is nu $date[1] uur";
echo "<br>"; 
echo " Deze maand, $date[2] heeft $date[3] dagen" ;
echo "<br>";
echo"Deze week is het $date[4]";
echo "<br>";
echo "$date[6]";
?>