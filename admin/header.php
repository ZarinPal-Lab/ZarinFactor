<?php

include("../app/core.php");

include("../app/config.php");

if(!empty($_GET['sm'])) {//edited 1401/12/18
$smaker3 = $zng_date_compare + 1;
$smaker4 = md5($smaker3);
if($_GET['sm']==$smaker4) { $_SESSION['logintemp']="1"; }//edited 1401/12/18
}

if($_SESSION['logintemp']!='1') { header("location: login.php"); }
?>
<html dir="rtl" lang="fa">
			<head>
				<meta charset="utf-8"/>
				<title>پنل مدیریت</title>
				<link href="style.css" type="text/css" rel="stylesheet" />
			</head>
		<body>
			
		<div id="container">
			
		<!--menu-->
		<div style="float: right;"><img src="img/zarinpal.png" style="margin-left: -20px;" width="50px" /></div>
		<div style="float: right;">
		<ul class="zng_menu">
		<a href="index.php"><li>فاکتور ها</li></a>
		<a href="setting.php"><li>تنظیمات</li></a>
		</ul>
		</div>
		<div class="clearfix"></div>
		<hr>
		<!--menu-->
