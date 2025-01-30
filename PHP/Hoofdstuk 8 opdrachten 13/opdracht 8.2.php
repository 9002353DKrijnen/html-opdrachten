<?php
/* 
Student: Damien 9002353 
Opdracht 8.2, bedoeling bij deze opdracht is het combineren van een database en alle stappen uitvoeren in 8.4, met een vervolg in 8.5, die wordt uitgevoerd in 8.3. 
*/
// aanmaken van de query
$db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
// extratje, een echo waar het aantal rijen van fietsenmaker wordt getoond.
echo $db->query("SELECT * FROM fietsen")->rowCount();
?>