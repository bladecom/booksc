<?php
include_once('output_fns.php');
include_once('db_fns.php');
session_start();
do_html_header('Lis Book-Shop');
if(isset($_GET['status'])&&($_GET['status']=='delbook'))
	echo "请选择要删除的书籍类别";
$conn=db_connect();
$query="select catid,catname from categories";
$result=$conn->query($query);
if(!$result){
	echo "查询失败。";
}
$cat_array=db_result_to_array($result);
if(!is_array($cat_array)){
	echo "没有数据。";
	return;
}
echo "<ul>";
?>
<table width=1000 border="1" align="center" cellspacing="0">
<tr>
<td width=50>序号</td>
<td width=350>书名</td>
</tr>
<?php
	$i=1;
	foreach($cat_array as $row){
?>
	<tr>
	<td width=50><?php echo $i;$i++;?></td>
	<td width=350><a href="show_cat.php?catid=<?php echo $row['catid'];?>"><?php echo $row['catname'];?></a></td>	
	</tr>
<?php
}
?>
</table>

<?php
do_html_footer();
?>
