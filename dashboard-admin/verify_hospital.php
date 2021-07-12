<?php 
session_start();
include("headerandfooter/header.php");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Verify Hospitals</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of hospitals in Nepal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Province</th>
                      <th>District</th>
                      <th>Verification</th>
                      <th>Toggle</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      $extract_sql = "SELECT * FROM HOSPITAL";
                      $extract_qry = mysqli_query($connection, $extract_sql);

                      while($value=mysqli_fetch_array($extract_qry)){
                        $hospitalid = $value['HOSPITAL_ID'];
                         ?>
                   
                    <tr>
                    <td><?php echo $value['HOSPITAL_ID']; ?></td>
                      <td><?php echo $value['HOSPITAL_NAME']; ?></td>
                      <td><?php echo "01-".$value['HOSPITAL_PHONE']; ?></td>
                      <td><?php echo $value['HOSPITAL_PROVINCE']; ?></td>
                      <td><?php echo $value['HOSPITAL_DISTRICT']; ?></td>
                      <td><?php if($value['HOSPITAL_VERIFICATION']==0){
                          echo "<a href='#' class='btn btn-secondary'>Not verified</a>";
                      } 
                      else if ($value['HOSPITAL_VERIFICATION']==1){
                          echo "<a href='#' class='btn btn-success'>Verified</a>";
                      }
                      ?>
                      </td>
                      <td><?php if($value['HOSPITAL_VERIFICATION']==0){
                          echo "<a href='config/verify_hospital.php?id=$hospitalid' class='btn btn-primary'>Verify</a>";
                      } 
                      else if ($value['HOSPITAL_VERIFICATION']==1){
                          echo "<a href='config/unverify_hospital.php?id=$hospitalid' class='btn btn-warning'>Unverify</a>";
                      }
                      ?>
                      </td>
                    </tr>
                          
                        <?php
                      }
                      ?>
                    
                   
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
  include_once('headerandfooter/footer.php');
  ?>

 
  
