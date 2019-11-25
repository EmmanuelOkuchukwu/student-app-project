<?php
include('databaseConfig.php');
session_start();

if(isset($_SESSION['login_user'])){
	$user_check = $_SESSION['login_user'];
	$ses_sql = mysqli_query($db,"select * from students where student_id = $user_check ");
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	$login_session = $row['email'];
}

if(!isset($_SESSION['login_user'])){
    
    header("location:login.php");
    ob_start();
    // echo "losssss";
    // die();
}
?>