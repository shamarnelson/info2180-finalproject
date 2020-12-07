<?php

require_once 'connectdb.php';


if(isset($_GET)){      
    $stmt = $conn->query("SELECT * FROM issues");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tablehead ="<div id = \"home-heading\">
                    <h1 id = \"home-h1\"> Issues <h1>
                    <button id = \"home-createNewUserBtn\"> Create New User </button>
                </div>
                <div> 
                    <label>Filter by: </label>
                    <button class = \"home-active\" id = \"home-allBtn\">ALL</button>
                    <button class = \"home-buttons\" id = \"home-openBtn\"> OPEN </button>
                    <button class = \"home-buttons\" id = \"home-myTicketsBtn\"> MY TICKETS </button> 
                </div>
                <div id='table'><table> 
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