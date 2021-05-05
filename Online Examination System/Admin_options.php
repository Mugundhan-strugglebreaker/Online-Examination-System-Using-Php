<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin_option
	</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<style>
    form
  {
  	box-shadow: 20px;
  	margin-top: -120px;
    margin-left: 400px;
    margin-right: 450px;
  }
  table
  {
  	margin-top: -60px;
  	margin-left: 30px;
    margin-bottom: 5px;
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
  	
   /* box-sizing: border-box;
  	border:none;
  	border-bottom: 2px solid black;
  	background-color: lightblue;*/
     background-color: transparent;
    color:black;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #000000 2px;
    padding: 3px 10px;
    text-align: center;
    text-decoration-color: black;


  }
   input[type=password]
  {
  	/*
    box-sizing: border-box;
  	border:none;
  	border-bottom: 2px solid black;
  	background-color: lightblue;*/
      background-color: transparent;
    color:black;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #000000 2px;
    padding: 3px 10px;
    text-align: center;

  }
  fieldset
  {
  	border: 6px solid;
    color: black;  	
  }
  legend
  {
  	font-size: 30px;
  	font-weight: bold;
  }
     div
     {
     	background-color: ;
     }
	.tabContainer
	{
		width: 100%;
		height: 350px;
		
	}
	.buttonContainer
	{
		height: 15%;
    background-color: transparent;
    color: white;
		
    }
    h3
    {
    	color: white;
    }

     button
    {
    	width: 16.66%;
    	height: 100%;
    	float: left;
    	border:none;
    	outline: none;
    	cursor: pointer;
    	padding: 10px;
    	font-family: sans-serif;
    	font-size: 18px;
    	background-color: lightgrey;
      color: black;
    }
    button:hover
    {
    	background-color: grey;
    }
    .tabPanel
    {
    	height: 175%;
		background-color:white;
		color:black;
		text-align:center;
		padding-top: 5px;
		padding-bottom: 5px;
		box-sizing: border-box;
        /*font-family: sans-serif;*/
    	font-size: 22px;
    	display: none;
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
  	
    box-shadow : 0 8px 16px 0 black,  
                    0 6px 20px  0 rgba(100, 200, 0, 0.19);
  }
   input.edit_submit
  {
    margin-top: 50px;
    margin-left: 20px;
    margin-bottom:-15px;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
    border-radius: 20px;
    width: 60%;
    background-color: yellow;
    

  }
  input.edit_submit:hover
  {
    border:10px red groove;
    box-shadow : 0 8px 16px 0 blue,  
                    0 6px 20px  0 rgba(100, 200, 0, 0.19);
  }
  .table
  {
    margin-top: 30px;
  }
  .hname
  {
    color: black;
    background-color: transparent;
  }
  body
  {
   margin:0;
    padding:0;
    background:#000033; 
  }
  div
  {

    margin:0;
    padding:0;
    background-image: url("b11.jpg");
    background-size: cover;
   /* background-repeat: no-repeat;*/
   /* background-size: 1400px;*/
    /*background-color: rgb(102,178,255);*/
  
  }
  a:hover
  {
    background:#669900;
  }
  a
  {
    width:50px;
    border-radius: 20px;
  }
</style>
</head>

