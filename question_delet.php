<?php
	
	require_once('db.php');
	error_reporting(0);
	
	$id=(int)$_GET['exam_id'];
	
	$b="select * from exam_question where id=$id";
			$temp=mysqli_query($db,$b);
			$ft=mysqli_fetch_array($temp);
			$q_id=$ft['id'];
			$ans="delete from exam_option where question_id=$q_id";

	
	$query="delete from exam_question where id='$id' ";
	$d=mysqli_query($db,$query);
	$data=mysqli_query($db,$ans);
		
	header('Location:admin.php');
	
?> 