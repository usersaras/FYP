<?php 
session_start();
session_destroy();
unset($lgid);
header('location: ../index.php');

?>