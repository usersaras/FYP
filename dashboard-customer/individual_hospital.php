<?php 
session_start();
include("headerandfooter/header.php");
$hospitalid = $_GET['id'];

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Individual View - Hospital</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>
            <div class="row">
                <div class="col-xl-5 col-md-5">

         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Details</h6>
            </div>
            <div class="card-body">
              <table class="table">
              <?php 
                  $sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_ID=$hospitalid";
                  $qry = mysqli_query($connection, $sql);

                  while($value = mysqli_fetch_assoc($qry)){
                  ?>
                  <tr>
                      <th>ID</th>
                      <th><?php echo $value['HOSPITAL_ID'];?></th>
                  </tr>
                  <tr>
                      <td>Name</td>
                      <td><?php echo $value['HOSPITAL_NAME'];?></td>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <td><?php echo $value['HOSPITAL_PHONE'];?></td>
                  </tr>
                  <tr>
                      <td>Mobile</td>
                      <td><?php echo $value['HOSPITAL_MOBILE'];?></td>
                  </tr>
                  <tr>
                      <td>Province</td>
                      <td><?php echo $value['HOSPITAL_PROVINCE'];?></td>
                  </tr>
                  <tr>
                      <td>District</td>
                      <td><?php echo $value['HOSPITAL_DISTRICT'];?></td>
                  </tr>
                  <tr>
                      <td>Ward</td>
                      <td><?php echo $value['HOSPITAL_WARD'];?></td>
                  </tr>
                  <tr>
                      <td>Verification</td>
                      <td><?php if($value['HOSPITAL_VERIFICATION']==0){
                          echo "<a href='#' class='btn btn-warning'>Not Verified</a>";
                      } 
                      else if ($value['HOSPITAL_VERIFICATION']==1){
                          echo "<a href='#' class='btn btn-success'>Verified</a>";
                      }
                      ?>
                      </td>
                  </tr>

                 <?php 
                 }
                  ?>
                  
              </table>
            </div>
          </div>

          </div>
          <div class= "col-xl-7 col-lg-7">

          <?php 
          $edit_sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_ID=$hospitalid";
          $edit_qry = mysqli_query($connection, $edit_sql);
          $show = mysqli_fetch_array($edit_qry);
          ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Other Details</h6>
            </div>
            <div class="card-body">

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

 
  
