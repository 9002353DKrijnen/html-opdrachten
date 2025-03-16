<?php
// start of hervat de sessie
session_start();

// controleer of de sessievariabele voor de gebruiker bestaat
if(!isset($_SESSION['user'])) {
    // stuur gebruiker naar de loginpagina
    header("Location: login.php");
    exit;
}

// als de sessie wel bestaat dan tonen we een welkomsboodschap
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom</title>
</head>
<body>
    <h1>Welkom <?php echo htmlspecialchars($user['username']) ?> </h1>
    <p>Je bent succesvol ingelogd</p>
    <?php
    // als de gebruiker admin is dan tonen we een extra boodschap en een optie om de admin pagina te bezoeken waar we gebruikers wachtwoorden kunnen wijzigen
if($user['username'] == 'admin') {
    echo "<p>Je bent admin</p>";
    echo "<p><a href='editpasswd.php'>Wachtwoorden wijzigen</a></p>";
}
    ?>
    <p><a href="logout.php">Uitloggen</a></p>

</body>
</html>