<?php
    // functie: formulier en database insert bier
    // auteur: Damien Krijnen

    echo "<h1>Insert bier</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('bier is toegevoegd')</script>";
        } else {
            echo '<script>alert("bier is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

   

        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required><br>

        <label for="soort">soort:</label>
        <input type="number" id="soort" name="soort" required><br>

        <label for="stijl">stijl:</label>
        <input type="text" id="stijl" name="stijl" required><br">

        <label for="alcohol">alcohol:</label>
        <input type="text" id="alcohol" name="alcohol" required><br">
        <br>
        <?= dropdownCrud(); ?>
        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>
