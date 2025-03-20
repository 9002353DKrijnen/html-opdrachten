<?php
function dbSelect($dbname = 'default')
{
    require 'profile.php';
    // Kijken of database bestaat, met errorverwerking wanneer dat niet het geval is 

    if (!isset($database[$dbname])) {
        die("Database $dbname niet gevonden");
    }
    // stel $db in zodat we de juiste database kunnen gebruiken 
    $db = $database[$dbname];

    $dsn = "mysql:host=$host;dbname={$db['dbname']}";


    // Maak verbinding met database
    try {
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
// create post functie
function createPost()
{
    $form = '    
    <form method="post" id="form">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam">
        
        <label for="bericht">Bericht:</label>
        <textarea type="textarea" id="bericht" name="bericht"> </textarea>

        <input type="submit" value="Verzenden" name="submit">
    </form>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #form {
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 25%;
        }
    </style>';

    echo $form;
}

function insertPost()
{
    if (isset($_POST['submit'])) {


        if (!isset($_POST['naam']) || !isset($_POST['bericht'])) {
            die("Formulier niet verzonden");
        }
        $DT = date('Y-m-d H:i:s');
        $conn = dbSelect('gastenboek');
        $sqlQuery = $conn->prepare(
            "INSERT INTO gastenboek (naam, bericht, datumtijd) 
   VALUES (:naam, :bericht, :datumtijd)"
        );
        $sqlQuery->bindParam(':naam', $_POST['naam']);
        $sqlQuery->bindParam(':bericht', $_POST['bericht']);
        $sqlQuery->bindParam(':datumtijd', $DT);

        $sqlQuery->execute();

   }
}
