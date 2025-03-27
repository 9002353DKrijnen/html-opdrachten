<?php
include 'functions.php' ;
// check of het form is verzonden
if (isset($_POST['submit'])) {
$antwoord = htmlspecialchars($_POST['optie']);

// maak verbinding met database
$conn = determineDatabase('poll');


// werk totaal uit met de database
$sqlQueryUpdate = $conn->prepare("UPDATE optie SET stemmen = stemmen + 1 WHERE optie = :optie");
$sqlQueryUpdate->bindParam(':optie', $antwoord);
$sqlQueryUpdate->execute(); 
echo 
 "<script>
 alert(`Formulier met $antwoord verzonden`);
</script>
<style>";

// na 3 seconden wordt je naar de homepagina gestuurd
header("Refresh: 3; url=qwerty.php");
exit;
}
?>