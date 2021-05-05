<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		body
		{
			background-color: black;
		}
		  table
		
  {
    width:2500px;
    margin: -10px;
    /*text-align: center;*/
    /*table-layout: fixed;*/
    margin-top: 20px;
    margin-left: -10px;
    margin-right: -100px;
  }
  table, th,td
  {
    border: 1px solid #080808;
    padding:20px;
    color:white;
    border-collapse: collapse;
    font-size: 18px;
    font-family: arial;
    background: linear-gradient(top,#3c3c3c 0%,#222222 100%);
         background:-webkit-linear-gradient(top,#3c3c3c 0%,#222222 100%);
     }
     th
      {
          background:purple;
       }
	</style>
</head>
<body style="background-color: black;">


<?php
session_start();
$con=mysqli_connect("localhost:3308","root","","online_examination");
if(isset($_POST["submit"]))
{
 	$qc=$_POST["qu_code"];
 	$_SESSION["question_code"]=$qc;
    

 	$query="select * from question_papers where Qcode='{$qc}'";
 	$res=mysqli_query($con,$query);
 	while($row=mysqli_fetch_assoc($res))
 	{
 		date_default_timezone_set('Asia/Kolkata');
 		if(date('Y-m-d H:i:s')>=$row["start_time"] && date('Y-m-d H:i:s')<=$row["end_time"])
 		{

			$e_time="";
			$query="select * from question_papers where Qcode='{$_SESSION["question_code"]}'";
			$re=mysqli_query($con,$query);
			date_default_timezone_set('Asia/Kolkata');
			while($r=mysqli_fetch_assoc($re))
			{
			    
			    // $duration=-$row["end_time"];
			  //echo $r["start_time"]."  ".$r["end_time"];
			  $e_time=$r["end_time"];
			}
			echo " 
			<center>
			<div style='min-height: 10px;
			width:100%;
   margin:-10px;
  overflow: auto;
  background:#000033;;
    position: fixed;

  float: left'>
			<p id='demo' style='font-weight:bold;font-size:30px; color:white;'>All the Best</p>

			<script>
			// Set the date we're counting down to
			var countDownDate = new Date('{$e_time}').getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

			  // Get today's date and time
			  var now = new Date().getTime();
			    
			  // Find the distance between now and the count down date
			  var distance = countDownDate - now;
			    
			  // Time calculations for days, hours, minutes and seconds
			  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			    
			  // Output the result in an element with id='demo'
			  document.getElementById('demo').innerHTML = days + 'd ' + hours + 'h '
			  + minutes + 'm ' + seconds + 's ';
			    
			  // If the count down is over, write some text 
			  if (distance < 0) {
			    clearInterval(x);
			    document.getElementById('demo').innerHTML = 'EXPIRED';
			    alert('Test has Ended');
			    window.location='Student_Qcode_Display.php';
			  }
			}, 1000);
			</script></div></center><br><br><br>";

             echo "<div>";
 		    $_SESSION["s_sub_name"]=$row["subject"];
 			$query="select * from {$qc}";
 			$res=mysqli_query($con,$query);
 			echo "<form method='post'><table cellpadding='20px' border='4px' style='width:100%;'>";
 			$i=0;
 			$ind=1;
 			while($row=mysqli_fetch_assoc($res))
 			{
 				//echo $row["Question"]." ".$row["Option_A"]." ".$row["Option_B"]." ".$row["Option_C"]." ".$row["Option_D"]." ".$row["Answer"]."<br>";
 				echo "<tr ><td border='4'><h2>".$ind.". ".$row["Question"]."</h2></td></tr>";
 				echo "<tr><td><input type=radio name='s_ans[$i]' value='{$row["Option_A"]}' required>".$row["Option_A"]."</td></tr>";
 				echo "<tr><td><input type=radio name='s_ans[$i]' value='{$row["Option_B"]}' required>".$row["Option_B"]."</td></tr>";
 				echo "<tr><td><input type=radio name='s_ans[$i]' value='{$row["Option_C"]}'required>".$row["Option_C"]."</td></tr>";
 				echo "<tr><td><input type=radio name='s_ans[$i]' value='{$row["Option_D"]}' required>".$row["Option_D"]."</td></tr>";
 				$ind++;
 				$i++;

 			}
 			echo "<tr><td><input type='submit' style='display:block;padding:10px;' name='Submit' value='Submit Responce'  formaction='Evaluate_Answers.php'></td></tr></table></form></div>";

            
 		}
 		else if(date('Y-m-d H:i:s')<$row["start_time"])
 		{
 		   echo "<script>alert('Test is not Started yet'); </script>";
           header("refresh: 0; url = Student_Qcode_Display.php");
 		}
 		else
 		{
 			echo "<script>alert('Oops Test has ended'); </script>";
 			 header("refresh: 0; url = Student_Qcode_Display.php");
 		}
 	}   
}
?>
</body>
</html>