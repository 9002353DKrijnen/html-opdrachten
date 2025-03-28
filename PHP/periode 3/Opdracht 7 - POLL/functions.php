<?php
function determineDatabase($dbname)
{
    // laad profiel
    require 'profile.php';
    // check of er wel een databse is gedefinieerd
    if (!isset($dbname)) {
        die("Database $dbname niet gevonden");
        return;
    }

    $dsn = "mysql:host=$hostname;dbname=$dbname";

    try {
        $conn = new PDO($dsn, $username, $password, $options);
        echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function printPolls()
{
    $conn = determineDatabase('poll');

    // haal all polls op
    $sqlQuery =  $conn->prepare("SELECT * FROM poll");
    $sqlQuery->execute();
    $polls = $sqlQuery->fetchAll();

    // foreach met de polls

    foreach ($polls as $poll) {
        echo "<form method='post' action='process.php'>";
        echo "<h3>" . htmlspecialchars($poll['vraag']) . "</h3>";


        // haal de opties voor de huidige poll op, vergelijk optie.poll met poll.id. 
        $sqlQueryOptions =  $conn->prepare("SELECT optie.optie from optie WHERE poll = :id");
        $sqlQueryOptions->bindParam(':id', $poll['id']);
        $sqlQueryOptions->execute();
        $options = $sqlQueryOptions->fetchAll();
        // print de opties, met radio buttons
        foreach ($options as $option) {
            // print elke optie met htmlspecialchars zodat XSS-aanvallen niet kunnen gebeuren
            echo "<input type='radio' name='optie' value='" .
                htmlspecialchars($option['optie']) . "'> "
                . htmlspecialchars($option['optie']) . "<br>";
        }
        // buiten de foreach van de opties print de submit button met form afsluitng
        echo "<input type='submit' value='Verzenden' name='submit'>";
        echo "</form>";
    }
}

// Is bekend dat dit verwarrend is, maar so be it
function printPosts()
{
    // connectie met database maken
    $conn = determineDatabase('poll');

    // haal alle posts op
    $sqlQuery =  $conn->prepare("SELECT * FROM poll");
    $sqlQuery->execute();
    $posts = $sqlQuery->fetchAll();
    // foreach met de posts
    foreach ($posts as $post) {
        echo "<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        div{
        margin: 40px auto;
        display: flex;
        flex-direction: column; 
        justify-content: center;
                
        }
        h3{
            background-color: lightgrey;
            padding: 10px;
        }
        p{
            padding: 10px;
        }
        </style>";
        echo "<div>";
        echo " <h3>" . $post['vraag'] . "</h3>";

        // alle antwoorden printen met aantal stemmen
        $sqlQueryOptions =  $conn->prepare("SELECT optie.optie, optie.stemmen from optie
     WHERE optie.poll = :id");
        $sqlQueryOptions->bindParam(':id', $post['id']);
        $sqlQueryOptions->execute();
        $options = $sqlQueryOptions->fetchAll();




        foreach ($options as $option) {
            echo "<p>" . $option['optie'] . ": " . $option['stemmen'] . "</p>";
            echo "<br>";
        }
        echo "</div>";
        echo "<form method='post' action='edit.php'>    
        <input type='hidden' name='id' value='$post[id]'>
        <input type='hidden' name='vraag' value='$post[vraag]'>
        ";

        foreach ($options as $option) {
            echo "<input type='hidden' name='optie[]' value='" . $option['optie'] . "'>";
        }


        echo " <input type='submit' value='Bewerk'>
        </form>
        <br>";


        echo "<form method='post' action='rem.php'>
        <input type='hidden' name='id' value='$post[id]'>
        <input type='submit' value='Verwijder'>
        </form>

        ";
    }
}


function deletePoll()
{
    $conn = determineDatabase('poll');

    // verwijder poll uit database  met de corrosponding (betreffende opties, hier is id NIET id maar opties.poll staat GELIJK aan poll.id)
    $sqlQuery = $conn->prepare(" DELETE FROM optie WHERE poll = :id;
    DELETE FROM poll WHERE id = :id");
    $sqlQuery->bindParam(':id', $_POST['id']);
    $sqlQuery->execute();
}

function newPoll($vraag, $opties)
{
    // verbinding maken
    $conn = determineDatabase('poll');


    // begin transactie
    $conn->beginTransaction();

    try {
        $sqlQuery = $conn->prepare("INSERT INTO poll (vraag) VALUES (:vraag)");


        // nieuwe poll maken
        $sqlQuery->bindParam(':vraag', $vraag);
        $sqlQuery->execute();

        // bij de nieuwe vraag horen natuurlijk antwoorden  
        // voeg de optie toe aan de optie-tabel en koppel die aan de nieuwe poll
        $pollid = $conn->lastInsertId();
        $sqlQuery = $conn->prepare("INSERT INTO optie (optie, poll) 
        VALUES (:optie, :poll)");

        // haal id op van zojuist nieuwe poll en koppel deze aan de optie
        foreach ($opties as $optie) {
            if (strlen($optie) > 0) {
                $sqlQuery->bindParam(':optie', $optie);
                $sqlQuery->bindParam(':poll', $pollid);
                $sqlQuery->execute();
            }
        }


        $conn->commit();
    } catch (PDOException $e) {
        // annuleer de transactie
        // als er een fout is maak de wijzigingen ongedaan
        $conn->rollBack();
        die("Connection failed: " . $e->getMessage());
    }
}

function updatePOLL()
{
    $vraag = $_POST['vraag'];
    $id = $_POST['id'];
    $opties = $_POST['optie'];
    // maak verbinding 
    $conn = determineDatabase('poll');

    // begin upfsyr
    $sqlQuery = $conn->prepare("UPDATE poll SET vraag = :vraag WHERE id = :id;");
    $sqlQuery->bindParam(':vraag', $vraag);
    $sqlQuery->bindParam(':id', $id);


    foreach ($opties as $optie) {
        $sqlQuery1 = $conn->prepare("UPDATE optie SET optie = :optie WHERE poll = :poll AND id = :id;");
        $sqlQuery1->execute();
    }
    $sqlQuery->execute();
    header("Location: index.php");
}
