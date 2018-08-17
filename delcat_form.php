<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('删除类别');
$conn=db_connect();
$query="select * from categories";
$result=$conn->query($query);
$cat_array=db_result_to_array($result);
?>
<form method="post" action="delcat.php">
<table bgcolor="#cccccc">
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
</table>
</form>
<?php
do_html_footer();
?>