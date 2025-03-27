<?php
require_once 'functions.php';
    deletePoll($_POST['id']);
    header("Location: home.php");
?>