<?php 
include_once "connect.php";
include_once "functions.php";
ConnectDb();
insertLeerling();
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
        <label for="naam">id:</label>
        <input type="text" id="id" name="id">
        <label for="prijs">leerling:</label>
        <input type="text" id="leerling" name="leerling">
        <label for="soort">cijfer:</label>
        <input type="text" id="cijfer" name="cijfer">
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="./opdracht12a.php">Home</a>
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

