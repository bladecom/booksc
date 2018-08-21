<?php
function do_html_header($title){
?>
	<html>
	<head>
	<tltle><?php echo $title;?></title>
	<style>
	body {font-family:Arial,Helvetica,sans-serif;font-size:13px}
	li,td{font-family:Arial,Helvetica,sans-serif;font-size:13px}
	a {color:#000000}
	</style>
	</head>
	<body align="center">
	<div width="980" align="center">
	<h1>Li's Book-Shop</h1>
	<hr />
	<a href="index.php">首页</a>
	<?php
	if(!isset($_SESSION['user'])){
		echo "<a href=admin.php>登录</a>";
		echo "<a href=clear_cart.php>清空</a>";
		return;
	}else{
		if($_SESSION['user']=='admin'){
			echo "欢迎回来，".$_SESSION['user'];
	?>
	<br>
	<table bgcolor="#cccccc" border="0" width=980 cellspacing="1">
	<tr>
	<td align="center"><a href="addcat.php">添加类别</a></td>
	<td align="center"><a href="delcat_form.php">删除类别</a></td>
	<td align="center"><a href="addbook.php">添加图书</a></td>
	<td align="center"><a href="index.php?status=delbook">删除图书</a></td>
	<td align="center"><a href="logout.php">退出</a></td>
	</tr>
	</table>
<?php 
		}
	}
}
function do_html_footer(){
  // print an HTML footer
?>
  </body>
  </html>
<?php
}

/*function display_category($cat_array){
	if(!is_array($cat_array){
		echo 'No categories currently available.';
		return;
	}
	echo "<ul>";
	foreach($cat_array as $row){
		$url=
	*/
?>
