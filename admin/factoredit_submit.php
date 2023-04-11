<?php
include("header.php");
//$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$_GET[id]' ");
$query = "SELECT * FROM zng_factor WHERE ID =".$_GET['id'];
$zng_fg = mysqli_query($zng_info_data, $query);
while($row = mysqli_fetch_assoc($zng_fg))
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

$query="UPDATE zng_factor SET `from`='".$_POST['from']."', `to`='".$_POST['to']."', `for`='".$_POST['for']."', `paytime`='".$_POST['paytime']."', `price`='".$_POST['price']."', `description`='".$_POST['desc']."' WHERE `ID`=".$_GET['id'];

		mysqli_query($zng_info_data,$query);
		echo 'فاکتور مورد نظر با موفقیت ویرایش شد.';

}

include("footer.php");


