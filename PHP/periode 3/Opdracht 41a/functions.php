<?php
function dbSelect($dbname = 'default')
{
    // $database globaal maken
    global $database, $username, $password, $host, $options;
    // Kijken of database bestaat, met errorverwerking wanneer dat niet het geval is 

    if (!isset($database[$dbname])) {
        die("Database $dbname niet gevonden");
    }
    // stel $db in zodat we de juiste database kunnen gebruiken 
    $db = $database[$dbname];

    $dsn = "mysql:host=$host;dbname={$db['dbname']}";


    // Maak verbinding met database
    try {
        $conn = new PDO($dsn, $username, $password, $options);
        echo "succesvol verbonden met $dbname";
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>