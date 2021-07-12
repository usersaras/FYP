<?php
session_start();

include_once("headerandfooter/header.php");

$customerid = $_SESSION['id'];

// if(isset($_SESSION["facility"])) {
//   if($_SESSION["facility"]!="None"){

$sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL, FACILITY, BED_FACILITY
WHERE CUSTOMERS.CUSTOMER_ID = BOOKING.FK_CUSTOMERID AND
BOOKING.FK_BEDID = BED.BED_ID AND
BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID AND
FACILITY.FACILITY_ID = BED_FACILITY.FK_FACILITYID AND
BED_FACILITY.FK_BEDID = BED.BED_ID AND
CUSTOMERS.CUSTOMER_ID = $customerid AND
BOOKING_STATUS<>'Discharged'";
$qry = mysqli_query($connection, $sql);
$values = mysqli_fetch_assoc($qry);

  

if($values["FACILITY_NAME"]=="Oxygen" || $values["FACILITY_NAME"]=="Ventilator")
{

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Delete Customer Booking</h1>

        <div class="alert alert-danger">Are you sure you want to delete this booking? This cannot be reverted. If yes, <a href='config/delete_booking.php?value=<?php echo $values["BOOKING_ID"] ?>'><button class="btn btn-danger">click here.</button></a></div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Booking Details</h6>
            </div>
            <div class="card-body">
              <table class="table">
         
                      <tr>
                          <td style="width: 25%">Booking ID</td>
                          <td><?php echo $values["BOOKING_ID"]; ?></td>
                      </tr>
                      <tr>
                          <td>Bed ID</td>
                          <td><?php echo $values["BED_ID"]; ?></td>
                      </tr>
                      <tr>
                          <td>Patient's Name</td>
                          <td><?php echo $values["CUSTOMER_FIRSTNAME"]." <strong>".$values["CUSTOMER_LASTNAME"]."</strong>"; ?></td>
                      </tr>
                      <tr>
                          <td>Patient's DOB</td>
                          <td><?php echo $values["CUSTOMER_DOB"]; ?></td>
                      </tr>
                      <tr>
                          <td>Hospital Name</td>
                          <td><?php echo $values["HOSPITAL_NAME"]; ?></td>
                      </tr>
                      <tr>
                          <td>Patient's Address</td>
                          <td><?php echo $values["CUSTOMER_DISTRICT"]."-".$values["CUSTOMER_WARD"].", ".$values["CUSTOMER_PROVINCE"]; ?></td>
                      </tr>
                      <tr>
                          <td>Hospital's Address</td>
                          <td><?php echo $values["HOSPITAL_DISTRICT"]."-".$values["HOSPITAL_WARD"].", ".$values["HOSPITAL_PROVINCE"]; ?></td>
                      </tr>
                      <tr>
                          <td>Facility</td>
                          <td><?php echo $values["FACILITY_NAME"]; ?></td>
                      </tr>
                      <tr>
                          <td>Booking Date and Time</td>
                          <td><?php echo $values["CREATED_AT"]; ?></td>
                      </tr>
                      <tr>
                          <td>Booking Status</td>
                          <td><?php 
                          if($values["BOOKING_STATUS"]=='Booked'){
                            echo "Pending acceptance";
                          } else if($values["BOOKING_STATUS"]=='Occupied'){
                            echo "Admitted in hospital";
                          } ?></td>
                      </tr>
                      
                 

              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->



 <?php

                        }
                        else{

$sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL, FACILITY, BED_FACILITY
WHERE CUSTOMERS.CUSTOMER_ID = BOOKING.FK_CUSTOMERID AND
BOOKING.FK_BEDID = BED.BED_ID AND
BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID AND
CUSTOMERS.CUSTOMER_ID = $customerid AND
BOOKING_STATUS<>'Discharged'";
$qry = mysqli_query($connection, $sql);
$values = mysqli_fetch_assoc($qry);


                          ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Customer Booking</h1>

<div class="alert alert-danger">Are you sure you want to delete this booking? This cannot be reverted. If yes, <a href='config/delete_booking.php?value=<?php echo $values["BOOKING_ID"] ?>'><button class="btn btn-danger">click here.</button></a></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">Booking Details</h6>
  </div>
  <div class="card-body">
    <table class="table">

            <tr>
                <td style="width: 25%">Booking ID</td>
                <td><?php echo $values["BOOKING_ID"]; ?></td>
            </tr>
            <tr>
                <td>Bed ID</td>
                <td><?php echo $values["BED_ID"]; ?></td>
            </tr>
            <tr>
                <td>Patient's Name</td>
                <td><?php echo $values["CUSTOMER_FIRSTNAME"]." <strong>".$values["CUSTOMER_LASTNAME"]."</strong>"; ?></td>
            </tr>
            <tr>
                <td>Patient's DOB</td>
                <td><?php echo $values["CUSTOMER_DOB"]; ?></td>
            </tr>
            <tr>
                <td>Hospital Name</td>
                <td><?php echo $values["HOSPITAL_NAME"]; ?></td>
            </tr>
            <tr>
                <td>Patient's Address</td>
                <td><?php echo $values["CUSTOMER_DISTRICT"]."-".$values["CUSTOMER_WARD"].", ".$values["CUSTOMER_PROVINCE"]; ?></td>
            </tr>
            <tr>
                <td>Hospital's Address</td>
                <td><?php echo $values["HOSPITAL_DISTRICT"]."-".$values["HOSPITAL_WARD"].", ".$values["HOSPITAL_PROVINCE"]; ?></td>
            </tr>
            <tr>
                <td>Booking Date and Time</td>
                <td><?php echo $values["CREATED_AT"]; ?></td>
            </tr>
            <tr>
                <td>Booking Status</td>
                <td><?php 
                if($values["BOOKING_STATUS"]=='Booked'){
                  echo "Pending acceptance";
                } else if($values["BOOKING_STATUS"]=='Accepted'){
                  echo "Admitted in hospital";
                } ?></td>
            </tr>
            
            
    

    </table>
  </div>
</div>

</div>
<!-- /.container-fluid -->

                          <?php
                        }
                      

 include_once("headerandfooter/footer.php");
?>
