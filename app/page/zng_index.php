<?php
zng_header();
if(!empty($_GET['error'])) {
	switch ($_GET['error']) {
		case "1":
		$error_note = 'جهت ادامه باید شناسه فاکتور را وارد نمایید!';
		break;
		
		case "2":
		$error_note = 'شناسه فاکتور نامعتبر است!';
		break;
		
		case "3":
		$error_note = 'پرداخت ناموفق! کد خطا:' . $_GET['ref'];
		break;
		
		case "4":
		$error_note = 'پرداخت توسط کاربر لغو شد.';
		break;
		
		case "5":
		$error_note = 'این فاکتور پرداخت شده است و یا مهلت پرداخت آن به اتمام رسیده است.';
		break;
	}
	echo '<div class="note" id="error">' . $error_note . '</div>';
}
?>


<div class="text">
پرداخت فاکتور:<br>
<form action="?index=id" method="POST" accept-charset="ISO-8859-1" class="zng_form">
<input type="text" name="id" placeholder="شناسه فاکتور" />
<input type="submit" value="ارزیابی فاکتور" />
</form>
</div>

<?php zng_footer(); ?>
