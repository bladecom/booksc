<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('管理员');
$username=$_POST['username'];
$password=$_POST['password'];
$conn=db_connect();
if(!$conn)
	echo '数据库未连接';
$query="select * from admin where username='".$username."' and password='".sha1($password)."'";
$result=$conn->query($query);
if($result->num_rows>0){
	$_SESSION['user']=$username;
	echo '欢迎回来'.$_SESSION['user'].'<br>';
	?>
	<table bgcolor="#cccccc" border="0" width=980 cellspacing="1">
	<tr>
	<td align="center"><a href="addcat.php">添加类别</a></td>
	<td align="center"><a href="delcat.php">删除类别</a></td>
	<td align="center"><a href="addbook.php">添加图书</a></td>
	<td align="center"><a href="index.php">删除图书</a></td>
	</tr>
	</table>
	<?php
}
else{
	?>
<form method="post" action="admin.php">
<table bgcolor="#cccccc">
<tr>
<td>用户名</td>
<td><input type="text" name="username"/></td>
</tr>
<tr>
<td>密码</td>
<td><input type="password" name="password"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="登录"></td>
</tr>
</table>
</form>
<?php
}
do_html_footer();
?>