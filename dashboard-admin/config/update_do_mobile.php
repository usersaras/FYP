<?php 
session_start();
include("../../config/connection.php");

$customerid = $_GET['id'];

if(isset($_POST['submit'])){
    $check = $_POST['mobilenumber'];
   $number = "+977".$_POST['mobilenumber'];
   
   if (strlen($check)!==10 || is_numeric($check)!=1) {
    echo "<script>alert('Number field supports 10 digit numbers only!')</script>";
    echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
}
else{
    $sql = "UPDATE CUSTOMERS
    SET CUSTOMER_MOBILE = '$number'
    WHERE CUSTOMER_ID = '$customerid'";

    $qry = mysqli_query($connection, $sql);

    if($qry){
        echo "<script>alert('Phone Number updated successfully!')</script>";
        echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
    }
    else{
        echo "<script>alert('There was an error processing request!')</script>";
    echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";

    }
}
}
?>