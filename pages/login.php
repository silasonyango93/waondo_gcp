<?php
require_once 'DB_Functions.php';
require_once('connection.php');

//session_unset();

// destroy the session
//session_destroy(); 
					

session_start();

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

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                 <button type="submit" class="btn btn-lg btn-success btn-block">Login</a>
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


<?php

include 'fireBaseFunctions.php';
$db = new DB_Functions();



 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['email']) && isset($_POST['password'])) {
 
    // receiving the post params
    $email = $_POST['email'];
    $password = $_POST['password'];
 //header("http://localhost/Waondo/pages/registerStudent.php");
    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($email, $password);
 
    if ($user != false) {
		
		
//Alerting the Principal

$sql = "select * from `users` WHERE `users`.`id`=72";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 $firebase_token=$idd['token_value'];
		 
		 //echo $firebase_token;
		 
		
	 }
	
 }
 
 $sql = "select * from `users` WHERE `users`.`email` LIKE '%$email%'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 $name=$idd['name'];
		 $LoggerId=$idd['id'];
		 
		 
		 
		
	 }
	
 }
 
 $message = array
          (
		'body' 	=> 'Sir, '.$name.' has just logged into the system.',
		'title'	=> 'Log in',
		'click_action' => 'BOOKINGS',
	'NewsId' => $LoggerId,
             	
          );
          
          send_notifications($firebase_token, $message);
          
          
          $_SESSION["CurrentUserId"] = $LoggerId;
$_SESSION["CurrentUserName"] = $name;
$_SESSION["CurrentToken"] = $firebase_token;
		
	
		
	//*************************************************************************************************************************************
	
	$d=date('F');
	
	//$d="December";
	$query11="UPDATE `month` SET `Month` = '$d' WHERE `month`.`MonthId` = 1";
 
 mysqli_query($con,$query11) or die(mysqli_error($con));
 
 if($d=="January"||$d=="February"||$d=="March"||$d=="May"||$d=="June"||$d=="July"||$d=="September"||$d=="October"||$d=="November")
 {$query12="UPDATE `month` SET `Sync` = 'Not Synchronised' WHERE `month`.`MonthId` = 1";
 
 mysqli_query($con,$query12) or die(mysqli_error($con));}
	
	if($d=="December"||$d=="January"||$d=="February"||$d=="March")
	{$Term="TERM 1";}
