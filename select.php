<?php
//database settings
session_start();
$a =$_SESSION["user"];
$c = mysql_connect('localhost','jyccovov','Murious@@12');
	$s = mysql_select_db('jyccovov_yp',$c);
$sql="select * from `$a`";
//$data = array();
$rs = mysql_query($sql,$c);
if(mysql_num_rows($rs)== 0){
   echo "This Page is Under Construction";
}
else{
while ($row = mysql_fetch_assoc($rs)) {
  $data[] = $row;
}

	//print_r($data);
    
    print json_encode($data);}
?>


