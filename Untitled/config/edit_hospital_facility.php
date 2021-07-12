<?php 

session_start();
include("../../config/connection.php");

$bedid = $_GET['id'];
if(isset($_POST['submit'])){
    $hospitalid = $_SESSION['id'];
    $bedcategory = $_POST['bed_category'];
    $charge = $_POST['charge'];

    $bedid = $_GET['id'];

    if($bedcategory=="Select bed category" || $charge==null ){
        $_SESSION["bedcategory"] = $bedcategory;
        $_SESSION["charge"] = $charge;
        echo "<script>alert('Cannot pass null values!')</script>";
        echo "<script>window.location='../edit_individual_facility.php?id=".$bedid."'</script>";
    }
    else{

        $sql = "UPDATE FACILITY
        SET FACILITY_NAME = '$bedcategory',
        FACILITY_PRICE = $charge
        WHERE FACILITY_ID=$bedid";
        echo "<br/>".$sql."<br/>";
    

        $query = mysqli_query($connection, $sql);

    if($query){
        echo "<script>alert('Facility updated successfully!')</script>";
        echo "<script>window.location='../edit_individual_facility.php?id=".$bedid."'</script>";
    }else {
        echo "<script>alert('There was an error processing request!')</script>";
        echo "<script>window.location='../edit_individual_facility.php?id=".$bedid."'</script>";
    }
}//end of null check
}

?>