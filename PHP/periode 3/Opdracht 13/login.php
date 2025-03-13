<?php
// Database gegeven toevoegen vanuit extern bestand.  Hiervoor deden we dat met een aparte functie: connectDB();
require "connect.php";

// start een nieuwe sessie als er nog geen sessie bestaat
session_start();

// controleer of er een inlogformulier is verzonden
if(isset($_POST['login'])) {
    // maak verbinding
    $conn = new PDO($dsn, $user, $pass, $options);

    // haal gebruikersnaam en wachtwoord uit het formulier  met filter om XSS-aanvallen te voorkomen
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  
    // haal wachtwoord direct uit de post Array
    $password = $_POST['password'];

    // Bereid een SQL query voor om de gebruiker op te halen uit de database
    $query = $conn->prepare("SELECT * FROM users WHERE username = :username");

    // bind de ingevoerde gebruikersnaam aan de 
    $query->bindParam(':username', $username, PDO::PARAM_STR);

    // voer de query uit
    $query->execute();

    // controleer of  er daadwerkelijk een gebruiker gevonden werd
    if($query->rowCount() == 1) {
        // haal de gebruiker uit de database
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // controleer wachtwoord
        if(password_verify($password, $user['password'])) {
            // sla gebruiker op in sessie
            $_SESSION['user'] = $user;

            // stuur gebruiker naar de homepagina
            header("Location: index.php");
            exit;
        } else {
            echo "<p>Verkeerde gebruikersnaam of wachtwoord</p>";
        }
    }
}
?>