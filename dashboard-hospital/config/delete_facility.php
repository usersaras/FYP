<?php 

session_start();
include_once('../../config/connection.php');

$fid = $_GET["id"];

$sql = "SELECT * FROM FACILITY WHERE FACILITY_ID=$fid";
$qry = mysqli_query($connection, $sql);

$value = mysqli_fetch_array($qry);

$status = $value["FACILITY_STATUS"];

if($status=='Available'){
    $delsql = "DELETE FROM FACILITY WHERE FACILITY_ID=$fid";
    $delqry = mysqli_query($connection, $delsql);

    if($delqry){
        echo "<script>alert('Deleted successfully!')</script>";
        echo "<script>window.location='../edit_facility.php'</script>";
    }
}else if($status=='Booked' || $status=='Occupied' ){
    echo "<script>alert('Cannott delete booked or occupied facility!')</script>";
    echo "<script>window.location='../edit_facility.php'</script>";
}





?>