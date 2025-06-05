<?php
function dbSelect($database = 'default')
{
    require 'profile.php';
    // stel $db in zodat we de juiste database kunnen gebruiken 

    $dsn = "mysql:host=$host;dbname={$database}";


    // Maak verbinding met database
    try {
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}



function getTeacher(){
    $conn = dbSelect('ziek');
    $sqlQuery = "SELECT * FROM docent";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   


    foreach($result as $dropdownResult){
    echo '<option value = "' . htmlspecialchars($dropdownResult['docent_id']) . '" >' . htmlspecialchars($dropdownResult['naam']) . '</option>';
    }
}

function getStudent(){
    $conn = dbSelect('ziek');
    $sqlQuery = "SELECT * FROM leerling";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   


    foreach($result as $dropdownResult){
    echo '<option value = "' . htmlspecialchars($dropdownResult['leerling_id']) . '" >' . htmlspecialchars($dropdownResult['naam']) . ' ' . htmlspecialchars($dropdownResult['klas']) . '</option>';
    }
}
?>