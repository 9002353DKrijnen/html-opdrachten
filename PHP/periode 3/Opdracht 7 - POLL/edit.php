<?php
include 'functions.php';
// verbinding maken
$conn = determineDatabase('poll');
?>

<form action="" method="post">
    <input type="hidden" name="poll_id" value="<?php echo $_POST['poll_id'] ?>">
    <input type="text" name="vraag" value="<?php echo $_POST['vraag']; ?>">
    
    <?php
   foreach ($_POST['optie'] as $key => $optie) {
    echo "<input type='text' name='optie[]' value='" . htmlspecialchars($optie) . "'>";
    echo "<input type='hidden' name='id[]' value='" . htmlspecialchars($_POST['id'][$key]) . "'>";
    echo "<br>";
}

    ?>
    <input type="submit" value="opslaan" name="submit">
</form>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 40px auto;
        width: 25%;
    }

    input {
        padding: 20px;
        width: 520px;
        margin: 24px;
    }
</style>

<?php
if (isset($_POST['submit'])) {
updatePOLL();

header("Location: home.php");
}
?>