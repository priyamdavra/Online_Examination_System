<?php
	
	require_once('db.php');
	error_reporting(0);
	
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$gen=$_GET['gen'];
	$mail=$_GET['mail'];
	$mobile=$_GET['mobile'];
	$add=$_GET['add'];
	$role=$_GET['role'];
	$npas=$_GET['npas'];

	
	$id=(int)$_SESSION['exam_id'];
	
	$query="update exam_user set first_name='$fname', laast_name='$lname',gender='$gen', email='$mail', mobile='$mobile', address='$add', role='$role', password='$npas' where id=$id ";
	
	
	
	$data=mysqli_query($db,$query);
	

		
		header('Location:user.php');

	
?>
