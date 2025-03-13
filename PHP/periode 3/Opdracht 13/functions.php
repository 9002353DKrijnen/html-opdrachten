<?php
function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studenten_login";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function registerForm(){  
    $formUserReg = "
    <form action='register.php' method='post'>
        <input type='text' name='username' placeholder='Gebruikersnaam'>
        <input type='password' name='password' placeholder='Wachtwoord'>
        <input type='submit' value='Registreren'>
    </form>";
    echo $formUserReg;
}

?>