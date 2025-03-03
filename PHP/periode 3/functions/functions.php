
<?php

/*  Auteur Damien 9002353
Functions.php voor inerrt_bieren.php */
function CrudBieren()
{
    // Menu-item  insert
    $txt = " <h1> Crud BIER</h1>
    <nav>
        <a href= 'insert_bieren.php'> Toevoegen nieuw biertje</a>
    </nav>";
    echo $txt;
    $result = GetData("bier");

    PrintCrudBier($result);
}

function insertBier($post){
    // var_dump($post);
    // exit;
    // verbind database
    try {
        $conn = ConnectDb();
        $query = $conn->prepare("INSERT INTO bier (biercode, naam, prijs, stijl, alcohol, brouwerij) VALUES (:biercode, :naam, :prijs, :stijl, :alcohol, :brouwerij)");
}


function GetData($tabel)
{
    // Connect database
    $conn = ConnectDb();

    $query = $conn->prepare("SELECT * FROM $tabel");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

// verbind database
function ConnectDb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Connected successfully";

        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function PrintCrudBier($result)
{
    $table = "<table border = 1px>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach ($headers as $header) {
        $table .= "<th bgcolor=gray>" . $header . "</th>";
    }


    foreach ($result as $row) {
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        // twee extra kollommen
        $table .= "<td>
        <form action='update_bier.php' method='post'>
            <input type='hidden' name='biercode' value='$row[biercode]'>
            <input type='submit' value='Wijzigen'>
         </form>
        </td>";
        $table .= "<td>
        <form action='delete_bier.php' method='post'>
            <input type='hidden' name='biercode' value='$row[biercode]'>
            <input type='submit' value='Verwijderen'>
         </form>
        
        
        </td>";

        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}

?>