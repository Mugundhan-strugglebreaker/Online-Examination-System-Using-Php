<?php
session_start();
$con=mysqli_connect("localhost:3308","root","","online_examination");

$e_time="";
$query="select * from question_papers where Qcode='{$_SESSION["question_code"]}'";
$re=mysqli_query($con,$query);
date_default_timezone_set('Asia/Kolkata');
while($r=mysqli_fetch_assoc($re))
{
    
    // $duration=-$row["end_time"];
  //echo $r["start_time"]."  ".$r["end_time"];
  $e_time=$r["end_time"];
}
echo " 
<center>
<p id='demo' style='font-weight:bold;font-size:40px;'></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date('{$e_time}').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id='demo'
  document.getElementById('demo').innerHTML = days + 'd ' + hours + 'h '
  + minutes + 'm ' + seconds + 's ';
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('demo').innerHTML = 'EXPIRED';
    alert('Test has Ended');
    window.location='Welcome.html';
  }
}, 1000);
</script></center>";
?>