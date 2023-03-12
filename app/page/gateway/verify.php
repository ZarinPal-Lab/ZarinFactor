<?php
	
	include("app/config.php");
	require_once("zarinpal_function.php");
	//Factor Get
	if(empty($_GET['id'])) {// if id exist
	 header("location: ?index=index&error=1"); 
	 }else {

	//$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$_GET[id]'");
	$query = "SELECT * FROM zng_factor WHERE ID =".$_GET['id'];
	$zng_fg = mysqli_query($zng_info_data, $query);
	if(mysqli_num_rows($zng_fg) < 1) { header("location: ?index=index&error=2"); }
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
	}
	
	$MerchantID = $zng_zarinpal_mc;
	$Amount = $zng_price; //Amount will be based on Toman
	$Authority = $_GET['Authority'];

	if($_GET['Status'] == 'OK'){// if Status exist
	
		// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
		$zp 	= new zarinpal();
		$result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);

		
		if($result['Status'] == 100){
			$u_info_debase = base64_decode($_GET['u_info']);
			echo $u_info_debase;
			$u_json_decode = json_decode($u_info_debase);
			$u_info_email = $u_json_decode->{'u_email'};
			$u_info_phone = $u_json_decode->{'u_phone'};
			$query="UPDATE `zng_factor` SET `status`='paid',`ref`='".$result['RefID']."', `email`='".$u_info_email."', `phone`='".$u_info_phone."' WHERE ID=".$_GET['id'];

			// update data in mysqle database
			mysqli_query($zng_info_data,$query);
			header("location: ?index=id&id=".$_GET['id']."&ref=".$result['RefID']);
		} else {
			header("location: ?index=index&error=3&ref=".$result['Status']);
		}

	} else {
		header("location: ?index=index&error=4");
	
	
	}//endif Status exist
	
	}//endif id exist

?>
