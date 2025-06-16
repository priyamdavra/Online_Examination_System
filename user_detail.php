<?php
	
	require_once('db.php');
	error_reporting(0);
?>

<html>
<head>
<link rel="stylesheet" href="CSS/edit_q.css" >
</head>
<?php
			if(isset($_GET['exam_id']))
			{
				$id=$_GET['exam_id'];
				$_SESSION['exam_id']=$id;
			}
			
?>			
<body bgcolor=#B9F3FC>
	<form action="user_update.php?exam_id=$id" method="GET">
	<div class="login">
		<div class="log">
		<h3>User/Admin Details</h3>
		</div>
		<div class="lbody">
			<?php
			
			$ext="select * from exam_user where id=$id";
			$row=mysqli_query($db,$ext);
			
			while($rst=mysqli_fetch_array($row))
			{
			?>
				<table align="center" border="0" class="table">
				<tr>
				<th><br><b>Id</b></th><td> <input class="opt" type="text" value="<?=$rst['id']?>"></td></tr>
				
				<tr>
				<th><br><b>Name</b></th><td> <input class="opt" type="text" value="<?=$rst['first_name']." ".$rst['laast_name']?>"></td></tr>
				
				<tr>
				<th><br><b>Gender</b></th><td> <input class="opt" type="text" value="<?=$rst['gender']?>"></td></tr>
				
				<tr>
				<th><br><b>Email</b></th><td> <input class="opt" type="text" value="<?=$rst['email']?>"></td></tr>
				
				<tr>
				<th><br><b>Mobile</b></th><td> <input class="opt" type="text" value="<?=$rst['mobile']?>"></td></tr>
				
				<tr>
				<th><br><b>Address</b></th><td> <input class="opt" type="text" value="<?=$rst['address']?>"></td></tr>
				
				<tr>
				<th><br><b>Created</b></th><td> <input class="opt" type="text" value="<?=$rst['created']?>"></td></tr>
				
				<tr><td colspan="2"><br><input class="save" type="submit" value="OK"></td></tr>
			<?php
			$index++;
			}
			?>
			
			</table>
		</div>	
	</div>		
	</form>
	
</body>
</html>
