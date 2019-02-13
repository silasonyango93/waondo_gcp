<?php
 require_once('dbConnect.php');
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 $ClassName =$_POST["ClassName"];
 $ClassTeacher =$_POST["ClassTeacher"];
 
 

 
 
 
 $query="INSERT INTO `class` (`ClassName`, `ClassTeacher`) VALUES ('$ClassName', '$ClassTeacher');"; 
 // $response["success"] = TRUE
// echo json_encode($response);
 mysqli_query($con,$query) or die(mysqli_error($con));
 mysqli_close($con);}
 ?>
 
 <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
   
	ClassName:<br>
    <input name="ClassName" type="text" value="" size="30"/><br> 
	ClassTeacher:<br>
    <input name="ClassTeacher" type="text" value="" size="30"/><br> 
	
	
	
	 <input type="submit" value="Send"/> 
	 </form>
	
 