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
			$sql="select * from exam_user where role='admin'";
			$run=mysqli_query($db,$sql);
			$result=mysqli_fetch_array($run);
			$i=$_GET['exam_id'];
		?>
		<br><p><h2>Logged in:<?=$result['first_name']." ".$result['laast_name']?> | <a class="out" href="logout.php">Logout</h2></a></p>
		
		<p><br><b>Welcome Admin</b></p>
		<p class="select">
		<a class="btn" href="admin.php">Exam</a>
		
		<span class="unl"></span>
		</p>
		
		<table border="1">
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Mobile</th>
		<th>Result</th>
		</tr>
		
		<?php 
			$ext="select * from exam_user where role='user'";
			$row=mysqli_query($db,$ext);
			$cnt=1;
			while($rst=mysqli_fetch_array($row))
			{
			?>
			<tr align="center">
			<td><?=$cnt?></td>
			<td><?=$rst['first_name']." ".$rst['laast_name']?></td>
			<td><?=$rst['email']?></td>
			<td><?=$rst['gender']?></td>
			<td><?=$rst['mobile']?></td>
			<td><button><a href="show_result.php?user_id=<?=$rst['id']?>&exam_id=<?=$i?>">View Result</a></button></td>
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
