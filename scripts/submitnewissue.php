<?php
session_start();

require_once 'connectdb.php';

if (isset($_POST)) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $type = $_POST['type'];
    $priority = $_POST['priority'];

    $email = $_SESSION['user'];

    $stmt = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $row) {
        $ftname = $row['firstname'];
        $lname = $row['lastname'];
    }

    $createdBy = $fname . " " . $lname;

    $assignedTo = $_POST['assignedTo'];

    $date = strval(date("Y-m-d"));
    $time = strval(date("h:i:s"));
    $dt = $date . " " . $time;

    $conn->query("INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('$title', '$description', '$type', '$priority', 'OPEN', '$assignedTo', '$createdBy', '$dt', '$dt')");
    echo "true";

}


?>