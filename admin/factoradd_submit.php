<?php
include("header.php");

$zng_paytime_compare = str_replace("/","",$_POST[paytime]);
if($zng_paytime_compare<=$zng_date_compare) { echo 'مهلت پرداخت نمی تواند با تاریخ امروز مساوی یا کمتر باشد.'; }
else {
	mysql_query("INSERT INTO `zng_factor`(`from`, `to`, `for`, `createdate`, `paytime`, `price`, `description`, `status`) VALUES ('$_POST[from]','$_POST[to]','$_POST[for]','$zng_date','$_POST[paytime]','$_POST[price]','$_POST[desc]','nopay')");
	echo 'فاکتور با موفقیت اضافه شد!';
}

include("footer.php");
?>
