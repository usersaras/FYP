<?php
session_start();
include_once('../config/connection.php');

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
include_once('header.php');

if(isset($values["FACILITY_ID"])){

?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Booking Details</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Bookings</h6>
  </div>
  <div class="card-body">
    <table class="table">
    <tr>
    <td style="width: 20%">Booking ID</td>
    <td><?php echo $values["BOOKING_ID"] ?></td>
    </tr>
    <tr>
    <td>Patient's Name</td>
    <td><?php echo $values["CUSTOMER_FIRSTNAME"]." ".$values["CUSTOMER_LASTNAME"] ?></td>
    </tr>
    <tr>
    <td>Bed Category</td>
    <td><?php echo $values["BED_CATEGORY"]?></td>
    </tr>
    <tr>
    <td>Facility</td>
    <td><?php echo $values["FACILITY_NAME"]?></td>
    </tr>
    <tr>
    <td>Bed Charge</td>
    <td>Rs. <?php echo $values["BED_PRICE"]?>/day</td>
    </tr>
    <tr>
    <td>Facility Charge</td>
    <td>Rs. <?php echo $values["FACILITY_PRICE"]?> /day</td>
    </tr>
    <tr>
    <td>Total Charge</td>
    <td>Rs. <?php echo $values["FACILITY_PRICE"]+$values["BED_PRICE"]?>/day</td>
    </tr>
    <tr>
    <td>Status</td>
    <td><?php if ($values["BOOKING_STATUS"]=="Booked"){
        echo "<button class='btn btn-warning'>Pending Approval</button>";
    } else if  ($values["BOOKING_STATUS"]=="Occupied"){
        echo "<button class='btn btn-primary'>Occupied</button>";
    }
    ?></td>
    </tr>
    <tr>
    <td>Toggle</td>
    <td><?php 
    if ($values["BOOKING_STATUS"]=="Booked"){
        echo "<a href='config/accept_facility_booking.php?id=$bookingid' class='btn btn-primary'>Accept Booking</a>";
        }
        else if ($values["BOOKING_STATUS"]=="Occupied"){
            echo "<a href='config/unaccept_facility_booking.php?id=$bookingid' class='btn btn-primary'>Unaccept Booking</a> ";
            echo "<a href='config/discharge_facility_patient.php?id=$bookingid' class='btn btn-primary'>Discharge Patient</a>";
            }
        ?></td>
    </tr>
    
    </table>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php 
} 
else{
$ext_sql2 = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL
WHERE BOOKING.FK_BEDID = BED.BED_ID
AND BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID
AND BOOKING.FK_CUSTOMERID = CUSTOMERS.CUSTOMER_ID
AND BOOKING_ID=$bookingid";
$ext_qry2 = mysqli_query($connection, $ext_sql2);
$values2 = mysqli_fetch_assoc($ext_qry2);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Booking Details</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Bookings</h6>
  </div>
  <div class="card-body">
    <table class="table">
    <tr>
    <td style="width: 20%">Booking ID</td>
    <td><?php echo $values2["BOOKING_ID"] ?></td>
    </tr>
    <tr>
    <td>Patient's Name</td>
    <td><?php echo $values2["CUSTOMER_FIRSTNAME"]." ".$values["CUSTOMER_LASTNAME"] ?></td>
    </tr>
    <tr>
    <td>Bed Category</td>
    <td><?php echo $values2["BED_CATEGORY"]?></td>
    </tr>
    <td>Bed Charge</td>
    <td>Rs. <?php echo $values2["BED_PRICE"]?>/day</td>
    </tr>
    <td>Total Charge</td>
    <td>Rs. <?php echo $values2["BED_PRICE"]?>/day</td>
    </tr>
    <tr>
    <td>Status</td>
    <td><?php if ($values2["BOOKING_STATUS"]=="Booked"){
        echo "<button class='btn btn-warning'>Pending Approval</button>";
    } else if  ($values2["BOOKING_STATUS"]=="Occupied"){
        echo "<button class='btn btn-success'>Occupied</button>";
    }
    ?></td>
    </tr>
    <tr>
    <td>Toggle</td>
    <td><?php 
    if ($values2["BOOKING_STATUS"]=="Booked"){
        echo "<a href='config/accept_booking.php?id=$bookingid' class='btn btn-info'>Accept Booking</a>";
        }
        else if ($values2["BOOKING_STATUS"]=="Occupied"){
            echo "<a href='config/unaccept_booking.php?id=$bookingid' class='btn btn-danger'>Unaccept Booking</a> ";
            echo "<a href='config/discharge_patient.php?id=$bookingid' class='btn btn-info'>Discharge Patient</a>";
            }
        ?></td>
    </tr>
    
    </table>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
}
include('headerandfooter/footer.php');
?>