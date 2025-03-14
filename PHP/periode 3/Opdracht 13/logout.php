<?php
// sessie starten of hervatten
session_start();

// sessie variabelen wissen
session_unset();

// sessie sluiten
session_destroy();

// stuur gebruiker naar de loginpagina
header("Location: login.php");
exit;   
?>