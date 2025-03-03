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
        <input type="text" id="name" name="name">
        <label for="prijs">Prijs:</label>
        <input type="text" id="price" name="price">
        <label for="style">stijl:</label>
        <input type="text" id="style" name="style">
        <label for="alcohol">Brouwerij:</label>
        <input type="text" id="alcohol" name="alcohol">
        <input type="dropdown" id="brouwerij" name="brouwerij">
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

    <?php

    require_once("functions.php");
    // test of submit is geklikt

if (isset($_POST['submit']) && isset($_POST['name'])) {
    echo '<script> alert("Biernaam ' . $_POST['name'] . ' is toegevoegd.") </script>';
  echo "Miauw";
    insertBier($_POST);
}

    ?>
</body>

</html>