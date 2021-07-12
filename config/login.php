<?php

include('connection.php');

session_start();



echo "<br />";
if(isset($_POST['submit'])){
    $mobilenumber = "+977".$_POST["mobilenumber"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_MOBILE='$mobilenumber'";

    echo $sql ."<br />";

    $query = mysqli_query($connection, $sql) or die( mysqli_error($connection));

    if(mysqli_num_rows($query)!=1){
        echo "<script>window.location='../login.php?error=username_match_error'</script>";
    }
    else {
        

    while ($row = mysqli_fetch_array($query)){
        echo $row['CUSTOMER_FIRSTNAME'];
        $checkpassword = strcmp($row['CUSTOMER_PASSWORD'], $password);
        echo $checkpassword;

        if ($checkpassword == 0){
            echo "Password and username match";

            session_regenerate_id();
             $_SESSION['id']=$row['CUSTOMER_ID'];
             $_SESSION['mobile']=$row['CUSTOMER_MOBILE'];
             $_SESSION['name'] = $row['CUSTOMER_FIRSTNAME'];
             $_SESSION['role']=$row['CUSTOMER_TYPE'];

             echo "<br />".$_SESSION['role'];

             if($_SESSION['role']=="Admin"){
                //  echo "Admin has logged in";
                 header('location:../dashboard-admin/index.php');
             }
             else if ($_SESSION['role']=="Data Operator"){
                //  echo "Data Operator has logged in";

                 header('location:../dashboard-data_operator/index.php');
             }
             else if ($_SESSION['role']=="Patient"){
                // echo "Patient has logged in";

                if($row['CUSTOMER_VERIFY']!=1){
                    header('location:../confirm_account.php');
                }
                else{
                    header('location:../dashboard-customer/index.php');
                }
            }

            //  header('location: ../dashboard-admin/index.php');
        }
        else{
            echo "<script>window.location='../login.php?error=password_match_error'</script>";
        }
     }
  
    }

}


?>