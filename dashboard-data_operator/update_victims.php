<?php 
session_start();
include_once('header.php');

if($_SESSION['role']!=="Data Operator"){
  echo 'You do not have access to this page';
}
else {
?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
             
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



        <?php

        $sql="SELECT * FROM COVID_DB";
        $qry = mysqli_query($connection, $sql);

        ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Covid-19 Database</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Citizenship Number</th>
                      <th>Recovery</th>
                      <th>Date</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                 <?php 
                 while($row=mysqli_fetch_array($qry)){
                     
                ?>
                     <tr>
                      <td><?php echo $row['CIT_NUMBER']?></td>
                      <td><?php
                      if($row['RECOVERY']==0){
                          echo "<button class='btn btn-success'>Recovered</button>";
                      } else if ($row['RECOVERY']==1){
                         echo "<button class='btn btn-warning'>Infected</button>";
                      } else{
                        echo "<button class='btn btn-danger'>Deceased</button>";
                      }
                      ?></td>
                      <td><?php echo $row['DATE']?></td>
                      <td><a href="update_victims_individual.php?cit=<?php echo $row['CIT_NUMBER']?>" class="btn btn-info">Update Information</a></td>
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

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Covid-19 Bed Finder</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php 
include_once('footer.php');
}
?>
