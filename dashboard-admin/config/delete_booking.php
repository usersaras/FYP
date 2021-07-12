<?php
include('../../config/connection.php');
session_start();

$customerid = $_GET['id'];

// if(isset($_SESSION["facility"])) {
//   if($_SESSION["facility"]!="None"){

$sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL, FACILITY, BED_FACILITY
WHERE CUSTOMERS.CUSTOMER_ID = BOOKING.FK_CUSTOMERID AND
BOOKING.FK_BEDID = BED.BED_ID AND
BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID AND
FACILITY.FACILITY_ID = BED_FACILITY.FK_FACILITYID AND
BED_FACILITY.FK_BEDID = BED.BED_ID AND
BOOKING.BOOKING_ID = $customerid AND
BOOKING_STATUS<>'Discharged'";
$qry = mysqli_query($connection, $sql);
$values = mysqli_fetch_assoc($qry);

if($values["FACILITY_NAME"]=="Oxygen" || $values["FACILITY_NAME"]=="Ventilator")
{

$bookingid = $values["BOOKING_ID"];
$bedid = $values["BED_ID"];
$facilityid =  $values['FACILITY_ID'];

$deletesql = "DELETE FROM BOOKING WHERE BOOKING_ID=$bookingid";
$deleteqry = mysqli_query($connection, $deletesql);

$deletesql2 = "DELETE FROM BED_FACILITY WHERE FK_BEDID=$bedid";
$deleteqry2 = mysqli_query($connection, $deletesql2);

$togglesql = "UPDATE BED SET BED_STATUS='Available' WHERE BED_ID=$bedid";
$toggleqry = mysqli_query($connection, $togglesql);

$togglesql2 = "UPDATE FACILITY SET FACILITY_STATUS='Available' WHERE FACILITY_ID=$facilityid";
$toggleqry2 = mysqli_query($connection, $togglesql2);

if($deleteqry && $deleteqry2 && $toggleqry && $toggleqry2 ){
    echo "<script>alert('Deleted Successfully!')</script>";
    echo "<script>window.location='../index.php'</script>";
}else{
    echo "<script>alert('Not Deleted!')</script>";
    echo "<script>window.location='../index.php'</script>";
}

}
else{
    $sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL, FACILITY, BED_FACILITY
    WHERE CUSTOMERS.CUSTOMER_ID = BOOKING.FK_CUSTOMERID AND
    BOOKING.FK_BEDID = BED.BED_ID AND
    BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID AND
    BOOKING.BOOKING_ID = $customerid AND
    BOOKING_STATUS<>'Discharged'";
    $qry = mysqli_query($connection, $sql);
    $values = mysqli_fetch_assoc($qry);

    $bookingid = $values["BOOKING_ID"];
    $bedid = $values["BED_ID"];
    $facilityid =  $values['FACILITY_ID'];

    $deletesql = "DELETE FROM BOOKING WHERE BOOKING_ID=$bookingid";
    $deleteqry = mysqli_query($connection, $deletesql);
    
    $togglesql = "UPDATE BED SET BED_STATUS='Available' WHERE BED_ID=$bedid";
    $toggleqry = mysqli_query($connection, $togglesql);

    
    if($deleteqry && $toggleqry){
        echo "<script>alert('Deleted Successfully!')</script>";
        echo "<script>window.location='../index.php'</script>";
    }else{
        echo "<script>alert('Not Deleted!')</script>";
        echo "<script>window.location='../index.php'</script>";


    }
 } ?>