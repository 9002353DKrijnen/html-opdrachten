$<?php
// database conncectie maken
// Met dit bestand kan ik de database connecie maken
// Dit bestand wordt gebruikt door alle andere php bestanden
$host = "localhost";
// gebruiker
$user = "root";
// wachtwoord
$pass = "";
// database naam
$db = "studenten_login";

// definieer (optioneel) een DSN voor de database
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


/* Dit is de standaard optie array die we meegeven aan de PDO constructor.
Dit is om fouten te tonen als er iets fout gaat. Bijvoorbeeld een fout in de SQL query */

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
?>