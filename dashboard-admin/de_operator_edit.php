<?php 
session_start();
include("headerandfooter/header.php");
$customerid = $_GET['id'];

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit View - Data Entry Operators</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>
            <div class="row">
    
          <div class= "col-xl-12 col-lg-12">

          <?php 
          $edit_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_ID=$customerid";
          $edit_qry = mysqli_query($connection, $edit_sql);
          $show = mysqli_fetch_array($edit_qry);
          ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Details</h6>
            </div>
            <div class="card-body">
                <table class="table">

                <tr>
                    <td>Column</td>
                    <td>Value</td>
                    <td>Submit</td>
                </tr>

                <tr>
                    <form method="POST" action="config/update_do_fname.php?id=<?php echo $customerid ?>">
                    <td><p>Firstname</p></td>
                    <td><input type="text" name="firstname" class="form-control" value="<?php echo $show['CUSTOMER_FIRSTNAME'] ?>" style="margin-top: 0px;"/></td>
                    <td><input type="submit" name="submit" class="btn btn-primary" /></td>
                    </form>
                </tr>

                <tr>
                <form method="POST" action="config/update_do_lname.php?id=<?php echo $customerid ?>">
                    <td><p>Lastname</p></td>
                    <td><input type="text" name="lastname" class="form-control" value="<?php echo $show['CUSTOMER_LASTNAME'] ?>" style="margin-top: 0px;"/></td>
                    <td><input type="submit" name="submit" class="btn btn-primary" /></td>
                </form>
                </tr>

                <tr>
                <form method="POST" action="config/update_do_mobile.php?id=<?php echo $customerid ?>">
                    <td><p>Mobile Number</p></td>
                    <td><input type="text" name="mobilenumber" class="form-control" value="<?php echo substr($show['CUSTOMER_MOBILE'], -10) ?>" style="margin-top: 0px;"/></td>
                    <td><input type="submit" name="submit" class="btn btn-primary" /></td>
                    </form>
                </tr>

                <tr>
                <form method="POST" action="config/update_do_verify.php?id=<?php echo $customerid ?>">
                    <td><p>Verification</p></td>
                    <td>
                        <?php if($show['CUSTOMER_VERIFY']==1){ ?>
                        <a href="#" class="btn btn-success" style="width: 100%;"> Verified</a>
                        <?php } else {?>
                            <a href="#" class="btn btn-warning" style="width: 100%;">Not Verified</a>
                        <?php } ?>
                    </td>
                    <td><input type="submit" name="submit" value="Toggle" class="btn btn-primary" /></td>
                </form>
                </tr>

                </table>
            </div>
          </div>

          </div>
          </div> 
          <!-- / .row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script src="../js/dropdown.js"></script>

  <?php
  include_once('headerandfooter/footer.php');
  ?>

 
  
