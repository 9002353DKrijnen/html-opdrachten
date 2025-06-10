<?php   
include 'functions.php';
session_start();
session_unset();
session_destroy();
header("Location: https://yahoo.com");
?>

