<?php
session_start();
if($_SESSION['logintemp']=="1") { header("location: index.php"); }
include("../app/core.php");
include("../app/config.php");

if($_POST[username]=="admin") {
	
$zng_fg = mysql_query("SELECT * FROM zng_system WHERE ID='1' ");
while($row = mysql_fetch_array($zng_fg)) {
$adminpassword = $row['adminpass'];
}

$password_enter = md5($_POST['password']);
if($password_enter==$adminpassword) { $smaker = $zng_date_compare + 1; $smaker2 = md5($smaker); header("location: index.php?sm=$smaker2"); }
else { $note = '<div class="note" id="error">نام کاربری یا رمز عبور اشتباه است.</div>'; }

}
elseif(!empty($_POST[username])) {
	$note = '<div class="note" id="error">نام کاربری یا رمز عبور اشتباه است.</div>';
}
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
		</div>
		<div class="clearfix"></div>
		<hr>
		<!--menu-->

		<?php echo $note; ?>

		<form action="login.php" method="POST" accept-charset="ISO-8859-1" class="zng_form_pay">
		<table class="zng_id_table">

		<tr>
		<td class="top" colspan="2" style="text-align: center;">ورود</td>
		</tr>

		<tr>
		<td class="top">نام کاربری</td>
		<td><input type="text" name="username" required/></td>
		</tr>

		<tr>
		<td class="top">رمز عبور</td>
		<td><input type="password" name="password" required/></td>
		</tr>
		
		</table>
		<input type="submit" value="ورود" class="zng_pay" />
		</form>

		<hr>
		<!--footer-->
		<div style="float: left;"><span style="align: left; font-size: 8px; color: #000000;">ZarinPal - IDPay - v: 1.2</span></div>
		<div class="clearfix"></div>
		<!--footer-->
		</div>
		</body>
</html>
