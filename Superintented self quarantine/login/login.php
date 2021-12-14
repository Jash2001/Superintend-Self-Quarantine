<?php
 $conn=new mysqli('localhost','root','','patient_details');
 if($conn->connect_error){
    die('Connection failed:'.$conn->connect_error);

 }
 else{
    $user=$_POST['USERNAME'];
    $pass=$_POST['PASSWORD'];
    echo "$user";
    echo "$pass";


    $sql = "SELECT * FROM login";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            if($row['username']==$user){
            if ($row['password']==$pass ){
             if($row['role']=='doctor' ){
                echo "ewf";
                header('Location: ../Hospital Side/patient_list.php');
            } 
            else
                header('Location: ../Patient%20Side/main.html');
        }
            }
        
    }
    }
    else

        echo "<script>alert('Incorrect login credentials');</script>";
                 
 
}
?>