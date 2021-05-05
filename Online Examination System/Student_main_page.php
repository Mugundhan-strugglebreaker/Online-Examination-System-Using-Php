<?php
session_start();

 $con=mysqli_connect("localhost:3306","root","","online_examination");
if(isset($_POST["submit"]))
{
  
  
  $em=$_POST["email"];
  $ps=$_POST["Password"];
  $_SESSION["s_email"]=$em;
   $query="select * from student_details";
  $res=mysqli_query($con,$query);
  $flag=0;

  while($row=mysqli_fetch_assoc($res))
  {
        
        if($row["email"]==$em && $row["password"]==$ps)
        {
        
          $flag=1;
          $_SESSION["regno"]=$row["regno"];
          $_SESSION["Student_name"]=$row["name"];
          break;
        }
  }

  if($flag==1)
  {

   header("Location: Student_Qcode_Display.php");
  }
  else
  {
    echo "<script>alert('INVALID USERNAME AND PASSWORD');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student_main_page</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<style>
  body
  {
   /* background-image: url("b4.jpg");*/
 /* //	background-color: lightblue;*/
  	/*background-repeat: no-repeat;
    background-size: cover;*/
     margin:0;
    padding:0;
    background-image: url("b9.jpg");
    background-size: cover;
  }
  h2
  {
  	font-weight:bold;
  	font-size: 50px;

  }
  form
  {
  	box-shadow: 20px;
    margin-left: 400px;
    margin-right: 450px;
    margin-bottom: 100px;
  }
  fieldset
  {
  	border: 5px solid;
  }
  legend
  {
  	font-size: 40px;
  	font-weight: bold;
  }
  h3{

  }
  .hemail
  {
  	margin-left: 50px;
  	font-size: 28px;
  	font-weight: bold;
   
  }
  .hpassword
  {
  	margin-left: 50px;
  	font-size: 28px;
  	font-weight: bold;

    
  }
  .iemail
  {
  	margin-left: 50px;
  	font-size: 20px;
  	font-weight: bold;
     background:none;
     height:35px;
     

  }
input[type=text]:focus
{
      background-color: transparent;
}
input[type=password]:focus
{
      background-color: transparent;
}
  .ipassword
  {
  	margin-left: 50px;
  	font-size: 20px;
  	font-weight: bold;
    background:none;
    height:35px;
  }
  
  input.login
  {
  	margin-top: 50px;
    margin-left: 80px;
  	font-size: 20px;
  	font-weight: bold;
  	padding: 10px;
  	border-radius: 20px;
  	width: 60%;
  	background:none ;
    border:2px solid black;
  	

  }
  input.login:hover
  {
 /* //	border:10px red groove;*/
    box-shadow : 0 8px 16px 0 blue,  
                    0 6px 20px  0 rgba(100, 200, 0, 0.19);
  }
  input[type=text]
  {
  
  /*  width:90%;	
    box-sizing: border-box;
    background:none;
  	border:2px solid black;*/
  	/*border-bottom: 2px ;*/
  	/*background-color: lightblue;*/
    background-color: transparent;
    color:solid #000000;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #000000 1px;
    padding: 3px 10px;
    text-align: center;

  }
   input[type=password]
  {
    
   /* width:90%;
    box-sizing: border-box;
    background:none;
    border:2px solid black;*/
   /* border:none;
    border-bottom: 2px solid black;
    background-color: lightblue;*/
    background-color: transparent;
    color:solid #000000;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #000000 1px;
    padding: 3px 10px;
    text-align: center;

  }

  }
  #hide1
  {
    display: none;
    background-color: blue;
  }
  div
  {
    margin-top:-1px;
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
    margin-left: 840px;
    text-decoration: none;
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
<body>
  <div class="nav">
    <ul>
      <li><h1>Online Examination System</h1></li>
      <li><a href="Welcome.html">Back</a></li>
    </ul>
    
  </div>
<CENTER><h2>HELLO STUDENT !</h2></CENTER>
<form method="post">

	<fieldset>
		<legend>Login credentials</legend>
	<center>
	<table cellpadding="10px">
		
	<tr><td><i class="fas fa-envelope fa-3x"></i></td><td><input class="iemail" type="text" name="email"  placeholder="Enter your Email" pattern="^[a-z0-9]+@[a-z]+.[com|[acin.]]+" title="Please enter correct format eg.abc@gmail.com"  required></td></tr><br>
  <tr><td><i class="fas fa-key fa-3x" ></i></td><td><input class="ipassword"  type="password" name="Password" placeholder="Enter your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" id="pass" title="Password should contains atleast One Uppercase One Lowercase One number One Special character and alteast 8 characters"  required></td><td><span class="eye" onclick="myFunction()"><i id="hide1" style="display: none;" class="fas fa-eye fa-2x"></i><i id="hide2"  class="fas fa-eye-slash fa-2x"></i></span></td></tr><br>
     <tr><td></td><td><input class="login" type="submit" name="submit" value="Login"></td></tr>
    </table>
  </center>
    <br><br><br>
  </fieldset>
</form>
<script type="text/javascript">
   function myFunction()
   {
    var x=document.getElementById("pass");
    var y=document.getElementById("hide1");
    var z=document.getElementById("hide2");
    if(x.type==='password')
    {
      x.type="text";
      y.style.display="block";
      z.style.display="none";
    }
    else
    {
      x.type="password";
      y.style.display="none";
      z.style.display="block";
    }
   }
</script>
</body>
</html>
<?php
//session_start();
 
?>