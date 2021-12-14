<?php
include_once("connection.php");
          
// Taking all 5 values from the form data(input)
$aadhar=$_COOKIE["aadhar_card"];
//$aadhar=12345678910;
$date=$_POST['date_call'];
$time=$_POST['time_call'];
$session_id=$_POST['session_id'];
$data = "true";


$res = mysqli_query($conn, "update appointment SET Accept='$data',Date='$date',Time='$time',Session_id='$session_id' where AADHAR='$aadhar'");
 
header("Location: call_requested.html");

mysqli_close($conn);
?>