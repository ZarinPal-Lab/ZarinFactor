<?php
/*
* configurations & settings
*/
$mydir='zf'; //main folder
$ZarinGate=false;
$SandBox=true; // true is for test mode. change it to false 
//Database Info
$zng_sql_address = "localhost"; //Default is localhost
$zng_sql_username = "root"; //Your Database's username
$zng_sql_password = ""; //Your Database's password
$zng_sql_name = "zng"; //Your Database's name

/**
* end of configurations
*/
	 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//-----------------------
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);//edited 1401/12/18 Ali
$zng_info_data = mysqli_connect($zng_sql_address, $zng_sql_username,$zng_sql_password, $zng_sql_name );//edited 1401/12/18 Ali
mysqli_query($zng_info_data, "SET NAMES utf8");
$query = "SELECT * FROM zng_system WHERE ID =1";//edited 1401/12/18 Ali
$result = mysqli_query($zng_info_data, $query);//edited 1401/12/18 Ali

/* numeric array */

//--------------------
//Don't Edit This Part
//Site Info
//$zng_info_data = mysql_query("SELECT * FROM zng_system WHERE ID='1'");

while($row = mysqli_fetch_assoc($result) )//edited 1401/12/18 Ali
{

$zng_title = $row['title'];
$zng_zarinpal_mc = $row['merchant'];
$zng_web_address = $row['webaddress'];
}
//JDF
$zng_date = jdate('o/n/j','','','','en');
$zng_date_compare = jdate('onj','','','','en');

//*************
$query_update_webadress="UPDATE `zng_system` SET `webaddress` = '".$url."/".$mydir."/' WHERE `zng_system`.`ID` = 1"; 
$result = mysqli_query($zng_info_data, $query_update_webadress);//edited 1401/12/18 Ali
