<?php
function ConnectDb(){
    /* gegevens van de database */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cijfers";

    try {
        /* Database verbinden middel van PDO */
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
}
?>