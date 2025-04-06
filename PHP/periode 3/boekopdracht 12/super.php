<?php
// auteur: Damiën
// datum : 06-04-2025
// bestandsnaam: super.php


// opdracht willekeurige wachtwoord van 10 tekens:  

include 'functions.php';
$fulldata = getUseragent();
$filteredData = Filteredfulldata($fulldata);
echo "uw wachtwoord =" . generateRandomPassword(10);
echo "<br> Volledige gegevens van uw browser =" . getUseragent($fulldata);
echo "<br> uw bestuuringssysteem =" . $filteredData['computerdata'];
echo "<br> uw browser =" . $filteredData['browserdata'];
echo "<style>body{background-color: #FFC0CB;
display: flex;
justify-content: center;
align-items: center;}


</style>";
echo " <br><br><form action='' method='post'>
        <input type='hidden' id='update' name='update'>
        <input type='submit' value='update' name='submit'>
    </form>";

if (isset($_POST['submit'])) {
  echo "<script>alert('Uw internetgedrag zal voor altijd worden gevolgd ');</script>";
  updateUsage();
}

printPupills();
?>
