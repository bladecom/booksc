<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('添加分类');
if(!isset($_SESSION['user'])){
	header("location:admin.php");
}

$conn=db_connect();
if(!$conn)
echo '数据库未连接';

if(isset($_POST['isbn'])&&isset($_POST['title'])&&isset($_POST['author'])&&isset($_POST['price'])&&isset($_POST['description'])){
	$isbn=$_POST['isbn'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$catid=$_POST['catid'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	
	//检查图书是否已经存在
	$query="select * from books where isbn='".$isbn."'";
	$result=$conn->query($query);
	if($result->num_rows>0){
		echo "图书《".$title."》已经存在";
		return;
	}

	$query="INSERT INTO books VALUES ('".$isbn."','".$author."','".$title."',".$catid.",".$price.",'".$description."')";
	$result=$conn->query($query);
	if($result){
		echo "添加图书".$title."成功";
	}else{
		echo "添加图书".$title."失败";
	}
}else{
	echo "请填写完整";
	$query="select * from categories";
	$result=$conn->query($query);
	$cat_array=db_result_to_array($result);
	?>
	

<form method="post" action="addbook.php">
<table bgcolor="#cccccc">
<tr>
<td>图书编号</td>
<td><input type="text" name="isbn"/></td>
</tr>
<tr>
<td>书名</td>
<td><input type="text" name="title"/></td>
</tr>
<tr>
<td>作者</td>
<td><input type="text" name="author"/></td>
</tr>
<tr>
<td>图书类别</td>
<td><select name="catid"/>
<?php
foreach($cat_array as $row){
?>
<option value="<?php echo $row[catid]; ?>"><?php echo $row[catname]?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>图书价格</td>
<td><input type="text" name="price"/></td>
</tr>
<td>图书简介</td>
<td><input type="text" name="description"/></td>
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