<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
  <style>
    body
    {
       margin:0;
    padding:0;
    background-image: url("b9.jpg");
    background-size: cover;
    }
    .nav
  {
    width:100%;
    background:#000033;
    height:80px;
  }
  ul
  {
    list-style: none;
    padding:0;
    margin:0;
    position: absolute;
    
  }
  ul li
  {
    float: left;
    margin-top: 20px;

  }
  ul li a
  {
    width: 130px;
    color: white;
    display: block;
    text-decoration: none;
    font-size: 20px;
    margin-left: 150px;
    text-align: center;
    padding: 10px;
    border-radius:10px;
    font-family: Century Gothic;

  }
  a:hover
  {
    background:#669900;
  }
    div
  {
    margin:-0px;
    margin-right: -10px;
  }
  table.ta
  {
    width:1200px;
    margin: auto;
    text-align: center;
    table-layout: fixed;
    margin-top: 20px;
    margin-left: 150px;
  }
  table.ta, th,td.ii
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
<body >
<div class="nav">
    <ul>
      <li><h1 style="color: white;margin-top: 0px;">Online Examination System</h1></li>
    <li>  <h1 style="color: white;margin-top: 0px;margin-left: 210px">Welcome <?php session_start(); echo $_SESSION["Student_name"];?>!</h1></li>
      <li><a href="Previous_Result.php">Previous Result</a></li>
      <li><a href="welcome.html">Logout</a></li>
    </ul>
    
  </div>
<br>
<center>
<h1>Tests Scheduled for you</h1></center>
<?php
  $con=mysqli_connect("localhost:3306","root","","online_examination");
  $query="select * from question_papers";
  $res=mysqli_query($con,$query);
  echo "<center><table border=2  class='ta' cellpadding='10px'>";
  echo "<tr style='font-size:25px;'><h2><th>Id</th><th>Question paper Code</th><th>Subject</th><th>Start Time</th><th>End Time</th></h2></tr>";
  $i=1;
  $array_QCode=array();
  while($row=mysqli_fetch_assoc($res))
  {
  	
      date_default_timezone_set('Asia/Kolkata');
  	 if(date('Y-m-d H:i:s')<$row["end_time"])
  	 {
  	 	
  	 //	echo $row["Qcode"];
        $query="select regno from student_results where Qcode='{$row["Qcode"]}'";
        $flag=0;
        $rs=mysqli_query($con,$query);
		while($r=mysqli_fetch_assoc($rs))
		{
			//echo $r["regno"]." ".$_SESSION["regno"]."<br>";
			if($r["regno"]==$_SESSION["regno"])
			{
				$flag=1;
				break;
			}
		}
		//echo "flag".$flag;
		if($flag==0)
		{
  	 	$array_QCode[$i-1]=$row["Qcode"];
  	 	echo "<tr style='font-weight:bold;font-size:20px;'><td class='ii'>".$i."</td><td class='ii'>{$row['Qcode']}</td><td class='ii'>{$row['subject']}</td><td class='ii'>{$row['start_time']}</td><td class='ii'>{$row['end_time']}</td><tr>";
  	 	$i++;
  	    }
  	 }
  	 else
  	 {
  	 //	echo "inside else expired";
  	 
  	 }
  	 
  	 
  }
  if(count($array_QCode)>0)
  {
  echo "</table></center>";

  echo "<center><h1>Select the Question Paper Code for Attending the test:</h1>";
  echo "<table class='tae'><tr class='hello'><form method='post'><td><select name='qu_code'  style='size:40px; margin-left: 55px;
  	font-size: 25px;
  	font-weight: bold;'>";
  for($i=0;$i<count($array_QCode);$i++)
  {

  		echo "<option value='{$array_QCode[$i]}'>".$array_QCode[$i]."</option>";
    
  }
  echo "</td><td>";
  echo "<input type='submit' name='submit' value='Take Test'style='size:40px; margin-left: 50px;
  	font-size: 22px;
  	font-weight: bold;'  formaction='Take_Test.php'></select></form></td></tr></table></center>";
  }
  else
  {
  	echo "<center><h1>No Test Bending</h1></center>";
  }
 ?>

</body></html>