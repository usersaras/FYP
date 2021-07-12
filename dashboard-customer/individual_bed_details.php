<?php 
session_start();
include("headerandfooter/header.php");
$bedid = $_GET['id'];
$userid = $_SESSION['id'];

$check_sql = "SELECT * FROM BOOKING WHERE FK_USERID="

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Individual View - Hospital Bed</h1>
          <p class="mb-4">A detailed view of the bed and the hospital it belongs to.</p>
            <div class="row">
                <div class="col-xl-6 col-md-12">

         

          <!-- DataTales Example -->
          <form class="form-group" method="POST" action="individual_bed_booking.php">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Individual Bed Details</h6>
            </div>
            <div class="card-body">
              <table class="table">
                 
              <?php 
                  $sql = "SELECT * FROM BED WHERE BED_ID=$bedid";
                  $qry = mysqli_query($connection, $sql);
                  $value = mysqli_fetch_assoc($qry);

                  $hosp_sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_ID= ".$value['FK_HOSPITAL_ID'];
                  $hosp_qry = mysqli_query($connection, $hosp_sql);
                  $hosp_value = mysqli_fetch_assoc($hosp_qry);
                  
                  ?>
                  <tr>
                      <th>ID</th>
                      <th><?php echo $value['BED_ID'];?></th>
                  </tr>
                  <tr>
                      <td>Category</td>
                      <td><?php echo $value['BED_CATEGORY'];?></td>
                  </tr>
                  <tr>
                  <td>Price</td>
                      <td>Rs. <?php echo $value['BED_PRICE'];?>/day</td>
                  </tr>
                  <td>Hospital</td>
                      <td>
                          <?php
                      echo $hosp_value['HOSPITAL_NAME'];
                       ?>
                  </td>
                  </tr>
                  <tr>
                      <td>Location</td>
                      <td><?php echo $hosp_value['HOSPITAL_DISTRICT']."-".$hosp_value['HOSPITAL_WARD'].", ".$hosp_value['HOSPITAL_PROVINCE']; ?></td>
                  </tr>
                  <tr>
                      <td>Status</td>
                      <td><?php if($value['BED_STATUS']=='Available'){
                              echo "<button class='btn btn-success'>Available</button>";
                              }else if($value['BED_STATUS']=='Booked'){
                              echo "<button class='btn btn-warning'>Booked</button>";  
                              }else if($value['BED_STATUS']=='Occupied'){
                                echo "<button class='btn btn-primary'>Occupied</button>";  
                                }?></td>
                  </tr>
                  <tr>
                      <td>Additional Facility</td>
                      <td>
                          <select class="form-control-sm" name="facility" style="margin-top: -10px;">
                              <option value="None">None</option>
                              <option value="Oxygen">Oxygen</option>
                              <option value="Ventilator">Ventilator</option>
                          </select>
                      </td>
                  </tr>
              </table>
              <input type="hidden" name="bed_id" value="<?php echo $value['BED_ID'] ?>">
              <input type="hidden" name="hosp_province" value="<?php echo $hosp_value['HOSPITAL_PROVINCE'] ?>">
              <input type="hidden" name="hospitalid" value="<?php echo $hosp_value['HOSPITAL_ID'] ?>">
              
              
              <?php if($value['BED_STATUS']!='Available'){
                 ?>
                 <hr />
                 <div class="row">
                     <div class="col-md-12 text-center">
                  <p>Already Booked or Occupied!</p>
                   </div>
               </div>
                  <?php
              }
              else{ ?>
              
                <hr>
               <div class="row">
                   <div class="col-md-12 text-center">
                  <a href="individual_bed_booking.php?id=<?php echo $value['BED_ID'] ?>">
                  <input type="submit" name="submit" class="btn btn-success btn-block" style="margin-right: 10px;">
                </a>
                   </div>
               </div>
              <?php } ?>
            </div>
          </div>
          </form>

          </div>
          <div class= "col-xl-6 col-md-12">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Hospital Details</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $hosp_value['HOSPITAL_NAME']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Beds</td>
                        <td><?php 
                         $hospitalid = $hosp_value['HOSPITAL_ID'];
                         $edit_sql = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid";
                         $edit_qry = mysqli_query($connection, $edit_sql);
                        echo mysqli_num_rows($edit_qry); ?></td>
                    </tr>

                    <tr>
                        <td>Available Beds</td>
                        <td><?php 
                         $edit_sql = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_STATUS='Available'";
                         $edit_qry = mysqli_query($connection, $edit_sql);
                        echo mysqli_num_rows($edit_qry);?>              
                    </tr>

                    <tr>
                        <td>Price Range</td>
                        <td><?php              
                         $edit_sql1 = "SELECT MIN(BED_PRICE), MAX(BED_PRICE) FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_STATUS='Available'";
                         $edit_qry1 = mysqli_query($connection, $edit_sql1);

                         while($hd = mysqli_fetch_assoc($edit_qry1)){
                            echo "Rs. ". $hd['MIN(BED_PRICE)']." to Rs.".$hd['MAX(BED_PRICE)'];
                         };

                         ?></td>
                    </tr>



                    <tr>
                        <td>Oxygen</td>
                        <td><?php              
                         $edit_sql1 = "SELECT * FROM FACILITY WHERE FACILITY_NAME='Oxygen' AND FACILITY_STATUS='Available' AND FK_HOSPITAL_ID=$hospitalid";
                         $edit_qry1 = mysqli_query($connection, $edit_sql1);
                         echo mysqli_num_rows($edit_qry1)." in stock";
                         ?></td>
                    </tr>
                    <tr>
                        <td>Ventilator</td>
                        <td><?php              
                         $edit_sql1 = "SELECT * FROM FACILITY WHERE FACILITY_NAME='Ventilator' AND FACILITY_STATUS='Available' AND FK_HOSPITAL_ID=$hospitalid";
                         $edit_qry1 = mysqli_query($connection, $edit_sql1);
                         echo mysqli_num_rows($edit_qry1). " available";
                         ?></td>
                    </tr>
                    <tr>
                        <td>Facility Price</td>
                        <td><?php             
                         $edit_sql1 = "SELECT MIN(FACILITY_PRICE), MAX(FACILITY_PRICE) FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid";
                         $edit_qry1 = mysqli_query($connection, $edit_sql1);
                         $values = mysqli_fetch_assoc($edit_qry1);
                         echo "Rs. ".$values['MIN(FACILITY_PRICE)']." to Rs.".$values['MAX(FACILITY_PRICE)'];
                         ?></td>
                    </tr>

                </table>

            </div>
          </div>

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
  ?>

 
  
