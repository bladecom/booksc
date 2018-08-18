<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('删除类别');
if(!isset($_SESSION['user'])){
	header('location:admin.php');
}else{
	if(!isset($_POST['catid'])){
		header('location:delcat_form.php');
	}else{
		$conn=db_connect();
		$catid=check_input($conn,$_POST['catid']);
		//判断该类别下是否还有书籍
		$query="select * from books where catid=".$catid;
		$result=$conn->query($query);
		if($result->num_rows>0){
			echo "该类别下还有书籍";
			header("location:delcat_form.php?status=fail");
			return;
		}
		//删除类别
		$query="delete from categories where catid='".$catid."'";
		$result=$conn->query($query);
		//判断类别是否删除
		$query="select * from categories where catid=".$catid;
		$result=$conn->query($query);
		if($result->num_rows==0){
			echo "删除类别成功";
		}else{
			echo "删除类别失败";
		}
	}
}
?>
	
	