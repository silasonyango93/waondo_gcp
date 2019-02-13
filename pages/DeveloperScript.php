<?php
 require_once('dbConnect.php');
 
/*$s="Day Scholar";
 
 $sql = "select * from students INNER JOIN fee ON students.AdmissionNo=fee.AdmissionNo WHERE students.ClassId=11 AND StudentType LIKE '%$s%' AND students.CompletedSchool=1 OR students.ClassId=12 AND StudentType LIKE '%$s%' AND students.CompletedSchool=1 OR students.ClassId=13 AND StudentType LIKE '%$s%' AND students.CompletedSchool=1";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 
		 //$TermBalance=$idd['TermBalance'];
		 $AdmissionNumber=$idd['AdmissionNo'];
		 
		 
		 $query="UPDATE `fee` SET `AnnualBalance` = `AnnualBalance`-12000,`TermBalance` = `TermBalance`-6000 WHERE `AdmissionNo`='$AdmissionNumber';"; 
 
 mysqli_query($con,$query) or die(mysqli_error($con));
		 
		
	 }
	
 }
 
 */
 mysqli_close($con);
 
 
 
 
 
 
 ?>
 
