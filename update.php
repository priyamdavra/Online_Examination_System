<?php
	
	require_once('db.php');
	error_reporting(0);
	
	$qe=$_GET['qe'];
	$op1=$_GET['op1'];
	$op2=$_GET['op2'];
	$op3=$_GET['op3'];
	$op4=$_GET['op4'];
	$ans=$_GET['ans'];
	$id=(int)$_SESSION['exam_id'];
	
	$query="update exam_question set Question='$qe', Answer='$ans' where id=$id ";
	$option1="update exam_option set title='$op1' where question_id=$id and Q_option=1";
	$option2="update exam_option set title='$op2' where question_id=$id and Q_option=2";
	$option3="update exam_option set title='$op3' where question_id=$id and Q_option=3";
	$option4="update exam_option set title='$op4' where question_id=$id and Q_option=4";
	
	$option1=mysqli_query($db,$option1);
	$option2=mysqli_query($db,$option2);
	$option3=mysqli_query($db,$option3);
	$option4=mysqli_query($db,$option4);
	$data=mysqli_query($db,$query);
	

	
		header('Location:admin.php');

	
?>
