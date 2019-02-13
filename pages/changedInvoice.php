<?php 
require_once('dbConnect.php');



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

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

    

       
		<?php
		
		
		
 
 $AdmissionNo=$_GET['AdmissionNo'];
 
  $sql = "select * from term WHERE TermId='2'";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $TermName=$idd['TermName'];
		
		
	 }
	
 }
 
		$sql = "select * from students INNER JOIN class ON students.ClassId=class.ClassId WHERE students.AdmissionNo=$AdmissionNo";
 
 $res = mysqli_query($con,$sql);
 
 if($res)
 {
	 while($idd=mysqli_fetch_assoc($res)){
		 $StudentName=$idd['StudentName'];
		 $ClassName=$idd['ClassName'];
		// echo $TermName;
		// echo "s";
		
	 }
	
 }?>

        
            <div class="row">
                <div class="col-lg-12">
                    <br></br>
                    <br></br>
                    <br></br>
                    <h1 class="page-header"><?php echo $StudentName;?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
			
			
			<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $TermName;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Admission Number</th>
                                            <th>Class</th>
                                        <th>Residence</th>
										<th>Total</th>
										
										
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
								
								
 
 
 $sql = "select * from students INNER JOIN fee ON students.AdmissionNo=fee.AdmissionNo WHERE students.AdmissionNo=$AdmissionNo";
 
 $result = mysqli_query($con,$sql);
 
 
$number_of_rows=mysqli_num_rows($result);
	
	$temp_array=array();
	
	if($number_of_rows>0){
								
								
								$Count=1;
								while($row=mysqli_fetch_assoc($result)){?>
								
<tr class="gradeA">
                                        
                                        <td><?php echo $row['AdmissionNo']?></td>
                                        <td><?php echo $ClassName;?></td>
                                        <td><?php echo $row['StudentType']?></td>
                                        
                                      <td><?php echo $row['Total']?></td>
                                      <?php $Total=$row['Total'];?>
										<td><?php echo $row['RecentPaidDate']?></td>
										
                                      <td><?php $TermBalance= $row['TermBalance']?></td>
                                      
										<td><?php $AnnualBalance= $row['AnnualBalance']?></td>
                                      
										
										
                                    </tr>
									
									
									<?php

									$Count++;
								}
								
								
								
								
								}else{
		
		echo "No installment payments yet.";
	}
	
	//header('Content-Type:application/json');
	
	
	//echo json_encode(array("result"=>$temp_array));
 
 
  

								
								?>
								<tr>
                                            <td><b>NEW  TERM BALANCE</b></td>
                                            <td><b><?php echo $TermBalance;?></b></td>
                                            <td></td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td><b>NEW ANNUAL BALANCE</b></td>
                                            <td><b><?php echo $AnnualBalance;?></b></td>
                                            <td></td>
                                            
                                        </tr>
										
										
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            
            
            
            
            
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
