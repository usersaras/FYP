<?php 
session_start();
include("header.php");



if(isset($_GET['wrong'])){
    $error = $_GET['wrong'];
}else{
    $error = "no_error";   
}

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
            <h1 class="h3 mb-0 text-gray-800">Add New Data</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Add COVID Victim's Information</h6>
                  <div class="dropdown no-arrow">
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <form method="POST" action="config/add_new_victims.php">
                <div style="margin-top: 12px">Birth Certificate/Citizenship Number</div>
                    <input type="text" name="citnumber" class="form-control" placeholder="Add victim's birth certificate/citizenship number" 
                    value="<?php 
                    if (isset($_SESSION['cid'])){
                    echo $_SESSION['cid']; } 
                    else{
                      echo "";
                    }
                    ?>" />

                    <!-- to display error -->
                    <?php if($error=='citizenship_numeric_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Citizenship/Birth certificate number should not contain spaces and be numeric.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->

                     <!-- to display error -->
                     <?php if($error=='citizenship_repeat_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Citizenship/Birth certificate already registered, to update information visit <a href="#">here</a>.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->

                    <div style="margin-top: 12px">Date of infection</div>
                    <input type="date" name="infected_date" class="form-control" max=<?php echo date('Y-m-d') ?>>

        <!-- to display error -->
        <?php if($error=='date_null_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Please fill all the fields.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->
                   
        <input type="submit" name="submit"  class=" btn btn-info btn-user btn-block dashboard-form-padding" >
                  </form>
                </div>
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


<script src="../js/dropdown.js"></script> <!-- Script for dynamic dropdown -->
