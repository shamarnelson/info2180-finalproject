<?php
session_start();

require_once 'connectdb.php';


if(isset($_GET)){     
    
    $email = $_SESSION['user'];

    $stmt = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $row) {
        $fname = $row['firstname'];
        $lname = $row['lastname'];
    }

    $name = $fname . " " . $lname;

    $stmt = $conn->query("SELECT * FROM issues WHERE assigned_to = '$name'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $tablehead="<div id = \"home-heading\">
                    <h1> Issues <h1>
                    <button id = \"home-createNewUserBtn\"> Create New User </button>
                </div>
                <div> 
                <label>Filter by: </label>
                <button class = \"home-buttons\" id = \"home-allBtn\">ALL</button>
                <button class = \"home-buttons\" id = \"home-openBtn\"> OPEN </button>
                <button class = \"home-active\" id = \"home-myTicketsBtn\"> MY TICKETS </button> 
                </div>
                <div class = \"mytickets\" id='table'><table> 
                    <th>Title</th>
                    <th>Type</th> 
                    <th>Status</th> 
                    <th>Assigned To</th>
                    <th>Created</th>";
                    foreach($results as $row){
                        $date = explode(" ", $row['created'])[0];

                        $istat = $row['status'];
                        if($istat === "OPEN") {
                            $class = "OPEN";
                        } else if ($istat === "CLOSED") {
                            $class = "CLOSED";
                        } else if ($istat === "IN PROGRESS") {
                            $class = "IP";
                        }

                        $tablebody.= "<tr>". "
                                            <td>"."#".$row['id']." <a id='page' href='#'>".$row['title']."</a></td>".
                                            "<td>".$row['type']."</td>".
                                            "<td id = \"table-status\"> <div id = \"status-".$class."\">".$row['status']."</div> </td>".
                                            "<td>".$row['assigned_to']."</td>".
                                            "<td>".$date."</td>".
                                        "</tr>";
                            }

    $tablefoot.="</table></div>";
    echo $tablehead + $tablebody + $tablefoot;



}
?>