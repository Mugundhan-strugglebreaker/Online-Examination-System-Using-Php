<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	
	table
	{
		width:2400px;
		margin: auto;
		text-align: center;
		/*table-layout: fixed;*/
		margin-top: 20px;
		margin-left: 0px;
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
		width:160%;
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
		margin-left:350px;
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
	div
	{
		 margin:-10px;
    margin-right: 0px;
	}
</style>
<body>
<div class="nav">
		<ul>
			<li><h1>Online Examination System</h1></li>
			<li><h1 style="font-size:30px; margin-left: 180px;">Question Paper code-
	<?php echo $_POST['Qcode'];
	?>
	</h1></li>
			<li><a href="Admin_options.php">Back</a></li>
		</ul>
		
	</div>
<?php
		session_start();
		$Qcode=$_POST['Qcode'];
		$no=$_POST['NoofQuestion'];
		$s_time=$_POST['s_time'];
		$e_time=$_POST['e_time'];
		$sub_name=$_POST["subject"];
		$_SESSION["Q_code"]=$Qcode;
		$_SESSION["start_time"]=$s_time;
		$_SESSION["end_time"]=$e_time;
		$_SESSION["no_of_Question"]=$no;
		$_SESSION["subject_name"]=$sub_name;
	    $con=mysqli_connect("localhost:3308","root","","online_examination");
	    $query="select 1 from Question_papers";
	    $bool=mysqli_query($con,$query);
		if($bool==FALSE)
		{
			$query="create table Question_papers(id int not null auto_increment,email varchar(30),Qcode varchar(30),subject varchar(30),start_time datetime,end_time datetime,primary key(id) )";
			mysqli_query($con,$query);
		}
		$query="select Qcode from Question_papers";
		$res=mysqli_query($con,$query);
		$flag=0;
		while($row=mysqli_fetch_assoc($res))
		{
			if($row['Qcode']==$Qcode)
			{
				$flag=1;
				break;
			}
		}
		if($flag==0)
		{
			$query="insert into Question_papers(email,Qcode,subject,start_time,end_time) values('{$_SESSION["email"]}','{$Qcode}','{$sub_name}','{$s_time}','{$e_time}')";
			mysqli_query($con,$query);
			
			$query="create table {$Qcode}(id int not null auto_increment,Question varchar(255),Option_A varchar(255),Option_B varchar(255),Option_C varchar(255),Option_D varchar(255),Answer varchar(255),primary key(id))";

			mysqli_query($con,$query);
			mysqli_close($con);
    	}
    	else
    	{
    		mysqli_close($con);
    		echo "<script> alert('Already Existed Qcode');</script>";
    		header("refresh: 0; url = Admin_options.php");

    	}

// echo $_SESSION["Q_code"];
?>
<body style="background-color: lightblue;">
	<center></center><br>
<?php
echo "<center><h2>Staff name: ".$_SESSION["staff_name"]."</h2><br></center>";
?>
<?php
 echo "<form method='post'><table border=2 cellpadding=20px>";
 echo "<tr style='font-size:20px;'><th>S.no</th><th>Question</th><th>Option A</th><th>Option B</th><th>Option C</th><th>Option D</th><th>Answer</th></h1></tr>";
for($i=1;$i<=$no;$i++)
{
     
      echo  "<tr><td  style='font-size:20px;'>".$i."</td><td><input type='text' name='Question[]' placeholder='Enter the Question' size='40' style='height:40px;font-size:14pt;' required ></td>";
      echo  "<td><input type='text' name='A[]' placeholder='Enter Option A'    size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='B[]' placeholder='Enter Option B' size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='C[]' placeholder='Enter Option C'size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='D[]' placeholder='Enter Option D'size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='Ans[]' placeholder='Answer' size='20' style='height:40px;font-size:14pt;' required></td></tr>";
   	  
}
echo  "<tr><td colspan='7'><center><input type='submit' value='Upload' formaction='Quesion_paper_db.php' style='height:50px;font-weight:bold;font-size:24px;width:10%;border-radius:20px;'></center></td></tr>";
echo   "</table></form><br><br>";



?>


</body>
</html>