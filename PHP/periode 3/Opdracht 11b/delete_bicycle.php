<?php 
// include de functies zodat ze gebruikt kunnen worden op deze pagina
include 'functions.php';

// verwijder fiets met behulp van de functie waarmee $_POST verwijst naar reeds ingevulde formulier
delete($_POST);

// Terugkeer naar de indexpagina/home
header("Location: indexfiets.php");
?>
