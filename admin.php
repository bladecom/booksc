<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('管理员');
if(isset($_POST['username'])&&isset($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];
$conn=db_connect();
$query="select * from admin where username='".$username."' and password='".sha1($password)."'";
$result=$conn->query($query);
if($result->num_rows>0){
	$_SESSION['user']=$username;
	header("location:index.php");
}
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