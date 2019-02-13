
<?php
require_once('dbConnect.php');

if (isset($_POST['Class']) ) {
 echo "ndani";
    $Class=$_POST['Class'];
 
 
 echo "<script>window.location='http://34.73.97.17/Waondo/pages/verifyStudentRegistration.php?Class=$Class';</script>";
 
	
	exit;
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
    var x = document.forms["myForm"]["CutOffPoint"].value;
	
	var y = document.forms["myForm"]["Class"].value;
    if (x == ""||y == "") {
        alert("Kindly fill in all details on the form");
        return false;
    }
}
</script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Select the Class</h3>
                    </div>
                    <div class="panel-body">
                        <form name="myForm" action="" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                
								 <div class="form-group">
                                            <label>Select which class.</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="1G" value="1G">1G
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="1Y" value="1Y">1Y
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="1W" value="1W">1W
                                                </label>
                                            </div>
											
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="2G" value="2G">2G
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="2W" value="2W">2W
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="2Y" value="2Y">2Y
                                                </label>
                                            </div>
											
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="3G" value="3G">3G
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="3W" value="3W">3W
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="3Y" value="3Y">3Y
                                                </label>
                                            </div>
											
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="4G" value="4G">4G
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="4W" value="4W">4W
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Class" id="4Y" value="4Y">4Y
                                                </label>
                                            </div>
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




















