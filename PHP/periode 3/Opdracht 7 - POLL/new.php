<?php
include 'functions.php';
?>
<form action="" method="post">
    <input type="text" id="vraag" name="vraag" placeholder="vraag">
    <input type="text" id="optie" name="optie[]" placeholder="antwoord 1">
    <input type="text" id="optie" name="optie[]" placeholder="antwoord 2">
    <input type="text" id="optie" name="optie[]" placeholder="antwoord 3">
    <input type="text" id="optie" name="optie[]" placeholder="antwoord 4">
    <input type="submit" value="Verzenden" name="submit">
</form>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    form{
        display:flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
        margin: 40px auto;
        width: 25%;
    }
    input{
        padding: 20px;
    }
</style>
<?php
if (isset($_POST['submit'])) {
    newPoll($_POST['vraag'], $_POST['optie']);
    header("Refresh: 3; url=qwerty.php");
}

?>