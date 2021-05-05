<?php
  if(isset($_POST["Submit_login"]))
  {
     $name=$_POST["name"];
     $regno=$_POST["regno"];
     $email=$_POST["email"];
     $phone=$_POST["phone"];
     $password=$_POST["password"];
     $rpassword=$_POST["rpassword"];
      if($password==$rpassword)
      {
           $con=mysqli_connect("localhost:3308","root","","online_examination");
           $query="select 1 from Student_details";
           $bool=mysqli_query($con,$query);
           if($bool==FALSE)
           {
              $query="create table Student_details(id int not null auto_increment,name varchar(30),regno varchar(30),email varchar(40),phone varchar(50),password varchar(30),primary key(id))";
              mysqli_query($con,$query);
           }
           $query="insert into Student_details(name,regno,email,phone,password) values('{$name}','{$regno}','{$email}','{$phone}','{$password}')";
           mysqli_query($con,$query);
            echo "<script> alert('Registered Successfully');</script>";
            
        header("refresh: 0; url = Welcome.html");
      }
      else
      {
       echo "<script> alert('Password and Reenter Password do not match');</script>";
            
        header("refresh: 0; url = Student_Registration.php");
        
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<style>
    form
    {
      margin-top: -80px;
    }
    table
    {

    }
    body
    {
       margin:0;
    padding:0;
    background-image: url("b9.jpg");
    background-size: cover;
    }
	.iname
  {
    margin-left: 50px;
    font-size: 20px;
    font-weight: bold;
  }
  .iemail
  {
    margin-left: 50px;
    font-size: 20px;
    font-weight: bold;
  }
  .ipassword
  {
    margin-left: 50px;
    font-size: 20px;
    font-weight: bold;
  }
  .irpassword
  {
    margin-left: 50px;
    font-size: 20px;
    font-weight: bold;
  }
  input[type=text]
  {
    
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
    input.admin_submit
  {
    margin-top: 50px;
    margin-left: 80px;
    margin-bottom:-15px;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
    border-radius: 20px;
    width: 60%;
    background-color: transparent;
    

  }
  input.admin_submit:hover
  {
  
    box-shadow : 0 8px 16px 0 blue,  
                    0 6px 20px  0 rgba(100, 200, 0, 0.19);
  }
  h3
  {
    font-size: 25px;
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
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body >
<div class="nav">
    <ul>
      <li><h1>Online Examination System</h1></li>
      <li><a href="Welcome.html">Back</a></li>
    </ul>
    
  </div>

  <center><p style="font-size: 40px;font-weight: bold;"> <i class="fa fa-graduation-cap fa-3x" ></i><u>Student Registration Form</u></p></center>
  <center>
     
    <form method="post" >

				
				<table cellpadding="20px">
				
				<tr><td><i class="fa fa-user-circle fa-3x"></i></td><td><input class="iname" type="text" name="name"  placeholder="Enter your Name" pattern="^[a-zA-Z ]+$" title="Please enter correct format eg.Abcdef"  required></td></tr><br>

        <tr><td><i class="fa fa-registered fa-3x" ></i></td><td><input class="iname" type="text" name="regno"  placeholder="Enter your Registration No" pattern="^[a-zA-Z0-9]+$" title="Please enter correct format eg.Abcdef"  required></td></tr><br>

				<tr><td><i class="fa fa-envelope fa-3x"></i></td><td><input class="iemail" type="text" name="email"  placeholder="Enter your email_id" pattern="^[a-z0-9]+@[a-z]+.[com|[acin.]]+" title="Please enter correct format eg.abc@gmail.com"  required></td></tr><br>

         <tr><td><i class="fa fa-phone fa-3x"></i></td><td><input class="iname" type="text" name="phone"  placeholder="Enter your Phone Number" pattern="^[0-9]+$" title="Please enter correct format eg.Abcdef"  required></td></tr><br>

				<tr><td><i class="fas fa-key fa-3x" ></i></td><td><input class="ipassword" type="password" name="password" id="pass" placeholder="Enter your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Password should contains atleast One Uppercase One Lowercase One number One Special character and alteast 8 characters"  required></td><td><span class="eye" onclick="myFunction()"><i id="hide1" style="display: none;" class="fas fa-eye fa-2x"></i><i id="hide2"  class="fas fa-eye-slash fa-2x"></i></span></td></tr><br>
				
        <tr><td><i class="fas fa-key fa-3x" ></i></td><td><input class="irpassword" type="password" name="rpassword" placeholder="Reenter password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Password should contains atleast One Uppercase One Lowercase One number One Special chara-cter and alteast 8 characters"  required></td></tr><br>
				
        <tr><td></td><td><input type="submit" class="admin_submit" name="Submit_login" ></td></tr>
       
			  
          </table>
			    <br><br><br>
			  
			</form>
    </center>
     <script>
       function myFunction()
       {
        var x=document.getElementById('pass');
        var y=document.getElementById('hide1');
        var z=document.getElementById('hide2');
        if(x.type==='password')
        {
          x.type='text';
          y.style.display='block';
          z.style.display='none';
        }
        else
        {
          x.type='password';
          y.style.display='none';
          z.style.display='block';
    }
   }
</script>
</body>
</html>