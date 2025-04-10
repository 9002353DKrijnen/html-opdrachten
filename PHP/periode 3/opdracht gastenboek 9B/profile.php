<?php
// Definieer databases in een apart database bestand. 
$database =  [
    'default' => [
        'dbname' => 'bieren',
        'tables' => ['bier', 'brouwer', 'brouwer2', 'kroeg', 'land', 'schenkt']
    ],

    'gastenboek' => [
        'dbname' => 'gastenboek',
        'tables' => ['bericht', 'datumtijd', 'id', 'naam']
    ]
    
];
// inloggegevens voor localhost
$username = "root";
$password = "";
$host = "localhost";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


?>
