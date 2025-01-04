<?php
//Opdracht 4: Maak een Script met een formulier waarmee je korting op een geldbedrag kunt berekenen, de gebruiker moet een geldbedrag en een kortingspercentage kunnen invoeren. 
// auteur: Damien 9002353
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdracht 7.4</title>
</head>

<body>
    <form action="" method="POST">
        <label for="priceInput">Voer kostprijs in</label>
        <input type="text" name="priceInput">
        <br>
        <label for="discountInput">Voer hier uw korting in</label>
        <input type="text" name="discountInput">
        <br>
        <input type="submit" value="send" name="send">
        <br>
    </form>

</body>

</html>

<?php
// controleren of de post met name send is verzonden
if (isset($_POST['send'])) {
    // empty() werkt niet want  een leeg veld zal altijd als 0 worden gestuurd dus dan maar met een vergelijking: 
    if ($_POST['discountInput'] == '' || $_POST['priceInput'] == '') {
        echo "Een input mis, dus u zult uw invoer moeten aanpassen.";
        // stop de functie:
        return;
    } else {
        // Verkrijg de invoer en converteer komma's naar punten
        $priceInput = str_replace(',', '.', $_POST['priceInput']);
        $discountInput = str_replace(',', '.', $_POST['discountInput']);

        // Zorg ervoor dat de waarden numeriek zijn
        $priceInput = floatval($priceInput);
        $discountInput = floatval($discountInput);
        
        // hier de fout ingegaan, ik moet beter opletten met de (), ik miste er een net na de *, 
        // variabele opgeven waarbij de korting afgetrokken wordt van de prijsopgave, en de korting in 1.xx wordt berekend, (8% word * 1.08)
        $calculatedDiscount = $priceInput - ($priceInput * ($discountInput / 100));
        echo "Uw invoer is bij korting $discountInput en bij prijs $priceInput. Uw prijs met korting is:" . number_format($calculatedDiscount, 2);
    }
}

?>