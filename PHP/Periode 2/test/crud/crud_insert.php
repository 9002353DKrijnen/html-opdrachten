
<?php
require_once('funtions.php');

if(isset($_POST) && isset($_POST['insert_button'])){
    insert_crud($_POST);
   echo '<script>alert("biernaam: ' . $_POST['naam'] . ' is toegevoegt")</script>';
}
?>
<html>
    <body>

<h1>insert beer</h1>
    <nav>
        <a href='crud.php'>return</a>
        </nav>
        <form method='post'>
            <label for='naam'>naam:</label>   
            <input type='text' id='naam' placeholder='naam' name='naam' required><br>
            <label for='soort'>soort: </label>
            <input type='text' id='soort' placeholder='soort' name='soort' required><br>
            <label for='stijl'>stijl: </label>
            <input type='text' id='stijl' placeholder='stijl' name='stijl' required><br>
            <label for='alcohol'>alcohol: </label>
            <input type='number' id='alcohol' placeholder='alcohol'  name='alcohol' maxlength="2" required><br>
            
            <br>
            <input type='submit' name='insert_button'></input>
        </form>
    </body>
</html>

