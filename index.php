<?php
require_once('db.php');
error_reporting(0);
	if(isset($_SESSION['isUserLoggedIn']))
	{
		if($_SESSION['role']=="admin")
			header('Location:admin.php');
		else if($_SESSION['role']=="user")
			header('Location:view_user.php');
	}	
	
	if(isset($_POST['login'])){
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password=mysqli_real_escape_string($db,$_POST['pas']);
		
		$query="select * from exam_user where email='$email' and password='$password'";
		$runQ=mysqli_query($db,$query);
		$role=mysqli_fetch_array($runQ);
		if(mysqli_num_rows($runQ)){
			$_SESSION['isUserLoggedIn']=true;
			$_SESSION['email']=$email;
			if($_POST['type']!=$role['role'])
			{
				echo "<script>alert('Enter appropriate role')</script>";
			}
			else{
			$_SESSION['role']=$_POST['type'];
			if($_SESSION['role']=="admin")
				header('Location:admin.php');
			else if($_SESSION['role']=="user")
				header('Location:view_user.php');
			}
		}
		else
		{
			echo "<script>alert('Incorrect Email/Password')</script>";
		}
	}
	
	?>

<html>
<head>
<link rel="stylesheet" href="CSS/style.css" >
</head>
	<body bgcolor="#F3CCFF">
		<form action="index.php" method="post">
		<h2>Online Exam System</h2>
		<div class="login">
			
			<div class="ltitle">
			<strong>Login</strong>
			</div>
			<div class="lbody">
			<div class="inpt-email">
			<br><img src="Images/envelope.png">
			<input type="email" name="email" placeholder="Email"required>
			</div>
			<div class="inpt-pas">
			<br><img src="Images/padlock.png">
			<input type="password" name="pas" placeholder="Password" required>
			</div>
			<br><b>User Type:</b> <input type="radio" name="type" value="admin">Administrator
			<input type="radio" name="type" value="user">User<br>
			<br><input class="log" type="submit" value="Login" name="login">
			<br><br>Admin Login
			<br>Email:admin@gmail.com
			<br>Password:Priyam
			<br>
			<br>User Login
			<br>Email:user@gmail.com
			<br>Password:Pushpesh
			</div>
		</div>
		</form>
	</body>
</html>