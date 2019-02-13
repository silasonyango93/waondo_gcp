<?php
require_once('dbConnect.php');


echo "<script>if (confirm('In this section,the system helps you  delete a wrong fee entry.')) {
    window.location='http://34.73.97.17/Waondo/pages/correctWrongPerson.php';
} else {
    window.location='http://34.73.97.17/Waondo/pages/displayFee.php';
}</script>";



?>