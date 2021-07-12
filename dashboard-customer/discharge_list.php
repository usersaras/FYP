<?php
session_start();

include_once("headerandfooter/header.php");

$customerid = $_SESSION['id'];

// if(isset($_SESSION["facility"])) {
//   if($_SESSION["facility"]!="None"){

$sql = "SELECT * FROM CUSTOMERS, BOOKING WHERE 
BOOKING.FK_CUSTOMERID = CUSTOMERS.CUSTOMER_ID AND
CUSTOMERS.CUSTOMER_ID = $customerid AND
BOOKING_STATUS='Discharged'";

$qry = mysqli_query($connection, $sql);


?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Discharge List</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Booking Details</h6>
            </div>
            <div class="card-body">
              <table class="table">
              <thead>
              <tr>
              <th>Booking ID</th>
              <th>Patient Name</th>
              <th>Booking Time</th>
              </tr>
              </thead>
              <tbody>
                 <?php while($values = mysqli_fetch_assoc($qry)){ ?>
                 <tr>
                 <td><?php echo $values['BOOKING_ID'] ?></td>
                 <td><?php echo $values['CUSTOMER_FIRSTNAME']." ".$values['CUSTOMER_LASTNAME'] ?></td>
                 <td><?php echo $values['CREATED_AT'] ?></td>
                 </tr>
                 <?php } ?>
                 </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->



 <?php

 include_once("headerandfooter/footer.php");
?>
