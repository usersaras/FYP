<!doctype html>
<html lang="en">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/bed.png" type="image/png">
        <title>COVID-19 Bed Finder</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://use.fontawesome.com/fb48fadd01.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>

$(function() {  
    $("#datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        todayHighlight: true,
      maxDate:0
    });
});

$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu row m0">
              <div class="container">
          <div class="float-left">
            <ul class="list header_social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div>
          <div class="float-right">
            <?php 
            if(!isset($_SESSION['id'])){
            ?>
            <a class="ac_btn" href="login.php">Login</a>
            <a class="dn_btn" href="register.php">Register</a>
            <?php } else {?>
              <a class="ac_btn" href="config/logout-customer.php">Logout</a>
            <!-- <a class="dn_btn" href="register.php">Register</a> -->
            <?php } ?>
          </div>
              </div>  
            </div>  
            <div class="main_menu">
              <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php">
              <!-- <img src="img/logo.png" alt=""> -->
              <h2> COVID-19 Bed Finder</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
                <!-- <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li> -->
                <li class="nav-item"><a class="nav-link" href="aboutus.php">About</a></li> 
                 <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Statistics</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="bed-tracker.php">Bed Tracker</a></li>
                  </ul>
                </li> 
              </ul>
              
            </div> 
          </div>
              </nav>
            </div>
        </header>