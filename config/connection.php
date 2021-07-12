<?php

    $host = "localhost";
    $user = "root";
    $pass="root";
    $db = "fyp_demo";

    $connection = mysqli_connect($host,$user,$pass,$db);
    
    if(!$connection){
        echo"Database connection failed";
    } 
    else{
        // echo"Database connection successful";
    }


?>