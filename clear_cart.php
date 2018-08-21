<?php
include_once('db_fns.php');
include_once('output_fns.php');
session_start();

unset($_SESSION['cart']);
unset($_SESSION['items']);
unset($_SESSION['total_price']);
session_destroy();
header("location:index.php");
?>
