<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION["end_time"];
$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);
$difference_in_seconds=$timesecond-$timefirst;
$time_lap=gmdate("H:i:s",$difference_in_seconds);
if($time_lap=='00:00')
{
	
	echo "<script>alert('Test has ended'); </script>";
     header("refresh: 0; url = Welcome.html");
}
else
{
	echo gmdate("H:i:s",$difference_in_seconds);
}


?>

<!-- if(isset($_SESSION["end_time"]))
        {
        $from_time1=date('Y-m-d H:i:s');
        $to_time1=$_SESSION["end_time"];
         
        $timefirst=strtotime($from_time1);
        $timesecond=strtotime($to_time1);
         
        $differenceinseconds=$timesecond-$timefirst;
        
         $time_lapse=gmdate("i:s",$differenceinseconds);   
         if($time_lapse=='00:00')
         {
             echo "Time Out";
             $array_items = array('end_time', 'duration', 'start_time');
             $this->session->unset_userdata($array_items);
         }
         else
         {
            echo gmdate("i:s",$differenceinseconds);        
         }
        }
        else
        {
            echo "Time out";


            Again Select The Duration from Database, Do it by yourself


            $duration=$row["duration"];
            $_SESSION["duration"]=$duration;
            $_SESSION["start_time"]=date("Y-m-d H:i:s");
            $end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));
            $_SESSION["end_time"]=$end_time;
        } -->