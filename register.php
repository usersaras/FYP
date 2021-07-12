<?php 
session_start();

require_once('headerandfooter/header.php');

$error = 0; 

if (isset($_GET['wrong'])){
 $error = $_GET["wrong"];
} else {
    $error = 'no_error';
}

$_SESSION['fistname'] = "saras";

?>

 <section class="grey_bg" style="padding: 120px;">
     <div class="container">
     <div class="black_title">
        			<h2 style="color: black">Registration Form</h2>
        			<p>Register with patient's information and search for beds quickly and efficiently.</p>
        		</div>
         <div class="row">
         <div class="col-md-12">
    
        <form id="form1" method="post" action="states.php">

        <label class = "address-label" for="addressinformation">Personal Information</label>
        <input type="text" name="firstname" class="single-input" placeholder="Firstname" value = "<?php
        if (isset($_SESSION['firstname'])){
            echo $_SESSION['firstname'];
        }
        ?>">
    
        <input type="text" name="lastname" class="single-input" placeholder="Lastname" value = "<?php
        if (isset($_SESSION['lastname'])){
            echo $_SESSION['lastname'];
        }
        ?>"
        >
        <input type="text" name="citizenshipnumber" class="single-input" placeholder="Citizenship/Birth Certificate Number" value = "<?php
        if (isset($_SESSION['citizenshipnumber'])){
            echo $_SESSION['citizenshipnumber'];
        }
        ?>">
        <?php 
        if($error=='citizenship_duplicate_error'){ ?>
        <div class="alert alert-danger" role="alert">
            This birth certificate number/citizenship number is already registered!
        </div>
        <?php
        }?>
        <?php 
        if($error=='coviddb_registration_error'){ ?>
        <div class="alert alert-danger" role="alert">
            This patient is not registered in COVID DB or has already recovered!
        </div>
        <?php
        }?>
        
        <label class="address-label" for="DOB">Date of Birth</label>
        <input type="date" name="date" class="single-input" value = "<?php
        if (isset($_SESSION['date'])){
            echo $_SESSION['lastname'];
        }
        ?>">

        <label class = "address-label" for="addressinformation">Account Information</label>

        <input type="text" name="mobilenumber" class="single-input" placeholder="Mobile Number" value = "<?php
        if (isset($_SESSION['mobilenumber'])){
            echo $_SESSION['mobilenumber'];
        }
        ?>">
         <?php if($error=='number_duplicate_error'){ ?>
        <div class="alert alert-danger" role="alert">
            Mobile number is already registered!
        </div>
        <?php
        }?>

        <?php 
        if($error=='number_digits_error'){ ?>
        <div class="alert alert-danger" role="alert">
            Mobile number should be numeric and 10 digits!
        </div>
        <?php
        }
        ?>

        <input type="password" name="password" class="single-input" placeholder="Password" >
        <input type="password" name="passwordmatch" class="single-input" placeholder="Confirm Password" >
        <?php 
       
        if($error=='password_requirement_error'){ ?>
        <div class="alert alert-danger" role="alert">
            Password should not be less than 8 characters!
        </div>
        <?php
        }
        ?>

<?php 
       
       if($error=='password_match_error'){ ?>
       <div class="alert alert-danger" role="alert">
           Passwords do not match!
       </div>
       <?php
       }
       ?>
        
        <label class = "address-label" for="addressinformation">Address Information</label>

        <select id="country" name="country" class="single-input" onchange="random_function()">
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
        <select id="output" name="dist" class="single-input" onchange="random_function2()">
            <option> <?php
          
                if (isset($_SESSION['district'])){
                    echo $_SESSION['district'];
                }else{
                    echo "Select District";
                }
             ?> </option>
        </select>
        </div>

        <select id="warddisplay" class="single-input" name="ward">
            <option><?php
                if (isset($_SESSION['ward'])){
                    echo $_SESSION['ward'];
                }else{
                    echo "Select Ward";
                }
                
             ?></option>
        </select>

        <?php 
        if($error=="empty_fields_error"){ ?>
        <div class="alert alert-danger" role="alert">
           Please fill all the details!
        </div>
        <?php
        }
        ?>

<!-- <p>Date: <input type="text" id="datepicker"></p> -->
      
        <input type="submit" value="Submit" name="submit" class="btn btn-color" />
        </form>

     </div>

     <!-- <div class="col-md-6">ajkd</div>
     </div> -->

     </div>
     </section>

        <script src="js/dropdown.js"></script>

        <?php session_unset(); ?>

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
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="aboutus.php">About</a></li>
                                        <li><a href="bed-tracker.php">Bed Tracker</a></li>
                                        <li><a href="aboutus.php">User Guideline</a></li>
                                    </ul>
                                </div>									
                            </div>							
                        </div>
                    </div>							
                 
                    					
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | COVID Bed-Finder
                    </p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->

	
    </body>
</html>

