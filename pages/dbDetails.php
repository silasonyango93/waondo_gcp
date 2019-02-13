<?php 

    
    $my_host=$_ENV['DB_HOST'];
    $my_user=$_ENV['DB_USER'];
    $my_pass=$_ENV['DB_PASS'];
    $my_db=$_ENV['DB_NAME'];


	define('HOST',$my_host);
	define('USER',$my_user);
	define('PASS',$my_pass);
	define('DB',$my_db);
	$connection=mysqli_connect(HOST,USER,PASS,DB);
	?>