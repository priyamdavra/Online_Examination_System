<html>
<head>
<?php	
	require_once('db.php');
	error_reporting(0);
	
	
$id=$_GET['exam_id'];
$query = "select * from exam_create where id=$id";
$result = mysqli_query($db, $query);

$row=mysqli_fetch_array($result);

$em=$_SESSION['email'];
$id_query="select * from exam_user where email='$em'";
$run=mysqli_query($db,$id_query);
$r=mysqli_fetch_array($run);
$u_id=$r['id'];

$exam_query="UPDATE enroll SET exam_taken = 'Yes' WHERE exam_id = $id and user_id=$u_id;";
$exam_run=mysqli_query($db,$exam_query);
			
	
?>
    <script language ="javascript" >
        var tim;
        var min ='<?=$row['duration'] - 1?>';
        var sec = 60;
        var f = new Date();
        function f1() {	
            f2();
        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+min+" Minutes ," + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    
					
                    if (parseInt(min) == 0) {
						document.getElementById('sub').submit();
						
                        clearTimeout(tim);
						
                       
                    }
					
	else{
						
  sec = 60;
  document.getElementById("showtime").innerHTML = "Your Left Time  is : " + min + " Minutes ," + sec + " Seconds";
  tim = setTimeout("f2()", 1000);
		}
		min = parseInt(min) - 1;
        }
        }
        }
    </script>
</head>
<body onload="f1()" bgcolor="#FFB6B9">
<?php

	
			if(isset($_GET['exam_id']))
			{
				$id=$_GET['exam_id'];
			}
			?>
			<form id="sub" action="result.php" method="GET">
			<h1>Best of Luck!!<h1>
			<?php
// retrieve the questions from the database
$query = "select * from exam_question where exam_id=$id";
$result = mysqli_query($db, $query);

// display the questions
$sr=1;
while ($row = mysqli_fetch_array($result)) {
  echo "<h3><p>" .$sr.". ". $row['Question'] . "</p></h3>";
    $sr++;
  // retrieve the options for the current question from the database
  $query_options = "SELECT * FROM exam_option WHERE question_id = " . $row['id'];
  $result_options = mysqli_query($db, $query_options);
  
  // display the options
  while ($row_options = mysqli_fetch_array($result_options)) {
    echo "<input type='radio' name='" . $row['id'] . "' value='" . $row_options['Q_option'] . "' />";
    echo "<b><label>" . $row_options['title'] . "</label></b>";
  }
  
}
?>

<input type="hidden" value="<?=$id?>" name="cnt" ><br><br>
<input type="submit" value="Submit" />
<div>
      <table width="100%" align="center">
        
        <tr>
          <td>
           
            <div id="endtime"></div><br />
            <div id="showtime"></div>
          </td>
        </tr>
        
      </table>
     </div>	
</form>

</body>
</html>
