<?php 
session_start();
include("../../config/connection.php");

$customerid = $_GET['id'];

if(isset($_POST['submit'])){

    $t_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID=$customerid";
    $t_qry = mysqli_query($connection, $t_sql);

    $value = mysqli_fetch_assoc($t_qry);

    
    if($value['CUSTOMER_VERIFY']==1){
        echo "verified";
        $sql = "UPDATE CUSTOMERS
        SET CUSTOMER_VERIFY = 0
        WHERE CUSTOMER_ID = '$customerid'";
        $qry = mysqli_query($connection, $sql);
        if($qry){
            echo "<script>alert('Verification status updated successfully!')</script>";
            echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
        }
        else{
            echo "<script>alert('There was an error updating verification status!')</script>";
            echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
        }
    } else {
        echo "verified";
        $sql = "UPDATE CUSTOMERS
        SET CUSTOMER_VERIFY = 1
        WHERE CUSTOMER_ID = '$customerid'";
        $qry = mysqli_query($connection, $sql);
        if($qry){
            echo "<script>alert('Verification status updated successfully!')</script>";
            echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
        }
        else{
            echo "<script>alert('There was an error updating verification status!')</script>";
            echo "<script>window.location='../de_operator_edit.php?id=".$customerid."'</script>";
        }
    }
  
   

}
?>