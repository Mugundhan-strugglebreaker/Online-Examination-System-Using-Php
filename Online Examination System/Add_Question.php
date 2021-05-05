<?php
session_start();
if(!isset($_POST["add_Question_submit"]))
{
$select_tag=$_POST["select_tag"];
$q_code=$_POST["select_tag"];
if($select_tag=="no")
{
   echo "<script>alert('No Question papers Available'); </script>";
          header("refresh: 0; url = Admin_options.php");
}
else
{
if(!isset($_POST["add_Question_submit"]))
{

$_SESSION["Q_code"]=$q_code;
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
    color: white;
  }
  div
  {
     margin:-10px;
    margin-right: 0px;
  }
  </style>
</head>
<body style="background-color: lightblue;">


<div class="nav">
    <ul>
      <li><h1>Online Examination System</h1></li>
      <li><h1 style="font-size:30px; margin-left: 250px;">Adding Questions
  </h1></li>
      <li><a href="Admin_options.php">Back</a></li>
    </ul>
    
  </div>
  <br><br><br>
<form method="post" action="Add_Question.php">
	<input type="text" name="no_of_question" placeholder="no_of_Questions" >
	<input type="submit" name="add_Question_submit" value="Add a Question">
</form>
</body>
</html>
<?php

if(isset($_POST["add_Question_submit"]))
{
	
	$no=$_POST["no_of_question"];
	echo "<form method='post'><table border=2 cellpadding=20px>";
 echo "<tr style='font-size:20px;'><th>S.no</th><th>Question</th><th>Option A</th><th>Option B</th><th>Option C</th><th>Option D</th><th>Answer</th></h1></tr>";
for($i=1;$i<=$no;$i++)
{
     
      echo  "<tr><td  style='font-size:20px;'>".$i."</td><td><input type='text' name='Question[]' placeholder='Enter the Question' size='40' style='height:40px;font-size:14pt;' required ></td>";
      echo  "<td><input type='text' name='A[]' placeholder='Enter Option A'    size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='B[]' placeholder='Enter Option B' size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='C[]' placeholder='Enter Option C'size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='D[]' placeholder='Enter Option D'size='20' style='height:40px;font-size:14pt;' required></td>";
   	  echo  "<td><input type='text' name='Ans[]' placeholder='Answer' size='20' style='height:40px;font-size:14pt;'required></td></tr>";
   	  
}
echo  "<tr><td colspan='7'><center><input type='submit' value='Upload' formaction='Question_paper_db1.php' style='height:50px;font-weight:bold;font-size:24px;width:10%;border-radius:20px;'></center></td></tr>";
echo   "</table></form><br><br>";


}
?>