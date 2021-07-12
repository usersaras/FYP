<?php

include('connection.php');

session_start();

if(isset($_POST["submit"])){
    $mobile = "+977".$_POST['mobilenumber'];
    $otp = $_POST['otp'];


    $custsql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_MOBILE='$mobile'";
    $custqry = mysqli_query($connection, $custsql);
    $custvalue = mysqli_fetch_assoc($custqry);

    if(mysqli_num_rows($custqry)==1){

    $customer_id = $custvalue['CUSTOMER_ID'];

    $otpsql = "SELECT * FROM OTP_SIMULATOR WHERE FK_CUSTOMERID=$customer_id";
    $otpqry = mysqli_query($connection, $otpsql);
    $otpvalue = mysqli_fetch_assoc($otpqry);

    $db_otp = $otpvalue['OTP'];

    if($otp == $db_otp){

        $versql = "UPDATE CUSTOMERS
        SET CUSTOMER_VERIFY=1
        WHERE CUSTOMER_ID=$customer_id";
        $verqry = mysqli_query($connection, $versql);
        if($verqry){
            echo "<script>alert('Account verified successfully!')</script>";
            echo "<script>window.location='../login.php'</script>";
        }
    }
    else{
        echo "<script>alert('OTP not matched!')</script>";
        echo "<script>window.location='../confirm_account.php'</script>";
    }
}// end of row check
else{
    echo "<script>alert('Number not registered!')</script>";
    echo "<script>window.location='../confirm_account.php'</script>";
}
}

?>