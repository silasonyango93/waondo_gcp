<?php
 require_once('dbConnect.php');
 



 
 $AdmissionNo=$_GET['AdmissionNo'];

 $DayScholar="Day Scholar";
 
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
 if($StudentType=="Day Scholar")
 {
     echo "<script>alert('This student is already a Day Scholar according to our records.');</script>";
     
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
 
 
 $LunchScheme=$Total*1;
 $d=date('F');
 
 if ($TermName=="TERM 1" && $d!="February"){
     $PayableAnnualTotal=12000;
     
     $query="UPDATE `students` SET `StudentType` = '$DayScholar' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = $LunchScheme, `PE` = 0, `EW` = 0, `LT` = 0, `RMI` = 0, `Administration` = 0,  `Activity` = 0,`TermBalance` = `TermBalance`-14000,`AnnualBalance` = '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
 else if($TermName=="TERM 1" && $d=="February"){
     $DayScholarTermTwoPayableAmount=3600;
    $DayScholarTermThreePayableAmount=2400;
    $RemainingHalfOfDayScholarTermOneTermBalance=3000;
     $RemainingHalfOfBoardingTermOneTermBalance=10000;
     $PayableAnnualTotal=$DayScholarTermTwoPayableAmount+$DayScholarTermThreePayableAmount+$RemainingHalfOfDayScholarTermOneTermBalance+$RemainingHalfOfBoardingTermOneTermBalance;
     
     $query="UPDATE `students` SET `StudentType` = '$DayScholar' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = $LunchScheme, `PE` = 0, `EW` = 0, `LT` = 0, `RMI` = 0, `Administration` = 0,  `Activity` = 0,`TermBalance` = `TermBalance`-'$RemainingHalfOfBoardingTermOneTermBalance'+'$RemainingHalfOfDayScholarTermOneTermBalance',`AnnualBalance` = '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
                        else if ($TermName=="TERM 2" && $d!="June"){
                            $BoardingTermOnePayableAmount=20000;
                            $DayScholarTermTwoPayableAmount=3600;
                            $DayScholarTermThreePayableAmount=2400;
                            $PayableAnnualTotal=$BoardingTermOnePayableAmount+$DayScholarTermTwoPayableAmount+$DayScholarTermThreePayableAmount;
                            $query="UPDATE `students` SET `StudentType` = '$DayScholar' WHERE `students`.`AdmissionNo` = $AdmissionNo";
                            
                            
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = $LunchScheme, `PE` = 0, `EW` = 0, `LT` = 0, `RMI` = 0, `Administration` = 0,  `Activity` = 0,`TermBalance` = `TermBalance`-7400,`AnnualBalance` = '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
  else if ($TermName=="TERM 2" && $d=="June"){
                            $BoardingTermOnePayableAmount=20000;
                            $RemainingHalfOfDayScholarTermTwoTermBalance=1800;
                            $RemainingHalfOfBoardingTermTwoTermBalance=5500;
                            $DayScholarTermThreePayableAmount=2400;
                            $PayableAnnualTotal=$BoardingTermOnePayableAmount+$RemainingHalfOfDayScholarTermTwoTermBalance+$RemainingHalfOfBoardingTermTwoTermBalance+$DayScholarTermThreePayableAmount;
                            $query="UPDATE `students` SET `StudentType` = '$DayScholar' WHERE `students`.`AdmissionNo` = $AdmissionNo";
                            
                            
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = $LunchScheme, `PE` = 0, `EW` = 0, `LT` = 0, `RMI` = 0, `Administration` = 0,  `Activity` = 0,`TermBalance` = `TermBalance`-'$RemainingHalfOfBoardingTermTwoTermBalance'+'$RemainingHalfOfDayScholarTermTwoTermBalance',`AnnualBalance` = '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
                        else if ($TermName=="TERM 3" && $d!="October"){
                            $BoardingTermOnePayableAmount=20000;
                            $BoardingTermTwoPayableAmount=11000;
                            $DayScholarTermThreePayableAmount=2400;
                            $PayableAnnualTotal=$BoardingTermOnePayableAmount+$BoardingTermTwoPayableAmount+$DayScholarTermThreePayableAmount;
                            $query="UPDATE `students` SET `StudentType` = '$DayScholar' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = $LunchScheme, `PE` = 0, `EW` = 0, `LT` = 0, `RMI` = 0, `Administration` = 0,  `Activity` = 0,`TermBalance` = `TermBalance`-4750,`AnnualBalance` = '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
  else if ($TermName=="TERM 3" && $d=="October"){
                             $BoardingTermOnePayableAmount=20000;
                              $BoardingTermTwoPayableAmount=11000;
                            $RemainingHalfOfDayScholarTermThreeTermBalance=1200;
                            $RemainingHalfOfBoardingTermThreeTermBalance=3575;
                            $PayableAnnualTotal=$BoardingTermOnePayableAmount+$BoardingTermTwoPayableAmount+$RemainingHalfOfDayScholarTermThreeTermBalance+$RemainingHalfOfBoardingTermThreeTermBalance;
                            $query="UPDATE `students` SET `StudentType` = '$DayScholar' WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");
     
     
                            $query="UPDATE `fee` SET `LunchScheme` = $LunchScheme, `PE` = 0, `EW` = 0, `LT` = 0, `RMI` = 0, `Administration` = 0,  `Activity` = 0,`TermBalance` = `TermBalance`-'$RemainingHalfOfBoardingTermThreeTermBalance'+'$RemainingHalfOfDayScholarTermThreeTermBalance',`AnnualBalance` = '$PayableAnnualTotal'-'$Total' WHERE `fee`.`AdmissionNo` = $AdmissionNo";
                            
                            echo "<script>window.location='http://34.73.97.17/Waondo/pages/changedInvoice.php?AdmissionNo=$AdmissionNo';</script>";
 
 mysqli_query($con,$query) or die("The Admission Number does not exist.");}
						
						
 
 
					/*	echo "Fee paid succesfully";
                            
                           echo "<script>window.location='http://34.73.97.17/Waondo/pages/receipt.php?AdmissionNo=$AdmissionNo&AmountPaid=$AmountPaid';</script>";*/
                        


 mysqli_close($con);}
 
 
 
 
 
 
 ?>
 
