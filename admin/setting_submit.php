<?php
include("header.php");
$zng_fg = mysql_query("SELECT * FROM zng_system WHERE ID='1' ");
while($row = mysql_fetch_array($zng_fg)) {
$title = $row['title'];
$merchant = $row['merchant'];
$adminpass = $row['adminpass'];
$webaddress = $row['webaddress'];
}

if(empty($_POST[adminpass])) { $adminpasschange = $adminpass; }
else { $adminpasschange = md5($_POST['adminpass']); }
mysql_query("UPDATE `zng_system` SET `title`='$_POST[title]', `merchant`='$_POST[merchant]', `adminpass`='$adminpasschange', `webaddress`='$_POST[webaddress]' WHERE ID='1'");
echo 'تنظیمات با موفقیت ثبت گردید';

include("footer.php");
?>
