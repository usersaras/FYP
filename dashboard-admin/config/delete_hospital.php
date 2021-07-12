<?php
session_start();
include("../../config/connection.php");

$hospitalid = $_GET["id"];

$sql = "DELETE FROM HOSPITAL WHERE HOSPITAL_ID='$hospitalid'";
$qry = mysqli_query($connection, $sql);

if($qry){
    echo "<script>alert('Hospital deleted successfully!')</script>";
    echo "<script>window.location='../edit_hospital_info.php'</script>";
}
else{
    echo "<script>alert('Cannot delete verified hospital!')</script>";
    echo "<script>window.location='../edit_hospital_info.php'</script>";
}

?>