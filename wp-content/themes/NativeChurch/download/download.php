<?php
$file = $_GET['file'];
$ext = pathinfo($file, PATHINFO_EXTENSION);
$match_array =array('pdf','mp3','mpa','ra','wav','wma','mid','m4a','m3u','iff','aif');
if(in_array($ext,$match_array)){
header("Content-type: application/".$ext);
if (substr( $file, 0, 4 ) === "http") {
$filename = substr($file, strrpos($file, "/")+1);
header("Content-Disposition: attachment; filename=". $filename);
} else {
header("Content-Disposition: attachment; filename=". $file);
}
readfile($file);
}
?>