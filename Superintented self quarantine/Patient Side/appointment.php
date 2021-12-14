<?php 
        include_once("connection.php");
 echo"ced";
 
        $aadhar = $_COOKIE["user_name"];
        $sq="SELECT * FROM appointment where AADHAR='$aadhar'";
        $result = $conn->query($sq);
        
        if ($result->num_rows > 0) {
        
            $array=array();
            $data="true";
          
            while($row = $result->fetch_assoc()) {

                if($row['ACCEPT']==$data){
                   
                    $array['date']=$row['DATE'];
                    $array['time']=$row['TIME'];
                    $array['session_id']=$row['SESSION_ID'];

                    header("Location:call_details.php");
              
                }
            }
                }
                else {
                    header("Location:call_requestfalse.html");
                 }
        

        $conn->close();

        ?>