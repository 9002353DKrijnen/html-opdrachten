<?php
$username = "root";
$password = "";
$options = [
    // Error management. Get the property of every error without exeptions, so there won't be any qeuit errors.]
    // avoids silent failures.
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // How do we want the results? 
    // Fetch results in assoc_array
    // Makes code easier to read and work with.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$host = "localhost";


?>