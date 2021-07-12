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
        echo "<script>window.location='../edit_bed.php?id=".$bedid."'</script>";
    }
    else{

        $sql = "UPDATE BED
        SET BED_CATEGORY = '$bedcategory',
        BED_PRICE = $charge
        WHERE BED_ID=$bedid";
        echo "<br/>".$sql."<br/>";
    

        $query = mysqli_query($connection, $sql);

    if($query){
        echo "<script>alert('Bed updated successfully!')</script>";
        echo "<script>window.location='../edit_bed.php?id=".$bedid."'</script>";
    }else {
        echo "<script>alert('There was an error processing request!')</script>";
        echo "<script>window.location='../edit_bed.php?id=".$bedid."'</script>";
    }
}//end of null check
}

?>