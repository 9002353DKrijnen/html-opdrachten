<?php
include_once 'functions.php';
session_start();
echo "<button><a href='logoff.php'>Uitloggen</a></button>";

$loggedIn = $_SESSION['loggedIn'];

if($loggedIn == false) {
    header("Location: login.php");
}
printPosts();



?>