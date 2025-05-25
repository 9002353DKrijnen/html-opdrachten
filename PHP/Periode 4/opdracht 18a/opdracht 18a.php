<?php
include 'functions.php';
?>

<form action="" method="post">
    <select name="name" id="name" required>
        <?= getTeacher(); ?>
    </select>
    <select name="student" id="student" required>
        <?= getStudent(); ?>
    </select>
    <select name="reason" id="reason">
    <option value="sick" selected="selected">Ziek</option>
    <option value="marriage">Trouwerij</option>
    <option value="doctor">Dokter of andere instantie</option>
    </select>
    <input type="submit" name="submit" value="submit">
</form>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        background-color: greenyellow;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    form input , select , option {
        margin: 5px;
        padding: 5px;
        border: 1px solid black;
        border-radius: 5px;
        
    }
</style>

<?php
if(isset($_POST['submit'])){
    $teacher = $_POST['name'];
    $student = $_POST['student'];
    $date = date('Y-m-d');
    $reason = $_POST['reason'];
    

    // verbinding maken met database


    // test verbinding
    $conn = dbSelect('ziek');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlQuery = "INSERT INTO reden (leerling_id, docent_id, omschrijving, datum) 
    VALUES (:leerling_id, :docent_id, :omschrijving, :datum)";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bindParam(':leerling_id', $student);
    $stmt->bindParam(':docent_id', $teacher);
    $stmt->bindParam(':datum', $date);
    $stmt->bindParam(':omschrijving', $reason);
    $stmt->execute();	
 

    
}