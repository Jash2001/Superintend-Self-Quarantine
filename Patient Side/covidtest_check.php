          
<?php 


include_once("connection.php");



$aadhar = $_COOKIE["user_name"];
$sq="SELECT * FROM covid_test where AADHAR='$aadhar'";
$result = $conn->query($sq);
if ($result->num_rows > 0) {
    $array=array();
    $data="true";

    while($row = $result->fetch_assoc()) {
        if($row['hospital_selected']==$data){ 
            header("Location:timeslot.php");
    
        }
    }
}
  else {
     header("Location:covidtest.html");
  }
  $conn->close();
  //setcookie("date", $array['date'], time()+ 365*24*60*60*1000,'/');
 // setcookie("time", $array['time'], time()+ 365*24*60*60*1000,'/');
?>