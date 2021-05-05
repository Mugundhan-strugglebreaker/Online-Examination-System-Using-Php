<!DOCTYPE html>
<html>
<head>
	<title>Result</title>

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
    width: 150px;
    color: white;
    display: block;
    text-decoration: none;
    margin-left:410px;
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
    color: black;
  }
  div
  {
     
  }
	</style>
</head>
<body>
<div class="nav">
    <ul>
      <li><h1 style="color: white;margin-top: 0px;">Online Examination System</h1></li>
    <li>  <h1 style="color: white;margin-top: 0px;margin-left: 260px">Your Results</h1></li>
      <li><a href="Student_Qcode_Display.php">Back</a></li>
      
    </ul>
    
  </div>

<?php
session_start();
$con=mysqli_connect("localhost:3308","root","","online_examination");
$Ans=$_POST["s_ans"];
$query="select * from {$_SESSION["question_code"]}";
$res=mysqli_query($con,$query);
$i=0;
$mark=0;
while ($row=mysqli_fetch_assoc($res)) 
{
	
	if(strcasecmp($row["Answer"], $Ans[$i])==0)
	{
		$mark++;
	}	
	$i++;
}
$query="select 1 from student_results";
$bool=mysqli_query($con,$query);
if($bool==FALSE)
{
	$query="create table student_results(id int not null auto_increment,Qcode varchar(50),subject varchar(100),regno varchar(50),name varchar(100),marks int,total_marks int,primary key(id))";
	mysqli_query($con,$query);
}
$query="insert into student_results(Qcode,subject,regno,name,marks,total_marks) values('{$_SESSION["question_code"]}','{$_SESSION["s_sub_name"]}','{$_SESSION["regno"]}','{$_SESSION["Student_name"]}',{$mark},{$i})";
mysqli_query($con,$query);

echo  "<br><br><br><fieldset style='color:black;'>";
echo  "<h1>Hey !".$_SESSION["Student_name"]." ,Your Successfully Completed the Test<br>";
echo  "Subject: ".$_SESSION["s_sub_name"]."<br>";
echo  "Question paper Code: ".$_SESSION["question_code"]."<br>";
echo  "Result :".$mark." Out of ".$i;
echo  "</fieldset></h1>";
echo "<script>alert('Thanks for Taking the Test'); </script>";
 //header("refresh: 5; url = Student_Qcode_Display.php");

?>
</body>
</html>