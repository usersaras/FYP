<?php
session_start();

include_once('../../config/connection.php');

if (isset($_POST['submit'])){
    $citizenship_number = mysqli_real_escape_string($connection,trim($_POST['citnumber']));
    $diagnosisadate = mysqli_real_escape_string($connection,trim($_POST['infected_date']));



    //repeated check
    $check_sql="SELECT * FROM COVID_DB WHERE CIT_NUMBER=$citizenship_number";
    $check_query = mysqli_query($connection, $check_sql);

    //mysqli citizenship repeat check
    if(mysqli_num_rows($check_query)>0){
        $_SESSION['cid']= mysqli_real_escape_string($connection,trim($_POST['citnumber']));
        echo "<script>window.location='../add_victims.php?wrong=citizenship_repeat_error'</script>";
    }
    else{

        //date null check
        if($diagnosisadate==null){
            $_SESSION['cid']= mysqli_real_escape_string($connection,trim($_POST['citnumber']));
            echo "<script>window.location='../add_victims.php?wrong=date_null_error'</script>";
        }
        else{

    //citizenship is_numeric check
    if(is_numeric($citizenship_number)!=1){
        echo "<script>window.location='../add_victims.php?wrong=citizenship_numeric_error'</script>";
    }
    //citizenship is_numeric check
    else{

       $sql = "INSERT INTO COVID_DB (CIT_NUMBER, RECOVERY, DATE) VALUES ($citizenship_number, 1, '$diagnosisadate')";
       $qry = mysqli_query($connection, $sql);
       
       if($qry){
       
        echo '<script>alert("Victim Added")</script>';
        echo "<script>window.location='../add_victims.php'</script>";
        
        
        
       }else {
       
       }

    }//end of citizenship is_numeric check
}// end of null date check
}//end of mysqli citizenship repeat check

} //end of isset

?>