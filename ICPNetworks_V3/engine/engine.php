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
if($db_type)
	$getConfigs = $gameServer->prepare("SELECT * FROM icp_configs ORDER BY id DESC LIMIT 1");
else
	$getConfigs = $gameServer->prepare("SELECT TOP 1 * FROM icp_configs ORDER BY id DESC");
$getConfigs->execute();
$config = $getConfigs->fetch(\PDO::FETCH_ASSOC);
foreach($config as $key => $val)
	if(is_numeric($val))
		$config[$key] = ltrim($val,"0");
$config["L2jVersaoClassic"] = $config["CHRONICLE"] == "Classic" ? true : false;