<?php
require_once 'functions.php';
    deletePoll($_POST['poll_id']);
header("Location: home.php");
?>