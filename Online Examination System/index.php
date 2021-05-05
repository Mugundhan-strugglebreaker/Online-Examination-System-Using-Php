<?php
session_start();
?>
<center><div id="response" style="font-weight: bold;font-size: 60px;"></div></center>
<script type="text/javascript">
  setInterval(function(){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","response.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML=xmlhttp.responseText;
  },1000);
</script>

