<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Admin"){
  echo 'You do not have access to this page';
}
else {
// echo $_SESSION['id'];

$error = "no_error";

if(isset($_GET['wrong'])){
    $error = $_GET['wrong'];
}

include("headerandfooter/header.php");

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add a new hospital</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Hospital</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="config/add_hospital.php">
                    <input type="text" name="hospitalname" class="form-control" placeholder="Add hospital's name" 
                    value="<?php 
                    if (isset($_SESSION['hospitalname'])){
                        echo $_SESSION['hospitalname'];
                    }else{
                        echo "";
                    }
                     ?>"/>
                    <input type="text" name="hospitalphone1" class="form-control" placeholder="Add hospital's phone number" value="<?php 
                    if (isset($_SESSION['hospitalphone1'])){
                        echo $_SESSION['hospitalphone1'];
                    }else{
                        echo "";
                    }
                     ?>"/>

                      <!-- to display error -->
        <?php if($error=='number_length_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Landline number should contain 7 digits.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->
                    <input type="text" name="hospitalphone2" class="form-control" placeholder="Add hospital's mobile number" value="<?php 
                    if (isset($_SESSION['hospitalphone2'])){
                        echo $_SESSION['hospitalphone2'];
                    }else{
                        echo "";
                    }
                     ?>"/>

                     <!-- to display error -->
        <?php if($error=='not_numeric_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Both number should be numeric!
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->

                     <!-- to display error -->
        <?php if($error=='number_length_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Mobile number should contain 10 digits.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->

                     <!-- to display error -->
        <?php if($error=='number_repeat_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Mobile number or landline number has already been registered.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->


                    <input type="password" name="hospitalpassword" class="form-control" placeholder="Add hospital's password">
                    <select id="country" name="country" class="form-control" onchange="random_function()">
            <option 
            value = "<?php
            if (isset($_SESSION['province'])){
                echo $_SESSION['province'];
            }
            ?>">
            <?php
                if (isset($_SESSION['province'])){
                    echo $_SESSION['province'];
                }else{
                    echo "Select Province";
                }
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
          
                if (isset($_SESSION['district'])){
                    echo $_SESSION['district'];
                }else{
                    echo "Select District";
                }
             ?> </option>
        </select>
        </div>

        <select id="warddisplay" class="form-control" name="ward">
            <option><?php
                if (isset($_SESSION['ward'])){
                    echo $_SESSION['ward'];
                }else{
                    echo "Select Ward";
                }
                
             ?></option>
        </select>

        <!-- to display error -->
        <?php if($error=='null_fields_error'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Please fill all the fields.
                        </div>
                    <?php
                    }?>
                    <!-- to display error -->

        <input type="submit" name="submit"  class=" btn btn-primary btn-user btn-block dashboard-form-padding" >
                  </form>
                </div>
              </div>
            </div>

                  <!-- Content Column -->
                  <div class="col-lg-4 mb-4">

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">At a glance</h6>
  </div>
  <div class="card-body">
  <table class="table">
      <tr>
          <td>Total Hospitals</td>
          <td><?php 
          $sql = "SELECT * FROM HOSPITAL";
          $qry = mysqli_query($connection, $sql);
          echo mysqli_num_rows($qry);
          ?></td>
      </tr>

      <tr>
          <td>Total Verified Hospitals</td>
          <td><?php 
          $sql = "SELECT * FROM HOSPITAL WHERE HOSPITAL_VERIFICATION=1";
          $qry = mysqli_query($connection, $sql);
          echo mysqli_num_rows($qry);
          ?></td>
      </tr>

      <tr>
          <td>Total Beds</td>
          <td><?php 
          $sql = "SELECT * FROM BED";
          $qry = mysqli_query($connection, $sql);
          echo mysqli_num_rows($qry);
          ?></td>
      </tr>

      <tr>
          <td>Registered Users</td>
          <td><?php 
          $sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_FIRSTNAME<>'admin'";
          $qry = mysqli_query($connection, $sql);
          echo mysqli_num_rows($qry);
          ?></td>
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

?>