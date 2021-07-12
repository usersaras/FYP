<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Hospital"){
  echo 'You do not have access to this page';
}
else {

include("header.php");

$bedid= $_GET['id'];

$ext_sql = "SELECT * FROM FACILITY WHERE FACILITY_ID=$bedid";
$ext_query = mysqli_query($connection, $ext_sql);

$value = mysqli_fetch_array($ext_query);

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Individual Facility</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Edit Hospital Facilities</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="config/edit_hospital_facility.php?id=<?php echo $bedid ?>">
                   
                  <select class="form-control" name="bed_category" value="ks">
                      <option> 
                      <?php
                     echo $value['FACILITY_NAME']; 
                       ?>
                       </option>
                      <option value="General">General</option>
                      <option value="Cabin">Cabin</option>
                      <option value="ICU">Intensive Care Unit</option>
                  </select>

                  <input type="number" placeholder="Update bed's charge per day" class="form-control" name="charge" value="<?php echo $value['FACILITY_PRICE'] ?>"/>

                  <select class="form-control" name="status">
                      <option> 
                      <?php
                     echo $value['FACILITY_STATUS']; 
                       ?>
                       </option>
                      <option value="Available">Available</option>
                      <option value="Booked">Booked</option>
                      <option value="Occupied">Occupied</option>
                  </select>
        <input type="submit" name="submit"  class=" btn btn-info btn-user btn-block dashboard-form-padding" >
                  </form>
                </div>
              </div>
            </div>

                  <!-- Content Column -->
                  <div class="col-lg-4 mb-4">

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-info">Current information</h6>
  </div>
  <div class="card-body">
  <table class="table">
      <tr>
          <td>Facility ID</td>
          <td><?php echo $value['FACILITY_ID']; ?></td>
      </tr>

      <tr>
          <td>Facility Name</td>
          <td><?php echo $value['FACILITY_NAME']; ?></td>
      </tr>

      <tr>
          <td>Facility Price</td>
          <td>Rs.<?php echo $value['FACILITY_PRICE']; ?>/day</td>
      </tr>

      <tr>
          <td>Facility Status</td>
          <td><?php echo $value['FACILITY_STATUS']; ?></td>
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