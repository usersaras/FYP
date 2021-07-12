<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Hospital"){
  echo 'You do not have access to this page';
}
else {

include("header.php");

$id= $_GET['id'];


?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="alert alert-danger">
          Are you sure you want to delete facility number <?php echo $id ?>?<br /> <br /> <a href="config/delete_facility.php?id=<?php echo $id ?>" class='btn btn-danger'>If, yes. Press here.</a>
          </div>

        </div>
        <!-- /.container-fluid -->


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