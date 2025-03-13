<?php

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