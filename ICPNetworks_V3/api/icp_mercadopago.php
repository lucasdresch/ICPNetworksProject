<?php
require_once("../config/userConfig.php");
require_once("../engine/connect.php");
if($gameServer){
	require_once("../engine/engine.php");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/v1/payments/".$_GET["id"]);
	curl_setopt($ch, CURLOPT_HTTPHEADER , array("Authorization: Bearer ".$config["mp_token"]));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	$obj = json_decode($output);
	$TransacaoID = $obj->order->id;
	$status = $obj->status;
	$valor = $obj->transaction_amount;
	$qtd_moedas = !empty($obj->quantity ?? 0) ? $obj->quantity ?? 0 : 0;
	$data = $obj->date_last_updated;
	$moeda = $obj->currency_id;
	$login = $obj->external_reference;
	$metodo = "Mercado Pago";
	if (!empty($TransacaoID) && !empty($login)){
		require_once("entrega_automatica.php");
	}
	curl_close($ch);
}else{
	Header("Location: ".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "https://" : "http://").$_SERVER["HTTP_HOST"]); exit();
}
?>