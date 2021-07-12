<?php
session_start();
include("../../config/connection.php");

$hospitalid = $_GET['id'];

if(isset($_POST['submit'])){

    $hospitalname = mysqli_real_escape_string($connection, trim($_POST['hospitalname']));
    $hospitalphone1 = mysqli_real_escape_string($connection, trim($_POST['hospitalphone1']));
    $hospitalphone2 = mysqli_real_escape_string($connection, trim($_POST['hospitalphone2']));
    $province = mysqli_real_escape_string($connection, trim($_POST['country']));;
    $district = mysqli_real_escape_string($connection, trim($_POST['dist']));;
    $ward = mysqli_real_escape_string($connection, trim($_POST['ward']));;

    if($hospitalname==null || $hospitalphone1==null || $hospitalphone2==null || $province==null || $district=="Select" || $ward=="Select"){
        $_SESSION['hospitalname'] = $hospitalname;
        $_SESSION['hospitalphone1'] = $hospitalphone1;
        $_SESSION['hospitalphone2'] = $hospitalphone2;
        $_SESSION['province'] = $province;
        $_SESSION['district'] = $district;
        $_SESSION['ward'] = $ward;
        echo "<script>alert('Fields cannot be null!')</script>";
        echo "<script>window.location='../individual_hospital_edit.php?id=".$hospitalid."'</script>";
    }

    //null check
    else{

        //is numeric check
        if(is_numeric($hospitalphone1)!='1'){
            $_SESSION['hospitalname'] = $hospitalname;
            $_SESSION['hospitalphone1'] = $hospitalphone1;
            $_SESSION['hospitalphone2'] = $hospitalphone2;
            $_SESSION['province'] = $province;
            $_SESSION['district'] = $district;
            $_SESSION['ward'] = $ward;
            echo "<script>alert('Phone numbers should be numeric!')</script>";
            echo "<script>window.location='../individual_hospital_edit.php?id=".$hospitalid."'</script>";
        }

        //is numeric check
        else
        {
            if(is_numeric($hospitalphone2)!='1'){
                $_SESSION['hospitalname'] = $hospitalname;
                $_SESSION['hospitalphone1'] = $hospitalphone1;
                $_SESSION['hospitalphone2'] = $hospitalphone2;
                $_SESSION['province'] = $province;
                $_SESSION['district'] = $district;
                $_SESSION['ward'] = $ward;
                echo "<script>alert('Phone numbers should be numeric!')</script>";
                echo "<script>window.location='../individual_hospital_edit.php?id=".$hospitalid."'</script>";
            }
            else{
                if(strlen($hospitalphone1)!=7 || strlen($hospitalphone2)!=10){
                    $_SESSION['hospitalname'] = $hospitalname;
                    $_SESSION['hospitalphone1'] = $hospitalphone1;
                    $_SESSION['hospitalphone2'] = $hospitalphone2;
                    $_SESSION['province'] = $province;
                    $_SESSION['district'] = $district;
                    $_SESSION['ward'] = $ward;
                    echo "<script>alert('Phone number should be 7 digits and mobile number should be 10 digits!')</script>";
                    echo "<script>window.location='../individual_hospital_edit.php?id=".$hospitalid."'</script>";
                }
                else{

                $default_password = md5("sarassaras");

                $insert_sql = "INSERT INTO HOSPITAL (HOSPITAL_NAME, HOSPITAL_PHONE, HOSPITAL_MOBILE, HOSPITAL_PASSWORD, HOSPITAL_PROVINCE, HOSPITAL_DISTRICT, HOSPITAL_WARD, HOSPITAL_VERIFICATION)
                VALUES ('$hospitalname', $hospitalphone1, $hospitalphone2, '$default_password', '$province', '$district', $ward, 1)";

                $update_sql = "UPDATE HOSPITAL
                SET HOSPITAL_NAME='$hospitalname',
                HOSPITAL_PHONE=$hospitalphone1,
                HOSPITAL_MOBILE=$hospitalphone2,
                HOSPITAL_PROVINCE='$province',
                HOSPITAL_DISTRICT='$district',
                HOSPITAL_WARD=$ward
                WHERE HOSPITAL_ID=$hospitalid";

                $update_qry = mysqli_query($connection, $update_sql);

                if($update_qry){
                    echo "<script>alert('Information updated successfully!')</script>";
                    echo "<script>window.location='../individual_hospital_edit.php?id=".$hospitalid."'</script>";
                } else {
                    echo "<script>alert('There was an error processing request!')</script>";
                    echo "<script>window.location='../individual_hospital_edit.php?id=".$hospitalid."'</script>";

        //             echo $hospitalname."<br />";
        // echo $hospitalphone1."<br />";
        // echo $hospitalphone2."<br />";
        // echo $province."<br />";
        // echo $district."<br />";
        // echo $ward."<br />";
                }

                
        }//end of number length check
        } //is numeruc check
        }//is numeric check

    }//end of null check

}//end of isset

?>