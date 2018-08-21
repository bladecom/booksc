<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

do_html_header('添加至购物车');
@$new=$_GET['isbn'];
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=array();
	$_SESSION['items']=0;
	$_SESSION['total_price']=0.00;
}

if(isset($_SESSION['cart'][$new])){
	$_SESSION['cart'][$new]++;
}else{
	$_SESSION['cart'][$new]=1;
}

$cart=$_SESSION['cart'];
$items=$_SESSION['items'];
$total_price=$_SESSION['total_price'];
$conn=db_connect();
?>
<table width=1000 border="1" cellspacing="0">
	<tr>
	<td width=50>图书编号</td>
	<td width=350>书名</td>
	<td width=200>价格</td>
	<td width=30>数量</td>	
	</tr>
<?php
foreach($cart as $isbn =>$qty){
	?>
	<tr>
	<td width=50><?php echo $isbn;?></td>
	<td width=350>
	<?php 
	$query="select title,price from books where isbn='".$isbn."'";
	$result=$conn->query($query);
	if(!$result){
		echo "查询错误！！";
		return;
	}
	$item=$result->fetch_assoc();
	echo $item['title'];
	?></td>
	<td width=300><?php echo $item['price'];?></td>
	<td width=30><?php echo $qty;?></td>
	</tr>
	<?php
	$total_price+=$item['price']*$qty;
}
?>
</table>
	<table width=1000 border="1" cellspacing="0">
	<tr>
	<td width=500>总价</td>
	<td width=500>
<?php
	echo $total_price;
	?>
	</td>
	</tr>
	</table>
<?php
do_html_footer();
?>