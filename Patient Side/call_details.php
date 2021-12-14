<!DOCTYPE html>
<html>
    <head>
       <title>Health Status</title>
       <style>
           body {
                font-family: 'Roboto', sans-serif;
                background-image: url(/Patient\ Side/images/contact.jfif);
                background-size: cover;
                background-position: auto;
                height: 100vh;
            }
            
            h2 {
                font-size: 30px;
                text-transform: uppercase;
                color: rgb(255, 255, 255);
            }

            h3{
                font-size: 20px;
                text-transform: uppercase;
                color: rgb(255, 255, 255);
            }

            p{
                font-size: 15px;
            }

            .container {
                margin: 30px;
                z-index: 1;
            }

            .btn {
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #000000;
                width: 50%;
                border: 0;
                padding: 15px;
                color: azure;
                font-size: 14px;
                cursor: pointer;
            }
                
            .btn:hover {
                transform: scale(1.03);
                -webkit-transform: scale(1.03);
                -moz-transform: scale(1.03);
                -ms-transform: scale(1.03);
                -o-transform: scale(1.03);
                box-shadow: 10px 12px 15px rgba(0, 0, 0, .3);
            }

       </style>
       
       <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
        </script>
       <script>
        $(function () {
            $("#header").load("dashboard.html");
        });
       </script>

    </head>

    <body>
        <h2 align="center">Appointment Details</h2>
        <header id="header"></header>
        <?php 
        include_once("connection.php");

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

                 }
            }
                }
                else {
                    header("Location:call_requestfalse.html");
                 }
        

        $conn->close();

        ?>
        
        <div class="container">
            <h3><label>  Aadhar Number: </label>
            <label><?php echo $aadhar; ?> </label> </h3>
            
            <h3><label> Date : </label>
            <label> <?php echo $array["date"]; ?> </label> </h3>

            <h3><label> Time : </label>  
            <label> <?php echo $array["time"]; ?> </label> </h3>

            <h3><label> Session Id : </label>
            <label> <?php echo $array["session_id"]; ?> </label> </h3>

            <form action="https://localhost:5000/" class="inline">
                <button class="btn">call</button>
                <p> <b> (click the call button to enter the session) </b> </p>
            </form>

        </div>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    </body>
</html>
 
