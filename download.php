<?php
$info = new SplFileInfo($_REQUEST["data"]);
$ext = $info->getExtension();

$nombre =  $_REQUEST["name"] . ".". $ext;;

$filename = "assets/archivos/" . $_REQUEST["data"]; 
$size = filesize($filename); 
header("Content-Transfer-Encoding: binary"); 
header("Content-type: application/force-download"); 
header("Content-Disposition: attachment; filename=$nombre"); 
header("Content-Length: $size"); 
readfile("$filename"); 

?>  