<?php
// get current PHP status. If there's none, we will create one
include 'functions.php';
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['has_visited'])) {
    $_SESSION['has_visited'] = false;
}
var_dump($_SESSION['has_visited']);


if($_SESSION['has_visited'] == false) {
    userVisit();
}

printData();


echo "<form method='post' action='sort.php' >
<button type='submit''>Sorteer op datum</button>
</form>
";

echo "<form method='post' action='filter.php' >
<button type='submit''>Filter op land</button>
</form>
";


echo "<form method='post' >
<button type='submit' formaction='logout.php'>Refresh</button>
</form>
"
?>