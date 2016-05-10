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

if(!empty($zng_ref)) { header("location: index.php"); }
else {
		mysql_query("UPDATE `zng_factor` SET `from`='$_POST[from]',`to`='$_POST[to]', `for`='$_POST[for]', `paytime`='$_POST[paytime]', `price`='$_POST[price]', `description`='$_POST[desc]' WHERE ID='1'");
		echo 'فاکتور مورد نظر با موفقیت ویرایش شد.';
}

include("footer.php");
?>
