<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$rpassword=$_POST['rpassword'];
 
 if($password==$rpassword)
 {

 	$con=mysqli_connect("localhost:3308","root","","online_examination");
	$query="select 1 from Admin_details";
	$bool=mysqli_query($con,$query);
	if($bool==FALSE)
	{
		$query="create table Admin_details(id int not null auto_increment,name varchar(30),email varchar(30),password varchar(30),primary key(id) )";
		mysqli_query($con,$query);
	}
	$query="select * from Admin_details";
	$flag=0;
	$res=mysqli_query($con,$query);
	while($row=mysqli_fetch_assoc($res))
	{
		 if($row['email']==$email)
		 {
		 	$flag=1;
		 	break;
		 }
	}
	if($flag==1)
	{
		echo "<script>alert('User Already exists');</script>";
        header("refresh: 0; url = Admin_options.php");
	}
	else
	{
		$query="insert into Admin_details(name,email,password) values('{$name}','{$email}','{$password}')";
		mysqli_query($con,$query);
		echo "<script>alert('Registered Successfully');</script>";
		header("refresh: 0; url = Admin_options.php");
	}
 }
 else
 {
 	
 	echo "<script>alert('Password and Reenter-Password did not match');</script>";
    header("refresh: 0; url = Admin_options.php");
 }


//echo "<script>alert('Registered Successfully');</script>";

//header("refresh: 0; url = Admin_options.php");
?>