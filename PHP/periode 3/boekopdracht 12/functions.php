<?php
function generateRandomPassword($length = 10)
{
    // maak ene script waar een willekeurig wachtwoord gegenereerd kan worden, van 10 tekens. ALle cijfers en alle letters kunnen voorkomen,
    // zowel hoofd- als kleine letters.
    $allowedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // substr() returnt een gedeelte van de string
    // str_shuffle string husselen
    // 0 is de eerste letter
    // $length is de lengte
    return substr(str_shuffle($allowedChars), 0, $length);
}
