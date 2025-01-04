<?php
//Opdracht 3: Maak een script waarbij het mogelijk is om de achtergrondkleur van de pagina in te stellen. Met een aantal radio buttons kan er 1 kleur worden gekozen. 
//Opdracht 4: Maak een Script met een formulier waarmee je korting op een geldbedrag kunt berekenen, de gebruiker moet een geldbedrag en een kortingspercentage kunnen invoeren. 
$calculatedNumber = "";
$colorInput = "NULL";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7.3</title>
</head>
<body>
<form method="post" action="">
<label for="red">Rood</label>
<input type="radio" name="color" value="red">
<br>
<label for="blue">Blauw</label>
<input type="radio" name="color" value="blue">
<br>
<label for="green">Groen</label>
<input type="radio" name="color" value="green">
<br>
<label for="electric-lime">Eletroniche slijm</label>
<input type="radio" name="color" value="electric-lime">
<br>
<input type="submit" name="send" value="send">
</form>   
</body>
</html>
<?php
if(isset($_POST['send'])){
    if(empty($_POST['color'])){
        echo "U heeft geen kleur gekozen";
    } else{
        // importeer de kleur, dit keer color
        $colorInput = $_POST['color'];
        switch($colorInput){
            case 'red';
            <style type="text/css">
            body{
                background-color: red;            }
            </style>
            break;
            case 'blue';
            <style type="text/css">
            body{
                background-color: blue;            }
            </style>
            break;

            case 'green';
            <style type="text/css">
            body{
                background-color: green;            }
            </style>
            break;

            case 'electric-lime';
            <style type="text/css">
            body{
                background-color: red;            }
            </style>
            break;
            default: echo "ok";
        }

    }
}

?>