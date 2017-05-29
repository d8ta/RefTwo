<?php 
// cookie setzen über php
setcookie("js_alert", "hide", time()+3600*24*365*10, "/");


// redirect zur startseite
header("HTTP/1.1 301 Moved Permanently"); 
header("location: http://" . $_SERVER["HTTP_HOST"] . $_GET["url"]); 


 ?>