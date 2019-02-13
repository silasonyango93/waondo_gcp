<?php

$my_host=$_ENV['DB_HOST'];
$my_user=$_ENV['DB_USER'];
$my_pass=$_ENV['DB_PASS'];
$my_db=$_ENV['DB_NAME'];


define('hostname',$my_host);
define('user',$my_user);
define('password',$my_pass);
define('databaseName',$my_db;

$con=mysqli_connect(hostname,user,password,databaseName);

?>

