<?php
	
	require_once('db.php');
	error_reporting(0);
?>
<html>
<head>
<?php
			if(isset($_GET['exam_id']))
			{
				$id=$_GET['exam_id'];
			}
	
			?>
<link rel="stylesheet" href="CSS/edit_q.css" >	
</head>

	<body bgcolor=#B9F3FC>
		
		<form action="qinsertion.php"  method="get">
		<div class="login">
		<div class="log">
		<h3>Add Question</h3>
		</div>
		<div class="lbody">
		<table class="add" border="0">
		
				<table align="center" border="0" class="table">
				<tr>
				<th><br><b>Question</b></th><td> <input class="opt" type="text" name="qe"></td></tr>

			<?php
			$a=1;
			while($a<=4)
			{
			
			?>
				<tr><th><br>Option <?=$a?></th><td><input class="opt" name="op<?=$a?>" type="text"></td></tr>
				
			<?php
			$a++;
			}
			?>
			
			<tr><th><br>Answer</th>
			<td>					
			<select class="opt" name="ans">
			<option>Select</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			</select></td></tr>
			<input type="hidden" name="exam_id" value="<?=$id ?>" />
			<tr><td colspan="2"><br><input class="save" type="submit" value="Add" onclick="alert('Record Inserted')" name="update"></td></tr>
			
			
		</table>
		</div>
		</div>
		</form>
	</body>
</html>
