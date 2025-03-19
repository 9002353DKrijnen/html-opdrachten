
<?php

/*  Auteur Damien 9002353
Functions.php */
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
    // aanroep
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
        INSERT INTO fietsen (naam, soort, stijl, alcohol)
        VALUES (:naam, :soort, :stijl, :alcohol );");

        $query->execute([
            'naam' => $post['naam'],
            'soort' => $post['soort'],
            'stijl' => $post['stijl'],
            'alcohol' => $post['alcohol'],
        ]);

        echo "bicycle toegevoegd";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function delete($post)
{
    if (isset($_POST['id'])) {
        $conn = ConnectDb();
        try {
            // Verwijder eerst de bijbehorende records in de schenkt-tabel en daarna het bicycle
            $query = $conn->prepare("DELETE FROM schenkt WHERE id = :id; 
                /* Ook verwijden we de bijbehorende records in de schenkt-tabel, anders krijgen we een fout */
                DELETE FROM bicycle WHERE id = :id;");
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
        $table .= "<th bgcolor=lightblue>" . $header . "</th>";
     
    }
    // na de foreacht worden de extra kollommen toegevoegd, zodat we boven de kolommen verwijderen en wijzigen headers krijgen
    $table .=  "<th bgcolor='lightblue'> Wijzigen </th>";
    $table .=  "<th bgcolor='lightblue'> Verwijderen </th>";


    foreach ($result as $row) {
        $table .= "<tr>";
        
        // print elke kolom


        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }


        // twee extra kollommen
        $table .= "<td>
             <form method='post' action='update_bicycle.php?id=$row[id]' >      
                    <button name='wzg'>Wijzigen</button>    
            </form>
         </td>";



        $table .= "<td>
        <form action='delete_bicycleen.php' method='post'>
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
    $result = $query->fetch();
    // result
    return $result;
}

function Update($post)
{
    $conn = ConnectDb();
    $query = $conn->prepare("UPDATE bicycle SET naam = :naam, soort = :soort, stijl = :stijl, alcohol = :alcohol WHERE id = :id");
    $query->execute([
        'naam' => $post['naam'],
        'soort' => $post['soort'],
        'stijl' => $post['stijl'],
        'alcohol' => $post['alcohol'],
        'bicyclecode' => $post['bicyclecode'],
    ]);

    echo "Fiets soort gewijzigd";
}
?>