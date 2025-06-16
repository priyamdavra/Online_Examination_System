<?php
	
	require_once('db.php');
	error_reporting(0);
	
$em=$_SESSION['email'];
$id_query="select * from exam_user where email='$em'";
$run=mysqli_query($db,$id_query);
$r=mysqli_fetch_array($run);



?>


<html>
<head>
<link rel="stylesheet" href="CSS/view_user.css" >
<link rel="stylesheet" href="CSS/pagination.css" >
</head>
	<body>
		<div class="main">
		<h1>Online Exam System</h1>
		<?php
		$em=$_SESSION['email'];
			$sql="select * from exam_user where role='user' and email='$em'";
			$run=mysqli_query($db,$sql);
			$result=mysqli_fetch_array($run);
		?>
		<br><p><h2>Logged in:<?=$result['first_name']." ".$result['laast_name']?> | <a class="out" href="logout.php">Logout</h2></a></p>
		
		<p><br><b>Welcome User</b></p>
		
		<p class="select">
		<a class="btn" href="view_user.php">My Exam</a>
		
		<span class="unl"></span>
		</p>
		<h3>Exam List</h3>
		
		<table border="1">
		<tr>
		<th>Id</th>
		<th>Exam-Title</th>
		<th>Duration</th>
		<th>Total Question</th>
		<th>R/Q mark</th>
		<th>Status</th>
		<th></th>
		</tr>
		
<?php 
$ext="select * from exam_create";
$row=mysqli_query($db,$ext);
$cnt=1;
while($rst=mysqli_fetch_array($row))
{
$u_id=$r['id'];
$e_id=$rst['id'];
$exam_query="select * from enroll where exam_id=$e_id and user_id=$u_id";
$exam_run=mysqli_query($db,$exam_query);
$exam_fetch=mysqli_fetch_array($exam_run);
				
	
$exam_insert="insert into enroll (user_id,exam_id) values ('$u_id','$e_id')";
					
					
$e_r=mysqli_query($db,$exam_insert);
						
?>
			<tr align="center">
			<td><?=$cnt?></td>
			<td><?=$rst['exam_title']?></td>
			<td><?=$rst['duration']?></td>
			<td><?=$rst['total_question']?></td>
			<td><?=$rst['marks_right_answer']?></td>
			<td><?=$rst['status']?></td>
<?php
if($exam_fetch['exam_taken']=="No" && $exam_fetch['user_id']==$u_id && $rst['status']=="Started"){?>
<td><button id="my-button<?=$cnt?>" onclick="window.location.href='process_exam.php?exam_id=<?=$rst['id']?>'">Give Exam</button></td>
<td><button disabled>View Result</button></td></td>
<?php 
			}
else if($exam_fetch['exam_taken']=="Yes" || $rst['status']=="Completed"){?><td>
<button disabled>Give Exam</button></td>
<td><button onclick="window.location.href='show_result.php?exam_id=<?=$rst['id']?>&user_id=<?=$u_id?>'">View Result</button></td></td>
			
			<?php	
			}
			else if($rst['status']=="Pending" || $rst['status']=="Created"){?><td>
			<button disabled>Give Exam</button></td>
			<td><button disabled>View Result</button></td></td>
			<?php	
			}
			?>

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



