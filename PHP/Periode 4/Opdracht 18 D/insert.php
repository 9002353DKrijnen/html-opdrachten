<?php
// include functions so we can connect to database later on with DBconnect()
include "functions.php";


// check if the form has been submitted to server
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // get the value from the form send by XHTTP in JS
    $result = $_POST["result"];

    $conn = dbSelect('');
}
?>