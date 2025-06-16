<?php
	
	require_once('db.php');
?>
<html>
<head>
<link rel="stylesheet" href="CSS/user.css" >
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
		
		<a class="btn one" href="admin.php">Exam</a>
		<a class="btn" href="user.php">Users</a>
		<span class="unl"></span>
		<span class="unl1"></span>
		</p>
		<h3>User/Admin List</h3>
		<a href="user_insert.php">
		<img class="img" src="Images/add-outline.png">
		</a>
		<table border="1">
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Mobile</th>
		<div class="role"><th>Role</th></div>
		<th>Details</th>
		<th>Edit</th>
		<th>Delete</th>
		</tr>
		
		<?php 
			$ext="select * from exam_user";
			$row=mysqli_query($db,$ext);
			while($rst=mysqli_fetch_array($row))
			{
			?>
			<tr align="center">
			<td><?=$rst['id']?></td>
			<td><?=$rst['first_name']." ".$rst['laast_name']?></td>
			<td><?=$rst['email']?></td>
			<td><?=$rst['gender']?></td>
			<td><?=$rst['mobile']?></td>
			<?php 
				if(ucwords($rst['role'])=="User")
					$class="user";
				else
					$class="role";
				
			?>
			<td><button class="<?=$class?>"><?=ucwords($rst['role'])?></button></td>
			
			<td><a href="user_detail.php?exam_id=<?=$rst['id']?>"><img class="enroll" src="images/google-contacts.png"></a></td>
			
			<td><a href="edit_user.php?exam_id=<?=$rst['id']?>"><img class="dlt" src="images/signed.png"></a></td>
			
			<td><a href="Delete_user.php?exam_id=<?=$rst['id']?>"><img class="dlt" src="images/x-button.png"></a></td>
			</tr>
			<?php
			}
		?>
		</table>
		
		<?php 
		include_once('pagination.php');

		?>
		</div>
	</body>
</html>
