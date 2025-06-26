<?php

// set username
$username = "root";

// set password
$password = "";


// set options
$options = [
    // Error management. Get the property of every error without exeptions, so there won't be any qeuit errors.]
    // avoids silent failures.
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // How do we want the results? 
    // Fetch results in assoc_array
    // Makes code easier to read and work with.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


// set host. For local it is Localhost.
$host = "localhost";


?>