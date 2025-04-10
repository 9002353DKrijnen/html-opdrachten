<?php
function dbSelect($dbname = 'default')
{
    require 'profile.php';
    // Kijken of database bestaat, met errorverwerking wanneer dat niet het geval is 

   
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
// insert post functie met validaties
function insertPost()
{
    if (isset($_POST['submit'])) {

        // validatie, geen lege velden of onvolledige formulier
        if (!isset($_POST['naam']) || !isset($_POST['bericht'] ) || strlen($_POST['naam']) == 0 || strlen($_POST['bericht']) == 0) {
            die("Formulier niet verzonden of onvolledig U heeft: <br> Naam: " . $_POST['naam'] . "<br> Bericht: " . $_POST['bericht']);
        }

        // dbSelect zorgt dat we de juiste database kunnen gebruiken
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
        header("Location: winniedepooh.php");
    }
}

function printPosts()
{
    $conn = dbSelect('gastenboek');
    $sqlQuery = $conn->prepare("SELECT * FROM gastenboek");
    $sqlQuery->execute();
    $posts = $sqlQuery->fetchAll();
    foreach ($posts as $post) {
        echo "<div>";
        echo "<h3>" . $post['naam'] . "</h3>";
        echo "<p>" . $post['bericht'] . "</p>";
        echo "<p>" . $post['datumtijd'] . "</p>";
        echo " <form action='michaeljackson.php' method='get'>
            <input type='hidden' name='id' value='$post[id]'>
            <input type='submit' value='Verwijderen'>
         </form>";
        echo "</div>";
        $style = '
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            div {
                margin: 40px auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 25%;
            }
        </style>';
        echo $style;
    }
}
function deletePost()
{
    if (isset($_GET['id'])) {
        $conn = dbSelect('gastenboek');
        $sqlQuery = $conn->prepare("DELETE FROM gastenboek WHERE id = :id");
        $sqlQuery->bindParam(':id', $_GET['id']);
        $sqlQuery->execute();
        header("Location: winniedepooh.php");
    }
}



function registerUser($email, $username, $password, $isAdmin)
{
    // verbinding maken met database middel de dbSelect functie 
    $conn = dbSelect('gastenboek');

    // sqlQuery maken (zo noemen we ook de variabele)
    $sqlQuery = $conn->prepare(
        "INSERT INTO gebruikers (email, gebruikersnaam, wachtwoord, is_admin) 
        VALUES (:email, :gebruikersnaam, :wachtwoord, :is_admin)"
    );

    // wachtwoord hashen
    $password = password_hash($password, PASSWORD_DEFAULT);

    // binden van de parameters
    $sqlQuery->bindParam(':email', $email);
    $sqlQuery->bindParam(':gebruikersnaam', $username);
    $sqlQuery->bindParam(':wachtwoord', $password);
    $sqlQuery->bindParam(':is_admin', $isAdmin);


    // sqlQuery uitvoeren
    $sqlQuery->execute();
}


function login($username, $password){
    
}
?>
