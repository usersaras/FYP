<?php
session_start();
include('header.php'); 
$hospitalid = $_SESSION['id'];
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <?php
                    $ext_sql = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid";
                    $ext_qry = mysqli_query($connection, $ext_sql);
                  ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Bed ID</th>
                      <th>Bed Category</th>
                      <th>Bed Price</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while($value = mysqli_fetch_array($ext_qry)) { ?>
                    <tr>
                      <td><?php echo $value['BED_ID'] ?></td>
                      <td><?php echo $value['BED_CATEGORY'] ?></td>
                      <td>Rs. <?php echo $value['BED_PRICE'] ?></td>
                      <td><a href="edit_bed.php?id=<?php echo $value['BED_ID'] ?>" class="btn btn-warning"> Edit </a></td>
                      <td><a href="config/delete_bed.php?id=<?php echo $value['BED_ID'] ?>" class="btn btn-danger">Delete </a></td>
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
  include('headerandfooter/footer.php');
  ?>
