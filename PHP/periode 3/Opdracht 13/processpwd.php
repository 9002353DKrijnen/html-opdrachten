<?php
// wachtwoord wijzigen wordt hier verwerkt
require "connect.php";

// start sessie of hervat 'm

session_start();

// controleer of de gebruiker ingelogd is

if (isset($_POST['user']) && isset($_POST['newPasswd'])) {
    $username = $_POST['user'];
    // hash het nieuwe wachtwoord
    $newPasswd = password_hash($_POST['newPasswd'], PASSWORD_DEFAULT);

    // maak verbinding met de database en in de try wordt de update query uitgevoerd
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $query = $conn->prepare("UPDATE users SET password = :newPasswd WHERE username = :username");
       
       
        // bind de ingevoerde gebruikersnaam aan de query, dit is belangrijk om SQL-injecties te voorkomen
        $query->bindParam(':newPasswd', $newPasswd, PDO::PARAM_STR);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        if ($query->execute()) {
            echo "Wachtwoord gewijzigd voor gebruiker: " . $username . "<br>";
        } else {
            echo "Wachtwoord NIET gewijzigd voor gebruiker: " . $username . "<br>";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "Voer alle velden in";
}

    ?>