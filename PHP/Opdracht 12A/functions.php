<?php
include_once "connect.php";
function printSearchForm()
{
    echo "<form action='search.php' method='POST'>
    <input type='text' name='search' placeholder='Zoeken'>
    <input type='submit' value='Zoeken' name = 'submit'>
</form>";
}



function CrudLeerlingen()
{
    // menu items
    $txt = " <h1> Crud Leerlingen</h1>
    <nav>
        <a href= 'insert_leerling.php'> Toevoegen nieuw leerling</a>
    </nav>";
    echo $txt;

    // Haal gegevens op. 
    $tables = ["leerlingencijfers", "docenten", "vakken"];
    $result = GetData($tables);



    // voor elke tabel gegevens ophalen met een foreach


    foreach ($result as $table => $data) {
        echo "<h2>Tabel:" . $table . "</h2>";
        printCrudLeerlingen($data);
    }
}
// Warning: Undefined variable $result pdracht12a.php on line 7
function printCrudLeerlingen($result)
{
    if (empty($result)) {
        echo "Geen gegevens gevonden.";
        return;
    }
    // design tabel
    $table = "<table id = 'leerlingenTable' border = 1px>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";




    // foreach voor elke kolom - print header
    foreach ($headers as $header) {
        if ($header == "leerling") {

            $table .= "<th bgcolor='gray' onclick='sortTableByName()' id='leerling'> " . $header . "</th>";
        } else {
            $table .= "<th bgcolor=gray>" . $header . "</th>";
        }
    }

    // de rijen
    foreach ($result as $row) {
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";
    // javascript voor sorteren.
    $table .= "
        <script>
       
        function sortTableByName() {
        let leerling = document.getElementById('leerlingenTable');
        let rows = Array.from(table.rows).slice(1);
        rows.sort((a, b) => a.cells[1].innerText.localeCompare(b.cells[1].innerText));          
        rows.ForEach(row => table.tBodies[0].appendChild(row));
        }

        </script>
    
    
    
    ";
    echo $table;
}
function GetData($tables)
{
    $conn = ConnectDb();
    $results = [];
    foreach ($tables as $table) {
        $query = $conn->prepare("SELECT * FROM $table");
        $query->execute();
        $results[$table] = $query->fetchAll();
    }

    return $results;
}
