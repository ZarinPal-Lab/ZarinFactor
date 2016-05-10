<?php
include("header.php");
?>
	<form action="factoradd_submit.php" method="POST" accept-charset="ISO-8859-1" class="zng_form_pay">
	<table class="zng_id_table">

	<tr>
	<td class="top" colspan="2" style="text-align: center;">مشخصات فاکتور</td>
	</tr>

	<tr>
	<td class="top">از</td>
	<td><input type="text" value="" name="from" required/></td>
	</tr>
	
	<tr>
	<td class="top">به</td>
	<td><input type="text" value="" name="to" required/></td>
	</tr>
	
	<tr>
	<td class="top">بابت</td>
	<td><input type="text" value="" name="for" required/></td>
	</tr>
	
	<tr>
	<td class="top" style="font-size: 10px;">مهلت پرداخت ( تا )</td>
	<td><input type="text" value="" name="paytime" placeholder="به صورت: YYYY/MM/DD" required/></td>
	</tr>

	<tr>
	<td class="top">مبلغ</td>
	<td><input type="text" value="" name="price" required/></td>
	</tr>
	
	<tr>
	<td class="top" colspan="2" style="text-align: center;">توضیحات</td>
	</tr>
	
	<tr>
	<td colspan="2"><textarea name="desc" cols="100" row="50"></textarea></td>
	</tr>

	</table>
	<input type="submit" value="اضافه کن" class="zng_pay" />
	</form>
<?php
include("footer.php");
?>
