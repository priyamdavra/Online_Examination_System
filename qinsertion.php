<?php
	
	require_once('db.php');
	error_reporting(0);

		
	$qe=$_GET['qe'];
	$op1=$_GET['op1'];
	$op2=$_GET['op2'];
	$op3=$_GET['op3'];
	$op4=$_GET['op4'];
	$ans=$_GET['ans'];
	$save=$_GET['exam_id'];
	
			
			$query="insert into exam_question (exam_id,Question,Answer) values($save,'$qe','$ans')";
				$data=mysqli_query($db,$query);
			$q="select * from exam_question where exam_id = $save and Question = '$qe' and Answer = '$ans'";
			$run=mysqli_query($db,$q);
			$r=mysqli_fetch_array($run);
			$v =$r['id'];

			$option1="insert into exam_option (question_id,Q_option,title) values($v,1,'$op1')";
			$option2="insert into exam_option (question_id,Q_option,title) values($v,2,'$op2')";
			$option3="insert into exam_option (question_id,Q_option,title) values($v,3,'$op3')";
			$option4="insert into exam_option (question_id,Q_option,title) values($v,4,'$op4')";
			
			$option1=mysqli_query($db,$option1);
			$option2=mysqli_query($db,$option2);
			$option3=mysqli_query($db,$option3);
			$option4=mysqli_query($db,$option4);
		
	

			if($data)
			header('Location:admin.php');
		
?>