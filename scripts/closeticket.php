  
<?php

require_once 'connectdb.php';

if (isset($_POST)) {
    $title = $_POST['title'];
    $time = strval(date("H:i:s"));
    $date = strval(date("Y-m-d"));
    $dt = $date . " " . $time;

    $stmt = $conn->query("UPDATE issues SET status = 'CLOSED', updated = '$dt' WHERE title = '$title'");
    echo "true";

}


?>