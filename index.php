<?php 
session_start();

require_once('headerandfooter/header.php');
include('config/connection.php');
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
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>Welcome to COVID-19 <br />Bed Finder</h4>
        					<p>This web application is developed with the intention to help COVID-19 victims. Victims can earch for bedss and book them through our system. We hope that this will save many lives!</p>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="welcome_img">
        					<img class="img-fluid" src="img/welcome-img.jpg" alt="">
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Feature Area =================-->
        <section class="feature_area p_120">
        	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        	<div class="container">
        		<div class="white_title">
        			<h2>Our Key Features</h2>
        			<p>Features that make us stand out of the crowd.</p>
        		</div>
        		<div class="row feature_inner">
        			<div class="col-lg-4">
        				<div class="feature_item">
						<i class="fa fa-list"></i>
							<h4>Register</h4>
							<p>Register with us through the given online form.</p>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="feature_item">
						<i class="fa fa-search"></i>
							  <h4>Find a Bed</h4>
							  <p>Find beds that are cuurently empty at hospitals that treat COVID-19.</p>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="feature_item">
							<i class="fa fa-bed"></i>
        					<h4>Book a Bed</h4>
        					<p>Book beds from the convenience of your location without hassles.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Feature Area =================-->
        
        <!--================Testimonials Area =================-->
        <section class="testimonials_area p_120">
        	<div class="container">
        		<div class="row testimonials_inner">
        			<div class="col-lg-4">
        				<div class="testi_left_text">
        					<h4>Testimonial from our Users</h4>
        					<p>Short and sweet reviews from people who have used our app.</p>
        				</div>
        			</div>
        			<div class="col-lg-8">
        				<div class="testi_slider owl-carousel">
							<div class="item">
								<div class="testi_item">
									<p>It won’t be a bigger problem to find hospital beds anymore as apps like these are in development.</p>
									<h4>Shiva Malakar</h4>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<p>Found and booked hospital bed in less than an hour. Thanks to this application.</p>
									<h4>Anu Shiwakoti</h4>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<p>Really simple and easy to use design and to the point features. Used it to find a bed.</p>
									<h4>Ram Yadav</h4>
								</div>
							</div>
						
						</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Testimonials Area =================-->

        
<?php

require_once('headerandfooter/footer.php');

?>