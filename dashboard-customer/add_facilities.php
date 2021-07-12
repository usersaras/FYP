<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Hospital"){
  echo 'You do not have access to this page';
}
else {

$error = "no_error";

if(isset($_GET['wrong'])){
    $error = $_GET['wrong'];
}

include("header.php");

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add facility</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

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

            <!-- Recovered Card -->
            <div class="col-xl-3 col-md-6 mb-4">
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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Available Beds</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">30,000</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Hospital Facility</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="config/add_hospital_facility.php">
                   
                  <select class="form-control" name="bed_category">
                      <option> 
                      <?php
                      if(isset($_SESSION['facility'])){
                          echo $_SESSION['facility'];
                      }
                          else {
                              echo 'Select facility';
                          }
                      
                       ?>
                       </option>
                      <option value="Oxygen">Oxygen</option>
                      <option value="Ventilator">Ventilator</option>
                  </select>

                  <input type="number" placeholder="Add facility's charge per day" class="form-control" name="charge" value="<?php
                  if(isset($_SESSION['charge'])){
                    echo $_SESSION['charge'];
                  };
                  ?>"/>
 
                  <input type="number" placeholder="Add quantity" name = "quantity" class="form-control" name-quanitiy value="<?php
                  if(isset($_SESSION['quantity'])){
                    echo $_SESSION['quantity'];
                  };
                  ?>"/>


        <!-- to display error -->
        <?php if($error=='null_fields_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Please fill all the fields.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->

        <input type="submit" name="submit"  class=" btn btn-primary btn-user btn-block dashboard-form-padding" >
                  </form>
                </div>
              </div>
            </div>

                  <!-- Content Column -->
                  <div class="col-lg-4 mb-4">

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">At a glance</h6>
  </div>
  <div class="card-body">
  <table class="table">
      <tr>
          <td>Total Hospitals</td>
          <td>30</td>
      </tr>

      <tr>
          <td>Total Verified Hospitals</td>
          <td>30</td>
      </tr>

      <tr>
          <td>Total Beds</td>
          <td>140</td>
      </tr>

      <tr>
          <td>Total Patients</td>
          <td>14</td>
      </tr>

  </table>
  </div>
</div>
</div>

        
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script src="../js/dropdown.js"></script>

<?php 
unset($_SESSION['hospitalname']);
unset($_SESSION['hospitalphone1']);
unset($_SESSION['hospitalphone2']);
unset($_SESSION['province']);
unset($_SESSION['district']);
unset($_SESSION['ward']);

include("headerandfooter/footer.php");
}
}
else{
  echo "You do not have access to this page!";
}

unset($_SESSION['facility']);
unset($_SESSION['charge']);
unset($_SESSION['quantity']);

?>