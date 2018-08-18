<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('添加分类');

if(!isset($_SESSION['user'])){
	header("location:admin.php");
}

if(isset($_POST['category'])){
	$conn=db_connect();	
	$cat=check_input($conn,$_POST['category']);
	if(!$conn)
	echo '数据库未连接';
//检查分类是否已经存在
	$query="select * from categories where catname='".$cat."'";
	$result=$conn->query($query);
	if($result->num_rows>0){
		echo $cat."分类已经存在";
		return;
	}

//插入分类
	$query="INSERT INTO categories set catname='".$cat."'";
	$result=$conn->query($query);
	
//检查是否添加成功
	$query="select * from categories where catname='".$cat."'";
	$result=$conn->query($query);
	if($result->num_rows>0){
		echo "添加".$cat."成功";
	}
	else{
		echo "添加".$cat."失败";
	}
}
else{
	?>
	

<form method="post" action="addcat.php">
<table bgcolor="#cccccc">
<tr>
<td>图书类别</td>
<td><input type="text" name="category"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="添加"></td>
</tr>
</table>
</form>

<?php
}
do_html_footer();
?>