<?php
session_start();

include_once("headerandfooter/header.php");

$hospital = $_GET['value'];


$sql = "SELECT * FROM BED, HOSPITAL
WHERE BED.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID
AND HOSPITAL_ID = $hospital";
$qry = mysqli_query($connection, $sql);

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category</th>
                      <th>Hospital</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Province</th>
                      <th>District</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      while($value = mysqli_fetch_assoc($qry)){
                      
                       ?>
                    <tr>
                      <td><?php echo $value['BED_ID']; ?></td>
                      <td><?php echo $value['BED_CATEGORY']; ?></td>
                      <td><?php echo $value['HOSPITAL_NAME']; ?></td>
                      <td>Rs. <?php echo $value['BED_PRICE']; ?>/day</td>
                      <td><?php echo $value['BED_STATUS']; ?></td>
                      <td><?php echo $value['HOSPITAL_PROVINCE']; ?></td>
                      <td><?php echo $value['HOSPITAL_DISTRICT']; ?></td>
                      <td><a href="individual_bed_details.php?id=<?php echo $value['BED_ID'];?>"><button class="btn btn-success">View</button></a></td>
                    </tr>
                    <?php } ?>
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
 include_once("headerandfooter/footer.php");
?>
