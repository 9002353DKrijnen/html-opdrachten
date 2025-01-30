
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 9.1</title>
</head>
<body>
    <style>
table{
    border-collapse: collapse;
    width: 100%;
    color: #588c7e;
    font-family: d;
    font-size: 25px;
    text-align: left;
}
th{
    background-color: #588c7e;
    color: white;
}
td{
    border: solid 2px black;
    text-align: center;
}

    </style>
</body>
</html>
<?php

/*
opdracht 9.1 
Auteur: Damien 9002353
De bedoeling van opdracht 9.1 is verder ingaan op de koppeling tussen php en een MySQL-database. 
Opdracht 9.1: Voer alle stappen uit die beschreven staan in 9.3.
*/
// Opdracht SELECT
try {
    $db = new PDO('mysql:host=localhost;dbname=fietsenmaker', 'root', '');
    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    foreach ($result as $data) {
    echo "<tr>";
        echo "<td>" . $data["merk"] . "</td>";
        echo "<td>" . $data["type"] . "</td>";
        echo "<td>  &euro;"   . number_format($data["prijs"],2,",",".")  . "</td>"."<br>";
    echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $error) {
    die("Error: " . $error->getMessage());
}
?>