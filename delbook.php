<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();
do_html_header('删除图书');

$conn = db_connect();
$isbn = check_input($conn,$_GET['isbn']);
if(!$conn)
	echo '数据库未连接';
$query="select * from books where isbn='".$isbn."'";
$result=$conn->query($query);
if($result->num_rows==0){
	echo "图书不存在";
}else{
	$query="delete from books where isbn='".$isbn."'";
	$result=$conn->query($query);
	$query="select * from books where isbn='".$isbn."'";
	$result=$conn->query($query);
	if($result->num_rows>0){
		echo "删除失败。";
	}else{
		echo "删除成功。";
	}
}

do_html_footer();
?>
