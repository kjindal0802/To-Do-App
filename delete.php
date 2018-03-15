<?php
session_start();
$a= $_SESSION["user"];
$c = mysql_connect('localhost','jyccovov','Murious@@12');
	$s = mysql_select_db('jyccovov_yp',$c);

$data = json_decode(file_get_contents("php://input"));
$id=$data->id;
echo $id;

	$result=mysql_query("DELETE from `$a`where work = '$id'",$c);
?>


