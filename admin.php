<?php
	
	require_once('db.php');
	error_reporting(0);
?>
<html>
<head>
<link rel="stylesheet" href="CSS/admin.css" >
<link rel="stylesheet" href="CSS/pagination.css" >
</head>
	<body>
		<div class="main">
		<h1>Online Exam System</h1>
		<?php
		$em=$_SESSION['email'];
			$sql="select * from exam_user where role='admin' and email='$em'";
			$run=mysqli_query($db,$sql);
			$result=mysqli_fetch_array($run);
		?>
		<br><p><h2>Logged in:<?=$result['first_name']." ".$result['laast_name']?> | <a class="out" href="logout.php">Logout</h2></a></p>
		
		<p><br><b>Welcome Admin</b></p>
		<p class="select">
		<a class="btn" href="admin.php">Exam</a>
		<a class="btn one" href="user.php">Users</a>
		<span class="unl"></span>
		</p>
		<h3>Exam</h3>
		<a href="insert.php">
		<img class="img" src="Images/add-outline.png">
		</a>
		<table border="1">
		<tr>
		<th>Id</th>
		<th>Exam-Title</th>
		<th>Duration</th>
		<th>Total Question</th>
		<th>R/Q mark</th>
		<th>Status</th>
		<th>Question</th>
		<th>Enroll User</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
		
		<?php 
			$ext="select * from exam_create";
			$row=mysqli_query($db,$ext);
			$cnt=1;
			while($rst=mysqli_fetch_array($row))
			{
			?>
			<tr align="center">
			<td><?=$cnt?></td>
			<td><?=$rst['exam_title']?></td>
			<td><?=$rst['duration']?></td>
			<td><?=$rst['total_question']?></td>
			<td><?=$rst['marks_right_answer']?></td>
			<td><?=$rst['status']?></td>
			<td><a href="question.php?exam_id=<?=$rst['id']?>">Question</a></td>
			
			<td><a href="enroll.php?exam_id=<?=$rst['id']?>"><img class="enroll" src="images/google-contacts.png"></a></td>
			
			<td><a href="edit_test.php?exam_id=<?=$rst['id']?>"><img class="dlt" src="images/signed.png"></a></td>
			
			<td><a href="Delete_test.php?exam_id=<?=$rst['id']?>"><img class="dlt" src="images/x-button.png"></a></td>
			
			</tr>
			<?php
			$cnt++;
			}
		?>
		</table>
		
		<?php 
		include_once('pagination.php');
		
		?>
		</div>
	</body>
</html>
