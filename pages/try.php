<?php

require_once('dbConnect.php');
$d=date('F');

$s= date('Y-m-d');



$AdmissionNo=2406;
$CarryForwardAmount=2406;
$strNonNumeric="";

//$c=abs($t);

$int = (int) preg_replace('/[^0-9]/', '', $strNonNumeric);

echo $int;



//echo $d;?>