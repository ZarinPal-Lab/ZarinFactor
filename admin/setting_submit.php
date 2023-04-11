<?php
include("header.php");
//$zng_fg = mysql_query("SELECT * FROM zng_system WHERE ID='1' ");
$query = "SELECT * FROM zng_system WHERE ID =1";
$zng_fg = mysqli_query($zng_info_data, $query);
while($row = mysqli_fetch_assoc($zng_fg)) {
$title = $row['title'];
$merchant = $row['merchant'];
$adminpass = $row['adminpass'];
$webaddress = $row['webaddress'];
}

if(empty($_POST['adminpass'])) { $adminpasschange = $adminpass; }
else { $adminpasschange = md5($_POST['adminpass']); }
$query="UPDATE `zng_system` SET `title`='".$_POST['title']."', merchant='".$_POST['merchant']."', adminpass='".$adminpasschange."',    webaddress='".$_POST['webaddress']."' WHERE ID=1;";
mysqli_query($zng_info_data,$query);
echo 'تنظیمات با موفقیت ثبت گردید';

include("footer.php");
?>
