<?php
    // functies importeren
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['submit'])){
        // voer update functie uit met de $_POST
        Update($_POST);
        header("Location: indexfiets.php");
    }

    if(isset($_GET['id'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        // $row = Get($_GET['id']);
        $row = Get($id);
    
?>

<html>
    <body>
        <form method="post">
        <br>
        <!-- Adaptief tonen van fiets -->
        <?= "<h1>Update Onze prachtige: " . $row['merk'] . "   ". $row['type'] . "</h1>"; ?>

        <input type="hidden" name="id" value="<?=  $row['id'];?>"><br>
        Merknaam:<input type="text" name="merk" value="<?= $row['merk'];?>"><br> 
        Type: <input type="text" name="type" value="<?= $row['type']?>"><br>
        Prijs: <input type="text" name="prijs" value="<?= $row['prijs']?>"><br>

        <br><br>
         <input type="submit" name="submit" value="Wijzigen"><br>
        </form>
        <br><br>
        <a href='indexfiets.php'>Home</a>
    </body>
</html>

<?php
    } else {
        // errorverwerking
        "Geen id opgegeven";
    }
?>