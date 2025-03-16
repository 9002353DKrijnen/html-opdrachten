<?php
include_once "functions.php";
registerForm();
if (isset($_POST['register'])) {
    include_once "connect.php";
    try{
        // nieuwe databse verbinding
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

        // maak verbinding met de database
        $query = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

        // sanitizee gebruikersnaam en hash het wachtwoord
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // bind de ingevoerde gebruikersnaam en wachtwoord aan de query
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);

        // voer de query uit en controleer of het gelukt is
        if ($query->execute()) {
            echo "Gebruiker is geregistreerd";
        } else {
            echo "Gebruiker is NIET geregistreerd";
        }
    } catch (PDOException $e) {
        // errorverwerking
        die("Error:" . $e->getMessage());   
    }
}
?>

