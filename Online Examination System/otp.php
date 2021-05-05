

<?php
   include("mail_function.php");
   date_default_timezone_set("Asia/Kolkata");
   $sucess="";
   $error_message="";
   $con=mysqli_connect("localhost:3308","root","","mydb");
   if(!empty($_POST["sumbit_email"]))
   {
   	 $result=mysqli_query($con,"select * from registered_users where email='".$_POST["email"]."'");
   	 if(mysqli_num_rows($result)>0)
   	 {
   	 	$otp=rand(100000,999999);
   	 	$mail_status=sendOTP($_POST["email"],$otp);
   	 	if($mail_status==1)
   	 	{
   	 		$result=mysqli_query($con,"insert into otp_expiry(otp,is_expired,create_at) values('".$otp."',0,'".date("Y-m-d H:i:s")."')");
   	 		$current_id=mysqli_insert_id($con);
   	 		if(!empty($current_id))
   	 		{
   	 			$sucess=1;
   	 		}

   	 	}
   	 }
   	 else
   	 {
   	 	$error_message="Email not Exists";
   	 }
   }
    if(!empty($_POST["sumbit_otp"]))
    {
    	$result=mysqli_query($con,"select * from otp_expiry where otp='".$_POST["otp"]."' AND is_expired!=1 AND NOW()<=DATE_ADD(create_at,INTERVAL 24 HOUR) ");
    	if(!empty(mysqli_num_rows($result)))
    	{
    		$result=mysqli_query($con,"update otp_expiry SET is_expired=1 where otp='".$_POST["otp"]."' ");
    		$sucess=2;
    	}
    	else
    	{
    		$sucess=1;
    		$error_message="Invalid Otp";
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
<style>
	body
	{
		font-family: calibri;

	}
	.tblLogin
	{
		border:#95bee6 1px solid;
		background:#d1e8ff;
		border-radius: 4px;
		max-width: 300px;
		padding: 20px 30px 30px;
		text-align: center;
	}
	.tableheader{ font-size: 20px; }
	.tablerow{padding: 20px;}
	.error_message{ color: #b12d2d;
	background:#ffb5b5;
	border:#c76969 1px solid;

	 }
	 .message
	 {
	 	width:100%;
	 	max-width: 3009x;
	 	padding:10px 30px;
	 	border-radius: 4px;
	 	margin-bottom: 5px;

	 }.login-input
	 {
	 	border:#CCC 1px solid;
	 }
	 .login-input
	 {
	 	border:#CCC 1px solid;
	 	padding: 10px 20px;
	 	border-radius: 4px;
	 }
	 .btnSubmit
	 {
	 	padding:10px 20px;
	 	background:#2c7ac5;
	 	border:#d1e8ff 1px solid;
	 	color:#FFF;
	 	border-radius: 4px;
	 }
</style>
</head>
<body>
<?php
if(!empty($error_message))
{
?> 
<div class="message error_message"><?php  echo $error_message; ?></div>
<?php
}
?>
<form name="frmUser" method="post" action="">
	<div class="tblLogin">
		<?php
			if(!empty($sucess==1))
			{
		?>
		<div class="tableheader">Enter otp</div>
		<p style="color: #31ab00;">Check your email for otp</p>
		<div class="tablerow">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>

		</div>
		<div class="tableheader">
			<input type="submit" name="sumbit_otp" value="Submit" class="btnSubmit">
		</div>
		<?php
 			}else if($sucess==2)
 			{
		 ?>
		 <p style="color: #31ab00;">Welcome you have successfully Logged in!</p>
		 <?php
		 	}
		 	else
		 	{
		 ?>
		 <div class="tableheader">Enter your Login email</div>
		 <div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
		 <div class="tableheader"><input type="submit" name="sumbit_email" value="Submit" class="btnSubmit"></div>
		 <?php
		   }
		 ?>
	</div></form></body></html>
