<?php
session_start();

include("../../config/connection.php");
if((mysqli_real_escape_string($connection,$_POST['submit']))!=null){
$date = mysqli_real_escape_string($connection,$_POST['updated_date']);

$cit = $_GET['cit'];
    
    if($date==null){
        echo '<script>alert("Date cannot be empty")</script>';
        echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
    }
    else{
        $sql="UPDATE COVID_DB
        SET DATE = '$date'
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