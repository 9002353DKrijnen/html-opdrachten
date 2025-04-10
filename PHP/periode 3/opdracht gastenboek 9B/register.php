<?php
session_start();
require 'functions.php';
?>

<form method="post">

    <label for="email"></label>
    <input type="email" name="email" id="email" placeholder="Email">

    <label for="username"></label>
    <input type="text" name="username" id="username" placeholder="Gebruikersnaam">

    <label for="password"></label>
    <input type="password" name="password" id="password" placeholder="Wachtwoord">

    <label for="admin"> Wilt u admin zijn?</label>
    <p>Ja, vink dan het vakje aan</p>
    <input type="checkbox" name="isAdmin" id="admin">

    <input type="submit" value="Inloggen" name="submit">

</form>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    form {
        display: flex;
        border: solid 1px black;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 25%;
        margin: 40px auto;
        padding: 20px;
    }

    form input {
        margin: 10px;
    }
</style>

<?php

// na klikken op submit worden er variabelen uitgedeeld
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // boolean isAdmin

        $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;



        registerUser($email, $username, $password, $isAdmin);
    }
}
?>