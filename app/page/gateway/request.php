<?php
	
	include("app/config.php");
	require_once('app/page/gateway/lib/nusoap.php');
	//Factor Get
	if(empty($_POST['id'])) { header("location: ?index=index&error=1"); }
	else {

	$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$_POST[id]'");
	if(mysql_num_rows($zng_fg) < 1) { header("location: ?index=index&error=2"); }
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
	}
	
	$zng_paytime_compare = str_replace("/","",$zng_paytime);
	if($zng_paytime_compare<$zng_date_compare || $zng_status=="paid") { header("location: ?index=index&error=5"); }

	else {
			$MerchantID = $zng_zarinpal_mc; //Required
	$Amount = $zng_price; //Amount will be based on Toman  - Required
	$Description = 'پرداخت فاکتور شماره:' . $zng_id;  // Required
	$Email = $_POST['u_email']; // Optional
	$Mobile = $_POST['u_phone']; // Optional
	$u_info_array = array("u_email"=>$_POST[u_email],"u_phone"=>$_POST[u_phone]);
	$u_info_json = json_encode($u_info_array);
	$u_info_base = base64_encode($u_info_json);
	$CallbackURL = $zng_web_address . '?index=verify&id=' . $_POST[id] . '&u_info=' . $u_info_base;  // Required
	
	
	// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
	$client = new nusoap_client('https://de.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl'); 
	$client->soap_defencoding = 'UTF-8';
	$result = $client->call('PaymentRequest', array(
													array(
															'MerchantID' 	=> $MerchantID,
															'Amount' 		=> $Amount,
															'Description' 	=> $Description,
															'Email' 		=> $Email,
															'Mobile' 		=> $Mobile,
															'CallbackURL' 	=> $CallbackURL
														)
													)
	);
	
	//Redirect to URL You can do it also by creating a form
	if($result['Status'] == 100)
	{
		Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result['Authority']);
	} else {
		echo'ERR: '.$result['Status'];
	}
	}

	}
?>
