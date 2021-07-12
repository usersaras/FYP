<?php
session_start();

include("../../config/connection.php");
if((mysqli_real_escape_string($connection,$_POST['submit']))!=null){
$status = mysqli_real_escape_string($connection,$_POST['updated_status']);

echo $status;
$cit = $_GET['cit'];
    
    if($status==3){
        echo '<script>alert("Status cannot be empty")</script>';
        echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
    }
    else{
        $sql="UPDATE COVID_DB
        SET RECOVERY = $status
        WHERE CIT_NUMBER=$cit;";

        $query = mysqli_query($connection, $sql);

        if ($query){
            echo '<script>alert("Status Updated")</script>';
            echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
        }else{
            echo '<script>alert("There was an error processing request!")</script>';
            echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
        }
    }
}
?>