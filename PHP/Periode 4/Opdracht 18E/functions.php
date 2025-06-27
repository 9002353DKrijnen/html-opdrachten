<?php

function getData($id)
{

    connectDataBase('db');
}

function connectDataBase($dbname)
{
    include "config.php";


    // set DataStringName 
    $dsn = "mysql:host=$host;dbname={$dbname};";

    // We want $conn to be returned on a succesful connection
    // Fist we will use conn and catch to get a report if no connection was established

    try {
        $conn = new PDO($dsn, $username, $password, $options);

        // return connection upon succesfully connecting 
        return $conn;
    } catch (PDOException $event) {


        // show error in a stringinterpolation message
        die("Connection failed: {$event->getMessage()}");
    }
}

function emojiReplace($text)
{
    $emojimap = [
        ':)' => "<img src='./user/emoji/smile.png' alt='smile' style='height:0.9em; vertical-align:middle;'>",
        ':(' => "<img src='./user/emoji/sad.png' alt='sad' style='height:0.9em; vertical-align:middle;'>",
        ':o' => "<img src='./user/emoji/wow.png' alt='wow' style='height:0.9em; vertical-align:middle;'>",

    ];

    // for every emoji it comes across it will replace it wile an emoji
    foreach ($emojimap as $emoji => $image) {
        $text = str_replace($emoji, $image, $text);
    }
    // return new $text value 
    return $text;
}
