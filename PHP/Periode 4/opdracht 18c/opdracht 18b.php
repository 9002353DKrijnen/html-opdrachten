<?php
// damien krijnen
// 9002353
include 'functions.php';
    
    $conn = dbSelect('nieuws');
    $sqlQuery = "select * from nieuws";
    $runArgument = $conn->prepare($sqlQuery);
    $runArgument->execute();

    if ($runArgument->rowCount() > 0) {
        echo "<p> Oude nieuwsberichten zijn verwijderd. </p>";
    }
    $sqlQuery = "SELECT * from nieuws";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<thead>
        <tr>
            <th>Leerling ID</th>
            <th>Docent ID</th>
            <th>Omschrijving</th>
            <th>Datum</th>
            <th>Vak</th>
        </tr>
    </thead>";
    foreach ($result as $row) {
        
        echo "<tr>";
        echo "<td>" . $row['leerling'] . "</td>";
        echo "<td>" . $row['docent'] . "</td>";
        echo "<td>" . $row['omschrijving'] . "</td>";
        echo "<td>" . $row['datum'] . "</td>";
        echo "<td>" . $row['vak'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<form action="" method="post">
    <select name="name" id="name" required>
        <option value=""></option>
        <?= getTeacher(); ?>
    </select>
    <select name="student" id="student" required>
        <option value=""></option>
        <?= getStudent(); ?>
    </select>
    <select name="reason" id="reason">
        <option value="sick" selected="selected">Ziek</option>
        <option value="marriage">Trouwerij</option>
        <option value="doctor">Dokter of andere instantie</option>
    </select>
    <input type="submit" name="submit" value="Verstuur Ziekmelding">
</form>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        background-color: greenyellow;
        display: flex;
        flex-direction: column;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    form input,
    select,
    option {
        margin: 5px;
        padding: 5px;
        border: 1px solid black;
        border-radius: 5px;

    }
    
</style>

<?php
if (isset($_POST['submit'])) {
    $teacher = $_POST['name'];
    $student = $_POST['student'];
    $date = date('Y-m-d');
    $reason = $_POST['reason'];


    // verbinding maken met database



    $conn = dbSelect('ziek');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<script>alert('Uw melding is verstuurd.')</script>";

    $sqlQuery = "INSERT INTO reden (leerling_id, docent_id, omschrijving, datum) 
    VALUES (:leerling_id, :docent_id, :omschrijving, :datum)";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindParam(':leerling_id', $student);
    $stmt->bindParam(':docent_id', $teacher);
    $stmt->bindParam(':datum', $date);
    $stmt->bindParam(':omschrijving', $reason);
    $stmt->execute();
}
?>