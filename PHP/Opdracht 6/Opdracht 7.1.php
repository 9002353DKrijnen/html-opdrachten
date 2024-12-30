<?php
/* auteur Damien 9002353
OPdracht 7.1-7.4

Opdracht 1: maak een btw-calculator met een tekstvak waarin een bedrag exclusief btw kan worden ingevoerd. Onder dit tekstvak staan 2 radio buttons voor 9% en 21% btw.
Opdracht 2: Maak een calulcator met de gebruiksmogelijkheden: 2 getallen waarin je kan optellen, aftrekken, vermeningvuldigen en kan delen. 
Opdracht 3: Maak een script waarbij het mogelijk is om de achtergrondkleur van de pagina in te stellen. Met een aantal radio buttons kan er 1 kleur worden gekozen. 
Opdracht 4: Maak een Script met een formulier waarmee je korting op een geldbedrag kunt berekenen, de gebruiker moet een geldbedrag en een kortingspercentage kunnen invoeren. 
Geef het uiteindelijke geldbedrag goed weer, door gebruik te maken van de functie number_format().
https://stackoverflow.com/questions/6346997/replace-comma-with-dot-regex-php
*/
// opdracht h7 opdracht 1
$taxInput = "";
$moneyInput = "";
$total = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdrachtjes</title>
</head>
<body>
    <form method="post" action="">
        <label for="moneyInput">Bedrag exclusief BTW</label>
        <input type="text" name="toCalculateMoney" value="<?php echo htmlspecialchars($moneyInput); ?>">
        <br>
        <input type="radio" value="9" name="btw"<?php if($taxInput == "9") {echo " checked";}?>>9% BTW
        <br>
        <input type="radio" value="21" name="btw" <?php if($taxInput == "21") {echo " checked";}?>>21% BTW
        <br>
        <input type="submit" name="send" value="Send">
    </form>

    <?php
    // Controleer of het formulier is verzonden en voer de berekeningen pas daarna uit
    if(isset($_POST['send'])){
        // Controleer of de invoervelden niet leeg zijn
        if(empty($_POST['btw']) || empty($_POST['toCalculateMoney'])){
            echo "invoer is leeg";
        } else {
            $taxInput = $_POST['btw'];
            $moneyInput = filter_input(INPUT_POST, 'toCalculateMoney', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            
            // Komma's omzetten naar punten
            $moneyInput = str_replace(',', '.', $moneyInput);
            
            // Bereken het totaal inclusief btw
            $total = $moneyInput + ($moneyInput * $taxInput / 100);

            // Resultaten tonen
            echo "Ingevoerd bedrag is: €" . number_format($moneyInput, 2) . "<br>";
            echo "Met als ingevoerd btw percentage: " . $taxInput . "%<br>";
            echo "Totaal inclusief btw: €" . number_format($total, 2) . "<br>";
        }
 }
    ?>
</body>
</html>
?>
