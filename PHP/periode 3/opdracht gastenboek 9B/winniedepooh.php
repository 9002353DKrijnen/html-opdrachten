<?php
include_once 'functions.php';
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = $_SESSION['loggedIn'];
echo $loggedIn ? "u bent ingelogd" : header("login.php");
echo "<button><a href='logoff.php'>Uitloggen</a></button>";

$loggedIn = $_SESSION['loggedIn'];

if($loggedIn == false) {
    header("Location: login.php");
}
printPosts();



?>