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
        echo "<h3>" . $poll['vraag'] . "</h3>";


        // haal de opties voor de huidige poll op, vergelijk optie.poll met poll.id. 
        $sqlQueryOptions =  $conn->prepare("SELECT optie.optie from optie WHERE poll = :id");
        $sqlQueryOptions->bindParam(':id', $poll['id']);
        $sqlQueryOptions->execute();
        $options = $sqlQueryOptions->fetchAll();
        // print de opties, met radio buttons
        foreach ($options as $option) {
            echo "<input type='radio' name='optie' value='{$option['optie']}'> {$option['optie']}" . "<br>";
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
        <input type='submit' value='Bewerk'>
        </form>
        <br>";


        echo "<form method='post' action='rem.php'>
        <input type='hidden' name='id' value='$post[id]'>
        <input type='submit' value='Verwijder'>
        </form>";
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

 function newPoll(){
// verbinding maken
$conn = determineDatabase('poll');
$conn->beginTransaction();
try{
$sqlQuery = $conn->prepare("INSERT INTO poll (vraag) VALUES (:vraag)");
// nieuwe poll maken
$sqlQuery->bindParam(':vraag', $_POST['vraag']);
$sqlQuery->execute();



}
catch(PDOException $e){
    // annuleer de transactie
    $conn->rollBack();
    die("Connection failed: " . $e->getMessage());
}
 }