<?php 
session_start();

require_once('headerandfooter/header.php');
?>
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h5>An initiative to control COVID-19 outbreak</h5>
						<h3>Find hospital beds easily</h3>
						<p>If you are looking for hospital beds for COVID-19 patients on the web, <br /> this is the site. You may see some list of hospitals and beds they provide.</p>
						<a class="main_btn" href="register.php">Register Now</a>
						<a class="white_btn" href="bed-tracker.php">Bed Tracker</a>
					</div>
				</div>
            </div>
            
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-12">
        				<div class="welcome_text">
        					<h4>Guide to COVID-19 <span style="color: #EA2C58; font-size: 50px;"><strong>Bed Finder</strong></span></h4>
        					<ul>
								<li>A user must first register through the registration page.</li>
								<li>Only COVID-19 infected patient(s) are allowed to be registered in this application.</li>
								<li>A patient can only book hospital beds in his/her province. If the patient tries to book beds in other provinces, an error message will be displayed.</li>								
							</ul>
        				</div>
        			</div>
        			
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
       <?php include_once('headerandfooter/footer.php') ?>