else if($d=="April"||$d=="May"||$d=="June"||$d=="July")
		{$Term="TERM 2";}
	else if($d=="August"||$d=="September"||$d=="October"||$d=="November")
			{$Term="TERM 3";}
		
		$query12="UPDATE `term` SET `TermName` = '$Term' WHERE `term`.`TermId` = 2";
 
 mysqli_query($con,$query12) or die(mysqli_error($con)); 
 
 
 
 
 
 
 
 
 //SYNCHRONIZING FEE
 
 
 //99999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999
 
 
 
 
 
 
 $sql = "select * from month WHERE MonthId='1'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $month=$idd['Month'];
		
		
	 }
	
 }

	//$month="December";
	
	if($month=="April")
	{
		
		$sql = "select * from month WHERE `month`.`MonthId` = 1";
 
 //$res = mysqli_query($con,$sql);
 
 $res =mysqli_query($con,$sql) or die("The Admission Number does not exist.");
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $Sync=$idd['Sync'];
		
		 //echo "y";
		
	 }
	
 }
 
 if($Sync=="Synchronised")
 
  
 {echo "<script>window.location='http://34.73.97.17/Waondo/pages/displayFee.php';</script>";
		exit;}else{
		
		
		
		//********************************************************APRILL
		
		 $sql ="SELECT * FROM `students` INNER JOIN `fee` ON `students`.`AdmissionNo`=`fee`.`AdmissionNo`;";
		 
		 
 
$res = mysqli_query($con,$sql);


 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 //$TermName=$idd['TermName'];
		 $AdmissionNo=$idd['AdmissionNo'];
		 $CarryForwardAmount=$idd['TermBalance'];
		 $StudentType=$idd['StudentType'];
		 
		 if($CarryForwardAmount<0)
		 {$AmountPaid=abs($CarryForwardAmount);}else
		 {$AmountPaid=0;}
		 
		 
		 $Total =$idd['Total'];
		 
		$sql1 ="INSERT INTO `carryforward` (`AdmissionNo`, `CarryForwardAmount`, `DateCarriedForward`) VALUES ('$AdmissionNo', '$CarryForwardAmount',NOW());";
		$res1 = mysqli_query($con,$sql1);
		
		
		
		
		if($StudentType=="Day Scholar"){
			$AnnualFee =12000;
			$LunchScheme=$AmountPaid*1;
$PE=$AmountPaid*0;
$EW =$AmountPaid*0;
$LT =$AmountPaid*0;
$RMI =$AmountPaid*0;
$Administration =$AmountPaid*0;

$Activity =$AmountPaid*0;

			
			$TermOneFee=6000;
 $TermTwoFee=3600;
 $TermThreeFee=2400;
	
 $TermBalance=$TermTwoFee+$CarryForwardAmount;
 
 $query="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Activity` = '$Activity', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query) or die(mysqli_error($con));}
 
 
 
 
 else if($StudentType=="Border" ){
$AnnualFee =38150;
$LunchScheme=$AmountPaid*0.6815203145;
$PE=$AmountPaid*0.0812581913;
$EW =$AmountPaid*0.1048492792;
$LT =$AmountPaid*0.0170380079;
$RMI =$AmountPaid*0.0629095675;
$Administration =$AmountPaid*0.0484927916;
$Activity =$AmountPaid*0.003931848;
$TermOneFee=20000;
$TermTwoFee=11000;
$TermThreeFee=7150;
 
 $TermBalance=$TermTwoFee+$CarryForwardAmount;
 $query1="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Activity` = '$Activity', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query1) or die(mysqli_error($con));}
 

 
 
	 }
	
 }
		
	$query13="UPDATE `month` SET `Sync` = 'Synchronised' WHERE `month`.`MonthId` = 1";
 
		mysqli_query($con,$query13) or die(mysqli_error($con));}}
