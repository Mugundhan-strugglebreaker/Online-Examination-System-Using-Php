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
            $query="select * from admin_details where email='{$_SESSION['email']}'";
            $res=mysqli_query($con,$query);
           // echo $query;
			while($r=mysqli_fetch_assoc($res))
            {
            	$name=$r["name"];
            }
            $st_date=substr($_SESSION["start_time"], 0,10)."     ".substr($_SESSION["start_time"], 11,5);
            $en_date=substr($_SESSION["end_time"], 0,10)."      ".substr($_SESSION["end_time"], 11,5);
         
            $query="select * from student_details";
            $res=mysqli_query($con,$query);
            $array_ind=0;
            $arrayName=array();
            $nam=array();
            while($row=mysqli_fetch_assoc($res))
            {
            	$arrayName[$array_ind]=$row["email"];
                  $nam[$array_ind]=$row["name"];
            	$array_ind++;
            }
			// $arrayName = array('18euit084@skcet.ac.in','18euit080@skcet.ac.in','18euit118@skcet.ac.in','18euec018@skcet.ac.in');
			for($i=0;$i<count($arrayName);$i++)
			{
			$to       = $arrayName[$i];
			$subject  = 'Test Invite';
			$message  = $string="<h3>Hi ".$nam[$i].", ".$name." is inviting you to take the test for the subject : ".$_SESSION["subject_name"]."<br>" ."Test Details:<br>Starts At: ".$st_date."<br>Ends At: ".$en_date."<br>Test Link: http://localhost/phpproject/Student_main_page.php<br>All The Best!</h3>";
			$headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
			            'MIME-Version: 1.0' . "\r\n" .
			            'Content-type: text/html; charset=utf-8';
			if(mail($to, $subject, $message, $headers))
			    echo "Email sent";
			else
			    echo "Email sending failed";
			}
 
    		header("refresh: 0; url = Admin_options.php");

?>