<?php

//Opdracht 2: Maak een calulcator met de gebruiksmogelijkheden: 2 getallen waarin je kan optellen, aftrekken, vermeningvuldigen en kan delen. 
//Opdracht 3: Maak een script waarbij het mogelijk is om de achtergrondkleur van de pagina in te stellen. Met een aantal radio buttons kan er 1 kleur worden gekozen. 
//Opdracht 4: Maak een Script met een formulier waarmee je korting op een geldbedrag kunt berekenen, de gebruiker moet een geldbedrag en een kortingspercentage kunnen invoeren. 
$number1 = "";
$number2 = "";
$calculatedNumber = "";
$method = "NULL";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdracht 7.2</title>
</head>
<body>
    <form method="post" action="">
        <label for="number1">Getal 1</label>
    <input type="text" name="number1" >
    <br>
    <label for="number2">Getal 2</label>
    <input type="text" name="number2" >
    <br>
    <label for="plus">Optellen</label>
    <input type="radio" name="calculate" value="+">
    <br>
    <label for="minus">Aftrekken</label>
    <input type="radio" name="calculate" value="-">
    <br>
    <label for="multiply">Vermenigvuldigen</label>
    <input type="radio" name="calculate" value="*">
    <br>
    <label for="devide">Delen</label>
    <input type="radio" name="calculate" value="/">
    <br>
    <input type="submit" value="Verstuur" name="Send">
    </form>

</body>
</html>
<?php
if(isset($_POST['Send'])){
    // Controleer of de getallen zijn ingevoerd
    if(empty($_POST['number1']) || empty($_POST['number2'])){
        echo "U heeft niks ingevoerd";}
    elseif(!isset($_POST['calculate'])){
        echo "U heeft geen rekenkundige functie geselecteerd.";
    }
    else{
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $method = $_POST['calculate'];

// Zorg dat ingevoerde getallen daardwerkelijk nummers zijn
$number1 = floatval($number1);
$number2 = floatval($number2);
switch($method){
case '+';
    $calculatedNumber = $number1 + $number2;
    break;
case '-';   
    $calculatedNumber = $number1 - $number2;
    break;
case '*';
    $calculatedNumber = $number1 * $number2;
    break;
case '/';
    if($number2 == 0){
    echo "Op je bankrekening staat ook 0";
}   else{
    $calculatedNumber= $number1 / $number2;
}
    break;
    default: echo "Ongeldige methode.";
    $calculatedNumber = null;

         }
echo "<br>";
echo "Uw berekend getal met de getallen $number1 en $number2 met de methode $method leiden tot het getal:" . $calculatedNumber;
    }   
 }

 







?>
