<?php
// auteur: Wigmansbiercode
// functie: verwijder een bier op basis van de biercode
include 'funtions.php';

// Haal bier uit de database
if(isset($id))
{
    $id = $_GET['id'];
    echo "Received biercode: " . $id . "<br>"; // Debug statement
    delete($id, 'id');
    echo '<script>alert("Biercode: ' . $id . ' is verwijderd")</script>';
    echo "<script>location.href='crud.php';</script>";
} else {
    echo $id; // Debug statement
}
?>