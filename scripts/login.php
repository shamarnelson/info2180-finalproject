<?php
    session_start();
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$host = getenv('IP');
	$password = '';
	$database = '';
	
	try {
    $con = new PDO("mysql:host=$host;dbname=$database", $email, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " ;
    }
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password';";
    $results= mysqli_query($con,$sql);
    if (sizeof(mysqli_fetch_array($results))==0){
    	echo "fail";
    }else{
    	setcookie('email',$email,time()+2000);
    	echo "pass";
    }
?>