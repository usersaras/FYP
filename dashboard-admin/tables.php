<?php 
session_start();
include("header.php");?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">COVID-19 Database</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>

          <div class="row">

          <!-- Recovered Card -->
<div class="col-xl-4 col-md-4 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Recovered Patients</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
          <?php
            $recovered_count_sql = "SELECT * FROM COVID_DB WHERE RECOVERY=0";
            $recovered_count_qry = mysqli_query($connection, $recovered_count_sql);
            echo mysqli_num_rows($recovered_count_qry);
            ?>
          </div>
        </div>

        <div class="col-auto">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Infected Card -->
<div class="col-xl-4 col-md-4 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Infected</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php
            $infected_count_sql = "SELECT * FROM COVID_DB WHERE RECOVERY=1";
            $infected_count_qry = mysqli_query($connection, $infected_count_sql);
            echo mysqli_num_rows($infected_count_qry);
            ?>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-plus fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Deceased Patients</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
              <?php
            $recovered_count_sql = "SELECT * FROM COVID_DB WHERE RECOVERY=2";
            $recovered_count_qry = mysqli_query($connection, $recovered_count_sql);

            echo mysqli_num_rows($recovered_count_qry);
            ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-skull-crossbones fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of COVID-19 Victims</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Citizenship/Birth Certificate Number</th>
                      <th>Diagnosis Date</th>
                      <th>Recovery</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      $extract_sql = "SELECT * FROM COVID_DB";
                      $extract_qry = mysqli_query($connection, $extract_sql);

                      while($value=mysqli_fetch_array($extract_qry)){ ?>

                    <tr>
                      <td><?php echo $value['CIT_NUMBER']; ?></td>
                      <td><?php echo $value['DATE']; ?></td>
                      <td><?php 
                      if ($value['RECOVERY']==0){
                          echo "Recovered";
                      } else if ($value['RECOVERY']==1){
                        echo "Infected";
                    }
                    else if ($value['RECOVERY']==2){
                        echo "Deceased";
                    }
                      ?></td>
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

 
  
