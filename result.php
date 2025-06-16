<html>
<body bgcolor = "#FEF9A7" align="center">

<?php
	require_once('db.php');
	error_reporting(0);
// check the user's answers and calculate the final score

$id=$_GET['cnt'];
$query = "select * from exam_create where id=$id";
$result = mysqli_query($db, $query);
$row=mysqli_fetch_array($result);


$em=$_SESSION['email'];
$id_query="select * from exam_user where email='$em'";
$run=mysqli_query($db,$id_query);
$r=mysqli_fetch_array($run);


$score = 0;
foreach ($_GET as $key => $value) {
  $query_options = "SELECT * FROM exam_question WHERE id = " . $key;
  $result_options = mysqli_query($db, $query_options);
  $row_options = mysqli_fetch_assoc($result_options);
  
  $i=$r['id'];
  
  if ($value == $row_options['Answer']){
	  
	 $m=$row['marks_right_answer']; 
	 $insert_q="insert into exam_answer(user_id,exam_id,question_id,user_answer_option,marks) values('$i','$id','$key','$value','$m')";
	 $score++;
    }
	else{
		$insert_q="insert into exam_answer(user_id,exam_id,question_id,user_answer_option,marks) values('$i','$id','$key','$value','0')";
	}
	$tot=mysqli_query($db,$insert_q);
}

// display the final score
	
	echo "<h2 style=color:DodgerBlue;>Your score is " . $score * $row['marks_right_answer'] . " out of " . $row['marks_right_answer'] * $row['total_question'] . "</h2>";
	

?>
<input type="button" value="OK" onclick="window.location.href='view_user.php'">
</html>
</body>