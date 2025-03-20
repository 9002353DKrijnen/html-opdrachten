
<?php

/*  Auteur Damien 9002353
Functions.php 
hier komen de functies Crud voor het aanmaken van de h1, de nav en de section
*/
function crud()
{
    // Menu-item  insert
    $txt = "
    <h1> Crud Fietsen</h1>
    <nav>
            <a href= 'insert_bicycle.php'> Toevoegen nieuwe fiets soort</a>
    </nav>
        <section>
            <img src='./img/mooiefiets.webp' alt='mooie_fiets'>
        </section>
    <style>
    * {
    // css met standaard margin en padding en box-sizing
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        section {
        width: 250px;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        }
        
        section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }
    </style>";


    // aanroep - hiermee wordt $txt geprint
    echo $txt;


    // haal alle fietsen op
    $result = GetData("fietsen");


    // Print crud van de fietsen (result)
    PrintCrud($result);
}
function insert($post)
{

    try {

        // altijd verbinden met de database
        $conn = ConnectDb();

        $query = $conn->prepare("
        INSERT INTO fietsen (merk, prijs, type)
        VALUES (:merk, :prijs, :type);");

        $query->execute([
            'merk' => $post['merk'],
            'prijs' => $post['prijs'],
            'type' => $post['type'],
        ]);

        echo "Fiets toegevoegd";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// functie delete 
function delete($post)
{

    // controle of id bestaat
    if (isset($_POST['id'])) {
        $conn = ConnectDb();
        try {
            // check of id overeenkomt met opgegeven te verwijderen id
            $query = $conn->prepare("DELETE FROM fietsen WHERE id = :id");
            
            $query->execute(['id' => $post['id']]);

            echo "Fiets verwijderd";
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
    $dbname = "fietsenmaker";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function PrintCrud($result)
{
    $table = "<table border = 1px
    color = blue>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach ($headers as $header) {
        $table .= "<th bgcolor=lightgreen>" . $header . "</th>";
     
    }
    // na de foreacht worden de extra kollommen toegevoegd, zodat we boven de kolommen verwijderen en wijzigen headers krijgen
    $table .=  "<th bgcolor='lightgreen'> Wijzigen </th>";
    $table .=  "<th bgcolor='lightgreen'> Verwijderen </th>";


    foreach ($result as $row) {
        $table .= "<tr>";
        
        // print elke kolom


        foreach ($row as $cell) {
            $table .= "<td bgcolor=lightgreen>" . $cell . "</td>";
        }


        // twee extra kollommen
        $table .= "<td bgcolor='lightgreen'>
             <form method='post' action='update_bicycle.php?id=$row[id]' >      
                    <button name='wzg'>Wijzigen</button>    
            </form>
         </td>";



        $table .= "<td bgcolor='lightgreen'>
        <form action='delete_bicycle.php' method='post'>
            <input type='hidden' name='id' value='$row[id]'>
            <input type='submit' value='Verwijderen'>
         </form>
        
        
        </td>";

        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}

function Get($id)
{
    // maak de verbinding
    $conn = ConnectDb();

    // query preparation
    $query = $conn->prepare("SELECT * FROM fietsen WHERE id = :id");
    // voer query uit
    $query->execute(['id' => $id]);
    // result met alle gegevens van de bicycle
    $id = $query->fetch();
    // result
    return $id;
}

function Update($post)
{
    $conn = ConnectDb();
    $query = $conn->prepare("UPDATE fietsen SET merk = :merk, `type` = :type, prijs = :prijs WHERE id = :id");
    $query->execute([
        'merk' => $post['merk'],
        'prijs' => $post['prijs'],
        'type' => $post['type'],
        'id' => $post['id'],
    ]);

    echo "Fiets soort gewijzigd";
}
?>