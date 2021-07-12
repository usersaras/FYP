<?php
session_start();
include_once('../../config/connection.php');

$bookingid = $_GET['id'];

$ext_sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL, BED_FACILITY, FACILITY
WHERE BOOKING.FK_BEDID = BED.BED_ID
AND BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID
AND BOOKING.FK_CUSTOMERID = CUSTOMERS.CUSTOMER_ID
AND BED.BED_ID = BED_FACILITY.FK_BEDID
AND BED_FACILITY.FK_FACILITYID = FACILITY.FACILITY_ID
AND BOOKING_ID=$bookingid";

$ext_qry = mysqli_query($connection, $ext_sql);

$values = mysqli_fetch_assoc($ext_qry);

$facilityid = $values['FACILITY_ID'];
$bedid = $values['BED_ID'];

$booking_sql = "UPDATE BOOKING SET BOOKING_STATUS='Occupied' WHERE BOOKING_ID=$bookingid";
$facility_sql = "UPDATE FACILITY SET FACILITY_STATUS='Occupied' WHERE FACILITY_ID=$facilityid";
$bed_sql = "UPDATE BED SET BED_STATUS='Occupied' WHERE BED_ID=$bedid";

$booking_qry = mysqli_query($connection, $booking_sql);
$facility_qry = mysqli_query($connection, $facility_sql);
$bed_qry = mysqli_query($connection, $bed_sql);

echo "<script>alert('Booking accepted!')</script>";
echo "<script>window.location='../patients_list.php'</script>";



?>