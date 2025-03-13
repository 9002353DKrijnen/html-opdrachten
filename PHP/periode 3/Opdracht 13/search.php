<?php
// include alle rommel
include_once "connect.php";
include_once "functions.php";




// check of zoekterm is ingevuld
if (!isset($_POST["search"]) || $_POST["search"] === "") {
    echo "Geen zoekterm ingevuld.";
    exit;
} else {
    // variabele geven aan de zoekterm zodat deze later gebruikt kan worden


    $searchTerm = $_POST["search"];


    // uiteraard verbinden met de database
    $conn = ConnectDb();



    // query uitvoeren met de zoekterm
    $query = $conn->prepare("SELECT * FROM leerlingencijfers WHERE leerling LIKE :searchTerm");


    // query uitvoeren


    $query->execute(array(":searchTerm" => "%$searchTerm%"));
    // Haal de zoekresultaten op
    $results = $query->fetchAll();


    // resultaten printen, als die bestaan
    if (count($results) > 0) {
        echo "<table border = 1px>
        <tr>
            <th>Naam</th>
            <th>cijfer</th>
        </tr>";
        // foreach voor elke rij
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["leerling"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["cijfer"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Geen gegevens gevonden.";
    }
}
?>