<?php 
session_start();
include("headerandfooter/header.php");
$hospitalid = $_GET['id'];

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <!-- Page Heading -->
         <div class="alert alert-danger">Are you sure you want to delete Hospital ID <?php echo $hospitalid ?>?
        If, yes <a href="config/delete_hospital.php?id=<?php echo $hospitalid ?>" class="btn btn-danger">Press Here</a>
        </div>

      </div>
      <!-- End of Main Content -->
      <script src="../js/dropdown.js"></script>

  <?php
  include_once('headerandfooter/footer.php');
  ?>

 
  
