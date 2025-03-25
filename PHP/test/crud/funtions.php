crud<?php
    function ConnectDb()
    {
        include 'config.php';
        //attempt to connect to the database
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected successfully";
            return $conn;
        }
        //failed connection handling
        catch (PDOException $e) {
            echo "Connection failed: <br>" . $e->getMessage();
        }
    }
    //create header
    function crud()
    {
        $txt = "<h1>create,read,update,delete</h1>
    <nav>
        <a href='crud_insert.php'>add new</a>
        </nav>";
        echo $txt;
    }
    //get the data from the database and add it to the array
    function getData($table)
    {
        //connect database
        $conn = connectDb();


        $query = $conn->prepare("SELECT * FROM $table");
        $query->execute();
        $result = $query->fetchAll();

        //var_dump($result);
        return $result;
    }



    function getPrimaryKey($table)
    {
        $conn = connectDb();
        $query = $conn->prepare("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'");
        $query->execute();
        $result = $query->fetch();;
        return $result['Column_name'];
    }


    //populate and print crud table  


    function printCrud($result, $table)
    {
        $primaryKey = getPrimaryKey($table);
        $tableHtml = "<table border='1'>";
        // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
        //print data for table header
        $headers = array_keys($result[0]);
        $tableHtml .= "<tr>";
        foreach ($headers as $header) {
            $tableHtml .= "<th bgcolor=gray>" . $header . "</th>";
        }
        //print data for table body for each entry in the database
        foreach ($result as $row) {
            $tableHtml .= "<tr>";
            // print elke kolom
            foreach ($row as $cell) {
                $tableHtml .= "<td>" . $cell . "</td>";
            }
            //add edit and delete button
            $tableHtml .= "<td>
            <form method='post' action='crud_update.php?$primaryKey={$row[$primaryKey]}' >      
                <button name='wzg'>Wijzigen</button>    
            </form>
        </td>";

            $tableHtml .= "<td>
            <form action='crud_delete.php' method='post'>
                <input type='hidden' name='$primaryKey' value='{$row[$primaryKey]}'>
                <input type='submit' value='delete'>
            </form>
        </td>";
            $tableHtml .= "</tr>";
        }
        $tableHtml .= "</table>";
        //print full crud table
        echo $tableHtml;
    }















    // function insert_crud($post){
    //     try{ 
    //         //connect database
    //         $conn = connectDb();
    //         echo "connection succes";
    //         $query = $conn -> prepare("
    //         INSERT INTO bier (naam, soort, stijl, alcohol )
    //         VALUES (:naam, :soort, :stijl, :alcohol)");
    //         $query->execute(
    //             [
    //                 'naam'=>$post['naam'],
    //                 'soort'=>$post['soort'],
    //                 'stijl'=>$post['stijl'],
    //                 'alcohol'=>$post['alcohol']
    //             //    'brouwcode'=>$post['brouwcode'],
    //             ]
    //             );
    //     }
    //     catch(PDOException $e){
    //         echo "error" . $e->getMessage();
    //     }
    // }








    require 'crud.php';
    function delete($id, $primaryKey)
    {
        try {
            //connect database
            $conn = connectDb();
            echo "connection succes<br>"; // Debug statement
            $primaryKey = getPrimaryKey($primaryKey);
            $query = $conn->prepare("DELETE FROM $primaryKey WHERE $primaryKey = :id");
            $query->execute([':id' => $id]);

            echo "aantal records: " . $query->rowCount() . "<br>";
            echo "Delete query executed<br>"; // Debug statement
        } catch (PDOException $e) {
            echo "error delete" . $e->getMessage();
        }
    }







    /*
function update_crud($post){
    try{ 
        //connect database
        $conn = connectDb();
        echo "connection succes";
        $query = $conn -> prepare("
        UPDATE bier SET
            naam = :naam, soort = :soort, stijl = :stijl, alcohol = :alcohol
        WHERE bier.biercode = :biercode");
        $query->execute(
            [
                'naam'=>$post['naam'],
                'soort'=>$post['soort'],
                'stijl'=>$post['stijl'],
                'alcohol'=>$post['alcohol'],
                'biercode'=>$post['biercode']
            //    'brouwcode'=>$post['brouwcode'],
            ]
            );
    }
    catch(PDOException $e){
        echo "error" . $e->getMessage();
    }
}
*/
    ?>