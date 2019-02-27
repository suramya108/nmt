<?php
        $username = $_POST['userid'];
        $password = $_POST['pwd'];

        $con = mysqli_connect("localhost","root","cciitk","db");   
    //    mysqli_select_db("db");
        
        $result = mysqli_query($con,"select * from sg where username = '$username' and password ='$password'") or die("faied to query database".mysqli_error());
        $row = mysqli_num_rows($result);
        if($row==1)
        {
              system("/var/www/html/nmt.sh");
              header("location: select.html");
        }
        else
        {
                echo "Try again";
        }
?>
      
