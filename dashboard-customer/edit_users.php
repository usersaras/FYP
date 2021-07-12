<?php 
session_start();
include("headerandfooter/header.php");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Entry Operators</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of hospitals in Nepal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Mobile Number</th>
                      <th>Details</th>
                    
                    </tr>
                  </thead>

                  <tbody>
                      <?php
                      $extract_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_TYPE='Data Operator'";
                      $extract_qry = mysqli_query($connection, $extract_sql);

                      while($value=mysqli_fetch_array($extract_qry)){ ?>

                    <tr>
                      <td><?php echo $value['CUSTOMER_FIRSTNAME']; ?></td>
                      <td><?php echo $value['CUSTOMER_LASTNAME']; ?></td>
                      <td><?php echo $value['CUSTOMER_MOBILE']; ?></td>
                      <td><a href="de_operator_edit.php?id=<?php echo $value['CUSTOMER_ID'] ?>" class="btn btn-primary">Details</a></td>
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

 
  
