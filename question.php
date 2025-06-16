<?php
	
	require_once('db.php');
	error_reporting(0);	
?>
<html>
<head>
<link rel="stylesheet" href="CSS/question.css" >
<link rel="stylesheet" href="CSS/pagination.css" >
</head>
	<body>
		<div class="main">
		<h1>Online Exam System</h1>
		<?php
			if(isset($_GET['exam_id']))
			{
				$id=$_GET['exam_id'];
			}
			
			$sql="select * from exam_user where role='admin'";
			$run=mysqli_query($db,$sql);
			$result=mysqli_fetch_array($run);
		?>
		<br><p><h2>Logged in:<?=$result['first_name']." ".$result['laast_name']?> | <a class="out" href="logout.php">Logout</h2></a></p>
		
		<p><br><b>Welcome Admin</b></p>
		<p class="select">
		<a class="btn one" href="admin.php">Exam</a>
		<a class="btn one" href="user.php">Users</a>
		<span class="unl"></span>
		</p>
		<a href="question_insert.php?exam_id=<?=$id?>">
		<img class="imge" src="Images/add-outline.png">
		</a>
		<table border="1">
		<tr>
		<th>Id</th>
		<th>Question</th>
		<th>Right Option</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
		
		<?php 
			
			$ext="select * from exam_question where exam_id=$id";
			$row=mysqli_query($db,$ext);
			$cnt=1;
			while($rst=mysqli_fetch_array($row))
			{
			?>
			<tr align="center">
			<td><?=$cnt?></td>
			<td><?=$rst['Question']?></td>
			<?php 
			$a=(int)$rst['Answer'];
			$b=(int)$rst['id'];
			$ans="select * from exam_option where question_id=$b and Q_option=$a";
			$opt=mysqli_query($db,$ans);
			$rop=mysqli_fetch_array($opt);
			
			?>
			<td><?=$rop['title']?></td>
			<td><a href="edit_q.php?exam_id=<?=$rst['id']?>"><img class="dlt" src="images/signed.png"></a></td>
			
			<td><a href="question_delet.php?exam_id=<?=$rst['id']?>"><img class="dlt" src="images/x-button.png"></a></td>
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
