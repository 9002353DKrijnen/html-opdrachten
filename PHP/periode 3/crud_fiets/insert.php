<?php
    // functie: formulier en database insert fiets
    // auteur: Vul hier je naam in

    echo "<h1>Insert Fiets</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('Fiets is toegevoegd')</script>";
        } else {
            echo '<script>alert("Fiets is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

   

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br>

        <label for="prijs">Prijs:</label>
        <input type="number" id="prijs" name="prijs" required><br>
        <?= dropdownCrud(); ?>
        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>
