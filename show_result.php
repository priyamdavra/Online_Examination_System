<?php
	
	require_once('db.php');
	error_reporting(0);
?>
<html>
<head>
<style>
body{
	font-family:arial;
	letter-spacing:1px;
}
.main{
	background-color:#F8EDE3;
	width:31%;
	margin:0 auto;
	padding:2px 0 7px 7px;
	position:relative;
}
h1{
	font-family:Garamond;
}
bn{
	
}
</style>
</head>
	<body bgcolor="skyblue">
	<h1 align="center">Result</h1>
		<div class="main">
		<?php
		
			
$u_id=$_GET['user_id'];
$e_id=$_GET['exam_id'];

		
			$ext="select * from exam_answer where user_id=$u_id and exam_id=$e_id";
			$row=mysqli_query($db,$ext);
			if(mysqli_num_rows($row)==0){
				echo "<h3>Exam Not Given!!</h3>";
			}
			else{
			$cnt=1;
			$total=0;
		?>
		
		<table border="1">
		<tr>
		<th>Id</th>
		<th>User_Id</th>
		<th>Exam_Id</th>
		<th>Question_Id</th>
		<th>User_Answer</th>
		<th>Marks</th>
		
		</tr>
		
		<?php 
			while($rst=mysqli_fetch_array($row))
			{
			?>
			<tr align="center">
			<td><?=$cnt?></td>
			<td><?=$rst['user_id']?></td>
			<td><?=$rst['exam_id']?></td>
			<td><?=$rst['question_id']?></td>
			<td><?=$rst['user_answer_option']?></td>
			<td><?=$rst['marks']?></td>
			
			
			</tr>
			<?php
			$total=$total+$rst['marks'];
			$cnt++;
			}
			
		?>
		</table>
		<?="<p>Total = " . $total . "</p>";
			}?>
<center>		
<?php
if($_SESSION['role']=="admin")	{?>
	
<input type="button" value="OK" onclick="window.location.href='admin.php'">
	<?php
}
else{?>
	
<input class="bn" type="button" value="OK" onclick="window.location.href='view_user.php'"><?php
}?>
</center>
		</div>
	</body>
</html>
