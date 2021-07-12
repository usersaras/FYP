<?php 

session_start();
include("../../config/connection.php");

if(isset($_POST["submit"])){
    $customer_id = $_POST["cid"];
    $bed_id = $_POST["bid"];
    $facility_id = $_POST["fid"];

    echo $customer_id . " " . $bed_id ." ". $facility_id;

    $sql = "INSERT INTO BOOKING (FK_BEDID, FK_CUSTOMERID, BOOKING_STATUS) VALUES ($bed_id, $customer_id, 'Booked')";
    $qry = mysqli_query($connection, $sql);
    if($qry){
        $sql2 = "INSERT INTO BED_FACILITY (FK_BEDID, FK_FACILITYID) VALUES ($bed_id, $facility_id)";
        $qry2 = mysqli_query($connection, $sql2);

        $bed_status_sql = "UPDATE BED SET BED_STATUS='Booked' WHERE BED_ID=$bed_id";
        $bed_status_qry = mysqli_query($connection, $bed_status_sql);
        
        $facility_status_sql = "UPDATE FACILITY SET FACILITY_STATUS='Booked' WHERE FACILITY_ID=$facility_id";
        $facility_status_qry = mysqli_query($connection, $facility_status_sql);

        echo $facility_status_sql;

        echo "<script>alert('Booking Successful!')</script>";
        echo "<script>window.location='booking.php'</script>";

    }
}


?>