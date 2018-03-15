<?php
session_start();
$a=$_SESSION["user"];
$c = mysql_connect('localhost','jyccovov','Murious@@12');
	$s = mysql_select_db('jyccovov_yp',$c);
echo "hello";

$data = json_decode(file_get_contents("php://input"));
$id=$data->id;
$cat=$data->cat;
echo $id;
echo $cat;

	$result=mysql_query("INSERT INTO `$a` (`Work`, `Category`,`date`) VALUES ('$id','$cat',NOW())",$c);
?>


