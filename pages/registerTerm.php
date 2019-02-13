<?php
 require_once('dbConnect.php');
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 $TermName =$_POST["TermName"];


 $query="UPDATE `term` SET `TermName` = '$TermName' WHERE `TermId`='2' ;"; 
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die(mysqli_error($con));
 mysqli_close($con);}
 ?>
 
 <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
   
	TermName:<br>
    <input name="TermName" type="text" value="" size="30"/><br> 
	
	
	
	 <input type="submit" value="Send"/> 
	 </form>
	
 