<?php

function crudBieren()
{
    $txt = "
    <h1>crud bieren</h1>
    <nav>
        <a href='insert_bieren.php'>overzicht</a>
        </nav>";
    echo "$txt";
    //haal alle bier uit de tabel
    $result = getData("bier");
    //print tabel
    printCrudTable($result);
}

function getData($table){
$conn = connectDB();
/* Select data uit de opgegeven tabel methode query
query: is een prepare en execute in 1 zonder placeholder
 $result = $conn->query("SELECT * FROM $table")->fetchAll(); */

 //select data uit de opgegeven tabel met methode prepare
}


function connectDB(){
    // met pdo maak je verbinding met de database
    $db = new PDO('mysql:host=localhost;dbname=fietsenmaker', 'root', '');
    // volgens de opdracht alles selecteren van de fietsen.
    $query = $db->prepare("SELECT * FROM fietsen");
    //uitvoeren
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // als tabel presenteren.
    echo "<table>";
    foreach ($result as $data) {
    echo "<tr>";
        echo "<td>" . $data["merk"] . "</td>";
        echo "<td>" . $data["type"] . "</td>";
        echo "<td>  &euro;"   . number_format($data["prijs"],2,",",".")  . "</td>"."<br>";
    echo "</tr>";
    }
    echo "</table>";
}