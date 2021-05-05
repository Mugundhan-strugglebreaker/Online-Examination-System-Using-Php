<?php
$Qcode=$_POST["select_tag"];
$con=mysqli_connect("localhost:3306","root","","online_examination");
$query="select * from student_results where Qcode='{$Qcode}'";
$res=mysqli_query($con,$query);
$i=1;
$total_marks=0;

while($r=mysqli_fetch_assoc($res))
{
    $total_marks=$r["total_marks"];
    break;
}
$arrayName = array();
$ind=0;
$query="select * from student_results where Qcode='{$Qcode}'";
$res=mysqli_query($con,$query);
$string=$Qcode.".csv";
// echo "<center><table border='2' cellpadding='20px'>";
// echo "<tr><th>S.NO</th><th>Register Number</th><th>Name of the Student</th><th>Mark Scored</th></tr>";
$file=fopen($string,"a+");
$arr1=array("Register Number","Name of the Student","Mark of the Student");
fputcsv($file, $arr1);
while($r=mysqli_fetch_assoc($res))
{
	$arr=array();
	$arr[0]=$r["regno"];
	$arr[1]=$r["name"];
	$arr[2]=$r["marks"];
	fputcsv($file, $arr);
	$arrayName[$ind]=$r["regno"];
	$ind++;
    // echo "<tr><td>".$i."</td><td>{$r["regno"]}</td><td>{$r["name"]}</td><td>{$r["marks"]}</td></tr>";
   // $i++;
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
		$arr=array();
		$arr[0]=$r["regno"];
		$arr[1]=$r["name"];
		$arr[2]=0;
		fputcsv($file, $arr);
	    // echo "<tr><td>".$i."</td><td>{$r["regno"]}</td><td>{$r["name"]}</td><td>Not Attempted</td></tr>";
	    //$i++;
    }
}
fclose($file);
echo "<script>alert('Excel File Downloaded Successfully');</script>";
header("refresh: 0; url = Admin_options.php");

?>