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

header('location:index.php');
do_html_footer();
?>