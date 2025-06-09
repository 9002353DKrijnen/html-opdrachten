<?php

// get current PHP status. If there's none, we will create one
include 'functions.php';
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}


// save visitor's data to variables: 

if(isset($_SESSION['HTTP_REFERER'])) {
    $previous_website = $_SESSION['HTTP_REFERER'];
} else{
    $previous_website = 'Onbekend';
}
// save current website as HTTP_REFERER
$_SESSION['HTTP_REFERER'] = $_SERVER['REQUEST_URI'];


/* SERVER is what the browser tells you now. SESSION is what you remember for later.
Therefore, we will use the Server now, because each user's visit is unique.
 We will only use session if the information we need is required server side later.*/



// convert full link to just the url
$uri = basename($previous_website);


// country
$land = $_SERVER['HTTP_ACCEPT_LANGUAGE'];


// ip-adres
$ipadres = $_SERVER['REMOTE_ADDR'];
// provider
$provider = $_SERVER['HTTP_HOST'];
// huidie browser
$browser = $_SERVER['HTTP_USER_AGENT'];


// huidige datum met tijd
$datum_tijd = date('Y-m-d H:i:s');
echo "<p> Vorige website: $uri </p>";
var_dump($ipadres);
var_dump($provider);
var_dump($browser);
var_dump($datum_tijd);

if(empty(printData())) {
    echo "<p> Geen data gevonden </p>";
}
?>