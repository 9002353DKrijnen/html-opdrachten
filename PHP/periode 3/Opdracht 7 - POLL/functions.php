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

function printPolls()
{
    $conn = determineDatabase('poll');

    // haal all polls op
    $sqlQuery =  $conn->prepare("SELECT * FROM poll");
    $sqlQuery->execute();
    $polls = $sqlQuery->fetchAll();

    // foreach met de polls

    foreach ($polls as $poll) {
        echo "<form method='post' action='process.php'>";
        echo "<h3>" . $poll['vraag'] . "</h3>";


        // haal de opties voor de huidige poll op, vergelijk optie.poll met poll.id. 
        $sqlQueryOptions =  $conn->prepare("SELECT optie.optie from optie WHERE poll = :id");
        $sqlQueryOptions->bindParam(':id', $poll['id']);
        $sqlQueryOptions->execute();
        $options = $sqlQueryOptions->fetchAll();
        // print de opties, met radio buttons
        foreach ($options as $option) {
      echo "<input type='radio' name='optie' value= '{$option['id']}'> {$option['optie']}<br>";        }
        echo "<input type='submit' value='Verzenden' name='submit'></input>";
        
        echo "</form>";
    }
}
// function newPoll(){


//     $connQuestion = determineDatabase('poll');
//     $sqlQuery = $connQuestion->prepare("INSERT INTO poll (vraag) 
//     VALUES (:vraag)");



// }
