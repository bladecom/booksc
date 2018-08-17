<?php
include_once('db_fns.php');
include_once('output_fns.php');session_start();
do_html_header('books');
$isbn = $_GET['isbn'];
$conn=db_connect();
$query="select title,description from books where isbn='".$isbn."'";
$result=$conn->query($query);
if(!$result->num_rows){
	echo '没有查到书籍';
	return;
}
$desc=db_result_to_array($result);
if(!is_array($desc)){
	echo '当前分类下没有书籍.';
	return;
}?>	<table bgcolor="#cccccc" width=1000 border="1" cellspacing="0"><?php	foreach($desc as $row){?>	<tr>	<td width=30>书名</td>	<td><?php echo $row[title];?></td>	</tr>	<tr>	<td width=30>简介</td>	<td><?php echo $row[description];?></td>	</tr>
<?php
}
do_html_footer();
?>