<body >
<p style="font-size: 30px;font-weight: bold; color: white;">Online Examination System&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	Welcome <?php echo $_SESSION["staff_name"]?>!<a href="welcome.html" style="color: white;text-decoration: none; padding: 10px; margin-left: 350px;">Logout</a></p>

     <div class="tabContainer">
     	 <div class="buttonContainer">
     	 	<button onclick="showPanel(0,'')" style="color: black;">Add new Admin</button>
     	 	<button onclick="showPanel(1,'')">Set Question Paper</button>
     	 	<button onclick="showPanel(2,'')">View Result</button>
     	 	<button onclick="showPanel(3,'')">Rank Table</button>
     	 	<button onclick="showPanel(4,'')">Edit</button>
     	 	<button onclick="showPanel(5,'')">Print as Excel</button>
     	 
     	 </div>
     	 <div class="tabPanel">
     	     <form method="post" >

				<fieldset>
					<legend>Login credentials</legend>
				<center>
				<table cellpadding="15px">
				
				<tr><td><i class="fa fa-user-circle fa-2x"></i></td><td><input class="iname" type="text" name="name"  placeholder="Enter your Name" pattern="^[a-zA-Z ]+$" title="Please enter correct format eg.Abcdef"  required></td></tr><br>

				<tr><td><i class="fas fa-envelope fa-2x"></i></td><td><input class="iemail" type="text" name="email"  placeholder="Enter your Email" pattern="^[a-z0-9]+@[a-z]+.(com)" title="Please enter correct format eg.abc@gmail.com"  required></td></tr><br>
        
				<tr><td><i class="fas fa-key fa-2x" ></i></td><td><input class="ipassword" id="pass" type="password" name="password" placeholder="Enter your Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Password should contains atleast One Uppercase One Lowercase One number One Special character and alteast 8 characters"  required></td><td><span class="eye" onclick="myFunction()"><i id="hide1" style="display: none;" class="fas fa-eye fa-2x"></i><i id="hide2"  class="fas fa-eye-slash fa-2x"></i></span></td></tr><br>
				
        <tr><td><i class="fas fa-key fa-2x" ></i></td><td><input class="irpassword" id="pass" type="password" name="rpassword" placeholder="Reenter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="Password should contains atleast One Uppercase One Lowercase One number One Special character and alteast 8 characters"  required></td></tr><br>
				
        <tr><td></td><td><input type="submit" class="admin_submit" name="Submit_login"  formaction="Admin_register.php"></td></tr>
       
			  
          </table></center>
			    <br><br><br>
			  </fieldset>
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
			</form>

     	 
       	 </div>

     	 <div class="tabPanel">
            <form method="post" action="Question_paper_set.php" >
              <fieldset>
                 <legend>Questions-info</legend>
                 <table class="table">
                   <tr><td><h3 class="hname">Question Code:</h3></td><td><input type="text" class="iname" name="Qcode"  placeholder="Enter Question Code" required></td></tr>
                   <tr><td><h3 class="hname">Subject:</h3></td><td><input type="text" class="iname" name="subject"  placeholder="Enter Subject Name" required></td></tr>
                   <tr><td><h3 class="hname">No of Questions:</h3></td><td><input type="text" class="iname" name="NoofQuestion"  placeholder="Enter no of Questions" required></td></tr>
                   <tr><td><h3 class="hname">Start time:</h3></td><td><input type="datetime-local" class="iname" name="s_time" style="background-color: transparent;" required></td></tr>
                   <tr><td><h3 class="hname">End time:</h3></td><td><input type="datetime-local" class="iname" name="e_time" style="background-color: transparent;" required></td></tr>
                   <tr><td></td><td><input type="submit" class="admin_submit" name=""></td></tr>
                 </table>
              </fieldset>
             

            </form>
       </div>
     	 <div class="tabPanel">

              <form method="post">
                      <fieldset>
                        <legend>Result</legend>
                        <table class="table">
                          <tr><td><h3 class="hname">Select Question paper Code:</h3></td><td><select class="iname" name="select_tag">        
                           <?php
                            
                               $con=mysqli_connect("localhost:3306","root","","online_examination");
                               
                              $query="select Qcode from question_papers where email='{$_SESSION["email"]}'";
                              $res=mysqli_query($con,$query);
                              if(mysqli_num_rows($res)>0)
                              {
                              while($rs=mysqli_fetch_assoc($res)){
                                       echo "<option value='{$rs["Qcode"]}' >".$rs["Qcode"]."</option>";
                              }
                              }
                            ?>

                          </select></td></tr>
                          <tr><td colspan="2"><input type="submit" class="admin_submit" name="Update" value="Submit" style="width: 30%;
                          margin-left: 350px;" formaction="Results.php"></td></tr>
                        
                       </table>
                      </fieldset>

                  </form>


       </div>
     	 <div class="tabPanel">
         
         <form method="post">
                      <fieldset>
                        <legend>Rank</legend>
                        <table class="table">
                          <tr><td><h3 class="hname">Select Question paper Code:</h3></td><td><select class="iname" name="select_tag">        
                           <?php
                            
                               $con=mysqli_connect("localhost:3306","root","","online_examination");
                               
                              $query="select Qcode from question_papers where email='{$_SESSION["email"]}'";
                              $res=mysqli_query($con,$query);
                              if(mysqli_num_rows($res)>0)
                              {
                              while($rs=mysqli_fetch_assoc($res)){
                                       echo "<option value='{$rs["Qcode"]}' >".$rs["Qcode"]."</option>";
                              }
                              }
                            ?>

                          </select></td></tr>
                          <tr><td colspan="2"><input type="submit" class="admin_submit" name="Update" value="Submit" style="width: 30%;
                          margin-left: 350px;" formaction="Rank.php"></td></tr>
                        
                       </table>
                      </fieldset>

                  </form>
       </div>
     	 <div class="tabPanel">
            <form method="post">
                <fieldset>
                  <legend>Edit Options</legend>
                  <table class="table">
                    <tr><td><h3 class="hname">Select Question paper Code:</h3></td><td><select class="iname" name="select_tag">        
                     <?php
                      
                         $con=mysqli_connect("localhost:3306","root","","online_examination");
                         
                        $query="select * from question_papers where email='{$_SESSION["email"]}'";
                        $res=mysqli_query($con,$query);
                        $flag_edit=0;
                        if(mysqli_num_rows($res)>0)
                        {
                        while($rs=mysqli_fetch_assoc($res)){
                                  date_default_timezone_set('Asia/Kolkata');
                               if(date('Y-m-d H:i:s')<$rs["end_time"])
                               {
                                echo "<option value='{$rs["Qcode"]}' >".$rs["Qcode"]."</option>";
                                $flag_edit=1;
                                  //echo $rs["end_time"];
                               }

                        }
                        }
                        if($flag_edit==0)
                        {
                          echo "<option value='no'>No Question Paper Availble</option>";
                        }
                      ?>

                    </select></td></tr>
                    <tr><td colspan="2"><input type="submit" class="admin_submit" name="Add" value="Add" style="width: 50%;
                          margin-left: 280px;" formaction="Add_Question.php"></td></tr>
                    <tr><td colspan="2"><input type="submit" class="admin_submit" name="Update" value="Update" style="width: 50%;
                          margin-left: 280px;" formaction="Update_Question.php"></td></tr>
                  
                 </table>
                </fieldset>

            </form>


       </div>
     	 <div class="tabPanel">
           <form method="post">
                      <fieldset>
                        <legend>Result</legend>
                        <table class="table">
                          <tr><td><h3 class="hname">Select Question paper Code:</h3></td><td><select class="iname" name="select_tag">        
                           <?php
                            
                               $con=mysqli_connect("localhost:3306","root","","online_examination");
                               
                              $query="select Qcode from question_papers where email='{$_SESSION["email"]}'";
                              $res=mysqli_query($con,$query);
                              if(mysqli_num_rows($res)>0)
                              {
                              while($rs=mysqli_fetch_assoc($res)){
                                       echo "<option value='{$rs["Qcode"]}' >".$rs["Qcode"]."</option>";
                              }
                              }
                            ?>

                          </select></td></tr>
                          <tr><td colspan="2"><input type="submit" class="admin_submit" name="Update" value="Submit" style="width: 30%;
                          margin-left: 340px;" formaction="Excel.php"></td></tr>
                        
                       </table>
                      </fieldset>

                  </form>

       </div>

     	 	
     </div>
  <script  >


  	var tabButtons=document.querySelectorAll("button");
    var tabPanels=document.querySelectorAll(".tabPanel");
    function showPanel(panelIndex,colorCode)
    {
    	tabButtons.forEach(function(node)
    	{
    		node.style.backgroundColor="";
    		node.style.color="";
    	});
    	tabButtons[panelIndex].style.backgroundColor=colorCode;
    	tabButtons[panelIndex].style.color="black";
    	tabPanels.forEach(function(node)
    	{
    		node.style.display="none";
    	});
    	tabPanels[panelIndex].style.backgroundColor=colorCode;
    	tabPanels[panelIndex].style.display="block";

}
  showPanel(0,'');


  </script>
    

</body>
</html>
