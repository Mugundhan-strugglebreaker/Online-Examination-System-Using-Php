<?php
session_start();
$Question=$_POST["Question"];
$A=$_POST["A"];
$B=$_POST["B"];
$C=$_POST["C"];
$D=$_POST["D"];
$ANS=$_POST["Ans"];
$con=mysqli_connect("localhost:3308","root","","online_examination");
for($i=0;$i<count($A);$i++)
{
	 $query="insert into {$_SESSION["Q_code"]}(Question,Option_A,Option_B,Option_C,Option_D,Answer) values('{$Question[$i]}','{$A[$i]}','{$B[$i]}','{$C[$i]}','{$D[$i]}','{$ANS[$i]}')";
	 mysqli_query($con,$query);

}


            echo "<script> alert('Question paper Uploaded');</script>";
            
    		header("refresh: 0; url = Admin_options.php");

?>