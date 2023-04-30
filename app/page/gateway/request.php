<?php
	include("app/config.php");
	require_once("zarinpal_function.php");
	//Factor Get

	if(empty($_POST['id'])) { header("location: ?index=index&error=1"); }
	else {

	//$zng_fg = mysql_query("SELECT * FROM zng_factor WHERE ID='$_POST[id]'");
	$query = "SELECT * FROM zng_factor WHERE ID =".$_POST['id'];
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

	$zng_paytime_compare = str_replace("/","",$zng_paytime);
	if($zng_paytime_compare<$zng_date_compare || $zng_status=="paid") { header("location: ?index=index&error=5"); }

	else {

	$MerchantID = $zng_zarinpal_mc; //Required
	$Amount = $zng_price; //Amount will be based on Toman  - Required
	$Description = 'پرداخت فاکتور شماره:' . $zng_id;  // Required
	//exit('<p>'.$Description.'</p>');
	$Email = $_POST['u_email']; // Optional
	$Mobile = $_POST['u_phone']; // Optional
	$u_info_array = array("u_email"=>$_POST['u_email'],"u_phone"=>$_POST['u_phone']);
	$u_info_json = json_encode($u_info_array);
	$u_info_base = base64_encode($u_info_json);
	$CallbackURL = $zng_web_address . '?index=verify&id=' . $_POST['id'] . '&u_info=' . $u_info_base;  // Required

//	exit('<p>'.$CallbackURL.'</p>');
	// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl

	$zp 	= new zarinpal();
	$result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);

	//echo '<br>Authority; '.$result['Authority'];
	//echo '<br>Status: '.$result['Status'];

	//Redirect to URL You can do it also by creating a form
	if (isset($result["Status"]) && $result["Status"] == 100)
	{
		// Success
		$zp->redirect($result["StartPay"]);
		echo "تراکنش با موفقیت انجام شد";
		echo "<br />مبلغ : ". $result["Amount"];
		echo "<br />کد پیگیری : ". $result["RefID"];
		echo "<br />Authority : ". $result["Authority"];
	} else {
		// error
		echo "پرداخت ناموفق";
		echo "<br />کد خطا : ". $result["Status"];
		echo "<br />تفسیر و علت خطا : ". $result["Message"];
	}
	//*********************
	
	}
	}

