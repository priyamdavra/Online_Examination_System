<?php
	
	require_once('db.php');
	error_reporting(0);
?>
<html>
<head>
<link rel="stylesheet" href="CSS/edit_q.css" >	
</head>
	<body bgcolor=#B9F3FC>
		<form action="useradd.php"  method="GET">
		<div class="login">
		<div class="log">
		<h3>Add User/Admin</h3>
		</div>
		<div class="lbody">
		<table class="add" border="0">
		
		<tr><th>First Name</th><td><input class="opt" type="text" name="fname"></td></tr>
		<tr><th>Last Name</th><td><input class="opt" type="text" name="lname"></td></tr>
		<tr><th style="padding-bottom: 35px;"><br>Gender</th>
			<td>					
			<select class="opt" name="gen">
			<option value="">Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select></td></tr>
		<tr><th>Email</th><td><input class="opt" type="email" name="mail"></td></tr>
		<tr><th>Password</th><td><input class="opt" type="password" name="pas"></td></tr>
		<tr><th>Mobile</th><td><input class="opt" type="number" name="mobile"></td></tr>
		<tr><th>Address</th><td><input class="opt" type="text" name="add"></td></tr>
		<tr><th style="padding-bottom: 35px;"><br>Role</th>
			<td>					
			<select class="opt" name="role">
			<option value="">Select</option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
			</select></td></tr>
			
		<tr><td colspan="2"><br><input onclick="alert('Record Inserted')" class="save" type="submit" value="Add" name="update"></td></tr>		
		
		</table>
		</div>
		</div>
		</form>
	</body>
</html>
