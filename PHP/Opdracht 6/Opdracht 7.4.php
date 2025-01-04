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
if (isset($_POST['send'])) {
    if ($_POST['discountInput'] == '' || $_POST['priceInput'] == '')   {
        echo "Een input mis, dus u zult uw invoer moeten aanpassen.";
        return;
    } else {
        $priceInput = $_POST['priceInput'];
        $discountInput = $_POST['discountInput'];
        $calculatedDiscount = $priceInput - ($priceInput * ($discountInput / 100));
        echo "Uw invoer is bij korting $discountInput en bij prijs $priceInput. Uw prijs met korting is:" . number_format($calculatedDiscount, 2);
    }
}

?>