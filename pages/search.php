<?php
 require_once('dbConnect.php');
$s =$_POST["Search"];


//$s=8032; 
 

 $sql = "SELECT * FROM students INNER JOIN fee ON students.AdmissionNo=fee.AdmissionNo INNER JOIN class ON class.ClassId=students.ClassId WHERE students.StudentName LIKE'%$s%' OR students.AdmissionNo  LIKE'%$s%'";
 
 $result = mysqli_query($con,$sql);
 
 
 $number_of_rows=mysqli_num_rows($result);
	
	$temp_array=array();
	
	if($number_of_rows>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
		 //$temp_array[] = $row;
		 
		//$time=$row['UploadTime'];
		$data="present";

		$row["data"]=$data;
		$temp_array[] = $row;
		}
	}else{
		$row["data"]="absent";
		$temp_array[] = $row;
	}
	
	header('Content-Type:application/json');
	
	
	echo json_encode(array("result"=>$temp_array));
 
 
 
 
  function nicetime($date)
{
date_default_timezone_set("Africa/Nairobi");
if(empty($date)) {
    return "No date provided";
}

$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
$lengths         = array("60","60","24","7","4.35","12","10");

$now             = time();
$unix_date         = strtotime($date);

   // check validity of date
if(empty($unix_date)) {    
    return "Bad date";
}

// is it future date or past date
if($now > $unix_date) {    
    $difference     = $now - $unix_date;
    $tense         = "ago";

} else {
    $difference     = $unix_date - $now;
    $tense         = "from now";
}

for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
    $difference /= $lengths[$j];
}

$difference = round($difference);

if($difference != 1) {
    $periods[$j].= "s";
}

return "$difference $periods[$j] {$tense}";
}
 
 
 mysqli_close($con);
 ?>
 