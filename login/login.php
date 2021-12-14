<?php
 $conn=new mysqli('localhost','root','','patient_details');
 if($conn->connect_error){
    die('Connection failed:'.$conn->connect_error);

 }
 else{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    echo "$user";
    echo "$pass";


    $sql = "SELECT * FROM login";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
           // echo "{$row['ROLE']}";
           
            if($row['USERNAME']==$user && $row['PASSWORD']==$pass){
            
             if($row['ROLE']=='doctor' ){
               // echo "ewf";
                header('Location: ../Hospital Side/patient_list.php');
            } 
            else
                header('Location: ../Patient Side/main.html');
        
            }
            
        
    }
    }
    else

        echo "<script>alert('Incorrect login credentials');</script>";
                 
 
}
?>