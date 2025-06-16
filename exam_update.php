<?php
	
	require_once('db.php');
	error_reporting(0);
	
	$title=$_GET['title'];
	$dur=$_GET['duration'];
	$tot=$_GET['totalq'];
	$mark=$_GET['rmark'];
	$status=$_GET['status'];
	
	$id=(int)$_SESSION['exam_id'];
	
	$query="update exam_create set exam_title='$title', duration='$dur',total_question='$tot', marks_right_answer='$mark', status='$status' where id=$id ";
	
	
	
	$data=mysqli_query($db,$query);
	

		
		header('Location:admin.php');

	
?>
