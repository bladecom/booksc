<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('删除类别');
if(!isset($_SESSION['user'])){
	header('location:admin.php');
}else{
	if(!isset($_POST['catid'])){
		header(location:'delcat_form.php');
	}else{
		$catid=$_POST['catid'];
		$conn=db_connect();
		$query="delete from categories where catid='".$catid."'";
		$result=$conn->query($query);
		$query="select * from categories";
		$result=$conn->query($query);
		if($result->num_rows==0){
			echo "删除类别成功";
		}else{
			echo "删除类别失败";
		}
	}
}
?>
	
	