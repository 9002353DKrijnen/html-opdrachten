<?php 
include_once 'funtions.php';
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Selecteer een tabel</title>
</head>

<body>
    <?php
    // nulwaarde aan $tablename
    $tablename = '';
    ?>
    <!-- formulier om een tabel te kiezen -->
    <form method="get" action="" id="tableForm">
        <label for="table">Kies een tabel:</label>
        <select name="table" id="table">
            <option value="">Select</option>
            <option value="klant" >Klanten</option>
            <option value="orders">Orders</option>
            <option value="product">Product</option>
            <option value="leverancier">Leverancier</option>
        </select>
    </form>

    <script>
        function handleTableChange() {
            // Haal de geselecteerde waarden uit de dropdown
            let selectedTable = document.getElementById('table').value;

            // switch statement om de tabel te veranderen
            switch (selectedTable) {
                case 'klant':
                    window.location.href = '?table=klant';
                    break;
                case 'orders':
                    window.location.href = '?table=orders';
                    break;
                case 'product':
                    window.location.href = '?table=product';
                    break;
                case 'leverancier':
                    window.location.href = '?table=leverancier';
                    break;
                default:
                    window.location.href = '?table=klant';
            }
        }
        document.getElementById('table').addEventListener('change', handleTableChange);
    </script>
    <?php
    // geselecteerde tabel
    $tablename = isset($_GET['table']) ? $_GET['table'] : 'klant';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    ?>
</body>

</html>

<?php
//funtie CRUD
//auteur: ramon kieboom

//inisialize

//main


//print beer data
crud();
//retrieve beer data
$result = getData($tablename);
echo "<br>";
echo "geselecteerde tabel: " . $tablename;

//print table
printCrud($result,$tablename);

?>