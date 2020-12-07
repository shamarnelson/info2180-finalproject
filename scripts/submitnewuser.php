<?php

require_once 'connectdb.php';

if (isset($_POST)) {
    $fname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hashedPassword = md5($password);
    $time = strval(date("H:i:s"));
    $date = strval(date("Y-m-d"));
    $dt = $date . " " . $time;

    $stmt = $conn->query("SELECT * FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $check = true;
    foreach($results as $row) {
        if($row['email'] === $email) {
            $check = false;
            break;
        }
    }

    if($check === true) {
        $conn->query("INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES ('$fname', '$lname', '$hashedPassword', '$email', '$dt')");
    
        echo "true";
    }


}


?>