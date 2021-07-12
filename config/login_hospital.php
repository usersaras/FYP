<?php

include('connection.php');

session_start();



echo "<br />";
if(isset($_POST['submit'])){
    $hospitalid = $_POST["mobilenumber"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_ID='$hospitalid'";

    $query = mysqli_query($connection, $sql) or die( mysqli_error($connection));

    echo mysqli_num_rows($query);
    if(mysqli_num_rows($query)!=1){
        echo "<script>window.location='../login-hospital.php?error=username_match_error'</script>";
    }
    else {
        

    while ($row = mysqli_fetch_array($query)){
        $checkpassword = strcmp($row['HOSPITAL_PASSWORD'], $password);
        $checkverification = $row['HOSPITAL_VERIFICATION'];
  
        if ($checkpassword == 0){

            if($checkverification == 1){

            session_regenerate_id();
             $_SESSION['id']=$row['HOSPITAL_ID'];
             $_SESSION['mobile']=$row['HOSPITAL_MOBILE'];
             $_SESSION['name'] = $row['HOSPITAL_NAME'];
             $_SESSION['role']="Hospital";

             echo "<script>window.location='../dashboard-hospital/index.php'</script>";
            } else{
                echo "<script>window.location='../login-hospital.php?error=verification_error'</script>";
            }

             
        }
        else{
            echo "<script>window.location='../login-hospital.php?error=password_match_error'</script>";
        }
     }
  
    }

}


?>