<?php
session_start();
require 'functions.php';
$loggedIn = false;

?>
<h1> Dit is een login pagina </h1>
<form method="post" class="login">
    <label for="username"></label>
    <input type="text" name="username" id="username" placeholder="Gebruikersnaam">

    <label for="password"></label>
    <input type="password" name="password" id="password" placeholder="Wachtwoord">

    <input type="submit" value="Inloggen" name="submit">
</form>


<p> Registreer <a href="register.php">Hier</a></p>
<style> 
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.login{
    display: flex;
    border: solid 1px black;
    flex-direction: column;
    justify-content: center;
}

.login > input{
    margin: 10px;
}
</style>

<?php
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // met databse verbinden om te kijken of de gebruiker bestaat + juist wachtwoord
    login($username, $password);
}
