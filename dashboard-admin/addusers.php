<?php 
session_start();
include("headerandfooter/header.php");

if($_SESSION['role']!=="Admin"){
  echo 'You do not have access to this page';
  echo $_SESSION['role'];
}
else {
// echo $_SESSION['id'];

?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

   
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Data Operator</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Data Entry Operator</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <form method="POST" action="config/add_data_operator.php">
                  <input type="text" name="firstname" class="form-control" placeholder="Add data operator's first name name" 
                  value="<?php
                  if (isset($_SESSION['firstname'])){
                    echo $_SESSION['firstname'];
                  }
                  ?>"
                  />
                  <input type="text" name="lastname" class="form-control" placeholder="Add data operator's last name" 
                  value="<?php
                  if (isset($_SESSION['lastname'])){
                    echo $_SESSION['lastname'];
                  }
                  ?>"
                  />
                  <input type="text" name="mobilenumber" class="form-control" placeholder="Add data operator's mobile number" 
                  value="<?php
                  if (isset($_SESSION['mobile_number'])){
                    echo $_SESSION['mobile_number'];
                  }
                  ?>"
                  />
                  <input type="submit" name="submit" class="btn btn-primary form-control" />
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

unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['mobile_number']);

}
include("headerandfooter/footer.php");
?>