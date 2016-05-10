<?php
include("header.php");
$zng_fg = mysql_query("SELECT * FROM zng_factor");
echo '
<ul class="zng_menu">
<a href="addfactor.php"><li>اضافه کردن فاکتور جدید</li></a>
</ul>
<br>
<table class="zng_id_table">
<tr>
<td class="top" colspan="11" style="text-align: center;">فاکتور ها</td>
</tr>
<tr>
<td class="top" style="text-align: center;">شناسه</td>
<td class="top" style="text-align: center;">از</td>
<td class="top" style="text-align: center;">به</td>
<td class="top" style="text-align: center;">بابت</td>
<td class="top" style="text-align: center;">تاریخ ایجاد</td>
<td class="top" style="text-align: center;">مهلت پرداخت ( تا )</td>
<td class="top" style="text-align: center;">قیمت</td>
<td class="top" style="text-align: center;">توضیحات</td>
<td class="top" style="text-align: center;">وضعیت</td>
<td class="top" style="text-align: center;">کد تراکنش</td>
<td class="top" style="text-align: center;">عملیات</td>
</tr>
';
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
$zng_email = $row['email'];
$zng_phone = $row['phone'];

switch($zng_status) {
	case "nopay":
	$zng_status_persian = 'پرداخت نشده';
	break;
	case "paid":
	$zng_status_persian = 'پرداخت شده';
	break;
}

echo '
<tr>
<td>' . $zng_id . '</td>
<td>' . $zng_from . '</td>
<td>' . $zng_to . '</td>
<td>' . $zng_for . '</td>
<td>' . $zng_createdate . '</td>
<td>' . $zng_paytime . '</td>
<td>' . $zng_price . '</td>
<td>' . shorttext($zng_description, 100) . '</td>
<td>' . $zng_status_persian . '</td>
<td>' . $zng_ref . '</td>
<td><a href="factoredit.php?id=' . $zng_id . '&action=full" style="text-decoration:none; color: #000000;">اطلاعات کامل</a> | <a href="factoredit.php?id=' . $zng_id . '&action=edit" style="text-decoration:none; color: #000000;">ویرایش</a> | <a href="factoredit.php?id=' . $zng_id . '&action=delete" style="text-decoration:none; color: #000000;">حذف</a></td>
</tr>
';
	
}
echo '</table>';
?>



<?php include("footer.php"); ?>
