<?php
include "functions.php";
?>


<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    table {
        border: 1px solid black;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        display: inline-block;
        margin: 10px;
        padding: 10px;
        width: fit-content;
        align-self: center;
    }

    table th {
        float: left;
    }

    table tr,
    td {
        font-family: 'Courier New', Courier, monospace;
        border: black 1px solid;

    }

    table tr:hover td {
        background-color: rgba(0, 0, 0, 0.1);



    }

    section {
        position: relative;
        padding: 6px 14px;
        font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
        border-radius: 6px;
        border: none;
        color: white;
        background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
        background-origin: padding-box;
        background-origin: border-box;
        box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
        touch-action: manipulation;
        width: fit-content;
        transition: transform 0.3s ease-in, box-shadow 0.3s ease-in;
        align-self: center;

    }

    section:hover {
        transform: scale(1.3);
    }

    section a {
        text-decoration: none;
        color: white;
    }
</style>


<?php
$results = getData("visitor_messages");
$votes = getData("votes");
echo "<table>";

// we will make an associatve array post => votes
$votemap = [];
foreach ($votes as $vote) {
    $votemap[$vote['id']] = $vote['amount'];
}


foreach ($results as $result) {
    echo "<tr><th>" . htmlspecialchars($result['titel']) . "</th></tr>";
    echo "<tr><td>" . htmlspecialchars($result['email']) . "</td></tr>";
    echo "<tr><td>" . htmlspecialchars($result['time']) . "</td></tr>";
    echo "<tr><td><strong>Aantal stemmen: </strong>" . htmlspecialchars($votemap[$result['votes_id']]) . "</td></tr>";
    echo "<tr><td>" . htmlspecialchars($result['idea']) . "</td></tr>";
}
echo "</table>";
?>

<section>
    <a href="./add_idea.php">
        <p>Voeg nieuw idee toe</p>
    </a>
</section>