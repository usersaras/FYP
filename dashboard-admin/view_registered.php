<?php 
session_start();
include("headerandfooter/header.php");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registered Users</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of registered users.</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Province</th>
                      <th>District</th>
                      <th>Ward</th>
                      <th>Role</th>
                      <th>Delete</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      $extract_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID<>1 AND CUSTOMER_TYPE='Patient'";
                      $extract_qry = mysqli_query($connection, $extract_sql);

                      while($value=mysqli_fetch_array($extract_qry)){ ?>

                    <tr>
                      <td><?php echo $value['CUSTOMER_FIRSTNAME']." ".$value['CUSTOMER_LASTNAME']; ?></td>
                      <td><?php echo substr($value['CUSTOMER_MOBILE'], 4); ?></td>
                      <td><?php echo ($value['CUSTOMER_PROVINCE']); ?></td>
                      <td><?php echo $value['CUSTOMER_DISTRICT']; ?></td>
                      <td><?php echo $value['CUSTOMER_WARD']; ?></td>
                      <td><?php echo $value['CUSTOMER_TYPE']; ?></td>
                    <td><a href="config/delete_user.php?id=<?php echo $value['CUSTOMER_ID'] ?>" class="btn btn-danger">Delete</a></td>
                      
                      </tr>
                          
                        <?php
                      }
                      ?>
                    
                   
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
  include_once('headerandfooter/footer.php');
  ?>

 
  
