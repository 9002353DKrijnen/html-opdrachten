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

function getUseragent(){
    $fulldata = $_SERVER['HTTP_USER_AGENT'];
    return $fulldata;
}

function Filteredfulldata($fulldata){

// bepaal bestuuringssysteem
// strpos() zoekt naar een woord in een string
    switch(true){
        case strpos($fulldata, 'Windows') !== false:
            $computerdata = 'Windows';
            break;

        case strpos($fulldata, 'Linux') !== false:
            $computerdata = 'Linux';
            break;

        case strpos($fulldata, 'Mac') !== false:
            $computerdata = 'Mac';
            break;

            default:
            $computerdata = 'onbekende bestuuringssysteem';
            break;
    }
    
    // bepaal browser
    switch(true){
        case strpos($fulldata, 'Chrome') !== false:
            $browserdata = 'Chrome';
            break;


        case strpos($fulldata, 'Firefox') !== false:
            $browserdata = 'Firefox';
            break;


        case strpos($fulldata, 'Edge') !== false:
            $browserdata = 'Edge';
            break;


        case strpos($fulldata, 'Safari') !== false:
            $browserdata = 'Safari';
            break;


            default:
            $browserdata = 'onbekende browser';
            break;
    }
    // stop de returns in een array die kunnen worden opgeroepen
    return array ('computerdata' => $computerdata, 'browserdata' => $browserdata);
}