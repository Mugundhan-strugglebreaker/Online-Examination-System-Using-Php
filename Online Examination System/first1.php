<?php
session_start();
$con=mysqli_connect("localhost:3308","root","","online_examination");
$query="select * from student_results where Qcode='18Dcn123'";
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
echo "<h3>Subject Code:  18Dcn123</h3>";
echo "<h3>Total Marks :  ".$total_marks."</h3>";

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