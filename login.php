<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('登录');
?>
<form method="post" action="admin.php">
<table bgcolor="#cccccc">
<tr>
<td>用户名</td>
<td><input type="text" name="username"/></td>
</tr>
<tr>
<td>密码</td>
<td><input type="text" name="password"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="登录"></td>
</tr>
</table>
</form>
<?php
do_html_footer();
?>