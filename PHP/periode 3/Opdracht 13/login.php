<?php
// Database gegeven toevoegen vanuit extern bestand.  Hiervoor deden we dat met een aparte functie: connectDB();
require "connect.php";

// start een nieuwe sessie als er nog geen sessie bestaat
session_start();

// controleer of er een inlogformulier is verzonden
if (isset($_POST['login'])) {
    try {
        // maak verbinding
        $conn = new PDO($dsn, $user, $pass, $options);

        // haal gebruikersnaam en wachtwoord uit het formulier  met filter om XSS-aanvallen te voorkomen
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

        // haal wachtwoord direct uit de post Array
        $password = $_POST['password'];

        // Bereid een SQL query voor om de gebruiker op te halen uit de database
        $query = $conn->prepare("SELECT * FROM users WHERE username = :username");

        // bind de ingevoerde gebruikersnaam aan de  query
        $query->bindParam(':username', $username, PDO::PARAM_STR);

        // voer de query uit
        $query->execute();

        // controleer of  er daadwerkelijk een gebruiker gevonden werd
        if ($query->rowCount() == 1) {
            // haal de gebruiker uit de database
            $result = $query->fetch();
            // controleer wachtwoord
            if (password_verify($password, $result['password'])) {
                // sla gebruiker op in sessie
                $_SESSION['user'] = $result;

                // stuur gebruiker naar de homepagina
                header("Location: Willkommen.php");
                exit;
            } else {
                echo "<p>Verkeerde gebruikersnaam of wachtwoord</p>";
            }
        } else {
            echo "<p>Verkeerde gebruikersnaam of wachtwoord</p>";
        }
    } catch (PDOException $e) {
        // errorverwerking
        die("Error:" . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>
<body>
    <h2>Inloggen</h2>
    <form action="" method="post">
    <div>
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" id="username" required>
    </div>

    <div>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>
    </div>


    <div>
        <input type="submit" name="login" value="Inloggen">
    </div>
    </form>
    <br>
    <a href="register.php">Registreren</a>
</body>
</html>
