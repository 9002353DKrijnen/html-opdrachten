<?php
// database gegevens met de basis gegevens
require "connect.php";

// sessie starten met session_start();
session_start();

// try en catch om fouten te voorkomen, met foutverwerking
try {
    // maak verbinding met de database
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    // Haal gebruiker uit de database
    $query = $conn->prepare("SELECT username FROM users");

    // voer query uit
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // errorverwerking
    die("Error:" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpasswd</title>
</head>

<body>
    <
        <h2>Gebruikers wachtwoorden wijzigen</h2>
        <form action="processpwd.php" method="post">
            <div>
                <select name="user" id="user" required>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= htmlspecialchars($user['username']); ?>"><?= htmlspecialchars($user['username']); ?></option>
                    <?php endforeach; ?>
                    ?>
                </select>
            </div>


            <div>
                <label for="newPasswd"> Nieuw wachtwoord:</label>
                <input type="text" name="newPasswd" id="newPasswd" required>
            </div>

            <div>
                <input type="submit" value="editPasswd">
            </div>
        </form>

</body>

</html>