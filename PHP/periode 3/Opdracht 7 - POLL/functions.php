<?php
function determineDatabase($dbname = "bieren") {
    // laad profiel
    require 'profile.php';
    // check of er wel een databse is gedefinieerd
    if(!isset($dbname)){
        die ("Database $dbname niet gevonden");
        return;
    }

    $dsn = "mysql:host=$hostname;dbname=$dbname";
    
    try{
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    }catch(PDOException $e){
        die( "Connection failed: " . $e->getMessage());
    }

}