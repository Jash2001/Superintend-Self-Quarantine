<?php
include_once("connection.php");
          
// Taking all 5 values from the form data(input)
$aadhar = $_COOKIE["user_name"];

$data = "true";


$res = mysqli_query($conn, "insert into appointment(aadhar,call_request) values('$aadhar','$data')");
 
header("Location: call_requestfalse.html");

mysqli_close($conn);
?>
