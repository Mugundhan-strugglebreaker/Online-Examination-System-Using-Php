<?php
session_start();
$con=mysqli_connect("localhost:3308","root","","online_examination");
$query="select * from student_results where Qcode='18Dcn123'";
$res=mysqli_query($con,$query);
$i=1;
$total_marks=0;

while($r=mysqli_fetch_assoc($res))
{
    $total_marks=$r["total_marks"];
    break;
}
echo "<h3>Subject Code:  18Dcn123</h3>";
echo "<h3>Total Marks :  ".$total_marks."</h3>";
$arrayName = array();
$ind=0;
$query="select * from student_results where Qcode='18Dcn123'";
$res=mysqli_query($con,$query);
echo "<center><table border='2' cellpadding='20px'>";
echo "<tr><th>S.NO</th><th>Register Number</th><th>Name of the Student</th><th>Mark Scored</th></tr>";
while($r=mysqli_fetch_assoc($res))
{
	$arrayName[$ind]=$r["regno"];
	$ind++;
    echo "<tr><td>".$i."</td><td>{$r["regno"]}</td><td>{$r["name"]}</td><td>{$r["marks"]}</td></tr>";
    $i++;
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
	    echo "<tr><td>".$i."</td><td>{$r["regno"]}</td><td>{$r["name"]}</td><td>Not Attempted</td></tr>";
	    $i++;
    }
}
echo "</table></center>";

?>
