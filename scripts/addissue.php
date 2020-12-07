  
<?php

//Connect to database
include 'dbconfig.php';


// Check connection
// $link = mysqli_connect("localhost", "root", "", "schema");
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }

$date = date('Format String', time());
 //sanitize the data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $assigned_to = filter_input(INPUT_POST, 'assignedto', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $priority = filter_input(INPUT_POST, 'priority', FILTER_SANITIZE_STRING);
    
    $sql = "INSERT INTO issues (title, description, assigned_to,type,priority,status,created,update ) VALUES ('$title', '$description', 
    '$assigned_to','$type','$priority','OPEN','$date','$date')";
    //CLOSE CONNECTION <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
}
    
// if ($stmt->execute()) { 
//    // it worked
// } else {
//    // it didn't
// }


    //CLOSE CONNECTION <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    //
    // function dd($var) {
    //     die(var_dump($var));
    // }
    
//     if(mysqli_query($link, $sql)){
//     echo "Records inserted successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }
 
// Close connection
// mysqli_close($link);

?>