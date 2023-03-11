<?php

error_reporting (E_ALL);
ob_start();
include("app/core.php");
$zng_getaddress = $_GET['index'];
$zng_includeaddress = array("index"=>"zng_index","id"=>"zng_idpay","req"=>"gateway/request","verify"=>"gateway/verify");
$zng_check = $zng_includeaddress[$zng_getaddress];
if(empty($zng_getaddress)) { header("location: ?index=index"); }
else {
if(!in_array($zng_check ,$zng_includeaddress)) { header("location: ?index=index"); }
else { 
include("app/page/" . $zng_includeaddress[$zng_getaddress] . ".php"); }
}
?>
