<?php
/* functie door damien
opdracht gegeven door sir Broeders op 15 januari op 2025
*/
function toCalculate()
{
    $productOne = 100;
    $productTwo = 75;
    $productThree = 50;
    $calculatedProductOne = $productOne * 1.21;
    $calculatedProductTwo = $productTwo * 1.09;
    $calculatedProductThree = $productThree * 1.06;
    return  [
        'productOne' => $calculatedProductOne,
        'productTwo' => $calculatedProductTwo,
        'productThree' => $calculatedProductThree
    ];
}

$results = toCalculate();
echo " test" . $results['productOne'] . "<br>";
echo " test" . $results['productTwo'] . "<br>";
echo " test" . $results['productThree'] . "<br>";


function calculateTax($price, $percentage){
    return $price + ($price * $percentage);
}

echo calculateTax(100, 21);
echo calculateTax(75, 9);
echo calculateTax(50 , 6);
?>