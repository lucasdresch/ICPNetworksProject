<?php
//=======================================================================\\
//  ## ####### #######                                                   \\
//  ## ##      ##   ##                                                   \\
//  ## ##      ## ####  |\  | |¯¯¯ ¯¯|¯¯ \      / |¯¯¯| |¯¯¯| | / |¯¯¯|  \\
//  ## ##      ##       | \ | |--    |    \    /  | | | | |_| |<   ¯\_   \\
//  ## ####### ##       |  \| |___   |     \/\/   |___| | |\  | \ |___|  \\
// --------------------------------------------------------------------- \\
//    Brazillian Developer / WebSite: http://www.icpnetworks.com.br      \\
//                 Email & Skype: ivan1507@gmail.com.br                  \\
//=======================================================================\\
session_start();
if(!file_exists("config/userConfig.php")){
	require_once("engine/ICP_install.php");
	exit;
}
require_once("config/userConfig.php");
require_once("engine/connect.php");
$jsonArr = array("informer","accounts");
if(!empty($_GET["json"]) && in_array($_GET["json"],$jsonArr))
	require_once("engine/json.php");
require_once("engine/engine.php");
require_once("engine/classes/Mobile_Detect.php");

date_default_timezone_set($config["TIME_ZONE"]);

$detect = new Mobile_Detect;
if(!$detect->isMobile()){
	$folderTemplate = "desktop/";
	$currentTemplate = isset($config["PC_TEMPLATE"]) && !empty($config["PC_TEMPLATE"]) ? $config["PC_TEMPLATE"] : null;
}else{
	$folderTemplate = "mobile/";
	$currentTemplate = isset($config["MB_TEMPLATE"]) && !empty($config["MB_TEMPLATE"]) ? $config["MB_TEMPLATE"] : null;
}

if(isset($currentTemplate) && !empty($currentTemplate)){
	require_once("engine/module_template.php");
}else{
	echo "ERROR: Invalid template!";
}