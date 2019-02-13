
<?php
require_once('dbConnect.php');



if (isset($_POST['AdmissionNo']) ) {
    
    
$AdmissionNo =$_POST["AdmissionNo"];

 
 
 //$AmountPaid = (int) preg_replace('/[^0-9]/', '', $AmountPaid);
 
 $AdmissionNo = (int) preg_replace('/[^0-9]/', '', $AdmissionNo);


$sql = "select * from students WHERE `students`.`AdmissionNo` = $AdmissionNo";
 
 //$res = mysqli_query($con,$sql);
 
 $res =mysqli_query($con,$sql) or die("The Admission Number does not exist.");
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $StudentName=$idd['StudentName'];
		
		 //echo "y";
		
	 }
	
 }



echo "<script>if (confirm('You are about to upload this photo for $StudentName')) {
    window.location='http://34.73.97.17/Waondo/pages/updatePhoto.php?StudentAdmissionNo=$AdmissionNo';
} else {
    window.location='http://34.73.97.17/Waondo/pages/updatePhotoPop.php';
}</script>";


	
mysqli_close($con);}
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
	
	
    if (x == "") {
        alert("Kindly fill in every detail on the form");
        return false;
    }
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
                        <h3 class="panel-title">Enter Student Admission Number </h3>
                    </div>
                    <div class="panel-body">
					
					<script>

</script>
                        <form name="myForm" action="" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Admission Number" name="AdmissionNo" type="text" autofocus>
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
