<?php
	
	require_once('db.php');
	error_reporting(0);
?>
<html>
<head>
<link rel="stylesheet" href="CSS/edit_q.css" >

</head>
	<body bgcolor=#B9F3FC>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="get">
		<div class="login">
		<div class="log">
		<h3>Add Exam</h3>
		</div>
		<div class="lbody">
		<table class="add" border="0">
		
		<tr><th>Exam-Title</th><td><input class="opt" type="text" name="title"></td></tr>
		
		<tr><th>Duration</th><td><input class="opt" type="text" name="dur"></td></tr>
		<tr><th>Total Question</th><td><input class="opt" type="number" name="tot"></td></tr>
		<tr><th>R/Q mark</th><td><input class="opt" type="number" name="rq"></td></tr>
		
		<tr><th style="padding-bottom: 35px;"><br>Status</th>
			<td>					
			<select class="opt" name="opt">
			<option value="">Select</option>
			<option value="Pending">Pending</option>
			<option value="Created">Created</option>
			<option value="Started">Started</option>
			<option value="Completed">Completed</option>
			</select></td></tr>
			
		<tr><td colspan="2"><br><input onclick="alert('Record Inserted')" class="save" type="submit" value="Add" name="update"></td></tr>
		<?php
			
			$title=$_GET['title'];
			
			$dur=$_GET['dur'];
			$tot=$_GET['tot'];
			$rq=$_GET['rq'];
			$opt=$_GET['opt'];
			
			
			
			$query="insert into exam_create (user_id,exam_title,duration,total_question,marks_right_answer,status) values(1,'$title','$dur',$tot,'$rq','$opt')";
			
			$data=mysqli_query($db,$query);
			if($data)
				header('Location:admin.php');
		
		?>
		
		
		</table>
		</div>
		</div>
		</form>
	</body>
</html>
