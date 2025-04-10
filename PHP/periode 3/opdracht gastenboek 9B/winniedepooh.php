<?php
include 'functions.php';
session_start();

$loggedIn = $_SESSION['loggedIn'];

if($loggedIn == false) {
    header("Location: login.php");
}
printPosts();
?>