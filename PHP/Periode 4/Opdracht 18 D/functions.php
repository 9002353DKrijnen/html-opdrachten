<?php
function dbSelect($database = 'default')
{
    require 'profile.php';
    // set database connection variables

    $dsn = "mysql:host=$host;dbname={$database}";


    // Maak verbinding met database
    try {
        // connection with useername, password database and options
        // host = localhost
        // username = root
        // password = ""
        // database = USERENRTY
        // options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        //options = array(PDO::FETCH_ASSOC)
        $conn = new PDO($dsn, $username, $password, $options);

        // return gained connection 
        return $conn;

        // error management
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

