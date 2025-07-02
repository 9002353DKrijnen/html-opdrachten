<?php

function getData($id)
{

    // definine array with allowed/whitelisted tablenames
    $allowedTables = [
        "style_emoji",
        "style_text",
        "visitor_messages",
        "votes"
    ];
    // check if entered tablenames are allowed if not a JS alert will pop up
    if (!in_array($id, $allowedTables, true)) {
        echo "<script>alert('Database wordt niet herkend'); </script>";
        return;
    }
    // make connection to database "ideeënbus"
    $conn = connectDataBase('ideeenbus');

    // sqlquery
    $sqlquery = "SELECT * FROM `$id`";
    $statement = $conn->prepare($sqlquery);


    // executre the query and fetch results in an associative array, which are returned afterwards.
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
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
        // give location aswell as CSS to auto convert it.
        ':)' => "<img src='./user/emoji/smile.png' alt='smile' style='height:0.9em; vertical-align:middle;'>",
        ':(' => "<img src='./user/emoji/sad.png' alt='sad' style='height:0.9em; vertical-align:middle;'>",
        ':o' => "<img src='./user/emoji/wow.png' alt='wow' style='height:0.9em; vertical-align:middle;'>",
        '[b]'     => '<strong>',
        '[/b]'    => '</strong>',
        '[i]'     => '<em>',
        '[/i]'    => '</em>'
    ];


    // for every emoji it comes across it will replace it wile an emoji
    foreach ($emojimap as $emoji => $image) {
        $text = str_replace($emoji, $image, $text);
    }

    // replace color with requested color by user
    $text = preg_replace(
        '~\[color=(.*?)\](.*?)\[/color\]~',
        '<span style="color:$1;">$2</span>',
        $text
    );




    $curses = json_decode(file_get_contents("words.json"), true);

    if (is_array($curses)) {
        foreach ($curses as $curse) {
            
            // make case patttern and replace
            $pattern = '/' . preg_quote($curse, '/') . '/i';
            $replacement = str_repeat('*', strlen($curse));
            $text = preg_replace($pattern, $replacement, $text);
        }
        // return new $text value 
        return $text;
    }
}
