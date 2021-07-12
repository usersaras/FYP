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
          <h1 class="h3 mb-0 text-gray-800">Add Facility</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Add Hospital Facility</h6>
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