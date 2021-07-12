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
            <h1 class="h3 mb-0 text-gray-800">Add Hospital Beds</h1>
          </div>

           

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Add Hospital Beds</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="config/add_hospital_beds.php">
                   
                  <select class="form-control" name="bed_category" value="ks">
                      <option> 
                      <?php
                      if(isset($_SESSION['bedcategory'])){
                          echo $_SESSION['bedcategory'];
                      }
                          else {
                              echo 'Select bed category';
                          }
                      
                       ?>
                       </option>
                      <option value="General">General</option>
                      <option value="Cabin">Cabin</option>
                      <option value="ICU">Intensive Care Unit</option>
                  </select>

                  <input type="number" placeholder="Add bed's charge per day" class="form-control" name="charge" value="<?php
                  if(isset($_SESSION['charge'])){
                    echo $_SESSION['charge'];
                  };
                  ?>"/>
 
                  <input type="number" placeholder="Add number of beds" name = "quantity" class="form-control" value="<?php
                  if(isset($_SESSION['quantity'])){
                    echo $_SESSION["quantity"];
                  }
                  ?>"/>


        <input type="submit" name="submit"  class=" btn btn-info btn-user btn-block dashboard-form-padding" />
                  </form>
                </div>
              </div>
            </div>

                  <!-- Content Column -->
                  <div class="col-lg-4 mb-4">

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">At a glance</h6>
  </div>
  <div class="card-body">
  <table class="table">
      <tr>
          <td>Total Hospitals</td>
          <td>
            <?php 
            $sql = "SELECT * FROM HOSPITAL";
            $qry = mysqli_query($connection, $sql);
            echo mysqli_num_rows($qry);
            ?>
          </td>
      </tr>

      <tr>
          <td>Total Verified Hospitals</td>
          <td>
            <?php 
            $sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_VERIFICATION=1";
            $qry = mysqli_query($connection, $sql);
            echo mysqli_num_rows($qry);
            ?></td>
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

unset($_SESSION['bedcategory']);

?>