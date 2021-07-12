<?php
session_start();
include("../../config/connection.php");

if(isset($_POST['submit'])){

    $hospitalname = mysqli_real_escape_string($connection, trim($_POST['hospitalname']));
    $hospitalphone1 = mysqli_real_escape_string($connection, trim($_POST['hospitalphone1']));
    $hospitalphone2 = mysqli_real_escape_string($connection, trim($_POST['hospitalphone2']));
    $province = mysqli_real_escape_string($connection, trim($_POST['country']));;
    $district = mysqli_real_escape_string($connection, trim($_POST['dist']));;
    $ward = mysqli_real_escape_string($connection, trim($_POST['ward']));
    $password = mysqli_real_escape_string($connection, trim($_POST['hospitalpassword']));

    if($hospitalname==null || $hospitalphone1==null || $hospitalphone2==null || $province==null || $district=="Select" || $ward=="Select"){
        $_SESSION['hospitalname'] = $hospitalname;
        $_SESSION['hospitalphone1'] = $hospitalphone1;
        $_SESSION['hospitalphone2'] = $hospitalphone2;
        $_SESSION['province'] = $province;
        $_SESSION['district'] = $district;
        $_SESSION['ward'] = $ward;
        echo "<script>window.location='../add_new_hospital.php?wrong=null_fields_error'</script>";
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
        echo "<script>window.location='../add_new_hospital.php?wrong=not_numeric_error'</script>";
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
                echo "<script>window.location='../add_new_hospital.php?wrong=not_numeric_error'</script>";
            }
            else{
                if(strlen($hospitalphone1)!=7 || strlen($hospitalphone2)!=10){
                    $_SESSION['hospitalname'] = $hospitalname;
                    $_SESSION['hospitalphone1'] = $hospitalphone1;
                    $_SESSION['hospitalphone2'] = $hospitalphone2;
                    $_SESSION['province'] = $province;
                    $_SESSION['district'] = $district;
                    $_SESSION['ward'] = $ward;
                    echo "<script>window.location='../add_new_hospital.php?wrong=number_length_error'</script>";
                }
                else{
                    $fetch_sql_phone = "SELECT * FROM HOSPITAL WHERE HOSPITAL_PHONE=$hospitalphone1";
                    $fetch_sql_mobile = "SELECT * FROM HOSPITAL WHERE HOSPITAL_MOBILE=$hospitalphone2";

                    $fetch_query_phone = mysqli_query($connection, $fetch_sql_phone);
                    $fetch_query_mobile = mysqli_query($connection, $fetch_sql_mobile);

                    if(mysqli_num_rows($fetch_query_phone)>0 || mysqli_num_rows($fetch_query_mobile)>0){
                    $_SESSION['hospitalname'] = $hospitalname;
                    $_SESSION['hospitalphone1'] = $hospitalphone1;
                    $_SESSION['hospitalphone2'] = $hospitalphone2;
                    $_SESSION['province'] = $province;
                    $_SESSION['district'] = $district;
                    $_SESSION['ward'] = $ward;
                    echo "<script>window.location='../add_new_hospital.php?wrong=number_repeat_error'</script>";
                    }
                    else
                    {

                $insert_sql = "INSERT INTO HOSPITAL (HOSPITAL_NAME, HOSPITAL_PHONE, HOSPITAL_MOBILE, HOSPITAL_PASSWORD, HOSPITAL_PROVINCE, HOSPITAL_DISTRICT, HOSPITAL_WARD, HOSPITAL_VERIFICATION)
                VALUES ('$hospitalname', $hospitalphone1, $hospitalphone2, '$password', '$province', '$district', $ward, 1)";


                $insert_query = mysqli_query($connection, $insert_sql);

                if($insert_query){
                    echo "<script>alert('New hospital added!')</script>";
                    echo "<script>window.location='../view_hospital_info.php'</script>";
                }else{
                    echo "<script>alert('There was an error processing your request!')</script>";
                    echo "<script>window.location='../add_new_hospital.php'</script>";
                }
            }//end of mysqli check

                
        }//end of number length check
        } //is numeruc check
        }//is numeric check

    }//end of null check

}//end of isset

?>