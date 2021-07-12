<?php
session_start();

include("../../config/connection.php");
if((mysqli_real_escape_string($connection,$_POST['submit']))!=null){
$cit_update = mysqli_real_escape_string($connection,$_POST['updated_cit']);

$cit = $_GET['cit'];

//check for duplicate
$check_sql = "SELECT * FROM COVID_DB WHERE CIT_NUMBER='$cit_update'";
$check_qry = mysqli_query($connection, $check_sql);






    if($cit_update==null){
        echo '<script>alert("Citizenship number cannot be empty")</script>';
        echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
    }
    else{
        if(is_numeric($cit_update)!=1){
            echo '<script>alert("Citizenship number should be numeric")</script>';
            echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
    
    }
        else{
            if(mysqli_num_rows($check_qry)>0){
                echo '<script>alert("Citizenship number already registered in database")</script>';
                echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
            }
            else{
        $sql="UPDATE COVID_DB
        SET CIT_NUMBER = '$cit_update'
        WHERE CIT_NUMBER=$cit;";

        $query = mysqli_query($connection, $sql);

        if ($query){
            echo '<script>alert("Citizenship Updated")</script>';
            echo "<script>window.location='../update_victims_individual.php?cit=".$cit_update."'</script>";
        }else{
            echo '<script>alert("There was an error processing request!")</script>';
            echo "<script>window.location='../update_victims_individual.php?cit=".$cit."'</script>";
        }
    }//end of repeat check
    }//end of numeric check
 }//end of null check
}//end of isset
?>