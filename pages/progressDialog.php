
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
                        <h3 class="panel-title">Synchronizing fees</h3>
                    </div>
                    <div class="panel-body">
                        <div>
                                    <p>
                                        <strong>Synchronizaing...</strong>
										
										
										<?php 
										

require_once('dbConnect.php');

	$month="December";
	
	if($month=="April")
	{
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
			$AnnualFee =21365;
			$LunchScheme=$AmountPaid*0.56166628;
$PE=$AmountPaid*0.14299087;
$EW =$AmountPaid*0.07722911;
$LT =$AmountPaid*0.04820969;
$RMI =$AmountPaid*0.05073719;
$Administration =$AmountPaid*0.03604025;
$Insuarance =$AmountPaid*0.03323192;
$Activity =$AmountPaid*0.03070442;
$Medical =$AmountPaid*0.01919026;
			
			$TermOneFee=10700;
 $TermTwoFee=6800;
 $TermThreeFee=3865;
	
 $TermBalance=$TermTwoFee+$CarryForwardAmount;
 
 $query="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query) or die(mysqli_error($con));}
 
 
 
 
 else if($StudentType=="Border" ){
	 $AnnualFee =37983;
	 $LunchScheme=$AmountPaid*0.63186162;
$PE=$AmountPaid*0.12460838;
$EW =$AmountPaid*0.06055341;
$LT =$AmountPaid*0.03422584;
$RMI =$AmountPaid*0.05265514;
$Administration =$AmountPaid*0.03949135;
$Insuarance =$AmountPaid*0.02790722;
$Activity =$AmountPaid*0.02079878;
$Medical =$AmountPaid*0.009477924;
	 
	 $TermOneFee=19000;
 $TermTwoFee=11400;
 $TermThreeFee=7583;
 
 $TermBalance=$TermTwoFee+$CarryForwardAmount;
 $query1="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query1) or die(mysqli_error($con));}
 

 
 
	 }
	
 }
		
	}
else if($month=="August")
{
//******************************************August


		
		
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
			$AnnualFee =21365;
			$LunchScheme=$AmountPaid*0.56166628;
$PE=$AmountPaid*0.14299087;
$EW =$AmountPaid*0.07722911;
$LT =$AmountPaid*0.04820969;
$RMI =$AmountPaid*0.05073719;
$Administration =$AmountPaid*0.03604025;
$Insuarance =$AmountPaid*0.03323192;
$Activity =$AmountPaid*0.03070442;
$Medical =$AmountPaid*0.01919026;
			
			$TermOneFee=10700;
 $TermTwoFee=6800;
 $TermThreeFee=3865;
	
 $TermBalance=$TermThreeFee+$CarryForwardAmount;
 
 $query3="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query3) or die(mysqli_error($con));}
 
 
 
 
 else if($StudentType=="Border" ){
	 $AnnualFee =37983;
	 $LunchScheme=$AmountPaid*0.63186162;
$PE=$AmountPaid*0.12460838;
$EW =$AmountPaid*0.06055341;
$LT =$AmountPaid*0.03422584;
$RMI =$AmountPaid*0.05265514;
$Administration =$AmountPaid*0.03949135;
$Insuarance =$AmountPaid*0.02790722;
$Activity =$AmountPaid*0.02079878;
$Medical =$AmountPaid*0.009477924;
	 
	 $TermOneFee=19000;
 $TermTwoFee=11400;
 $TermThreeFee=7583;
 
 $TermBalance=$TermThreeFee+$CarryForwardAmount;
 $query4="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance', `AnnualBalance` = '$AnnualFee' - '$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query4) or die(mysqli_error($con));}
 

 
 
	 }
	
 }
		
		
	
	
}
else if($month=="December")
{
	
	//**********************************************************DECEMBER
	
	
		//********************************************************APRILL
		
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
			$AnnualFee =21365;
			$LunchScheme=$AmountPaid*0.56166628;
$PE=$AmountPaid*0.14299087;
$EW =$AmountPaid*0.07722911;
$LT =$AmountPaid*0.04820969;
$RMI =$AmountPaid*0.05073719;
$Administration =$AmountPaid*0.03604025;
$Insuarance =$AmountPaid*0.03323192;
$Activity =$AmountPaid*0.03070442;
$Medical =$AmountPaid*0.01919026;
			
			$TermOneFee=10700;
 $TermTwoFee=6800;
 $TermThreeFee=3865;
	
 $TermBalance=$TermOneFee+$CarryForwardAmount;
 
 $query7="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance',`Total` = '$AmountPaid', `AnnualBalance` = '$AnnualFee' + '$CarryForwardAmount' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query7) or die(mysqli_error($con));
 
 $query8="DELETE FROM installments;";
 mysqli_query($con,$query8) or die(mysqli_error($con));
 }
 
 
 
 
 else if($StudentType=="Border" ){
	 $AnnualFee =37983;
	 $LunchScheme=$AmountPaid*0.63186162;
$PE=$AmountPaid*0.12460838;
$EW =$AmountPaid*0.06055341;
$LT =$AmountPaid*0.03422584;
$RMI =$AmountPaid*0.05265514;
$Administration =$AmountPaid*0.03949135;
$Insuarance =$AmountPaid*0.02790722;
$Activity =$AmountPaid*0.02079878;
$Medical =$AmountPaid*0.009477924;
	 
	 $TermOneFee=19000;
 $TermTwoFee=11400;
 $TermThreeFee=7583;
 
 $TermBalance=$TermTwoFee+$CarryForwardAmount;
 $query8="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance',`Total` = '$CarryForwardAmount', `AnnualBalance` = '$AnnualFee' + '$CarryForwardAmount' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query8) or die(mysqli_error($con));
 
 $query8="DELETE FROM installments;";
 mysqli_query($con,$query8) or die(mysqli_error($con));}
 

 
 
	 }
	
 }
		
	
}
?>
										
										
										
										
										
										
										
										
										
										
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
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
