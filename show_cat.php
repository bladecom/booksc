<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();
do_html_header('books');
$cat_id = $_GET['catid'];
$conn=db_connect();
$query='select isbn,author,title,price,description from books where catid='.$cat_id;
$result=$conn->query($query);
if($result->num_rows>0){
$books=db_result_to_array($result);
foreach($books as $row){
	?>
	<table width=1000 border="1" width="100%" cellspacing="0">
	<tr>
	<td width=50><?php echo $row[isbn];?></td>
	<td width=350><a href="showbook.php?isbn=<?php echo $row[isbn];?>"><?php echo $row[title];?></a></td>
	<td width=300><?php echo $row[author];?></td>
	<td width=30><?php echo $row[price];?></td>	
	<?php	
	if(isset($_SESSION['user'])){
	?>		
	<td width=30><a href="delbook.php?isbn=<?php echo $row[isbn];?>">删除</a></td>	<?php	}	?>
	</tr>
	</table>
<?php
}
}else{	
echo "<h2><font color='red'>当前类别没有书籍</h2>";	
return;
}
do_html_footer();
?>