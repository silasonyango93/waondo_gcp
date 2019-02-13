<?php
 require_once('dbConnect.php');
 
 



 
 $AdmissionNo=$_GET['AdmissionNo'];

 $Border="Border";
 
 $AdmissionNo = (int) preg_replace('/[^0-9]/', '', $AdmissionNo);
 
 
 




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
 if($StudentType=="Border")
 {
     echo "<script>alert('This student is already a border according to our records.');</script>";
     
     echo "<script>window.location='http://34.73.97.17/Waondo/pages/displayFee.php?AdmissionNo=$AdmissionNo';</script>";
 }
 else{
     
     
 
 
 
 
 $sql = "select * from term WHERE TermId='2'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $TermName=$idd['TermName'];
		
		
	 }
	
 }
 
 
 $sql = "select * from `fee` WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 $Total=$idd['Total'];
		 
		
	 }
	
 }
 
 
 $LunchScheme=$Total*0.6815203145;
$PE=$Total*0.0812581913;
$EW =$Total*0.1048492792;
$LT =$Total*0.0170380079;
$RMI =$Total*0.0629095675;
$Administration =$Total*0.0484927916;
$GrossAnnualBalance=38150;
$Activity =$Total*0.003931848;
 $d=date('F');
 
 if ($TermName=="TERM 1" && $d!="February"){
     $TermOneDayBoardingTermBalanceDifference=14000;
     
     $query="UPDATE `students` SET `StudentType` = '$Border' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity',`TermBalance` = `TermBalance`+'$TermOneDayBoardingTermBalanceDifference',`AnnualBalance`= '$GrossAnnualBalance'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
else if ($TermName=="TERM 1" && $d=="February"){
    $BoardingTermTwoPayableAmount=11000;
    $BoardingTermThreePayableAmount=7150;
    $RemainingHalfOfDayScholarTermOneTermBalance=3000;
     $RemainingHalfOfBoardingTermOneTermBalance=10000;
     $PayableAnnualTotal=$RemainingHalfOfDayScholarTermOneTermBalance+$RemainingHalfOfBoardingTermOneTermBalance+$BoardingTermTwoPayableAmount+$BoardingTermThreePayableAmount;
     
     $query="UPDATE `students` SET `StudentType` = '$Border' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity',`TermBalance` = `TermBalance`-'$RemainingHalfOfDayScholarTermOneTermBalance'+'$RemainingHalfOfBoardingTermOneTermBalance',`AnnualBalance`= '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
 
 echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
                        else if ($TermName=="TERM 2" && $d!="June"){
                            $DayScholarTermOnePayableAmount=6000;
                            $BoardingTermTwoPayableAmount=11000;
                            $BoardingTermThreePayableAmount=7150;
                            $PayableAnnualTotal=$BoardingTermTwoPayableAmount+$BoardingTermThreePayableAmount+$DayScholarTermOnePayableAmount;
                            $query="UPDATE `students` SET `StudentType` = '$Border' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity',`TermBalance` = `TermBalance`+7400,`AnnualBalance` = $PayableAnnualTotal-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
 else if ($TermName=="TERM 2" && $d=="June"){
     
                            $DayScholarTermOnePayableAmount=6000;
                            $RemainingHalfOfDayScholarTermTwoTermBalance=1800;
                            $RemainingHalfOfBoardingTermTwoTermBalance=5500;
                            $BoardingTermThreePayableAmount=7150;
                            $PayableAnnualTotal=$DayScholarTermOnePayableAmount+$RemainingHalfOfDayScholarTermTwoTermBalance+$RemainingHalfOfBoardingTermTwoTermBalance+$BoardingTermThreePayableAmount;
                            
                            $query="UPDATE `students` SET `StudentType` = '$Border' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity',`TermBalance` = `TermBalance`-'$RemainingHalfOfDayScholarTermTwoTermBalance'+'$RemainingHalfOfBoardingTermTwoTermBalance',`AnnualBalance` = $PayableAnnualTotal-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
                        else if ($TermName=="TERM 3" && $d!="October"){
                            $DayScholarTermOnePayableAmount=6000;
                            $DayScholarTermTwoPayableAmount=3600;
                            $BoardingTermThreePayableAmount=7150;
                            $PayableAnnualTotal=$DayScholarTermTwoPayableAmount+$BoardingTermThreePayableAmount+$DayScholarTermOnePayableAmount;
                            $query="UPDATE `students` SET `StudentType` = '$Border' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity',`TermBalance` = `TermBalance`+4750,`AnnualBalance` =$PayableAnnualTotal-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
  else if ($TermName=="TERM 3" && $d=="October"){
                            $DayScholarTermOnePayableAmount=6000;
                            $RemainingHalfOfDayScholarTermThreeTermBalance=1200;
                            $RemainingHalfOfBoardingTermThreeTermBalance=3575;
                            $DayScholarTermTwoPayableAmount=3600;
                            $PayableAnnualTotal=$DayScholarTermOnePayableAmount+$DayScholarTermTwoPayableAmount+$RemainingHalfOfDayScholarTermThreeTermBalance+$RemainingHalfOfBoardingTermThreeTermBalance;
                            $query="UPDATE `students` SET `StudentType` = '$Border' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = `LunchScheme`+'$LunchScheme', `PE` = `PE`+'$PE', `EW` = `EW`+'$EW', `LT` = `LT`+'$LT', `RMI` = `RMI`+'$RMI', `Administration` = `Administration`+'$Administration',  `Activity` = `Activity`+'$Activity',`TermBalance` = `TermBalance`+'$RemainingHalfOfDayScholarTermThreeTermBalance'+'$RemainingHalfOfBoardingTermThreeTermBalance',`AnnualBalance` =$PayableAnnualTotal-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
						
						
 
 
					/*	echo "Fee paid succesfully";
                            
                           echo "<script>window.location='http://34.73.97.17/Waondo/pages/receipt.php?AdmissionNo=$AdmissionNo&AmountPaid=$AmountPaid';</script>";*/
                        


 mysqli_close($con);}
 
 
 
 
 
 
 ?>
 
