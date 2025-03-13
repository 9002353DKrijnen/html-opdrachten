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
        if(in_array("leerling", $headers)){
            $table .= "<td>
            <form action='exterminate_user.php' method='post'>
                    <input type= 'hidden' name='id' value='$row[id]'>
                    <input type='submit' value='Verwijderen'>
                </form>
            </td>";
        }
   

        $table .= "</tr>";
    }
    $table .= "</table>";
    // javascript voor sorteren.
    $table .= "
<script>
  // als sortOrder 0 = beginpositie(ongesorteerd) 1 = A-Z 2 = Z-A
  let sortOrder = 0;

  // domloaded toevoegen, zodat de originele lijst wordt opgeslagen
  document.addEventListener('DOMContentLoaded', () => {
    let rows = document.querySelectorAll('#LeerlingenTable tbody tr');
    rows.forEach((row, index) => row.dataset.index = index);
  });
// function (vereiste JS) opdracht
  function sortTableByName() {
  // declaraties leerlingen en rows - header
    let leerling = document.getElementById('leerlingenTable');
    let rows = Array.from(leerling.rows).slice(1);
// standaard wordt naar a-z
    if (sortOrder === 0) {
      rows.sort((a, b) => a.cells[1].innerText.localeCompare(b.cells[1].innerText));          
      sortOrder = 1;
    }
    //   a-z wordt z-a
    else if (sortOrder === 1) {
      // a-z sorteren
      rows.sort((a, b) => b.cells[1].innerText.localeCompare(a.cells[1].innerText));
      sortOrder = 2;
      // z-a wordt weer standaard
    } else if (sortOrder === 2) {
      rows.sort((a, b) => a.dataset.index - b.dataset.index);
      sortOrder = 0;
    }
// de toepassing
    rows.forEach(row => leerling.tBodies[0].appendChild(row));
  }
</script>

    
    
    
    ";
    echo $table;
}

function insertLeerling()
{
    if (isset($_POST['submit'])) {
        if ($_POST['id'] != '' && $_POST['leerling'] != '' && $_POST['cijfer'] != '') {
            try {

                // altijd verbinden met de database
                $conn = ConnectDb();


                $query = $conn->prepare("
            INSERT INTO leerlingencijfers (id, leerling, cijfer)
            VALUES (:id, :leerling, :cijfer);");

                $query->execute([
                    'id' => $_POST['id'],
                    'leerling' => $_POST['leerling'],
                    'cijfer' => $_POST['cijfer']
                ]);

                echo "leerling en cijfer toegevoegd";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } else {
            echo "Vul alle velden in";
        }
    }
}
function deleteLeerlingen()
{
    if (isset($_POST['id'])) {
        $conn = ConnectDb();
        try {
            $query = $conn->prepare("DELETE FROM leerlingencijfers WHERE id = :id;");
            $query->execute(['id' => $_POST['id']]);
            echo "Leerling verwijderd";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
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
