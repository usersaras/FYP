<?php 
session_start();
include("../../config/connection.php");

$customerid = $_GET['id'];

if(isset($_POST['submit'])){
   $name = $_POST['lastname'];
   
   if (preg_match('~[0-9]+~', $name)) {
    echo "<script>alert('Name field cannot contain number(s)!')</script>";
    echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
}
else{
    $sql = "UPDATE CUSTOMERS
    SET CUSTOMER_LASTNAME = '$name'
    WHERE CUSTOMER_ID = $customerid";

    $qry = mysqli_query($connection, $sql);

    if($qry){
        echo "<script>alert('Name updated successfully!')</script>";
        echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
    }
    else{
        echo "<script>alert('There was an error processing request!')</script>";
    echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";

    }
}
}
?>