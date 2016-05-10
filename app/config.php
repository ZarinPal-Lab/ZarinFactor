<?php
session_start();
//Database Info
$zng_sql_address = "localhost"; //Default is localhost
$zng_sql_username = "root"; //Your Database's username
$zng_sql_password = "root"; //Your Database's password
$zng_sql_name = "zng"; //Your Database's name

//Don't Edit This Part
//Site Info
$zng_info_data = mysql_query("SELECT * FROM zng_system WHERE ID='1'");
while($row = mysql_fetch_array($zng_info_data))
{
$zng_title = $row['title'];
$zng_zarinpal_mc = $row['merchant'];
$zng_web_address = $row['webaddress'];
}
//JDF
$zng_date = jdate('o/n/j','','','','en');
$zng_date_compare = jdate('onj','','','','en');
?>
