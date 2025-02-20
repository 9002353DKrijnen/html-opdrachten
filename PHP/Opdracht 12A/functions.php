<?php
function CrudLeerlingen() {
    // menu items
    $txt = " <h1> Crud Leerlingen</h1>
    <nav>
        <a href= 'insert_leerling.php'> Toevoegen nieuw leerling</a>
    </nav>";
    echo $txt;
    $result = GetData("leerlingencijfers");
    printCrudLeerlingen($result);
}
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cijfers";

    try {
        /* Database verbinden middel van PDO */
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function printCrudLeerlingen($result) {
    $table = "<table border = 1px>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";  
    
    }


    foreach ($result as $row) {
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}
function GetData($tabel){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $tabel");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
?>