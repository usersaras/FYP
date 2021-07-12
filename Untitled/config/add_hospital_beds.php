<?php 

session_start();
include("../../config/connection.php");

if(isset($_POST['submit'])){
    $hospitalid = $_SESSION['id'];
    $bedcategory = $_POST['bed_category'];
    $charge = $_POST['charge'];
    $quantity = $_POST['quantity'];

    $i=0;

    echo $bedcategory;

    if($bedcategory=="Select bed category" || $charge==null || $quantity==null){
        $_SESSION["bedcategory"] = $bedcategory;
        $_SESSION["charge"] = $charge;
        $_SESSION["quantity"] = $quantity;
        echo "<script>alert('Cannot pass null values!')</script>";
        echo "<script>window.location='../add_hospital_bed.php'</script>";

    }
    else{

   

    while($i<$quantity){

        $sql = "INSERT INTO BED (BED_CATEGORY, BED_PRICE, BED_STATUS, FK_HOSPITAL_ID) VALUES
        ('$bedcategory', '$charge', 'Available', $hospitalid)";
        // echo "<br/>".$sql."<br/>";
        $i=$i+1; 

        $query = mysqli_query($connection, $sql);
    }//end of while
    if($query){
        echo "<script>alert('Beds added successfully!')</script>";
        echo "<script>window.location='../add_hospital_bed.php'</script>";
    }else {
        echo "<script>alert('There was an error processing request!')</script>";
        echo "<script>window.location='../add_hospital_bed.php'</script>";
    }
}//end of null check
}

?>