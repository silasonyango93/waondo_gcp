<?php

require_once('dbConnect.php');


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
 if($CarryForwardAmount<0)
		 {$Total=abs($CarryForwardAmount);}else
		 {$Total=0;}
 $query7="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance',`Total` = '$Total', `AnnualBalance` = '$AnnualFee' + '$CarryForwardAmount' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
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
 if($CarryForwardAmount<0)
		 {$Total=abs($CarryForwardAmount);}else
		 {$Total=0;}
 $query8="UPDATE `fee` SET `LunchScheme` = '$LunchScheme', `PE` = '$PE', `EW` ='$EW', `LT` = '$LT', `RMI` = '$RMI', `Administration` = '$Administration', `Insuarance` = '$Insuarance', `Activity` = '$Activity', `Medical` = '$Medical', `RecentPaidDate` = NOW(), `TermBalance` = '$TermBalance',`Total` = '$Total', `AnnualBalance` = '$AnnualFee' + '$CarryForwardAmount' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 mysqli_query($con,$query8) or die(mysqli_error($con));
 
 $query8="DELETE FROM installments;";
 mysqli_query($con,$query8) or die(mysqli_error($con));}
 

 
 
	 }
	
 }
		
	
}else{echo "Fees already synchronised";}
?>