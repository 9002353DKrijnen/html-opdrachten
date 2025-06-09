<?php
include 'functions.php';
    $conn = dbSelect('statistiekensysteem');
    $sqlQuery = "SELECT * FROM bezoekers order by land asc";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1' cellpadding='5'>";
    echo "<thead > 
    <tr>
        <th>Land</th>
        <th>IP-adres</th>
        <th>Provider</th>
        <th>Browser</th>
        <th>Datum/Tijd</th>
        <th>Vorige Website</th>
    </tr>
    </thead>";
    foreach ($results as $result) {
        echo "
        <tr>
            <td>{$result['land']}</td>
            <td>{$result['ip_adres']}</td>
            <td>{$result['provider']}</td>
            <td>{$result['browser']}</td>
            <td>{$result['datum_tijd']}</td>
            <td>{$result['referer']}</td>
        </tr>
        ";
  
    }

    ?>