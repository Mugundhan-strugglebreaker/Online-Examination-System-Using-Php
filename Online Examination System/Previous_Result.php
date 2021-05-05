<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style>
	body
	{
		margin:0;
		  padding:0;
    background-image: url("b9.jpg");
    background-size: cover;

	}

	table
	{
		width:1200px;
		margin: auto;
		text-align: center;
		table-layout: fixed;
		margin-top: 20px;
		margin-left: 150px;
	}
	table, th, td,tr
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
		width: 150px;
		color: white;
		display: block;
		text-decoration: none;
		margin-left:360px;
		font-size: 20px;
		text-align: center;
		padding: 10px;
		border-radius:10px;
		font-family: Century Gothic;

	}
	a:hover
	{
		background:#669900;
	}
	h1
	{
		margin-top: 0px;
		color: white;
	}
</style>	
</head>

<body>
	<div class="nav">
		<ul>
			<li><h1>Online Examination System</h1></li>
			<li><h1 style="margin-left: 230px;">Your Previous Result</h1></li>
			<li><a href="Student_Qcode_Display.php">Back</a></li>
		</ul>
		
	</div>
 <?php  session_start(); echo "<center><h3 style='font-size:30px;'>Name: ".$_SESSION["Student_name"]."<h3>";
 echo "<h3 style='font-size:30px;'>Regno: ".$_SESSION["regno"]."<h3></center>";
 ?>

<?php

$con=mysqli_connect("localhost:3308","root","","online_examination");
$query="select * from student_results where regno='{$_SESSION["regno"]}'";
$res=mysqli_query($con,$query);
echo "<table border='2' cellpadding='60px'>";
echo "<tr><h1><th>S.No</th><th>Question paper Code</th><th>Subject</th><th>Marks Awarded</th><th>Total Mark</th></h1><tr>";
$i=1;
while($row=mysqli_fetch_assoc($res))
{
	
	echo "<tr><td>".$i."</td><td>".$row["Qcode"]."</td><td>".$row["subject"]."</td><td>".$row["marks"]."</td><td>".$row["total_marks"]."</td></tr>";
	$i++;
}
echo "</table>";

?>
</body>
</html>