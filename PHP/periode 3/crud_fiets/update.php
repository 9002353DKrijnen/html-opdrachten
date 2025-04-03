<?php
    // functie: update fiets
    // auteur: Vul hier je naam in

    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateRecord($_POST) == true){
            echo "<script>alert('Bier is gewijzigd')</script>";
        } else {
            echo '<script>alert("Bier is NIET gewijzigd")</script>';
        }
   }  

    // Test of id is meegegeven in de URL
    if(isset($_GET['biercode'])) {
      
        // Haal alle info van de betreffende id $_GET['id']
        $row = getRecord($_GET['biercode']);
    
?>

<html>
    <body>
        <form method="post">

   

        <label for="naam">Naam:</label>
        <input type="hidden" name="biercode" id="biercode"  value="<?= $row['biercode']; ?>">
        
        <input type="text" id="naam" name="naam" required value="<?= $row['naam']; ?>"><br>

        <label for="soort">soort:</label>
        <input type="text" id="soort" name="soort" required value="<?= $row['soort']; ?>"><br>

        <label for="stijl">stijl:</label>
        <input type="text" id="stijl" name="stijl" required value="<?= $row['stijl']; ?>"><br">

        <label for="alcohol">alcohol:</label>
        <input type="text" id="alcohol" name="alcohol" required value="<?= $row['alcohol']; ?>"><br"> <br>
        <br>
        <?= dropdownCrud(); ?>
        <input type="submit" name="btn_wzg" value="Update">
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>

<?php
    } else {
        echo "Geen biercode opgegeven<br>";
    }
  
?>