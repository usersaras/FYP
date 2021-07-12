<?php include_once('headerandfooter/header.php'); 
if (isset($_GET['error'])){
    $error = $_GET['error'];
 } else {
    $error = 'no_error';
 }

 ?>
        
        <!--================Welcome Area =================-->
        <section class="causes_area p_120">
        	<div class="container">
                    <div class="main_title">
                        <h2>Login to your account</h2>
                        <p>The French s constituted for the conscience of the dominant aristocratic class a fall from innocence, and upturning of the natural chain of events that resounded.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-3"></div>
                    <div class="col-lg-6">
								<form method="POST" action="config/login.php">
									<div class="mt-10">
										<input type="text" name="mobilenumber" placeholder="Mobile Number"  class="single-input-primary">
                                    </div>
                                    <?php 

if($error=='username_match_error'){ ?>
<div class="alert alert-danger" role="alert">
   Number is not registered!
</div>
<?php
}
?>
									<div class="mt-10">
										<input type="password" name="password" placeholder="Password" class="single-input-primary">
                                    </div>

                                    <?php 

if($error=='password_match_error'){ ?>
<div class="alert alert-danger" role="alert">
   Password does not match!
</div>
<?php
}
?>

                                    <div class="mt-10 d-flex justify-content-center">
                                    <input type="submit" name="submit" class="btn btn-color">
                                </div>
                                </form>
                            </div>
                            <div class="col-lg-3"></div>
                         
                            </div>
							
        		
        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
        <?php
        include_once('footer.php');
        ?>