<?php
function determineDatabase($dbname)
{
    // laad profiel
    require 'profile.php';
    // check of er wel een databse is gedefinieerd
    if (!isset($dbname)) {
        die("Database $dbname niet gevonden");
        return;
    }

    $dsn = "mysql:host=$hostname;dbname=$dbname";

    try {
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}


function newPoll(){


    $conn = determineDatabase('polls');
    $sqlQuery = $conn->prepare("INSERT INTO polls (title, question, option1, option2, option3, option4) 
    VALUES (:title, :question, :option1, :option2, :option3, :option4)");
    
}