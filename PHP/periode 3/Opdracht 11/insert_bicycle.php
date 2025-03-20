<?php
/* Damien 
Opdracht functies 
 */
require_once("functions.php");
// test of submit is geklikt
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bieren.html</title>
</head>

<body>
    <form method="post" action="insert_bicycle.php">
        <label for="merk">Merk:</label>
        <input type="text" id="merk" name="merk">
        <label for="prijs">Prijs:</label>
        <input type="text" id="prijs" name="prijs">
        <label for="type">Type:</label>
        <input type="text" id="type" name="type">
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="./indexfiets.php">Home</a>
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

<?php


// kijk of er een naam is ingevuld
if (isset($_POST['submit']) && isset($_POST['merk'])) {
    // echo de naam als feedback


    echo '<script> alert("fiets ' . $_POST['merk'] . ' is toegevoegd.") </script>';
    // run de functie
    insert($_POST);
}

?>