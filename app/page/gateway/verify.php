<?php
	
	include("app/config.php");
	require_once('app/page/gateway/lib/nusoap.php');
	//Factor Get
	if(empty($_GET['id'])) { header("location: ?index=index&error=1"); }
	else {

	$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$_GET[id]'");
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
	
	$MerchantID = $zng_zarinpal_mc;
	$Amount = $zng_price; //Amount will be based on Toman
	$Authority = $_GET['Authority'];
	
	if($_GET['Status'] == 'OK'){
		// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
		$client = new nusoap_client('https://de.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl'); 
		$client->soap_defencoding = 'UTF-8';
		$result = $client->call('PaymentVerification', array(
															array(
																	'MerchantID'	 => $MerchantID,
																	'Authority' 	 => $Authority,
																	'Amount'	 	 => $Amount
																)
															)
		);
		
		if($result['Status'] == 100){
			$u_info_debase = base64_decode($_GET[u_info]);
			echo $u_info_debase;
			$u_json_decode = json_decode($u_info_debase);
			$u_info_email = $u_json_decode->{'u_email'};
			$u_info_phone = $u_json_decode->{'u_phone'};
			mysql_query("UPDATE `zng_factor` SET `status`='paid',`ref`='$result[RefID]', `email`='$u_info_email', `phone`='$u_info_phone' WHERE ID='$_GET[id]'");
			header("location: ?index=id&id=$_GET[id]&ref=$result[RefID]");
		} else {
			header("location: ?index=index&error=3&ref=$result[Status]");
		}

	} else {
		header("location: ?index=index&error=4");
	}
	
	}

?>
