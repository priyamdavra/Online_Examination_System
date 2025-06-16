<?php
	
	if(!isset($_SESSION))
	{
		session_start();
	}
	$db=mysqli_connect("localhost","root","","online_exam") or die("Database isn't Connect");
	
	
?>
