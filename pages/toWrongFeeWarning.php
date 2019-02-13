<?php
require_once('dbConnect.php');


echo "<script>if (confirm('In this section,the system helps you  make a correction on a student\'s previous fee entry')) {
    window.location='http://34.73.97.17/Waondo/pages/correctWrongFee.php';
} else {
    window.location='http://34.73.97.17/Waondo/pages/displayFee.php';
}</script>";



?>