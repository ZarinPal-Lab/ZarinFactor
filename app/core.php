<?php

//Files
include("jdf.php");
include("config.php");

//Sql Connect
$zng_con = mysql_connect($zng_sql_address,$zng_sql_username,$zng_sql_password);
if (!$zng_con)
{
die('
<html dir="rtl" lang="fa">
<head>
<title>مشکل در اتصال به پایگاه داده</title>
</head>
<body>
<div align="right">
<span style="font-size: 30px;">مشکلی در اتصال به پایگاه داده وجود آمده است!</span><br>
<li>اطلاعات اتصال به پایگاه داده را بررسی کنید.</li>
<li>سطح دسترسی فایل config.php را بر روی 755 تنظیم کنید.</li>
<li>در صورتی که مشکل شما رفع نشد با پشتیبان هاست خود مشکلتان را در میان بگذارید.</li>
<hr>
اطلاعات حرفه ای:<br>
<span dir="ltr">' . mysql_error() . '</span>
</div>
</body>
</html>
');
}
mysql_select_db($zng_sql_name, $zng_con);

//Theme Header & Footer
function zng_header() {
include("config.php");
include("app/page/zng_header.php");
}

function zng_footer() {
include("app/page/zng_footer.php");
}


//Short Text
function shorttext($text, $numb = 100) {
    if (mb_strlen($text) > $numb) {
		$text = strip_tags($text);       
  $text = substr($text, 0, $numb);
        $text = mb_substr($text, 0, mb_strrpos($text, " "));
        $etc = " ...";
        $text = $text . $etc;
    }
    return $text;
}
?>
