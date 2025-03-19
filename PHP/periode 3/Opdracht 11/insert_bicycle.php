<?php
/* Damien 
Opdracht functies 
 */
require_once("functions.php");
// test of submit is geklikt
// kij of er een naam is ingevuld
if (isset($_POST['submit']) && isset($_POST['naam'])) {
    // echo de naam als feedback
    echo '<script> alert("Biernaam ' . $_POST['naam'] . ' is toegevoegd.") </script>';
// run de functie
insertBicycle($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bieren.html</title>
</head>

<body>
    <form method="post">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam">
        <label for="prijs">Prijs:</label>
        <input type="text" id="prijs" name="prijs">
        <label for="soort">soort:</label>
        <input type="text" id="soort" name="soort">
        <label for="stijl">stijl</label>
        <input type="text" id="stijl" name="stijl">
        <label for="alcohol">alcohol:</label>
        <input type="text" id="alcohol" name="alcohol">
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="./inedex.php">Home</a>
    <style>
        body {
            background-color: lightblue;
            color: rgb(0, 0, 0);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            color: rgb(0, 0, 0);
            position: relative;
        }
    </style>

</body>

</html>