<?php
		
	require_once('db.php');
	error_reporting(0);	
			
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$gen=$_GET['gen'];
	$mail=$_GET['mail'];
	$pas=$_GET['pas'];
	$mobile=$_GET['mobile'];
	$add=$_GET['add'];
	$role=$_GET['role'];
			
	$query="insert into exam_user (first_name,laast_name,gender,email,password,mobile,address,role) values('$fname','$lname','$gen','$mail',$pas,'$mobile','$add','$role')";
			
		$data=mysqli_query($db,$query);
		
			header('Location:user.php');
		
?>