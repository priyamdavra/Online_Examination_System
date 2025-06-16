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
	<form action="update.php?exam_id=$id" method="GET">
	<div class="login">
		<div class="log">
		<h3>Edit Question</h3>
		</div>
		<div class="lbody">
			<?php
			
			$ext="select * from exam_question where id=$id";
			$row=mysqli_query($db,$ext);
			
			while($rst=mysqli_fetch_array($row))
			{
			?>
				<table align="center" border="0" class="table">
				<tr>
				<th><br><b>Question</b></th><td> <input class="opt" type="text" value="<?=$rst['Question']?>" name="qe"></td></tr>
				<?php 
			
			$b="select * from exam_question where id=$id";
			$temp=mysqli_query($db,$b);
			$ft=mysqli_fetch_array($temp);
			$q_id=$ft['id'];
			$ans="select * from exam_option where question_id=$q_id";
			$opt=mysqli_query($db,$ans);
			$index=1;
			while($rop=mysqli_fetch_array($opt))
			{
			
			?>
				<tr><th><br>Option <?=$index?></th><td><input class="opt" name="op<?=$index?>" type="text" value="<?=$rop['title']?>"></td></tr>
				
			<?php
			$index++;
			}
			?>
			
			<tr><th><br>Answer</th>
			<td>					
			<select class="opt" name="ans">
			<option value="<?=$ft['Answer']?>"><?=$ft['Answer']?></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			</select></td></tr>
			
			<tr><td colspan="2"><br><input class="save" type="submit" value="Save" onclick="alert('Record Updated')" name="update"></td></tr>
			
			<?php
			}
			?>
			
			</table>
		</div>	
	</div>		
	</form>
	
</body>
</html>