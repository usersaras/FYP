<?php
session_start();
include_once('../../config/connection.php');



if(isset($_POST['submit'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile_number = "+977".$_POST['mobilenumber'];
    $check_number = $_POST['mobilenumber'];
    $password = md5("sarassaras");

    if($firstname==null || $lastname==null || $check_number==null){
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['mobilenumber'] = $check_number;
        echo "<script>alert('Fields cannot be null!')</script>";
        echo "<script>window.location='../addusers.php'</script>";
    }
    else{
        if(strlen($check_number)!=10){
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['mobilenumber'] = $mobile_number;
            echo "<script>alert('Mobile number should be 10 digits!')</script>";
            echo "<script>window.location='../addusers.php'</script>";
        }
        else{
            $check_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_MOBILE='$mobile_number' AND CUSTOMER_TYPE='Data Operator'";
            $check_qry = mysqli_query($connection, $check_sql);

            if(mysqli_num_rows($check_qry)>0){
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['mobilenumber'] = $check_number;
            echo "<script>alert('Mobile number already registered!')</script>";
            echo "<script>window.location='../addusers.php'</script>";
            }
            else{

    $sql = "INSERT INTO CUSTOMERS
    (CUSTOMER_FIRSTNAME, CUSTOMER_LASTNAME, CUSTOMER_CITIZENSHIPNUMBER, 
    CUSTOMER_DOB, CUSTOMER_MOBILE, CUSTOMER_PASSWORD, CUSTOMER_PROVINCE, CUSTOMER_DISTRICT,
    CUSTOMER_WARD, CUSTOMER_TYPE, CUSTOMER_VERIFY) VALUES 
    ('$firstname', '$lastname', 'NA', 'NA', '$mobile_number', '$password', 'NA', 'NA', 0, 'Data Operator', '1')";


    $qry = mysqli_query($connection, $sql);

    if ($qry){
        echo "<script>alert('Data Operator Added Successfully!')</script>";
        echo "<script>window.location='../addusers.php'</script>";
    } else{
        echo "acb";
        echo $sql;
    }
    
}//repeat check
}//end of strlen check
}//end of null check

}//end of isset

?>