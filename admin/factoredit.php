<?php
include("header.php");
$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$_GET[id]' ");
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
	
}

switch($_GET[action]) {
	case "full":
	echo '
<table class="zng_id_table">

	<tr>
	<td class="top" colspan="2" style="text-align: center;">مشخصات فاکتور</td>
	</tr>

	<tr>
	<td class="top">شناسه</td>
	<td>' . $zng_id . '</td>
	</tr>

	<tr>
	<td class="top">از</td>
	<td>' . $zng_from . '</td>
	</tr>
	
	<tr>
	<td class="top">به</td>
	<td>' . $zng_to . '</td>
	</tr>
	
	<tr>
	<td class="top">بابت</td>
	<td>' . $zng_for . '</td>
	</tr>
	
	<tr>
	<td class="top">تاریخ ایجاد</td>
	<td>' . $zng_createdate . '</td>
	</tr>
	
	<tr>
	<td class="top" style="font-size: 10px;">مهلت پرداخت</td>
	<td>تا ' . $zng_paytime . '</td>
	</tr>

	<tr>
	<td class="top">مبلغ</td>
	<td>' . $zng_price . ' تومان</td>
	</tr>
	
	<tr>
	<td class="top">وضعیت</td>
	<td>' . $zng_status_persian . '</td>
	</tr>
	
	<tr>
	<td class="top">کد تراکنش</td>
	<td>' . $zng_ref . '</td>
	</tr>
	
	<tr>
	<td class="top">ایمیل پرداخت کننده</td>
	<td>' . $zng_email . '</td>
	</tr>
	
	<tr>
	<td class="top">شماره تلفن پرداخت کننده</td>
	<td>' . $zng_phone . '</td>
	</tr>
	
	<tr>
	<td class="top" colspan="2" style="text-align: center;">توضیحات</td>
	</tr>
	
	<tr>
	<td colspan="2">' . $zng_description . '</td>
	</tr>

</table>
	';
	break;
	
	case "edit":
	if(!empty($zng_ref)) { echo 'شما نمی توانید فاکتوری که پرداخت شده است را ویرایش کنید'; }
	else { 
	
		echo '
	<form action="factoredit_submit.php?id=' . $zng_id . '" method="POST" accept-charset="ISO-8859-1" class="zng_form_pay">
	<table class="zng_id_table">

	<tr>
	<td class="top" colspan="2" style="text-align: center;">مشخصات فاکتور</td>
	</tr>

	<tr>
	<td class="top">از</td>
	<td><input type="text" value="' . $zng_from . '" name="from" required/></td>
	</tr>
	
	<tr>
	<td class="top">به</td>
	<td><input type="text" value="' . $zng_to . '" name="to" required/></td>
	</tr>
	
	<tr>
	<td class="top">بابت</td>
	<td><input type="text" value="' . $zng_for . '" name="for" required/></td>
	</tr>
	
	<tr>
	<td class="top" style="font-size: 10px;">مهلت پرداخت ( تا )</td>
	<td><input type="text" value="' . $zng_paytime . '" name="paytime" required/></td>
	</tr>

	<tr>
	<td class="top">مبلغ</td>
	<td><input type="text" value="' . $zng_price . '" name="price" required/></td>
	</tr>
	
	<tr>
	<td class="top" colspan="2" style="text-align: center;">توضیحات</td>
	</tr>
	
	<tr>
	<td colspan="2"><textarea name="desc" cols="100" row="50">' . $zng_description . '</textarea></td>
	</tr>

	</table>
	<input type="submit" value="ویرایش" class="zng_pay" />
	</form>
	';
		
	}
	break;
	
	case "delete":
	if(!empty($zng_ref)) { echo 'شما نمی توانید فاکتوری که پرداخت شده است را حذف کنید'; }
	else { echo 'فاکتور مورد نظر با موفقیت حذف شد'; mysql_query("DELETE FROM `zng_factor` WHERE ID='$_GET[id]' "); }
	break;
}

include("footer.php");
?>
