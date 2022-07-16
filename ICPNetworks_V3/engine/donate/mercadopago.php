<?php
session_start();
if(isset($_SESSION["ICP_UserName"]) && !empty($_SESSION["ICP_UserName"])){
	require_once("../../config/userConfig.php");
	require_once("../connect.php");
	require_once("../engine.php");
	if($config["mp_currency"] == "BRL")
		$currency_id = "R$";
	elseif($config["mp_currency"] == "EUR")
		$currency_id = "€";
	elseif($config["mp_currency"] == "VES")
		$currency_id = "Bs.";
	elseif($config["mp_currency"] == "PEN")
		$currency_id = "S/";
	else
		$currency_id = "$";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/checkout/preferences");
	curl_setopt($ch, CURLOPT_HTTPHEADER , array("Authorization: Bearer ".$config["mp_token"]));
	curl_setopt($ch, CURLOPT_POSTFIELDS , '{"items": [{ "title": "'.$config["DONATE_COIN_NAME"].'", "description": "'.$config["DONATE_COIN_NAME"].'", "picture_url": "https://mlb-s2-p.mlstatic.com/686851-MLB46226875509_052021-F.jpg", "quantity": '.$_GET["quantity"].', "currency_id": "'.$currency_id.'", "unit_price": '.number_format(1/$config["mp_amount"],2,".",".").' }], "external_reference": "'.$_SESSION["ICP_UserName"].'", "external_resource_url": "'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].'"}');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	$obj = json_decode($output);
	echo $obj->id;
	curl_close($ch);
}