<?php
include_once('output_fns.php');
include_once('db_fns.php');
session_start();

unset($_SESSION['USER']);
session_destroy();
header("location:index.php");
?>