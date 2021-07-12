<?php

session_start();
include("../../config/connection.php");
$hospitalid = $_GET["id"];

$sql = "UPDATE HOSPITAL SET HOSPITAL_VERIFICATION=1 WHERE HOSPITAL_ID=$hospitalid";
$qry = mysqli_query($connection, $sql);

if($qry){
    echo "<script>alert('Verification status updated!');</script>";
    echo "<script>window.location='../verify_hospital.php'</script>";

} else {
    echo "<script>alert('Failed to update!');</script>";
    echo "<script>window.location='../verify_hospital.php'</script>";
}



?>