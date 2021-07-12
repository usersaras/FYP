<?php
session_start();
include('header.php'); 
$hospitalid = $_SESSION['id'];
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Accept Patients' Bookings</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Accept Bookings</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <?php
                    $ext_sql = "SELECT * FROM CUSTOMERS, BOOKING, BED, HOSPITAL
                    WHERE BOOKING.FK_BEDID = BED.BED_ID
                    AND BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID
                    AND BOOKING.FK_CUSTOMERID = CUSTOMERS.CUSTOMER_ID
                    AND HOSPITAL_ID=$hospitalid
                    AND BED_STATUS = 'Booked'
                    ";
                    $ext_qry = mysqli_query($connection, $ext_sql);
                  ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Booking ID</th>
                      <th>Patient Name</th>
                      <th>Category</th>
                      <th>Booking Time</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while($value = mysqli_fetch_array($ext_qry)) { ?>
                    <tr>
                      <td><?php echo $value['BOOKING_ID'] ?></td>
                      <td><?php echo $value['CUSTOMER_FIRSTNAME']." ".$value["CUSTOMER_LASTNAME"] ?></td>
                      <td><?php echo $value['BED_CATEGORY'] ?></td>
                      <td><?php echo $value['CREATED_AT'] ?></td>
                      <td><a href="booking_details.php?id=<?php echo $value['BOOKING_ID'] ?>" class="btn btn-info">View Details</a></td>
        
                    </tr>
          <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  <?php 
  include('headerandfooter/footer.php');
  ?>
