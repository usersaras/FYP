<?php

include ("config/connection.php");
session_start();

if(isset($_POST['submit']))

// session_regenerate_id();

{
        //For OTP integration
        // Authorisation details 
        $username = "saras.sthapitshrestha@gmail.com";
        $hash = "71166ca9cadd19413ff83083d2ce73fb4f621529024cf05d559cd59be81379b9";
        // Authorisation details

        // Config variables. Consult http://api.txtlocal.com/docs for more info.
        $test = "0";

        // Data for text message. This is the text message data.
        $sender = "Bed Finder"; // This is who the message appears to be from.
        //For OTP integration
         
        //fetching data with POST
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']); 
        $citizenshipnumber = mysqli_real_escape_string($connection, $_POST['citizenshipnumber']);
        $bod = mysqli_real_escape_string($connection, $_POST['date']);
        $mobilenumber = mysqli_real_escape_string($connection, "+977". $_POST['mobilenumber']);
        $password = mysqli_real_escape_string($connection, md5($_POST['password']));
        $passwordcheck = mysqli_real_escape_string($connection, $_POST['password']);
        $passwordmatch = mysqli_real_escape_string($connection, $_POST['passwordmatch']);
        $province = mysqli_real_escape_string($connection, $_POST['country']);
        $dist = mysqli_real_escape_string($connection, $_POST['dist']);
       	$a = mysqli_real_escape_string($connection, $_POST['ward']);
        //fetching data with POST

        //validations
        $alphanumeric_check = is_numeric($mobilenumber);
        $password_check = strcmp($passwordmatch, $passwordcheck);

        $first_check_sql = "SELECT * FROM COVID_DB WHERE CIT_NUMBER='$citizenshipnumber' AND RECOVERY=1";
        $first_check_qry = mysqli_query($connection, $first_check_sql);
    //checks if all the fields are filled
    if($firstname == null || $lastname==null || $citizenshipnumber==null || $date=null || $mobilenumber==null || $password==null || $province==null || $dist=="Select" ||$a=="Select Ward"){
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['citizenshipnumber'] = $citizenshipnumber;
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
        $_SESSION['province'] = $province;
        $_SESSION['district'] = $dist;
        $_SESSION['ward'] = $a;
        echo "<script>window.location='register.php?wrong=empty_fields_error'</script>";
}
//checks if all the fields are filled
else{
      
        //check if registered with COVID DB
        if (mysqli_num_rows($first_check_qry)==0){
                echo "This patient is not registered with COVID DB";
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['citizenshipnumber'] = $citizenshipnumber;
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
                $_SESSION['province'] = $province;
                $_SESSION['district'] = $dist;
                $_SESSION['ward'] = $a;
                echo "<script>window.location='register.php?wrong=coviddb_registration_error'</script>";
        }
        //check if registered with COVID DB
        else{
        //fetching data to check if mobile number is unique
        $unq_check_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_MOBILE=$mobilenumber";
        $unq_check_query = mysqli_query($connection, $unq_check_sql);
        //fetching data to check if mobile number is unique

        //checking if citizenship number is unique
        $cit_check_sql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_CITIZENSHIPNUMBER =$citizenshipnumber";
        $cit_check_query = mysqli_query($connection, $cit_check_sql);

        //checking if citizenship number is unique
        if (mysqli_num_rows($cit_check_query)>0){
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['citizenshipnumber'] = $citizenshipnumber;
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
                $_SESSION['province'] = $province;
                $_SESSION['district'] = $dist;
                $_SESSION['ward'] = $a;
               echo "<script>window.location='register.php?wrong=citizenship_duplicate_error'</script>";
        }
        else{

        //checking if mobile number is unique
       if(mysqli_num_rows($unq_check_query)>0){
               $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['citizenshipnumber'] = $citizenshipnumber;
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
                $_SESSION['province'] = $province;
                $_SESSION['district'] = $dist;
                $_SESSION['ward'] = $a;
               echo "<script>window.location='register.php?wrong=number_duplicate_error'</script>";
       }

       //checking if mobile number is unique
       else{

        //check if mobile number is 10 digit        
        if(strlen($mobilenumber) <> 14 ||  $alphanumeric_check<>1 ){
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['citizenshipnumber'] = $citizenshipnumber;
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
                $_SESSION['province'] = $province;
                $_SESSION['district'] = $dist;
                $_SESSION['ward'] = $a;
                echo "<script>window.location='register.php?wrong=number_digits_error'</script>";
                // echo "not 10 digits";  
                // echo $alphanumeric_check;
        }

        //check if mobile number is 10 digit
        else{

        //check if password is more than 8 characters
        if(strlen($passwordcheck)<8){
        // echo "oassword nort 8";

        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['citizenshipnumber'] = $citizenshipnumber;
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
        $_SESSION['province'] = $province;
        $_SESSION['district'] = $dist;
        $_SESSION['ward'] = $a;
        
        echo "<script>window.location='register.php?wrong=password_requirement_error'</script>";
        
        }

        //check if password is more than 8 characters
        else{

        //check if password and confirm password match
        if ($password_check != 0){
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['citizenshipnumber'] = $citizenshipnumber;
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['mobilenumber'] = substr($mobilenumber, -10);
                $_SESSION['province'] = $province;
                $_SESSION['district'] = $dist;
                $_SESSION['ward'] = $a;
                echo "<script>window.location='register.php?wrong=password_match_error'</script>";
        }

        //if all the conditions are fulfilled
        else{
        echo "Firstname: " . $firstname . "<br />";
        echo "Lastname: " . $lastname . "<br />";
        echo "Citizenship Number: " . $citizenshipnumber . "<br />";
        echo "Date: " . $_POST['date'] . "<br />";

        echo "date: ".$date ."</br>";

        echo "Mobile Number: " . $mobilenumber . "<br />";
        echo "Password: " . $password . "<br />";
        echo "Password: " . $password_check . "<br />";

        echo "Province: " . $province . "<br />";
        echo "District: " . $dist . "<br />";
        echo "Ward: " .$a . "<br />";

        $v = is_numeric($mobilenumber);

         $insertcustomer = "INSERT INTO CUSTOMERS (CUSTOMER_FIRSTNAME, CUSTOMER_LASTNAME, CUSTOMER_CITIZENSHIPNUMBER, CUSTOMER_DOB, CUSTOMER_MOBILE, CUSTOMER_PASSWORD, CUSTOMER_PROVINCE, CUSTOMER_DISTRICT, CUSTOMER_WARD, CUSTOMER_TYPE, CUSTOMER_VERIFY) VALUES
         ('$firstname', '$lastname', '$citizenshipnumber', '$bod', '$mobilenumber', '$password', '$province', '$dist', $a, 'Patient', 0);";

         $query = mysqli_query($connection, $insertcustomer);

         if ($query){

        //extracting customer ID
        $extractsql = "SELECT * FROM CUSTOMERS WHERE CUSTOMER_MOBILE='$mobilenumber'";  
        $extractqry = mysqli_query($connection, $extractsql) or die( mysqli_error($connection));
        while ($row = mysqli_fetch_array($extractqry)){
                $customer_id = $row['CUSTOMER_ID'];
                echo $customer_id. "<br />";
        }
        //extracting customer ID

        //for OTP integration
        $numbers = $mobilenumber; // A single number or a comma-seperated list of numbers
        $otp=mt_rand(100000,999999);
        $onetimepassword = $otp;
        
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = "Your OTP is ".$otp;
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.txtlocal.com/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        echo("OTP SENT SUCCESSFULLY");
        echo $otp;
        curl_close($ch);
        //for OTP integration

        //storing OTP
        $opt_sql = "INSERT INTO OTP_SIMULATOR (OTP, FK_CUSTOMERID) VALUES ($otp, $customer_id)";
        echo $opt_sql;
        $opt_qry = mysqli_query($connection, $opt_sql);
        //storing OTP

        if($opt_qry){
                echo "<script>window.location='confirm_account.php'</script>";
        }
         }
        } //checks if password and confirm password matchs
        } //end of password check
        } //end of mobile number check  
        } //end of null check
        }//end of mysqli check for mobile number
        }//end of mysqli check for mobile number

} //end of mysqli check for citizenship in covid db

} //end of isset

//OTP Verification
if(isset($_POST['ver'])){
        $verotp=$_POST['otp'];
        $mobilenum = "+977".$_POST['mobile'];

        echo $verotp. "<br/>";
        echo$mobilenum. "<br/>";

        $mobilenumber = "+9779851070046";

        $mobilecheck = strcmp($mobilenum,$mobilenumber);

        if($verotp==$_COOKIE['otp'] && $mobilecheck==0){
        echo("logined successfully");
        
        }else{
        echo("otp worng");
        }
        }
    
?>


<!-- OTP -->