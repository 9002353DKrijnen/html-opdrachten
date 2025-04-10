<?php
// start sessie
session_start();

// sessie variabelen verwijderen
session_unset();

//Verwijder de sessie
session_destroy();

// terug naar de login pagina
header("Location: login.php");

// stop
exit();
?>