<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap navbar</title>
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
		margin-left:890px;
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
			<li><a href="Admin_options.php">Back</a></li>
		</ul>
		
	</div>

</body>
</html>
<?php
session_start();
$Qcode=$_POST["select_tag"];
$con=mysqli_connect("localhost:3308","root","","online_examination");
$query="select * from student_results where Qcode='$Qcode'";
$res=mysqli_query($con,$query);
$i=1;
$j=1;
$total_marks=0;
$value_key=array();
$arrayName = array();
$ind=0;

while($r=mysqli_fetch_assoc($res))
{
    $total_marks=$r["total_marks"];
    $value_key[$r["name"]]=$r["marks"];
    $arrayName[$ind]=$r["regno"];
	$ind++;
 
}
arsort($value_key);
echo "<center><h3 style='font-size:30px;'>Subject Code:  ".$Qcode."</h3>";
echo "<h3 style='font-size:30px;'>Total Marks :  ".$total_marks."</h3></center>";

echo "<center><table border='2' cellpadding='20px'>";
echo "<tr><th>S.NO</th><th>Rank</th><th>Name of the Student</th><th>Mark Scored</th></tr>";
foreach($value_key as $x=>$x_value)
{
	
    echo "<tr><td>".$i."</td><td>".$j."</td><td>".$x."</td><td>".$x_value."</td></tr>";
    $i++;
    $j++;
}
$query="select * from student_details";
$res=mysqli_query($con,$query);
while($r=mysqli_fetch_assoc($res))
{
	$flag=0;
	for($x=0;$x<count($arrayName);$x++)
	{
		if($r["regno"]==$arrayName[$x])
		{
			$flag=1;
			break;
		}
	}
	if($flag==0)
	{
	    echo "<tr><td>".$i."</td><td>Not Attempted</td><td>{$r["name"]}</td><td>0</td></tr>";
	    $i++;
    }
}
echo "</table></center>";
?>