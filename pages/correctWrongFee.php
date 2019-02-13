<?php
 require_once('dbConnect.php');
 
 




 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 $AdmissionNo =$_POST["AdmissionNo"];

 $AmountPaid =$_POST["AmountPaid"];
 
 //$AmountPaid = (int) preg_replace('/[^0-9]/', '', $AmountPaid);
 
 $AdmissionNo = (int) preg_replace('/[^0-9]/', '', $AdmissionNo);
 
 
 //$s= date('Y-m-d');
 
 //$s='2018-01-16';
 
 $sql = "select * from `fee` WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 $RecentPaidDate=$idd['RecentPaidDate'];
		
	 }
	
 }
 
 $RecentPaidDate=date('Y-m-d', strtotime($RecentPaidDate));
 

 $sql = "SELECT * FROM installments  WHERE `installments`.`AdmissionNo` = $AdmissionNo AND InstallmentDate LIKE '%$RecentPaidDate%'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 $InstallmentAmount=$idd['InstallmentAmount'];
		
	 }
	
 }
 
 $InstallmentAmount=$InstallmentAmount*-1;
 correctFee($con,$AdmissionNo,$InstallmentAmount);
 
 deleteInstallments($con,$AdmissionNo,$s);
 payFee($con,$AdmissionNo,$AmountPaid);
 }
 function payFee($con,$AdmissionNo,$AmountPaid)
 {
    
    //DIFFERENCIATE=============================================================================================


$sql = "select * from students WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 //$res = mysqli_query($con,$sql);
 
 $res =mysqli_query($con,$sql) or die("The Admission Number does not exist.");
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $StudentType=$idd['StudentType'];
		
		 //echo "y";
		
	 }
	
 }
 
 
 if ($StudentType=="Day Scholar"){
	 
 dayScholar($con,$AdmissionNo,$AmountPaid);}
                        else {
                            
                            
                             //$AmountPaid =0;
 $LunchScheme=0;
 $PE=0;
 $EW =0;
 $LT =0;
 $RMI =0;
 $Administration =0;
 
 $Activity =0;
 
 $AnnualFee =32150;
 $TermBalance=0;
 $Total=0;
 
 $TermOneFee=16000;
 $TermTwoFee=9720;
 $TermThreeFee=6430;
 
 $LunchScheme=$AmountPaid*0.65318818;
$PE=$AmountPaid*0.09642302;
$EW =$AmountPaid*0.0933126;
$LT =$AmountPaid*0.02021773;
$RMI =$AmountPaid*0.07465008;
$Administration =$AmountPaid*0.05754277;

$Activity =$AmountPaid*0.00466563;
 
 
 $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity', `Total` = `Total`+'$AmountPaid', `RecentPaidDate` = NOW() WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 $query="INSERT INTO `installments` (`AdmissionNo`, `InstallmentAmount`, `InstallmentDate`) VALUES ('$AdmissionNo', '$AmountPaid',NOW());";
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 //TERM BALANCE==========================================================================
 
 
 $sql = "select * from term WHERE TermId='2'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $TermName=$idd['TermName'];
		// echo $TermName;
		// echo "s";
		
	 }
	
 }
 
 
 $sql = "select * from `fee` WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $dbTermBalance=$idd['TermBalance'];
		 $Total=$idd['Total'];
		 
		
	 }
	
 }
 
 
 if ($TermName=="TERM 1")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 2")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 3")
                            $TermBalance = $dbTermBalance-$AmountPaid;
						
						$AnnualBalance=$AnnualFee-$Total;
						
						$query="UPDATE `fee` SET `TermBalance` = '$TermBalance',`AnnualBalance` = '$AnnualBalance' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 
						echo "Fee paid succesfully";
                            
                           echo "<script>window.location='http://34.73.97.17/Waondo/pages/receipt.php?AdmissionNo=$AdmissionNo&AmountPaid=$AmountPaid';</script>";
                        }


 }
 
 
 function dayScholar($con,$AdmissionNo,$AmountPaid){
//$AmountPaid =0;
 $LunchScheme=0;
 $PE=0;
 $EW =0;
 $LT =0;
 $RMI =0;
 $Administration =0;

 $Activity =0;
 
 $AnnualFee =12000;
 $TermBalance=0;
 $Total=0;
 
 $TermOneFee=6000;
 $TermTwoFee=3600;
 $TermThreeFee=2400;
 
 
$LunchScheme=$AmountPaid*1;
$PE=$AmountPaid*0;
$EW =$AmountPaid*0;
$LT =$AmountPaid*0;
$RMI =$AmountPaid*0;
$Administration =$AmountPaid*0;

$Activity =$AmountPaid*0;
 
 
 $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration', `Activity` = `Activity`+'$Activity', `Total` = `Total`+'$AmountPaid', `RecentPaidDate` = NOW() WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 $query="INSERT INTO `installments` (`AdmissionNo`, `InstallmentAmount`, `InstallmentDate`) VALUES ('$AdmissionNo', '$AmountPaid',NOW());";
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 
 //TERM BALANCE==========================================================================
 
 
 $sql = "select * from term WHERE TermId='2'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $TermName=$idd['TermName'];
		// echo $TermName;
		// echo "s";
		
	 }
	
 }
 
 
 $sql = "select * from `fee` WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $dbTermBalance=$idd['TermBalance'];
		 $Total=$idd['Total'];
		
	 }
	
 }
 
 
 if ($TermName=="TERM 1")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 2")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 3")
                            $TermBalance = $dbTermBalance-$AmountPaid;
						
						$AnnualBalance=$AnnualFee-$Total;
						
						$query="UPDATE `fee` SET `TermBalance` = '$TermBalance',`AnnualBalance` = '$AnnualBalance' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist."); 
 echo "Fee paid succesfully";
     
    echo "<script>window.location='http://34.73.97.17/Waondo/pages/receipt.php?AdmissionNo=$AdmissionNo&AmountPaid=$AmountPaid';</script>";
 }
 
 
 function deleteInstallments($con,$AdmissionNo,$s)
 {
     
   $sql = "DELETE FROM `installments` WHERE `installments`.`AdmissionNo` = $AdmissionNo AND InstallmentDate LIKE '%$s%'";  
     $res = mysqli_query($con,$sql);
     
 }
 
 function correctFee($con,$AdmissionNo,$AmountPaid)
 {
    
    //DIFFERENCIATE=============================================================================================


$sql = "select * from students WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 //$res = mysqli_query($con,$sql);
 
 $res =mysqli_query($con,$sql) or die("The Admission Number does not exist.");
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $StudentType=$idd['StudentType'];
		
		 //echo "y";
		
	 }
	
 }
 
 
 if ($StudentType=="Day Scholar"){
	 
 correctDayScholar($con,$AdmissionNo,$AmountPaid);}
                        else {
                            
                            
                             //$AmountPaid =0;
 $LunchScheme=0;
 $PE=0;
 $EW =0;
 $LT =0;
 $RMI =0;
 $Administration =0;
 
 $Activity =0;
 
 $AnnualFee =32150;
 $TermBalance=0;
 $Total=0;
 
 $TermOneFee=16000;
 $TermTwoFee=9720;
 $TermThreeFee=6430;
 
 $LunchScheme=$AmountPaid*0.65318818;
$PE=$AmountPaid*0.09642302;
$EW =$AmountPaid*0.0933126;
$LT =$AmountPaid*0.02021773;
$RMI =$AmountPaid*0.07465008;
$Administration =$AmountPaid*0.05754277;

$Activity =$AmountPaid*0.00466563;
 
 
 $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity', `Total` = `Total`+'$AmountPaid', `RecentPaidDate` = NOW() WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 $query="INSERT INTO `installments` (`AdmissionNo`, `InstallmentAmount`, `InstallmentDate`) VALUES ('$AdmissionNo', '$AmountPaid',NOW());";
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 //TERM BALANCE==========================================================================
 
 
 $sql = "select * from term WHERE TermId='2'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $TermName=$idd['TermName'];
		// echo $TermName;
		// echo "s";
		
	 }
	
 }
 
 
 $sql = "select * from `fee` WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $dbTermBalance=$idd['TermBalance'];
		 $Total=$idd['Total'];
		 
		
	 }
	
 }
 
 
 if ($TermName=="TERM 1")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 2")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 3")
                            $TermBalance = $dbTermBalance-$AmountPaid;
						
						$AnnualBalance=$AnnualFee-$Total;
						
						$query="UPDATE `fee` SET `TermBalance` = '$TermBalance',`AnnualBalance` = '$AnnualBalance' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 
						echo "Fee paid succesfully";
                            
                          
                        }


 }
 
     
 function correctDayScholar($con,$AdmissionNo,$AmountPaid){
//$AmountPaid =0;
 $LunchScheme=0;
 $PE=0;
 $EW =0;
 $LT =0;
 $RMI =0;
 $Administration =0;

 $Activity =0;
 
 $AnnualFee =12000;
 $TermBalance=0;
 $Total=0;
 
 $TermOneFee=6000;
 $TermTwoFee=3600;
 $TermThreeFee=2400;
 
 
$LunchScheme=$AmountPaid*1;
$PE=$AmountPaid*0;
$EW =$AmountPaid*0;
$LT =$AmountPaid*0;
$RMI =$AmountPaid*0;
$Administration =$AmountPaid*0;

$Activity =$AmountPaid*0;
 
 
 $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration', `Activity` = `Activity`+'$Activity', `Total` = `Total`+'$AmountPaid', `RecentPaidDate` = NOW() WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 $query="INSERT INTO `installments` (`AdmissionNo`, `InstallmentAmount`, `InstallmentDate`) VALUES ('$AdmissionNo', '$AmountPaid',NOW());";
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
 
 
 //TERM BALANCE==========================================================================
 
 
 $sql = "select * from term WHERE TermId='2'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $TermName=$idd['TermName'];
		// echo $TermName;
		// echo "s";
		
	 }
	
 }
 
 
 $sql = "select * from `fee` WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $dbTermBalance=$idd['TermBalance'];
		 $Total=$idd['Total'];
		
	 }
	
 }
 
 
 if ($TermName=="TERM 1")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 2")
                            $TermBalance = $dbTermBalance-$AmountPaid;
                        else if ($TermName=="TERM 3")
                            $TermBalance = $dbTermBalance-$AmountPaid;
						
						$AnnualBalance=$AnnualFee-$Total;
						
						$query="UPDATE `fee` SET `TermBalance` = '$TermBalance',`AnnualBalance` = '$AnnualBalance' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 // $response["success"] = TRUE
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die("The Admission Number does not exist."); 
 echo "Fee paid succesfully";
     
    
 }
 
 
 ?>
 
 
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
function validateForm() {
    var x = document.forms["myForm"]["AdmissionNo"].value;
	var y = document.forms["myForm"]["AmountPaid"].value;
	y =sanitizeString(y);
    if (x == ""||y == "") {
        alert("Kindly fill in every detail on the form");
        return false;
    }else if(x != ""&&y != ""&&y > 50000)
	{alert("You have entered "+y);
        return false;}
}

function sanitizeString(str){
    str = str.replace(/[^0-9]/gim,"");
    return str.trim();
}
</script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enter Student Admission Number and corrected fee</h3>
                    </div>
                    <div class="panel-body">
					
					<script>

</script>
                        <form name="myForm" action="" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Admission Number" name="AdmissionNo" type="text" autofocus>
                                </div>
								 <div class="form-group">
                                    <input class="form-control" placeholder="Correct Fee" name="AmountPaid" type="text" autofocus>
                                </div>
								 
                                
                                <!-- Change this to a button or input when using this as a form -->
                                 <button type="submit" class="btn btn-lg btn-success btn-block">Submit</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
