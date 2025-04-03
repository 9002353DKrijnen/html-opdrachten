<?php
// auteur: Damien Krijnen
// functie: verwijder een bier op basis van de id
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['biercode'])){

    // test of insert gelukt is
    if(deleteRecord($_GET['biercode']) == true){
        echo '<script>alert("bier met id: ' . $_GET['biercode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("bier is NIET verwijderd")</script>';
    }
}
?>

