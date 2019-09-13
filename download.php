<?php
$data = $_REQUEST["data"];

$ext = substr($data, -3);
$nombre =  $_REQUEST["name"] . ".". $ext;;

$filename = "assets/archivos/" . $_REQUEST["data"]; 
$size = filesize($filename); 
header("Content-Transfer-Encoding: binary"); 
header("Content-type: application/force-download"); 
header("Content-Disposition: attachment; filename=$nombre"); 
header("Content-Length: $size"); 
readfile("$filename"); 

?>  