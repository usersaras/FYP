<?php 

?><?php 

session_start();
include("../../config/connection.php");

if(isset($_POST['submit'])){
    $hospitalid = $_SESSION['id'];
    $facility = $_POST['bed_category'];
    $charge = $_POST['charge'];
    $quantity = $_POST['quantity'];

    $i=0;

    if($facility=="Select facility" || $charge==null || $quantity==null){
        $_SESSION["facility"] = $facility;
        $_SESSION["charge"] = $charge;
        $_SESSION["quantity"] = $quantity;
        echo "<script>alert('Cannot pass null values!')</script>";
        echo "<script>window.location='../add_facilities.php'</script>";
    }
    else{

   

    while($i<$quantity){

        $sql = "INSERT INTO FACILITY (FACILITY_NAME, FACILITY_PRICE, FACILITY_STATUS, FK_HOSPITAL_ID) VALUES
        ('$facility', '$charge', 'Available', $hospitalid)";
        echo "<br/>".$sql."<br/>";
        $i=$i+1; 



        $query = mysqli_query($connection, $sql);
    }//end of while
    if($query){
        echo "<script>alert('Facility added successfully!')</script>";
        echo "<script>window.location='../add_facilities.php'</script>";
    }else {
        echo "<script>alert('There was an error processing request!')</script>";
        echo "<script>window.location='../add_facilities.php'</script>";
        echo $sql;
    }
}//end of null check
}

?>