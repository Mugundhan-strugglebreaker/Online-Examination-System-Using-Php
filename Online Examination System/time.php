
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body style="background-color: lightblue;">

<h1 style="font-size: 30px;font-weight: bold;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	Welcome <?php session_start(); echo $_SESSION["Student_name"];?>!</h1><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="Previous_Result.php">Previous Result</a>&nbsp&nbsp&nbsp&nbsp<a href="welcome.html">Logout</a></h2>
<br>
<center>
<h1>Tests Scheduled for you</h1></center>
<?php
  $con=mysqli_connect("localhost:3308","root","","online_examination");
  $query="select * from question_papers";
  $res=mysqli_query($con,$query);
  echo "<center><table border=2 cellpadding='20px'>";
  echo "<tr style='font-size:25px;'><h2><th>Id</th><th>Question paper Code</th><th>Subject</th><th>Start Time</th><th>End Time</th></h2></tr>";
  $i=1;
  $array_QCode=array();
  while($row=mysqli_fetch_assoc($res))
  {
  	 // $d=strtotime("now");
    //  echo date("Y-m-d h:i:sa", $d) . "<br>";  
    date_default_timezone_set('Asia/Kolkata');
    //echo date('d-m-Y H:i');
    // echo date('Y-m-d H:i:s')."<----->".$row["end_time"];
  	 if(date('Y-m-d H:i:s')<$row["end_time"])
  	 {
  	 	
  	 //	echo $row["Qcode"];
  	 	$array_QCode[$i-1]=$row["Qcode"];
  	 	echo "<tr style='font-weight:bold;font-size:20px;'><td>".$i."</td><td>{$row['Qcode']}</td><td>{$row['subject']}</td><td>{$row['start_time']}</td><td>{$row['end_time']}</td><tr>";
  	 	$i++;
  	 }
  	 else
  	 {
  	 //	echo "inside else expired";
  	 
  	 }
  	 
  	 
  }
  echo "</table></center>";

  echo "<center><h1>Select the Question Paper Code for Attending the test:</h1>";
  echo "<table><tr><form method='post'><td><select  style='size:40px; margin-left: 55px;
  	font-size: 25px;
  	font-weight: bold;'>";
  for($i=0;$i<count($array_QCode);$i++)
  {
  		echo "<option value='{$array_QCode[$i]}'>".$array_QCode[$i]."</option>";
    
  }
  echo "</td><td>";
  echo "<input type='submit' value='Take Test'style='size:40px; margin-left: 50px;
  	font-size: 22px;
  	font-weight: bold;'  formaction=''></select></form></td></tr></table></center>";
 ?>

</body></html>