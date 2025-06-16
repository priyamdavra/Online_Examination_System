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
	<form action="exam_update.php?exam_id=$id" method="GET">
	<div class="login">
		<div class="log">
		<h3>Edit Exam</h3>
		</div>
		<div class="lbody">
			<?php
			
			$ext="select * from exam_create where id=$id";
			$row=mysqli_query($db,$ext);
			
			while($rst=mysqli_fetch_array($row))
			{
			?>
				<table align="center" border="0" class="table">
				<tr>
				<th><br><b>Exam-Title</b></th><td> <input class="opt" type="text" value="<?=$rst['exam_title']?>" name="title"></td></tr>
				
				<tr>
				<th><br><b>Duration</b></th><td> <input class="opt" type="text" value="<?=$rst['duration']?>" name="duration"></td></tr>
				
				<tr>
				<th><br><b>Total Question</b></th><td> <input class="opt" type="text" value="<?=$rst['total_question']?>" name="totalq"></td></tr>
				
				<tr>
				<th><br><b>R/Q Mark</b></th><td> <input class="opt" type="text" value="<?=$rst['marks_right_answer']?>" name="rmark"></td></tr>
				
				<tr>
				<th><br><b>Status</b></th>
				<td>
				<select class="opt" name="status">
				<option value="<?=$rst['status']?>"><?=$rst['status']?></option>
				<option value="Pending">Pending</option>
				<option value="Created">Created</option>
				<option value="Started">Started</option>
				<option value="Completed">Completed</option>
				</select>
				</td>
				</tr>
				
				<tr><td colspan="2"><br><input class="save" type="submit" value="Save" onclick="alert('Record Updated')" name="update"></td></tr>
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