else if($month=="August")
{
//******************************************August
$sql = "select * from month WHERE `month`.`MonthId` = 1";
 
 //$res = mysqli_query($con,$sql);
 
 $res =mysqli_query($con,$sql) or die("The Admission Number does not exist.");
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $Sync=$idd['Sync'];
		
		 //echo "y";
		
	 }
	
 }
 
 if($Sync=="Synchronised")
 {echo "<script>window.location='http://34.73.97.17/Waondo/pages/displayFee.php';</script>";
		exit;}else{

		
		
		  $sql2 = "select * from students INNER JOIN fee ON students.AdmissionNo=fee.AdmissionNo";
 
 $res2 = mysqli_query($con,$sql2);
 
 if($res2)
 {
	 while($idd=mysqli_fetch_assoc($res2)){
		 //$TermName=$idd['TermName'];
		 $AdmissionNo=$idd['AdmissionNo'];
		 $CarryForwardAmount=$idd['TermBalance'];
		 $StudentType=$idd['StudentType'];
		 if($CarryForwardAmount<0)
		 {$AmountPaid=abs($CarryForwardAmount);}else
		 {$AmountPaid=0;}
		 
		 
		 $Total =$idd['Total'];
		 
		$sql3 ="INSERT INTO `carryforward` (`AdmissionNo`, `CarryForwardAmount`, `DateCarriedForward`) VALUES ('$AdmissionNo', '$CarryForwardAmount',NOW());";
		$res3 = mysqli_query($con,$sql3);
		
		
		
		
		if($StudentType=="Day Scholar"){
			$AnnualFee =12000;
			$LunchScheme=$AmountPaid*1;
$PE=$AmountPaid*0;
$EW =$AmountPaid*0;
$LT =$AmountPaid*0;
$RMI =$AmountPaid*0;
$Administration =$AmountPaid*0;

$Activity =$AmountPaid*0;

			
			$TermOneFee=6000;
 $TermTwoFee=3600;
 $TermThreeFee=2400;
	
 $TermBalance=$TermThreeFee+$CarryForwardAmount;
 
 $query3="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Activity` = '$Activity', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query3) or die(mysqli_error($con));}
 
 
 
 
 else if($StudentType=="Border" ){
$AnnualFee =38150;
$LunchScheme=$AmountPaid*0.6815203145;
$PE=$AmountPaid*0.0812581913;
$EW =$AmountPaid*0.1048492792;
$LT =$AmountPaid*0.0170380079;
$RMI =$AmountPaid*0.0629095675;
$Administration =$AmountPaid*0.0484927916;
$Activity =$AmountPaid*0.003931848;
$TermOneFee=20000;
$TermTwoFee=11000;
$TermThreeFee=7150;
 
 $TermBalance=$TermThreeFee+$CarryForwardAmount;
 $query4="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Activity` = '$Activity', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query4) or die(mysqli_error($con));}
 

 
 
	 }
	
 }
		
		
	
	
$query14="UPDATE `month` SET `Sync` = 'Synchronised' WHERE `month`.`MonthId` = 1";
 
mysqli_query($con,$query14) or die(mysqli_error($con));}}

else if($month=="December")
{
	
	//**********************************************************DECEMBER
	
	$sql = "select * from month WHERE `month`.`MonthId` = 1";
 
 //$res = mysqli_query($con,$sql);
 
 $res =mysqli_query($con,$sql) or die("The Admission Number does not exist.");
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $Sync=$idd['Sync'];
		
		 //echo "y";
		
	 }
	
 }
 
 if($Sync=="Synchronised")
 {echo "<script>window.location='http://34.73.97.17/Waondo/pages/displayFee.php';</script>";
		exit;}else{
		
		  $sql5 = "select * from students INNER JOIN fee ON students.AdmissionNo=fee.AdmissionNo";
 
 $res5 = mysqli_query($con,$sql5);
 
 if($res5)
 {
	 while($idd=mysqli_fetch_assoc($res5)){
		 //$TermName=$idd['TermName'];
		 $AdmissionNo=$idd['AdmissionNo'];
		 $CarryForwardAmount=$idd['TermBalance'];
		 $StudentType=$idd['StudentType'];
		 if($CarryForwardAmount<0)
		 {$AmountPaid=abs($CarryForwardAmount);}else
		 {$AmountPaid=0;}
		 
		 
		 $Total =$idd['Total'];
		 
		$sql6 ="INSERT INTO `carryforward` (`AdmissionNo`, `CarryForwardAmount`, `DateCarriedForward`) VALUES ('$AdmissionNo', '$CarryForwardAmount',NOW());";
		$res6 = mysqli_query($con,$sql6);
		
		
		
		
		if($StudentType=="Day Scholar"){
			$AnnualFee =12000;
			$LunchScheme=$AmountPaid*1;
$PE=$AmountPaid*0;
$EW =$AmountPaid*0;
$LT =$AmountPaid*0;
$RMI =$AmountPaid*0;
$Administration =$AmountPaid*0;

$Activity =$AmountPaid*0;

			
			$TermOneFee=6000;
 $TermTwoFee=3600;
 $TermThreeFee=2400;
	
 $TermBalance=$TermOneFee+$CarryForwardAmount;
 if($CarryForwardAmount<0)
		 {$Total=abs($CarryForwardAmount);}else
		 {$Total=0;}
 $query7="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Activity` = '$Activity', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance',`Total` = '$Total', `AnnualBalance` = '$AnnualFee' + '$CarryForwardAmount' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query7) or die(mysqli_error($con));
 


 //Class Promotions
 
 $sql = "select * from students WHERE AdmissionNo= $AdmissionNo";
 $res = mysqli_query($con,$sql);
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $ClassId=$idd['ClassId'];
		}
	}
	
	
	if($ClassId==2){
	    $NextClass=5;
	 	$query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist.");   
	}else if($ClassId==3){
	    $NextClass=7;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==4){
	    $NextClass=6;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==5){
	    $NextClass=8;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==6){
	    $NextClass=9;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==7){
	    $NextClass=10;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==8){
	    $NextClass=11;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==9){
	    $NextClass=12;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==10){
	    $NextClass=13;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==11){
	    $CompletedSchool=1;
	    $query="UPDATE `students` SET `CompletedSchool` = '$CompletedSchool' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==12){
	    $CompletedSchool=1;
	    $query="UPDATE `students` SET `CompletedSchool` = '$CompletedSchool' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==13){
	    $CompletedSchool=1;
	    $query="UPDATE `students` SET `CompletedSchool` = '$CompletedSchool' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}
	
 
 
 

 }
 
 
 
 
 else if($StudentType=="Border" ){
$AnnualFee =38150;
$LunchScheme=$AmountPaid*0.6815203145;
$PE=$AmountPaid*0.0812581913;
$EW =$AmountPaid*0.1048492792;
$LT =$AmountPaid*0.0170380079;
$RMI =$AmountPaid*0.0629095675;
$Administration =$AmountPaid*0.0484927916;
$Activity =$AmountPaid*0.003931848;
$TermOneFee=20000;
$TermTwoFee=11000;
$TermThreeFee=7150;
 
 $TermBalance=$TermOneFee+$CarryForwardAmount;
 if($CarryForwardAmount<0)
		 {$Total=abs($CarryForwardAmount);}else
		 {$Total=0;}
 $query8="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Activity` = '$Activity', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance',`Total` = '$Total', `AnnualBalance` = '$AnnualFee' + '$CarryForwardAmount' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query8) or die(mysqli_error($con));
 
 
 
 
 
  //Class Promotions
 
 $sql = "select * from students WHERE AdmissionNo= $AdmissionNo";
 $res = mysqli_query($con,$sql);
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $ClassId=$idd['ClassId'];
		}
	}
	
	
	if($ClassId==2){
	    $NextClass=5;
	 	$query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist.");   
	}else if($ClassId==3){
	    $NextClass=7;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==4){
	    $NextClass=6;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==5){
	    $NextClass=8;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==6){
	    $NextClass=9;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==7){
	    $NextClass=10;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==8){
	    $NextClass=11;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==9){
	    $NextClass=12;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==10){
	    $NextClass=13;
	    $query="UPDATE `students` SET `ClassId` = '$NextClass' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==11){
	    $CompletedSchool=1;
	    $query="UPDATE `students` SET `CompletedSchool` = '$CompletedSchool' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==12){
	    $CompletedSchool=1;
	    $query="UPDATE `students` SET `CompletedSchool` = '$CompletedSchool' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}else if($ClassId==13){
	    $CompletedSchool=1;
	    $query="UPDATE `students` SET `CompletedSchool` = '$CompletedSchool' WHERE `students`.`AdmissionNo` = $AdmissionNo";
        mysqli_query($con,$query) or die("The Admission Number does not exist."); 
	}
	
 
 
 
     
     
 }
 
 
 

 
 
	 }
	
 }
		
	
$query15="UPDATE `month` SET `Sync` = 'Synchronised' WHERE `month`.`MonthId` = 1";
 
mysqli_query($con,$query15) or die(mysqli_error($con));}}else{echo "Fees already synchronised";
    
    	echo "<script>window.location='http://34.73.97.17/Waondo/pages/displayFee.php';</script>";
		exit;
}
 
 
 
 
 
 
 
 
 //999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999

	
	
	
	
	//***************************************************************************************************************************************
	
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode("Login credentials are wrong. Please try again!");
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode("Email or Password is missing!");
}

