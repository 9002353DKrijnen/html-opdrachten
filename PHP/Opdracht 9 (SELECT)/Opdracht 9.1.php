<?php

/*
opdracht 9.1 
Auteur: Damien 9002353
De bedoeling van opdracht 9.1 is verder ingaan op de koppeling tussen php en een MySQL-database. 
Opdracht 9.1: Voer alle stappen uit die beschreven staan in 9.3.
*/
// Opdracht SELECT
$db = new PDO('mysql:host=localhost;dbname=fietsenmaker','root','');

$query = $db->prepare("SELECT * FROM fietsen");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $data){
    echo $data["merk"] . "";
}
?>