<?php 
session_start();
if(isset($_SESSION['role'])){
 
if($_SESSION['role']!="Hospital"){
  echo 'You do not have access to this page';
}
else {
// echo $_SESSION['id'];

include("header.php");

$hospitalid = $_SESSION['id'];

$sql = "SELECT * FROM HOSPITAL, BED WHERE 
HOSPITAL.HOSPITAL_ID = BED.FK_HOSPITAL_ID AND
HOSPITAL_ID=$hospitalid
";
$qry = mysqli_query($connection, $sql);
$value = mysqli_fetch_array($qry);

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>

          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Pie Chart -->
               <!-- Donut Chart -->
               <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                 <table class="table">
                 <tr>
                 <td>Hospital Name</td>
                 <td><?php
                 echo $value["HOSPITAL_NAME"];
                  ?></td>
                 </tr>

                 <tr>
                 <td>Hospital Location</td>
                 <td><?php
                 echo $value["HOSPITAL_DISTRICT"]."-".$value["HOSPITAL_WARD"]." ".$value["HOSPITAL_PROVINCE"];
                  ?></td>
                 </tr>

                 <tr>
                 <td>Verification</td>
                 <td><?php

                if($value["HOSPITAL_VERIFICATION"]==1){
                    echo "Verified";
                }else {
                    echo "Verification Pending";
                }
                  ?></td>
                 </tr>

                 <tr>
                 <td>Total Hospital Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>

                 <tr>
                 <td>Available General Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_CATEGORY='General' AND BED_STATUS='Available'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>
                 <tr>
                 <td>Total General Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_CATEGORY='General'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>
                 

                 <tr>
                 <td>Available Cabin Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_CATEGORY='Cabin' AND BED_STATUS='Available'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>
                 <tr>
                 <td>Total Cabin Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_CATEGORY='Cabin'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>

                 <tr>
                 <td>Available ICU Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_CATEGORY='ICU' AND BED_STATUS='Available'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>

                 <tr>
                 <td>Total ICU Beds</td>
                 <td><?php
                $count = "SELECT * FROM BED WHERE FK_HOSPITAL_ID=$hospitalid AND BED_CATEGORY='ICU'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>

                 <tr>
                 <td>Available Oxygen</td>
                 <td><?php
                $count = "SELECT * FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid AND FACILITY_NAME='Oxygen' and FACILITY_STATUS='Available'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>
                 <tr>
                 <td>Total Oxygen</td>
                 <td><?php
                $count = "SELECT * FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid AND FACILITY_NAME='Oxygen'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>

                 <tr>
                 <td>Available Ventilators</td>
                 <td><?php
                $count = "SELECT * FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid AND FACILITY_NAME='Ventilator' AND FACILITY_STATUS='Available'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>
                 <tr>
                 <td>Total Ventilators</td>
                 <td><?php
                $count = "SELECT * FROM FACILITY WHERE FK_HOSPITAL_ID=$hospitalid AND FACILITY_NAME='Ventilator'";
                $qry = mysqli_query($connection, $count);

                echo mysqli_num_rows($qry);
                  ?></td>
                 </tr>

                 </table>
                  <hr>
                  Hospital's detailed profile.
                </div>
              </div>
            </div>

        
    



        </div>
        <!-- /.row -->

      </div>
       <!-- /.container-fluid -->

<?php 
include("headerandfooter/footer.php");

}
}
else{
  echo "You do not have access to this page!";
}

?>