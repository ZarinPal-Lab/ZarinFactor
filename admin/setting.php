<?php
include("header.php");
//$zng_fg = mysql_query("SELECT * FROM zng_system WHERE ID='1' ");//edited 1401/12/18
$query = "SELECT * FROM zng_system WHERE ID =1";//edited 1401/12/18
$zng_fg = mysqli_query($zng_info_data, $query);//edited 1401/12/18
while($row = mysqli_fetch_assoc($zng_fg)) {//edited 1401/12/18
$title = $row['title'];
$merchant = $row['merchant'];
$webaddress = $row['webaddress'];
}
?>
	<form action="setting_submit.php" method="POST" accept-charset="ISO-8859-1" class="zng_form_pay">
	<table class="zng_id_table">

	<tr>
	<td class="top" colspan="2" style="text-align: center;">تنظیمات</td>
	</tr>

	<tr>
	<td class="top">نام وبسایت</td>
	<td><input type="text" value="<?php echo $title; ?>" name="title" required/></td>
	</tr>
	
	<tr>
	<td class="top">مرچنت کد ( زرین پال )</td>
	<td><input type="text" value="<?php echo $merchant; ?>" name="merchant" required/></td>
	</tr>
	
	<tr>
	<td class="top">آدرس وبسایت</td>
	<td><input type="text" placeholder="با / در آخر" value="<?php echo $webaddress; ?>" name="webaddress" required/></td>
	</tr>
	
	<tr>
	<td class="top" style="font-size: 10px;">رمز عبور مدیریت</td>
	<td><input type="text" placeholder="در صورتی که نمی خواهید تغییری کند خالی بگذارید" name="adminpass"/></td>
	</tr>

	</table>
	<input type="submit" value="ویرایش" class="zng_pay" />
	</form>
<?php
include("footer.php");
?>
