<?php
// Definieer databases in een apart database bestand. 

// inloggegevens voor localhost
$username = "root";
$password = "";
$host = "localhost";
// options voor PDO, oa fetch associative array
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];



?>
