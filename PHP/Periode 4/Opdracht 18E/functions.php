<?php

function getData() {}

function connectDataBase($dbname)
{
    include "config.php";


    // set DataStringName 
    $dsn = "mysql:host=$host;dbname={$dbname};";

    // We want $conn to be returned on a succesful connection
    // Fist we will use conn and catch to get a report if no connection was established

    try{
        $conn = new PDO($dsn, $username, $password, $options);

        // return connection upon succesfully connecting 
        return $conn;
    } catch (PDOException $event){


        // show error in a stringinterpolation message
        die("Connection failed: {$event->getMessage()}");

    }

}
