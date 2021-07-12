<?php 

session_start();
include_once('../../config/connection.php');

$fid = $_GET["id"];

$sql = "SELECT * FROM BED WHERE BED_ID=$fid";
$qry = mysqli_query($connection, $sql);

$value = mysqli_fetch_array($qry);

$status = $value["BED_STATUS"];

if($status=='Available'){
    $delsql = "DELETE FROM BED WHERE BED_ID=$fid";
    $delqry = mysqli_query($connection, $delsql);

    if($delqry){
        echo "<script>alert('Deleted successfully!')</script>";
        echo "<script>window.location='../edit_facility.php'</script>";
    }
}else if($status=='Booked' || $status=='Occupied' ){
    echo "<script>alert('Cannot delete booked or occupied facility!')</script>";
    echo "<script>window.location='../edit_facility.php'</script>";
}





?>