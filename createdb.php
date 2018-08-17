<?php
include('../wp-config.php');
//echo DB_HOST;
$db=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$query="create table customers(customerid int unsigned not null auto_increment primary key,
	name char(60) not null,address char(80) not null,city char(30) not null,state char(20),
	zip char(10),country char(20) not null)ENGINE=InnoDB";
$db->query($query);
$query="create talbe orders(orderid int unsigned not null auto_increment primary key,
	customerid int unsigned not null references customers(customerid),
	amount float(6,2),date date not null,order_statuschar(10),ship_name char(60) not null,
	ship_address char(80) not null,ship_city char(30) not null,ship_state char(20),
	ship_zip char(10),ship_country char(20) not null)ENGINE=InnoDB";
$db->query($query);
$query="create table books(isbn char(13) not null primary key,author char(100),
	title char(100),catid int unsigned,price float(4,2) not null,description varchar(255))ENGINE=InnoDB";
$db->query($query);
$query="create table categories(catid int unsigned not null auto_increment primary key,
	catname char(60) not null)ENGINE=InnoDB";
$db->query($query);
$query="create table order_items(orderid int unsigned not null references orders(orderid),
	isbn char(13) not null references books(isbn),item_price float(4,2) not null,
	quantity tinyint unsigned not null,primary key(orderid,isbn))ENGINE=InnoDB";
$db->query($query);
$query="create table admin(username char(16) not null primary key,password char(40) not null)";
$db->query($query);
?>