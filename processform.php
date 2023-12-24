<?php

$name = $_POST["name"];
$message = $_POST["message"];  //NAME
$subject = $_POST["subject"]; //BODY
$phone = $_POST["phone"];  //PRIORITY
$email = $_POST["email"];	//TYPE

$host = "localhost";
$dbname = "message_db";
$username = "root";
$password = "";


$conn = mysqli_connect($host,$dbname,$username,$password);


if(mysqli_connect_errno()){
	die("Connection error" . mysqli_connect_error());
}


$sql = "INSERT INTO message (name, body, phone, email)
		VALUES (? , ? , ? , ?)";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)){
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssis", $name,$message,$phone,$email);

mysqli_stmt_execute($stmt);

echo "Record has been SAVED";







