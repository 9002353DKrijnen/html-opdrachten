<?php
 /* Hier komt een profiel met de gegevens van 2 databases in 1 functie, zodat we dynamisch kunnen gebruiken
 alle variabelen zijn hetzelfde, maar de databases zijn verschillend */

 $username = 'root';
 $password = '';
 $hostname = 'localhost';
 
 $options = [
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
 ];
 ?>