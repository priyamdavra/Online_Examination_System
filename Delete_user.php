<?php
	
	require_once('db.php');
	error_reporting(0);
	
	$id=(int)$_GET['exam_id'];
	
	$query="delete from exam_user where id='$id' ";
	$data=mysqli_query($db,$query);
	
	header('Location:user.php');
		
?> 

