<?php
session_start();
include_once('../../config/connection.php');

$bookingid = $_GET['id'];

$ext_sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL, BED_FACILITY, FACILITY
WHERE BOOKING.FK_BEDID = BED.BED_ID
AND BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID
AND BOOKING.FK_CUSTOMERID = CUSTOMERS.CUSTOMER_ID
AND BOOKING_ID=$bookingid";

$ext_qry = mysqli_query($connection, $ext_sql);

$values = mysqli_fetch_assoc($ext_qry);

echo $values['BOOKING_STATUS']."<br />";
echo $values['BED_STATUS']."<br />";

$facilityid = $values['FACILITY_ID'];
$bedid = $values['BED_ID'];

$booking_sql = "UPDATE BOOKING SET BOOKING_STATUS='Discharged' WHERE BOOKING_ID=$bookingid";
$bed_sql = "UPDATE BED SET BED_STATUS='Available' WHERE BED_ID=$bedid";

$booking_qry = mysqli_query($connection, $booking_sql);
$bed_qry = mysqli_query($connection, $bed_sql);

echo "<script>alert('Patient Discharged!')</script>";
echo "<script>window.location='../discharged_patients_list.php'</script>";



?>

