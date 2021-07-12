<?php 

session_start();
include("../../config/connection.php");

$customerid = $_GET['id'];

$sql = "DELETE FROM CUSTOMERS WHERE CUSTOMER_ID=$customerid";
$qry = mysqli_query($connection, $sql);

if($qry){
    echo "<script>alert('User Deleted!')</script>";
    echo "<script>window.location='../view_registered.php'</script>";
}

?>
