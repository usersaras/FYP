<?php 
session_start();
include("headerandfooter/header.php");
$hospitalid = $_GET['id'];

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Individual View - Hospital</h1>
          <p class="mb-4">With great power, comes great responsibility.</p>
            <div class="row">
    
          <div class= "col-xl-12 col-lg-12">

          <?php 
          $edit_sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_ID=$hospitalid";
          $edit_qry = mysqli_query($connection, $edit_sql);
          $show = mysqli_fetch_array($edit_qry);
          ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Details</h6>
            </div>
            <div class="card-body">

            <form method="POST" action="config/edit_hospital.php?id=<?php echo $hospitalid ?>">
                    <input type="text" name="hospitalname" class="form-control" placeholder="Add hospital's name" 
                    value="<?php 
                    echo $show['HOSPITAL_NAME'];
                     ?>"/>

                    <input type="text" name="hospitalphone1" class="form-control" placeholder="Add hospital's phone number" 
                    value="<?php 
                    echo $show['HOSPITAL_PHONE'];
                     ?>"/>

                    <input type="text" name="hospitalphone2" class="form-control" placeholder="Add hospital's mobile number" 
                    value="<?php 
                    echo $show['HOSPITAL_MOBILE'];
                     ?>"/>

                    <select id="country" name="country" class="form-control" onchange="random_function()">
            <option 
            value = "<?php
            if (isset($_SESSION['province'])){
                echo $_SESSION['province'];
            }
            ?>">
            <?php
                echo $show['HOSPITAL_PROVINCE'];
             ?>
        </option>
            <option value="Province 1">Province 1</option>
            <option value="Province 2">Province 2</option>
            <option value="Bagmati Province">Bagmati Province</option>
            <option value="Gandaki Province">Gandaki Province</option>
            <option value="Lumbini Province">Lumbini Province</option>
            <option value="Karnali Province">Karnali Province</option>
            <option value="Sudurpashchim Province">Sudurpashchim Province</option>  
        </select>

        <div id="my-frm">
        <select id="output" name="dist" class="form-control" onchange="random_function2()">
            <option> <?php
          echo $show['HOSPITAL_DISTRICT'];
             ?> </option>
        </select>
        </div>

        <select id="warddisplay" class="form-control" name="ward">
            <option><?php
                echo $show['HOSPITAL_WARD'];
                
             ?></option>
        </select>

        <input type="submit" name="submit"  class=" btn btn-primary btn-user btn-block dashboard-form-padding" >
                  </form>
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

 
  
