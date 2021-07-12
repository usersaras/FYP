<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Hospital"){
  echo 'You do not have access to this page';
}
else {
// echo $_SESSION['id'];

include("header.php");

$hospitalid = $_SESSION['id'];

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

          </div>

          <!-- Content Row -->
          <div class="row">

             <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Occupied Beds</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                        $recovered_count_sql = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_STATUS='Occupied'";
                        $recovered_count_qry = mysqli_query($connection, $recovered_count_sql);
                        echo mysqli_num_rows($recovered_count_qry);
                        ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Available Beds</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                        $recovered_count_sql = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_STATUS='Available'";
                        $recovered_count_qry = mysqli_query($connection, $recovered_count_sql);
                        echo mysqli_num_rows($recovered_count_qry);
                        ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

               <!-- Recovered Card -->
               <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Available Oxygens </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                         $recovered_count_sql = "SELECT * FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid AND FACILITY_NAME='Oxygen' AND FACILITY_STATUS='Available'";
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

            <!-- Recovered Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Available Ventilators</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                         $recovered_count_sql = "SELECT * FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid AND FACILITY_NAME='Ventilator' AND FACILITY_STATUS='Available'";
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

     

            <!-- Pie Chart -->
               <!-- Donut Chart -->
               <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Donut Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> 2020
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> 2021
                    </span>
                  </div>
                  <hr>
                  Donut chart showing infections in 2020 and 2021.
                </div>
              </div>
            </div>

            <div class="col-xl-8 col-lg-8">
             <!-- Area Chart -->
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Area Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                 Area chart showing number of infections per month.
                </div>
              </div>
              </div>
    



        </div>
        <!-- /.row -->

      </div>
       <!-- /.container-fluid -->

<?php 
include("headerandfooter/footer.php");

}
}
else{
  echo "You do not have access to this page!";
}

?>