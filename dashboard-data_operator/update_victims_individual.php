<?php 
session_start();
include("header.php");
$cit_number = $_GET['cit'];

//FETCHING INDIVIDUAL'S DATA TO DISPLAY
$sql = "SELECT * FROM COVID_DB WHERE CIT_NUMBER='$cit_number'";
$query = mysqli_query($connection, $sql);
$value = mysqli_fetch_assoc($query);



if($_SESSION['role']!=="Data Operator"){
  echo 'You do not have access to this page';
}
else {

?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Details</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Update Victim's Information</h6>
                  <div class="dropdown no-arrow">
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                <table class="table">
                    <tr>
                        <th>Column</th>
                        <th>Value</th>
                        <th>Confirm</th>
                    </tr>

                    <tr>
                        <form method="POST" action="config/update_individual_citizenship.php?cit=<?php echo $value['CIT_NUMBER'] ?>">
                        <td>
                            <p>Citizenship Number</p>
                        </td>
                        <td>
                            <input type="text" name="updated_cit" class="form-control"/>
                        </td>
                        <td>
                            <input type="submit" name="submit" class="btn btn-info"/>
                        </td>
                        </form>
                    </tr>

                    <tr>
                        <form method="POST" action="config/update_individual_date.php?cit=<?php echo $value['CIT_NUMBER']; ?>">
                        <td>
                            <p>Diagnosis Date</p>
                        </td>
                        <td>
                            <input type="date" name="updated_date" class="form-control" max="<?php echo date('Y-m-d') ?>"/>
                        </td>
                        <td>
                            <input type="submit" name="submit" class="btn btn-info"/>
                        </td>
                        </form>
                    </tr>

                    <tr>
                        <form method="POST" action="config/update_individual_status.php?cit=<?php echo $value['CIT_NUMBER']; ?>">
                        <td>
                            <p>Status</p>
                        </td>
                        <td>
                            <select type="date" name="updated_status" class="form-control">    
                                <option value="3">Select Status</option>    
                                <option value="0">Recovered</option>
                                <option value="1">Infected</option>
                                <option value="2">Deceased</option>
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="submit" class="btn btn-info"/>
                        </td>
                        </form>
                    </tr>
                    
                </table>        

                 
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Current Information</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Column</th>
                        <th>Value</th>
                    </tr>

                    <tr>
                        <td>Citizenship ID</td>
                        <td><?php echo $value['CIT_NUMBER']; ?></td>
                    </tr>

                    <tr>
                        <td>Diagnosis Date (yy-mm-dd)</td>
                        <td><?php echo $value['DATE']; ?></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <?php 
                            if($value['RECOVERY']==0){
                                echo "<button class='btn btn-success'>Recovered</button>";
                            }
                            else if($value['RECOVERY']==1){
                                echo "<button class='btn btn-warning'>Infected</button>";
                            }
                            else if($value['RECOVERY']==2){
                                echo "<button class='btn btn-danger'>Deceased</button>";
                            }
                            ?>
                        </td>
                    </tr>

                </table>
                </div>
                <!-- <div class="card-body">
                <p>Citizenship ID: <?php echo $cit_number; ?></p>
                <p>Status: <?php echo $value['RECOVERY']; ?>
                </p>
                <p>Report Date:</p>
                </div> -->
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php 

}
unset ($_SESSION["cid"]);
include("footer.php");
?>


