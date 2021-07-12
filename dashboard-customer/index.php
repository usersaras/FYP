<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Patient"){
  echo 'You do not have access to this page';
}
else {
$custid = $_SESSION['id'];

include("headerandfooter/header.php");

?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Recovered Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Recovered</div>
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
               <div class="col-xl-3 col-md-6 mb-4">
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
                        $recovered_count_sql = "SELECT * FROM BED WHERE BED_STATUS='Available'";
                        $recovered_count_qry = mysqli_query($connection, $recovered_count_sql);

                        echo mysqli_num_rows($recovered_count_qry);
                        ?>
                          </div>
                        </div>
                        <!-- <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Beds</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $recovered_count_sql = "SELECT * FROM BED";
                        $recovered_count_qry = mysqli_query($connection, $recovered_count_sql);

                        echo mysqli_num_rows($recovered_count_qry);
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hospital fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

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

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-5 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Personal Details</h6>
                </div>
                <div class="card-body">
                  <?php 
                  $sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID=$custid";
                  $qry = mysqli_query($connection, $sql);
                  $value = mysqli_fetch_assoc($qry);
                   ?>
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                 <table class="table">
                  <tr>
                    <th>Name</th>
                    <td><?php echo $value['CUSTOMER_FIRSTNAME']." ".$value['CUSTOMER_LASTNAME'] ?></td>
                  </tr>
                  <tr>
                    <th>Number</th>
                    <td><?php echo $value['CUSTOMER_MOBILE'] ?></td>
                  </tr>
                  <tr>
                    <th>Province</th>
                    <td><?php echo $value['CUSTOMER_PROVINCE'] ?></td>
                  </tr>
                  <tr>
                    <th>District</th>
                    <td><?php echo $value['CUSTOMER_DISTRICT'] ?></td>
                  </tr>
                  <tr>
                    <th>Ward</th>
                    <td><?php echo $value['CUSTOMER_WARD'] ?></td>
                  </tr>
                 </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-7 mb-4">

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hospitals in your province</h6>
  </div>
  <div class="card-body overflow-auto">
    <?php 
    $province = $value['CUSTOMER_PROVINCE'];
    $sql2 = "SELECT * FROM HOSPITAL WHERE HOSPITAL_PROVINCE='$province'";
    $qry2 = mysqli_query($connection, $sql2);
     ?>
     <div class="table-wrapper-scroll-y my-custom-scrollbar">
   <table class="table">
     <?php     
     while($value = mysqli_fetch_assoc($qry2)){ ?>
    <tr>
      <td><?php echo $value['HOSPITAL_NAME'] ?></td>
      <td><a href="view_hospital_beds.php?value=<?php echo $value['HOSPITAL_ID'] ?>" class="btn btn-primary">View Beds</a></td>
    </tr>
     <?php } ?>
   </table>
     </div>
  </div>
</div>
</div>

          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php 
include("headerandfooter/footer.php");

}
}
else{
  echo "You do not have access to this page!";
}

?>