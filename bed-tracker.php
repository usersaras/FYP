<?php
include_once("headerandfooter/header.php");
include("config/connection.php");

$sql = "SELECT * FROM BED, HOSPITAL WHERE HOSPITAL.HOSPITAL_ID = BED.FK_HOSPITAL_ID";
$qry = mysqli_query($connection, $sql);

?>
 <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h5>An initiative to control COVID-19 outbreak</h5>
						<h3>Find hospital beds easily</h3>
						<p>If you are looking for hospital beds for COVID-19 patients on the web, <br /> this is the site. You may see some list of hospitals and beds they provide.</p>
						<a class="main_btn" href="register.php">Register Now</a>
					</div>
				</div>
            </div>
            
        </section>

<section class="causes_area p_120"> 
<div class="container">
<div class="main_title">
        			<h2>Hospital Beds All Over Nepal</h2>
        			<p>A list of hospital beds and their availability and price all over Nepal.</p>
        		</div>
              <div class="table">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Hospital</th>
                      <th>Address</th>
                      <th>Facilities</th>
                      <th>Price</th>
                      <th>Status</th>
            
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php while($values=mysqli_fetch_array($qry)){ ?>
                    <tr>
                      <td><?php echo $values['HOSPITAL_NAME']; ?></td>
                      <td><?php echo  $values['HOSPITAL_DISTRICT']."-".$values['HOSPITAL_WARD'].", ".$values['HOSPITAL_PROVINCE']; ?></td>
                      <td><?php 
                      $sql2 = "SELECT FACILITY_NAME FROM HOSPITAL, FACILITY WHERE
                      FACILITY.FK_HOSPITAL_ID = HOSPITAL.HOSPITAL_ID
                      GROUP BY FACILITY_NAME";
                      $qry2 = mysqli_query($connection, $sql2);
                      while($values2=mysqli_fetch_array($qry2)){
                        echo $values2['FACILITY_NAME'];
                      } 
                      ?></td>
                      <td><?php echo $values['BED_PRICE']; ?></td>
                      <td><?php echo $values['BED_STATUS']; ?></td>
                   
                    </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </section>

  <!--================ start footer Area  =================-->	
  <footer class="footer-area section_gap">
            <div class="container">
            <div class="row">
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Bed Finder</h6>
                            <p>A simple web application to help COVID-19 patients find bed all over Nepal.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Navigation Links</h6>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Bed Tracker</a></li>
                                        <li><a href="#">User Guideline</a></li>
                                    </ul>
                                </div>									
                            </div>							
                        </div>
                    </div>											
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                  
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | COVID Bed-Finder</a>
                    
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
		<script src="js/theme.js"></script>

          <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
	
    </body>
</html>
