<?php
include "functions.php";
?>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    table {
        border: 1px solid black;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        display: inline-block;
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
    background-color: rgba(0,0,0,0.1);
    
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
    echo "<tr><td>" . htmlspecialchars($votemap[$result['votes_id']]) . "</td></tr>";
    echo "<tr><td>" . htmlspecialchars($result['idea']) . "</td></tr>";
}
echo "</table>";
// Resultaat tonen
?>