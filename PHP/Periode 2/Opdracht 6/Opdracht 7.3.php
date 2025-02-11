<?php
/*
Opdracht 7.3 via PHP CSS aanpassen. 
Auteur: 9002353, Damiën
*/

// sesssie starten want we gaan $_SESSION gebruiken
session_start();
// controleren of het formulier is verzonden en of er een kleur is geselecteerd

if (isset($_POST['send'])) {
    if (empty($_POST['color'])) {
        echo "U heeft geen kleur gekozen";
        return;
    } else {
        // fout gemaakt door dezelfde verwijzing te maken. Ik deed $_SESSION['color'] = $_SESSION['color']
        // Color wordt natuurlijk UIT DE POST GEHAALD EN NIET UIT DE NIET BESTAANDE SESSIE
        $_SESSION['color'] = $_POST['color'];
    }
}
// Controleer of er een kleur bekend is hier verwijzend naar de eerder opgeslagen $_SESSION['color']
if (isset($_SESSION['color'])) {
    $bodyColor = $_SESSION['color'];
} else {
    // standaard wit
    $bodyColor = "white";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7.3</title>
</head>
<style type="text/css">
    body {
        background-color: <?php echo $bodyColor; ?>;
    }
</style>

<body>
    <form method="post" action="">
        <label for="red">Rood</label>
        <input type="radio" name="color" value="red">
        <br>
        <label for="blue">Blauw</label>
        <input type="radio" name="color" value="blue">
        <br>
        <label for="green">Groen</label>
        <input type="radio" name="color" value="green">
        <br>
        <label for="pink">Roze</label>
        <input type="radio" name="color" value="pink">
        <br>
        <input type="submit" name="send" value="send">
    </form>
</body>

</html>