<?php
include 'functions.php';
// verbinding maken
$conn = determineDatabase('poll');

    ?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
    <input type="text" name="vraag" value="<?= htmlspecialchars($_POST['vraag']);?>">
    
    <input type="submit" value="Verzenden">
</form>
