<?php 
require_once('dbConnect.php');
session_start();

session_unset();

// destroy the session
session_destroy(); 


echo "<script>
     
    window.location='http://34.73.97.17/Waondo/pages/login.php';
    
    </script>";



?>