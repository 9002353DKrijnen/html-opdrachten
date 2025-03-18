
<?php

/*  Auteur Damien 9002353
Functions.php */
function Crudbicycles()
{
    // Menu-item  insert
    $txt = "
    <h1> Crud BIER</h1>
    <nav>
        <a href= 'insert_bieren.php'> Toevoegen nieuw biertje</a>
    </nav>
            <img src='./img/mooiefiets.webp' alt='mooie_fiets'>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
        img {
        transform: scale(0.25);
    }";
    echo $txt;

}
function insertBier($post)
{
    // var_dump($post);
    // exit;
    // verbind database
    try {

        // altijd verbinden met de database
        $conn = ConnectDb();


        $query = $conn->prepare("
        INSERT INTO bier (naam, soort, stijl, alcohol)
        VALUES (:naam, :soort, :stijl, :alcohol );");

        $query->execute([
            'naam' => $post['naam'],
            'soort' => $post['soort'],
            'stijl' => $post['stijl'],
            'alcohol' => $post['alcohol'],
        ]);

        echo "Bier toegevoegd";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function deleteBier($post)
{
    if (isset($_POST['biercode'])) {
            $conn = ConnectDb();
            try {
                // Verwijder eerst de bijbehorende records in de schenkt-tabel en daarna het bier
                $query = $conn->prepare("DELETE FROM schenkt WHERE biercode = :biercode; 
                /* Ook verwijden we de bijbehorende records in de schenkt-tabel, anders krijgen we een fout */
                DELETE FROM bier WHERE biercode = :biercode;");
                $query->execute(['biercode' => $post['biercode']]);
            
                echo "Bier en gerelateerde schenkt records verwijderd";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    
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
             <form method='post' action='update_bier.php?biercode=$row[biercode]' >      
                    <button name='wzg'>Wijzigen</button>    
            </form>
         </td>";
        $table .= "<td>
        <form action='delete_bieren.php' method='post'>
            <input type='hidden' name='biercode' value='$row[biercode]'>
            <input type='submit' value='Verwijderen'>
         </form>
        
        
        </td>";

        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}
function dropDownBrouwer(){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT brouwcode, naam FROM brouwer");
    $query->execute();
    $result = $query->fetchAll();
    echo "<select name='brouwcode'>";
    foreach ($result as $row) {
        echo "<option value='" . $row['brouwcode'] . "'>" . $row['naam'] . "</option>";
    }
    echo "</select>";
}

function GetBier($biercode){
    // maak de verbinding
    $conn = ConnectDb();

    // query preparation
    $query = $conn->prepare("SELECT * FROM bier WHERE biercode = :biercode");
    // voer query uit
    $query->execute(['biercode' => $biercode]);
    // result met alle gegevens van de bier
    $result = $query->fetch();
// result
    return $result;
}

function UpdateBier($post){
    $conn = ConnectDb();
    $query = $conn->prepare("UPDATE bier SET naam = :naam, soort = :soort, stijl = :stijl, alcohol = :alcohol WHERE biercode = :biercode");
    $query->execute([
        'naam' => $post['naam'],
        'soort' => $post['soort'],
        'stijl' => $post['stijl'],
        'alcohol' => $post['alcohol'],
        'biercode' => $post['biercode'],
    ]);

    echo "Bier gewijzigd";
}
?>