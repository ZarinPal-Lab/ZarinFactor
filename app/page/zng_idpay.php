<?php
zng_header();
//Factor Get
if(empty($_GET['id'])) { $zng_fac_id = $_POST['id']; }
else { $zng_fac_id = $_GET['id']; }
if(empty($zng_fac_id)) { header("location: ?index=index&error=1"); }
else {

$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$zng_fac_id'");
if(mysql_num_rows($zng_fg) < 1) { header("location: ?index=index&error=2"); }
while($row = mysql_fetch_array($zng_fg))
{
$zng_id = $row['ID'];
$zng_from = $row['from'];
$zng_to = $row['to'];
$zng_for = $row['for'];
$zng_createdate = $row['createdate'];
$zng_paytime = $row['paytime'];
$zng_price = $row['price'];
$zng_description = $row['description'];
$zng_status = $row['status'];
$zng_ref = $row['ref'];

switch($zng_status) {
	case "nopay":
	$zng_status_persian = 'پرداخت نشده';
	$zng_pay_button = '
	<form action="?index=req" method="POST" accept-charset="ISO-8859-1" class="zng_form_pay">
	<input type="hidden" name="id" placeholder="شناسه فاکتور" value="' . $zng_id . '" />
	<input type="text" name="u_email" placeholder="ایمیل ( اجباری )" required />
	<input type="text" name="u_phone" placeholder="تلفن ( اختیاری )" />
	<input type="submit" value="پرداخت" class="zng_pay" />
	</form>
	';
	break;
	case "paid":
	$zng_status_persian = 'پرداخت شده';
	$zng_pay_button = '<button class="zng_pay" id="paid">پرداخت شده</button>';
	break;
	
}

	if($zng_status=="paid" && $_GET['ref']!="") {
		echo '
		<div class="note" id="paid">با تشکر از پرداخت شما. فاکتور شما به حالت پرداخت شده تغییر داده شد و اطلاعات شما ثبت شد. جهت پیگیری های بعدی کد تراکنش زیر را یادداشت:<br>' . $zng_ref . '</div>
		';
	}


}

}
?>

<div class="text">

<table class="zng_id_table">

	<tr>
	<td class="top" colspan="2" style="text-align: center;">مشخصات فاکتور</td>
	</tr>

	<tr>
	<td class="top">شناسه</td>
	<td><?php echo $zng_id; ?></td>
	</tr>

	<tr>
	<td class="top">از</td>
	<td><?php echo $zng_from; ?></td>
	</tr>
	
	<tr>
	<td class="top">به</td>
	<td><?php echo $zng_to; ?></td>
	</tr>
	
	<tr>
	<td class="top">بابت</td>
	<td><?php echo $zng_for; ?></td>
	</tr>
	
	<tr>
	<td class="top">تاریخ ایجاد</td>
	<td><?php echo $zng_createdate; ?></td>
	</tr>
	
	<tr>
	<td class="top" style="font-size: 10px;">مهلت پرداخت</td>
	<td>تا <?php echo $zng_paytime; ?></td>
	</tr>

	<tr>
	<td class="top">مبلغ</td>
	<td><?php echo $zng_price; ?> تومان</td>
	</tr>
	
	<tr>
	<td class="top">وضعیت</td>
	<td><?php echo $zng_status_persian; ?></td>
	</tr>
	
	<tr>
	<td class="top" colspan="2" style="text-align: center;">توضیحات</td>
	</tr>
	
	<tr>
	<td colspan="2"><?php echo $zng_description; ?></td>
	</tr>

</table>

	<?php
	$zng_paytime_compare = str_replace("/","",$zng_paytime);
	if($zng_paytime_compare<$zng_date_compare)
	{
	echo '<button class="zng_pay" id="error">متاسفانه مهلت پرداخت این فاکتور به پایان رسیده است</button>';
	}
	else {
	echo $zng_pay_button;
	}
	?>
	<a href="?index=index"><button class="zng_pay">بازگشت</button></a>

</div>

<?php zng_footer(); ?>
