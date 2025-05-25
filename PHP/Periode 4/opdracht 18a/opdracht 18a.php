<?php
include 'functions.php';
?>

<form action="" method="post">
    <select name="name" id="name" required>
        <?= getTeacher(); ?>
    </select>
    <input type="text" name="student" placeholder="student" required>
    <input type="textarea" name="message" placeholder="message" required>
    <select name="reason" id="reason">
    <option value="sick" selected="selected">Ziek</option>
    <option value="marriage">Trouwerij</option>
    <option value="doctor">Dokter of andere instatie</option>
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
</style>

<?php
if(isset($_POST['submit'])){
    $teacher = $_POST['name'];
    $student = $_POST['student'];
    $message = $_POST['message'];
    $reason = $_POST['reason'];
    

    // verbinding maken met database


    // test verbinding
    $conn = dbSelect('ziek');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

    exit;

}