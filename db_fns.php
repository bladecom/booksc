<?php
include('config.php');
function db_connect(){
	$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if($conn)
		return $conn;
	else
		return false;
}

function db_result_to_array($result){
	$res_array = array();
	
	for($count=0;$row=$result->fetch_assoc();$count++){
		$res_array[$count]=$row;
	}
	return $res_array;
}
?>
	
