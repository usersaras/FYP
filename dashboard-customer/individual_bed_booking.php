<?php 
session_start();
include("headerandfooter/header.php");
$userid = $_SESSION['id'];



if(!isset($_POST['submit'])){
    
}else{
    $bedid = $_POST['bed_id'];
    $facility = $_POST['facility'];
    $hospitalid = $_POST['hospitalid'];

    $ext_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID=$userid";
    $ext_qry = mysqli_query($connection, $ext_sql);
    $ext_val = mysqli_fetch_assoc($ext_qry);

    $pat_province = $ext_val["CUSTOMER_PROVINCE"];
    $hosp_province = $_POST['hosp_province'];

    if(strcmp($pat_province, $hosp_province)!=0){
        echo "<script>alert('Hospital location is different to patient location!')</script>";
        echo "<script>window.location='view_all_beds.php'</script>";
    }

    $check_sql = "SELECT * FROM BOOKING WHERE  (BOOKING_STATUS='Booked' OR BOOKING_STATUS='Occupied') AND FK_CUSTOMERID=$userid";
    $check_qry = mysqli_query($connection, $check_sql);

    if(mysqli_num_rows($check_qry)>0){
        echo "<script>alert('A booking has already been made for this patient!')</script>";
        echo "<script>window.location='customer_booking.php'</script>";
    }
    if($facility!="None"){
    $_SESSION['facility']=$facility;
    $edit_sql1 = "SELECT * FROM FACILITY WHERE FACILITY_NAME='$facility' AND FACILITY_STATUS='Available' AND FK_HOSPITAL_ID=$hospitalid";
    $edit_qry1 = mysqli_query($connection, $edit_sql1);
    if(mysqli_num_rows($edit_qry1)<1){
        echo "<script>alert('Facility out of stock!')</script>";
        echo "<script>window.location='individual_bed_details.php?id=$bedid'</script>";
    }
}

    $edit_sql1 = "SELECT * FROM FACILITY WHERE FACILITY_NAME='Oxygen' AND FACILITY_STATUS='Available' AND FK_HOSPITAL_ID=$hospitalid" ;
    $edit_qry1 = mysqli_query($connection, $edit_sql1);
    if(mysqli_num_rows($edit_qry1)<1){
        echo "<script>alert('Facility out of stock!')</script>";
          echo "<script>window.location='individual_bed_details.php?id=$bedid'</script>";
    }

    $pat_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID=$userid";
    $pat_qry = mysqli_query($connection, $pat_sql);
    $pat_value = mysqli_fetch_assoc($pat_qry);

    $hosp_sql = "SELECT * FROM BED, HOSPITAL WHERE BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID AND BED_ID=$bedid";
    $hosp_qry = mysqli_query($connection, $hosp_sql);
    $hosp_value = mysqli_fetch_assoc($hosp_qry);

    $fac_sql = "SELECT * FROM FACILITY WHERE FACILITY_NAME='$facility'AND FK_HOSPITAL_ID=$hospitalid AND FACILITY_STATUS='Available' LIMIT 1";
    $fac_qry = mysqli_query($connection, $fac_sql);
    $fac_val = mysqli_fetch_assoc($fac_qry);
    $facilityid = $fac_val["FACILITY_ID"];

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Hospital Bed Booking</h1>
          <p class="mb-4">Your booking details.</p>
            <div class="row">
            <div class="col-xl-12 col-md-12">
            <form class="form" method="POST" action="config/book_bed.php">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Booking Details</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                <tr>
                    <td style="width: 15%">Patient's Name</td>
                    <td>
                        <?php echo $pat_value['CUSTOMER_FIRSTNAME']." ".$pat_value['CUSTOMER_LASTNAME']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Patient's DOB</td>
                    <td>
                        <?php echo $pat_value['CUSTOMER_DOB']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Patient's Address</td>
                    <td>
                        <?php echo $pat_value['CUSTOMER_DISTRICT']."-".$pat_value['CUSTOMER_WARD'].", ".$pat_value['CUSTOMER_PROVINCE']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Hospital's Name</td>
                    <td>
                        <?php echo $hosp_value['HOSPITAL_NAME']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Hospital's Address</td>
                    <td>
                        <?php echo $hosp_value['HOSPITAL_DISTRICT']."-".$hosp_value['HOSPITAL_WARD'].", ".$hosp_value['HOSPITAL_PROVINCE']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Bed Type</td>
                    <td>
                        <?php echo $hosp_value['BED_CATEGORY']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Facility</td>
                    <td>
                    <?php echo $facility; ?>
                </td>
                </tr>
                <tr>
                    <td>Bed Charge</td>
                    <td>Rs.<?php echo $hosp_value['BED_PRICE']; ?>/day</td>
                </tr>
                <tr>
                    <td>Facility Charge</td>
                    <td>
                    Rs.<?php echo $fac_val["FACILITY_PRICE"]; ?>/day
                </td>
                </tr>
                <tr>
                    <td>Total Charge</td>
                    <td>
                    Rs.<?php 
                    $total = $fac_val["FACILITY_PRICE"]+$hosp_value['BED_PRICE'];
                    echo $total;
                    ?>/day
                </td>
                </tr>
                </table>
              
           
              
                <hr>
               <div class="row">
                   <div class="col-md-12 text-center">
                  <input type="submit" name="submit" value="Book now" class="btn btn-success btn-block" />
                   </div>
               </div>

            </div>
          </div>
          <input type="hidden" name="cid" value="<?php echo $userid ?>" />
          <input type="hidden" name="bid" value="<?php echo $bedid ?>" />
          <input type="hidden" name="fid" value="<?php echo $facilityid ?>" />
          </form>
          </div>
        
          </div> 
          <!-- / .row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script src="../js/dropdown.js"></script>

  <?php
  include_once('headerandfooter/footer.php');

}
  ?>

 
  
